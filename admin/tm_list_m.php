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
                            <h1 class="m-0 text-dark">Dashboard</h1>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard v1</li>
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

                    $sql = "SELECT m.*,r.rm_date as fdate,r.last_update,s.name as supname FROM tb_m m
                    INNER JOIN tb_rm r ON m.id_rm = r.id
                    INNER JOIN tb_subcategory s ON m.rm_subcategory = s.subcategory
                    WHERE m.tm_status = 1
                    ORDER BY m.id DESC";
                    $query = mysqli_query($objCon, $sql);
                    ?>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header bg-fuchsia">
                                    <h5 class="card-text"><i class="fas fa-recycle"></i> รายการรอทบทวน</h5>
                                </div>
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th width="5%">#</th>
                                                <th width="60%%">รายการ</th>
                                                <th width="10%" align="center">เกิดขึ้นเมื่อ</th>
                                                <th width="15%" align="center">ได้รับแจ้งเมื่อ</th>
                                                <th width="10%" align="center">ทบทวน</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            while ($result = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
                                            ?>
                                                <tr>
                                                    <td><?php echo $result['id']; ?></td>
                                                    <td>
                                                        <?php echo $result['supname']; ?>
                                                    </td>
                                                    <td align="center">
                                                        <?php echo $result['fdate']; ?>
                                                    </td>
                                                    <td align="center"><?php echo $result['last_update'];
                                                                        ?></td>
                                                    <td align="center"><a href="rm_details_m.php?ID=<?php echo $result["id"]; ?>">
                                                            <button type="button" class="btn btn-success"><i class="nav-icon fas fa-edit"></i></button>
                                                        </a></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

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
</body>

</html>