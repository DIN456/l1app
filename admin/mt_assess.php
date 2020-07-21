<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['username'] == "") {
    header("Location:../login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('header.php'); ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <?php include('navbar.php'); ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index.php" class="brand-link"> <img src="../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> <span class="brand-text font-weight-light">RM-BRJ</span> </a>

            <!-- Sidebar -->
            <?php
            if ($_SESSION['admin'] == '1') {
                include('sidebar.php');
            } else {
                include('sidebar_user.php');
            }
            ?>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark"></h1>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active"></li>
                            </ol>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->

                    <!---------- row main --->
                    <?php
                    include('../config.php');
                    $objCon = mysqli_connect($serverName, $userName, $userPassword, $dbName);
                    mysqli_query($objCon, "SET NAMES 'utf8'");
                    $id = $_GET['ID'];
                    // echo $id;
                    //exit;

                    $sql = " SELECT r.*,l.location as location,d.name as dep_name,s.name as supname,u.name as uname FROM tb_rm r
                    INNER JOIN tb_location l ON r.rm_location = l.id
                    INNER JOIN tb_department d ON r.rm_dep_id = d.dep_id
                    INNER JOIN tb_subcategory s ON r.rm_subcategory = s.subcategory
                    INNER JOIN tb_user u ON r.rm_upost = u.Id
                    WHERE r.id = $id ";
                    $query = mysqli_query($objCon, $sql);

                    while ($result = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
                    ?>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card card-danger">
                                    <div class="card-header">
                                        <h3 class="card-title"><i class="fas fa-recycle"></i> ย้ายรายการความเสี่ยงไปทบทวน</h3>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse"> <i class="fas fa-minus"></i></button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <form action="add_mt_assess.php" method="post" enctype="multipart/form-data">
                                            <input type="hidden" value="<?php echo $result['id'] ?>" name="id">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label for="exampleFormControlSelect1">รายการความเสี่ยง</label>
                                                    <select class="form-control" name="rm_subcategory" required>
                                                        <option selected value="<?php echo $result['rm_subcategory']; ?>"><?php echo $result['supname']; ?></option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleFormControlSelect1">แจ้งกลับไปหน่วยงานที่เกี่ยวข้อง</label>
                                                    <select class="form-control" name="rm_dep_id" required>
                                                        <option selected value="<?php echo $result['rm_dep_id']; ?>"><?php echo $result['dep_name']; ?></option>
                                                        <?php
                                                        $sql6 = "SELECT * FROM tb_department ORDER BY dep_id ASC";
                                                        $query6 = mysqli_query($objCon, $sql6);
                                                        while ($result6 = mysqli_fetch_array($query6, MYSQLI_ASSOC)) {
                                                        ?>
                                                            <option value="<?php echo $result6['dep_id']; ?>"> <?php echo $result6['name']; ?> </option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <!-- /.card-body -->
                                            <div class="card-footer">
                                                <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> บันทึกรายการ</button>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>

                    <!-- /.row (main row) -->
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <?php include('footer.php'); ?>
    <script src="dist/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="dist/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Select2 -->
    <script src="dist/plugins/select2/js/select2.full.min.js"></script>
    <!-- Bootstrap4 Duallistbox -->
    <script src="dist/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
    <!-- InputMask -->
    <script src="dist/plugins/moment/moment.min.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="dist/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Page script -->
    <script>
        //Date range picker
        $("#reservationdate").datetimepicker({
            format: "YYYY-MM-DD"
        });
    </script>
</body>

</html>