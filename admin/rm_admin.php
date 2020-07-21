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
    <meta charset="utf-8">
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
            $admin = $_SESSION["admin"];
            if ($admin == "1") {
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
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="card card-primary card-outline">
                                <div class="card-body box-profile">
                                    <div class="text-center">
                                        <img class="profile-user-img img-fluid img-circle" src="img/D-1593764050_2712.jpg" alt="User profile picture">
                                    </div>

                                    <h3 class="profile-username text-center">บุษกร อ่องมี</h3>

                                    <p class="text-muted text-center">System Analyst</p>

                                    <ul class="list-group list-group-unbordered mb-3">
                                        <li class="list-group-item">
                                            <b>ตำแหน่ง</b> <a class="float-right">หัวหน้างานรังสีการแพทย์</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                        <div class="col-sm-4">
                            <div class="card card-primary card-outline">
                                <div class="card-body box-profile">
                                    <div class="text-center">
                                        <img class="profile-user-img img-fluid img-circle" src="img/D-1593764050_2712.jpg" alt="User profile picture">
                                    </div>

                                    <h3 class="profile-username text-center">นางสุภาสุข พิศรูป</h3>

                                    <p class="text-muted text-center">System Analyst</p>

                                    <ul class="list-group list-group-unbordered mb-3">
                                        <li class="list-group-item">
                                            <b>ตำแหน่ง</b> <a class="float-right">พยาบาลวิชาชีพชำนาญการ</a>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card card-primary card-outline">
                                <div class="card-body box-profile">
                                    <div class="text-center">
                                        <img class="profile-user-img img-fluid img-circle" src="img/D-1593764050_2712.jpg" alt="User profile picture">
                                    </div>

                                    <h3 class="profile-username text-center">ธนกฤต เอกวริษฐ์</h3>

                                    <p class="text-muted text-center">System Analyst</p>

                                    <ul class="list-group list-group-unbordered mb-3">
                                        <li class="list-group-item">
                                            <b>ตำแหน่ง</b> <a class="float-right">นักวิชาการสาธารณสุขชำนาญการ</a>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="card card-primary card-outline">
                                <div class="card-body box-profile">
                                    <div class="text-center">
                                        <img class="profile-user-img img-fluid" src="img/D-1593490919_2286.jpg" alt="User profile picture">
                                    </div>

                                    <h3 class="profile-username text-center">นายธนัท ภัทรไพรศาล</h3>

                                    <p class="text-muted text-center">System Analyst + Programmer</p>

                                    <ul class="list-group list-group-unbordered mb-3">
                                        <li class="list-group-item">
                                            <b>ตำแหน่ง</b> <a class="float-right">นักวิชาการคอมพิวเตอร์</a>
                                        </li>
                                    </ul>
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
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <?php include('footer.php'); ?>
</body>

</html>