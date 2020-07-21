<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['username'] == "") {
    header("Location:../login.php");
    exit;
}
?>
<?php
include('../config.php');
$objCon = mysqli_connect($serverName, $userName, $userPassword, $dbName);
mysqli_query($objCon, "SET NAMES 'utf8'");
$id = $_GET['ID'];
//echo $id;
//exit;

?>
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
                    $sql = " SELECT m.*,r.rm_HN AS HN,r.rm_AN AS AN,r.rm_name AS fname,r.rm_date as fdate, CONCAT(r.rm_timeH,':',r.rm_timeS) AS ftime,
                    r.last_update as flupdate,l.location AS llocation,d.name AS dname,s.`name` AS supname,r.rm_level_risk as risk,r.rm_details AS details,r.rm_fedit AS fedit,
                    r.rm_note as note,r.files AS files,u.`name` AS uname
                    FROM tb_m m
                    INNER JOIN tb_rm r ON m.id = r.id
                    INNER JOIN tb_location l ON r.rm_location = l.id
                    INNER JOIN tb_department d ON r.rm_dep_id = d.dep_id
                    INNER JOIN tb_subcategory s ON r.rm_subcategory = s.subcategory
                    INNER JOIN tb_user u ON r.rm_upost = u.Id
                    WHERE m.id = $id ";
                    $query = mysqli_query($objCon, $sql);

                    ?>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header bg-fuchsia">
                                    <h5 class="card-text">รายละเอียดความเสี่ยงที่รอทบทวน</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="card card-primary card-outline">
                                                <?php while ($result = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
                                                ?>
                                                    <div class="card-body box-profile">

                                                        <ul class="list-group list-group-unbordered mb-3">
                                                            <li class="list-group-item"> <b>HN</b> <a class="float-right"><?php echo $result['HN'];
                                                                                                                            ?></a> </li>
                                                            <li class="list-group-item"> <b>AN</b> <a class="float-right"><?php echo $result['AN']; ?></a> </li>
                                                            <li class="list-group-item"> <b>บุคลากรที่ประสบเหตุการณ์</b> <a class="float-right"><?php echo $result['fname']; ?></a> </li>
                                                            <li class="list-group-item"> <b>วันที่เกิดเหตุ</b> <a class="float-right"><?php echo $result['fdate']; ?></a> </li>
                                                            <li class="list-group-item"> <b>เวลาที่เกิดเหตุ</b> <a class="float-right"><?php echo $result['ftime']; ?></a> </li>
                                                            <li class="list-group-item"> <b>วันที่บันทึกความเสี่ยง</b> <a class="float-right"><?php echo $result['flupdate']; ?></a> </li>
                                                            <li class="list-group-item"> <b>สถานที่เกิดเหตุ</b> <a class="float-right"><?php echo $result['llocation']; ?></a> </li>
                                                            <li class="list-group-item"> <b>หน่วยงานที่เกิดข้อง</b> <a class="float-right"><?php echo $result['dname']; ?></a> </li>
                                                            <li class="list-group-item"> <b>รายการความเสี่ยง</b> <a class="float-right"><?php echo $result['supname']; ?></a> </li>
                                                            <li class="list-group-item"> <b>ระดับความเสี่ยง</b> <a class="float-right"><?php echo $result['risk']; ?></a> </li>
                                                            <div class="form-group">
                                                                <label for="exampleFormControlTextarea1">รายละเอียดความเสี่ยง</label>
                                                                <textarea class="form-control" rows="5" disabled><?php echo $result['details']; ?></textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleFormControlTextarea1">การแก้ไขเบื้องต้น</label>
                                                                <textarea class="form-control" rows="3" disabled><?php echo $result['fedit']; ?></textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleFormControlTextarea1">ข้อเสนอแนะ</label>
                                                                <textarea class="form-control" rows="3" disabled><?php echo $result['note']; ?></textarea>
                                                            </div>

                                                            <li class="list-group-item"> <b>ไฟล์แนบ</b> <a class="float-right" href="img/<?php echo $result["files"]; ?>">
                                                                    <?php echo $result["files"]; ?></a> </li>
                                                            <li class="list-group-item"> <b>ผู้เขียน</b> <a class="float-right"><?php echo $result['uname']; ?></a> </li>
                                                            <hr>
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <table align="right">
                                                                        <tr>
                                                                            <td align="center"><a href="#.php?ID=<?php echo $result["id"]; ?>">
                                                                                    <button type="button" class="btn btn-danger"><i class="fas fa-recycle"></i> ทบทวนรายการนี้</button>
                                                                                </a></td>
                                                                        </tr>
                                                                    </table>
                                                                </div>
                                                            </div>
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