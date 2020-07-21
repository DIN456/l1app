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
    <script>
        function closeWindow() {
            self.opener = this;
            self.close();
        }
    </script>
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
            <?php include('sidebar.php'); ?>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    <hr>
                    <?php
                    $id = $_GET['ID'];
                    //echo $id;
                    // exit;
                    include('../config.php');
                    $objCon = mysqli_connect($serverName, $userName, $userPassword, $dbName);
                    mysqli_query($objCon, "SET NAMES 'utf8'");

                    $sql = " SELECT r.*,l.*,d.name,s.name as supname,u.name as uname FROM tb_rm r
                    INNER JOIN tb_location l ON r.rm_location = l.id
                    INNER JOIN tb_department d ON r.rm_dep_id = d.dep_id
                    INNER JOIN tb_subcategory s ON r.rm_subcategory = s.subcategory
                    INNER JOIN tb_user u ON r.rm_upost = u.Id
                    WHERE r.id = $id ";
                    $query = mysqli_query($objCon, $sql);

                    ?>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header bg-danger">
                                    <h5 class="card-text">รายละเอียดความเสี่ยงในรายการนี้ | <a href="list_rm_bin.php">กลับ</a></h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="card card-primary card-outline">
                                                <?php while ($result = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
                                                ?>
                                                    <div class="card-body box-profile">

                                                        <ul class="list-group list-group-unbordered mb-3">
                                                            <li class="list-group-item"> <b>HN</b> <a class="float-right"><?php echo $result['rm_HN'];
                                                                                                                            ?></a> </li>
                                                            <li class="list-group-item"> <b>AN</b> <a class="float-right"><?php echo $result['rm_AN'];
                                                                                                                            ?></a> </li>
                                                            <li class="list-group-item"> <b>บุคลากรที่ประสบเหตุการณ์</b> <a class="float-right"><?php echo $result['rm_name'];
                                                                                                                                                ?></a> </li>
                                                            <li class="list-group-item"> <b>วันที่เกิดเหตุ</b> <a class="float-right"><?php echo $result['rm_date'];
                                                                                                                                        ?></a> </li>
                                                            <li class="list-group-item"> <b>เวลา</b> <a class="float-right"><?php echo $result['rm_timeH']; ?>:<?php echo $result['rm_timeS']; ?></a> </li>
                                                            <li class="list-group-item"> <b>วันที่บันทึกความเสี่ยง</b> <a class="float-right"><?php echo $result['last_update']; ?></a> </li>
                                                            <li class="list-group-item"> <b>สถานที่เกิดเหตุ</b> <a class="float-right"><?php echo $result['location']; ?></a> </li>
                                                            <li class="list-group-item"> <b>หน่วยงานที่เกี่ยวข้อง </b> <a class="float-right"><?php echo $result['name']; ?></a> </li>
                                                            <li class="list-group-item"> <b>รายการความเสี่ยง</b> <a class="float-right"><?php echo $result['supname']; ?></a> </li>
                                                            <li class="list-group-item"> <b>ระดับความเสี่ยง</b> <a class="float-right"><?php echo $result['rm_level_risk']; ?></a> </li>
                                                            <div class="form-group">
                                                                <label for="exampleFormControlTextarea1">รายละเอียดความเสี่ยง</label>
                                                                <textarea class="form-control" rows="5"><?php echo $result['rm_details']; ?></textarea>
                                                            </div>
                                                            <li class="list-group-item"> <b>การแก้ไขเบื้องต้น</b> <a class="float-right"><?php echo $result['rm_fedit']; ?></a> </li>
                                                            <li class="list-group-item"> <b>ข้อเสนอแนะ</b> <a class="float-right"><?php echo $result['rm_note']; ?></a> </li>
                                                            <li class="list-group-item"> <b>ไฟล์แนบ</b> <a class="float-right" href="img/<?php echo $result["files"]; ?>">
                                                                    <?php echo $result["files"]; ?></a> </li>
                                                            <li class="list-group-item"> <b>ผู้เขียน</b> <a class="float-right"><?php echo $result['uname']; ?></a> </li>
                                                            </col-sm-4>
                                                        </ul>
                                                    </div>
                                                <?php }
                                                ?>
                                                <!-- /.card-body -->
                                            </div>
                                        </div>
                                    </div>
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