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
                    <div class="card">
                        <div class="card-header bg-success">
                            <h5>แก้ไขรายการความเสี่ยง</h5>
                        </div>
                        <div class="card-body">
                            <?php
                            include('../config.php');
                            $objCon = mysqli_connect($serverName, $userName, $userPassword, $dbName);
                            mysqli_query($objCon, "SET NAMES 'utf8'");
                            date_default_timezone_set('Asia/Bangkok');
                            //$dat2 = dat("Y-m-d H:i:s");
                            $id = $_POST['id'];
                            //  if ($_FILES['files']['name'] != '') {
                            //   $path = 'img/';
                            //   $file = $_FILES['files']['name'];
                            //   $file_type = strrchr($file, '.');
                            //   $time = time() . "_" . rand(1, 9999);
                            //    $pic_name = 'D-' . $time . strtoupper($file_type);
                            //    copy($_FILES['files']['tmp_name'], $path . $pic_name);
                            //    $File_Upload = $pic_name;
                            // }
                            // @$File_Upload = $pic_name;
                            //echo $File_Upload;

                            $rm_subcategory = $_POST['rm_subcategory'];
                            $rm_date = $_POST['rm_date'];
                            $rm_timeH = $_POST['rm_timeH'];
                            $rm_timeS = $_POST['rm_timeS'];
                            $rm_location = $_POST['rm_location'];
                            $rm_HN = $_POST['rm_HN'];
                            $rm_AN = $_POST['rm_AN'];
                            $rm_name = $_POST['rm_name'];
                            $rm_dep_id = $_POST['rm_dep_id'];
                            $rm_details = $_POST['rm_details'];
                            $rm_fedit = $_POST['rm_fedit'];
                            $rm_note = $_POST['rm_note'];
                            $rm_level_risk = $_POST['rm_level_risk'];
                            //  @$files = $File_Upload;
                            //  $last_update = date('Y-m-d H:i:s');
                            //  $rm_upost = $_SESSION['Id'];
                            //   $main_dep = $_SESSION['main_dep'];


                            // echo
                            // $rm_subcategory,
                            //  $rm_date,
                            // $rm_timeH,
                            //  $rm_timeS,
                            //  $rm_location,
                            //  $rm_HN,
                            // $rm_AN,
                            // $rm_name,
                            //  $rm_dep_id,
                            //  $rm_details,
                            //  $rm_fedit,
                            //  $rm_note,
                            //  $rm_level_risk,
                            //  @$files;
                            //  exit;

                            $sql = "UPDATE tb_rm SET rm_subcategory = '$rm_subcategory', rm_date = '$rm_date',rm_timeH = '$rm_timeH',
                            rm_timeS = '$rm_timeS',rm_location = '$rm_location',rm_HN = '$rm_HN',rm_AN = '$rm_AN',rm_name = '$rm_name',
                            rm_dep_id = '$rm_dep_id',rm_details = '$rm_details',rm_fedit = '$rm_fedit',rm_note = '$rm_note',rm_level_risk = '$rm_level_risk'
                            WHERE id = $id";

                            $query = mysqli_query($objCon, $sql);

                            if ($query) {
                                echo "<center>แก้ไขรายการสำเร็จแล้วครับ<br><br> <a  href=\"list_rm.php\">ตกลง</a></center>";
                            } else {
                                echo "<center>แก้ไขรายการไม่สำเร็จ<br><br><< <a  href=\"list_rm.php\">ตกลง</a> >></center>";
                            }

                            mysqli_close($objCon);
                            ?>
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