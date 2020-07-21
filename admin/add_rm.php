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
  <?php // include('header.php');
  ?>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback" />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="dist/plugins/fontawesome-free/css/all.min.css" />
  <!-- daterange picker -->
  <link rel="stylesheet" href="dist/plugins/daterangepicker/daterangepicker.css" />
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="dist/plugins/icheck-bootstrap/icheck-bootstrap.min.css" />
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="dist/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css" />
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="dist/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css" />
  <!-- Select2 -->
  <link rel="stylesheet" href="dist/plugins/select2/css/select2.min.css" />
  <link rel="stylesheet" href="dist/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css" />
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="dist/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css" />
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css" />
  <link href="https://fonts.googleapis.com/css?family=Athiti|Bai+Jamjuree|Charmonman" rel="stylesheet">

  <style>
    body {
      font-family: 'Bai Jamjuree', sans-serif;
    }

    /* ใช้เฉพาะหัวข้อ */

    h1,
      {
      font-family: 'Bai Jamjuree', sans-serif;
    }

    .test {
      white-space: nowrap;
      width: 1200px;
      overflow: hidden;
      border: 0px solid #008BCE;
      text-overflow: ellipsis;
    }

    body {
      background-color:
    }
  </style>
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
          ?>
          <div class="row">
            <div class="col-sm-12">
              <div class="card card-danger">
                <div class="card-header">
                  <h3 class="card-title">เขียนรายการความเสี่ยง</h3>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse"> <i class="fas fa-minus"></i></button>
                  </div>
                </div>
                <div class="card-body">
                  <form action="add_data_rm.php" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                      <div class="form-group">
                        <label>ความเสี่ยง</label>
                        <select class="form-control" required name="rm_subcategory">
                          <option selected value="">กรุณาเลือกความเสี่ยง</option>
                          <?php
                          include('../config.php');
                          $objCon = mysqli_connect($serverName, $userName, $userPassword, $dbName);
                          mysqli_query($objCon, "SET NAMES 'utf8'");

                          $sql = "SELECT * FROM tb_subcategory ORDER BY subcategory ASC";
                          $query = mysqli_query($objCon, $sql);
                          while ($result = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
                          ?>
                            <option value="<?php echo $result['subcategory']; ?>"> <?php echo $result["name"]; ?></option>
                          <?php
                          }
                          ?>
                        </select>
                      </div>
                      <div class="row">
                        <div class="col-sm-4">
                          <div class="form-group">
                            <label>วันที่เกิดเหตุ:</label>
                            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                              <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate" name="rm_date" value="<?php echo date('Y-m-d'); ?>" />
                              <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                <div class="input-group-text">
                                  <i class="fa fa-calendar"></i>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-group">
                            <label for="exampleFormControlSelect1">เวลาที่เกิดเหตุ
                              (ชั่วโมง)</label>
                            <select class="form-control" name="rm_timeH" required>
                              <option selected value="">กรุณาเลือกเวลา</option>
                              <?php
                              $sql2 = "SELECT * FROM tb_time_H ORDER BY id ASC";
                              $query2 = mysqli_query($objCon, $sql2);
                              while ($result2 = mysqli_fetch_array($query2, MYSQLI_ASSOC)) {
                              ?>
                                <option value="<?php echo $result2['timeH']; ?>"> <?php echo $result2['timeH']; ?> </option>
                              <?php } ?>
                            </select>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-group">
                            <label for="exampleFormControlSelect1">เวลาที่เกิดเหตุ(นาที)</label>
                            <select class="form-control" name="rm_timeS" required>
                              <option selected value="">กรุณาเลือกนาที</option>
                              <?php
                              $sql3 = "SELECT * FROM tb_timeS ORDER BY id ASC";
                              $query3 = mysqli_query($objCon, $sql3);
                              while ($result3 = mysqli_fetch_array($query3, MYSQLI_ASSOC)) {
                              ?>
                                <option value="<?php echo $result3['timeS']; ?>"> <?php echo $result3['timeS']; ?> </option>
                              <?php } ?>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlSelect1">สถานที่เกิดเหตุ</label>
                        <select class="form-control" name="rm_location" required>
                          <option selected value="">กรุณาเลือกสถานที่</option>
                          <?php
                          $sql4 = "SELECT * FROM tb_location ORDER BY id ASC";
                          $query4 = mysqli_query($objCon, $sql4);
                          while ($result4 = mysqli_fetch_array($query4, MYSQLI_ASSOC)) {
                          ?>
                            <option value="<?php echo $result4['id']; ?>"> <?php echo $result4['location']; ?> </option>
                          <?php } ?>
                        </select>
                      </div>
                      <div class="row">
                        <div class="col-sm-4">
                          <div class="form-group">
                            <label>HN</label>
                            <input type="text" class="form-control" placeholder="กรุณาเพิ่ม HN" maxlength="9" name="rm_HN" required>
                            <label for="" class="small">EX HN : 000032011</label>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-group">
                            <label>AN</label>
                            <input type="text" class="form-control" placeholder="กรุณาเพิ่ม AN" name="rm_AN">
                            <label for="" class="small">EX AN : 630001531</label>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label>ชื่อบุคลากรที่ประสบเหตุการณ์</label>
                        <input type="text" class="form-control" placeholder="ชื่อผู้พบเห็นเหตุการณ์" name="rm_name" required>
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlSelect1">หน่วยงานที่เกี่ยวข้อง</label>
                        <select class="form-control" name="rm_dep_id" required>
                          <option selected value="">กรุณาเลือกหน่วยงาน</option>
                          <?php
                          $sql5 = "SELECT * FROM tb_department ORDER BY dep_id ASC";
                          $query5 = mysqli_query($objCon, $sql5);
                          while ($result5 = mysqli_fetch_array($query5, MYSQLI_ASSOC)) {
                          ?>
                            <option value="<?php echo $result5['dep_id']; ?>"> <?php echo $result5['name']; ?> </option>
                          <?php } ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlTextarea1">บรรยายเหตุการณ์ความเสี่ยง</label>
                        <textarea class="form-control" rows="5" name="rm_details" required></textarea>
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlTextarea1">การแก้ไขเบื้องต้น</label>
                        <textarea class="form-control" rows="2" name="rm_fedit" required></textarea>
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlTextarea1">ข้อเสนอแนะอื่น ๆ
                          เพื่อการแก้ไขป้องกัน</label>
                        <textarea class="form-control" rows="3" name="rm_note"></textarea>
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlTextarea1">ระดับความเสี่ยง</label>
                        &nbsp;&nbsp;&nbsp;
                        <label class="radio-inline">
                          <input value="A" type="radio" name="rm_level_risk" checked>
                          A </label>
                        &nbsp;&nbsp;
                        <label class="radio-inline">
                          <input type="radio" name="rm_level_risk" value="B">
                          B </label>
                        &nbsp;&nbsp;
                        <label class="radio-inline">
                          <input type="radio" name="rm_level_risk" value="C">
                          C </label>
                        &nbsp;&nbsp;
                        <label class="radio-inline">
                          <input type="radio" name="rm_level_risk" value="D">
                          D </label>
                        &nbsp;&nbsp;
                        <label class="radio-inline">
                          <input type="radio" name="rm_level_risk" value="E">
                          E </label>
                        &nbsp;&nbsp;
                        <label class="radio-inline">
                          <input type="radio" name="rm_level_risk" value="F">
                          F </label>
                        &nbsp;&nbsp;
                        <label class="radio-inline">
                          <input type="radio" name="rm_level_risk" value="G">
                          G </label>
                        &nbsp;&nbsp;
                        <label class="radio-inline">
                          <input type="radio" name="rm_level_risk" value="H">
                          H </label>
                        &nbsp;&nbsp;
                        <label class="radio-inline">
                          <input type="radio" name="rm_level_risk" value="I">
                          I </label>
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlFile1">รูปภาพ</label>
                        <input type="file" class="form-control-file" id="exampleFormControlFile1" name="files">
                      </div>

                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                      <button type="submit" class="btn btn-danger">เพิ่มรายการ</button>
                      <button type="reset" class="btn btn-success">เคลียร์ข้อความ</button>
                    </div>
                  </form>
                </div>
                <!-- /.card-body -->
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