<?php
session_start();
if ( !isset( $_SESSION[ 'username' ] ) || $_SESSION[ 'username' ] == "" ) {
	header( "Location:../login.php" );
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
  <?php  include('navbar.php'); ?>
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
        <div class="card">
          <div class="card-header bg-cyan">
            <h5>เพิ่มผู้ใช้งาน</h5>
          </div>
          <div class="card-body">
            <form action="add_data_user.php" method="post" enctype="multipart/form-data">
              <div class="card-body">
                <div class="form-group">
                  <label for="text">ชื่อ-นามสกุล ผู้ใช้งาน</label>
                  <input type="text" class="form-control" id="text" placeholder="ชื่อผู้ใช้งาน" required name="name">
                </div>
                <div class="form-group">
                  <label>เลือกหน่วยงาน</label>
                  <select class="form-control" required name="dep_id">
					  <option selected value="">กรุณาเลือกหน่วยงาน</option>
                    <?php
                    include( '../config.php' );
                    $objCon = mysqli_connect( $serverName, $userName, $userPassword, $dbName );
                    mysqli_query( $objCon, "SET NAMES 'utf8'" );

                    $sql = "SELECT * FROM tb_department ORDER BY dep_id ASC";
                    $query = mysqli_query( $objCon, $sql );
                    while ( $result = mysqli_fetch_array( $query, MYSQLI_ASSOC ) ) {
                      ?>
                    <option value="<?php echo $result['dep_id']; ?>"> <?php echo $result["name"]; ?></option>
                    <?php
                    }
                    ?>
                  </select>
                </div>
				  
				   <div class="form-group">
                  <label>เลือกแผนก</label>
                  <select class="form-control" required name="main_dep">
					  <option selected value="">กรุณาเลือกแผนก</option>
                    <?php
                    include( '../config.php' );
                    $objCon = mysqli_connect( $serverName, $userName, $userPassword, $dbName );
                    mysqli_query( $objCon, "SET NAMES 'utf8'" );

                    $sql = "SELECT * FROM tb_department_group ORDER BY main_dep ASC";
                    $query = mysqli_query( $objCon, $sql );
                    while ( $result = mysqli_fetch_array( $query, MYSQLI_ASSOC ) ) {
                      ?>
                    <option value="<?php echo $result['main_dep']; ?>"> <?php echo $result["dep_name"]; ?></option>
                    <?php
                    }
                    ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>สิทธิ์การใช้งาน</label>
                  <select class="form-control" required name="admin">
                    <option selected>กรุณาเลือกระดับสิทธิ์</option>
                    <?php
                    $sql2 = "SELECT * FROM tb_admin_level ORDER BY id ASC";
                    $query2 = mysqli_query( $objCon, $sql2 );
                    while ( $result2 = mysqli_fetch_array( $query2, MYSQLI_ASSOC ) ) {
                      ?>
                    <option value="<?php echo $result2['id']; ?>"> <?php echo $result2["admin_level"]; ?></option>
                    <?php
                    }
                    ?>                 
                  </select>
                </div>
				  <div class="form-group">
                  <label>กรรมการ RM</label>
                  <select class="form-control" required name="rm">
                    <option selected value="">กรุณาระบุว่าเป็นกรรมการโปรแกรมความเสี่ยงหรือไม่</option>
                    <option value="Y">ใช่ฉันเป็นกรรม RM</option>
					<option value="N">ไม่ฉันเป็นกรรม RM</option>
                                   
                  </select>
                </div>
                <div class="form-group">
                  <label for="text">Username</label>
                  <input type="text" class="form-control" id="text" placeholder="UserName" required name="username">
                </div>
                <div class="form-group">
                  <label for="text">Password</label>
                  <input type="password" class="form-control" id="text" placeholder="รหัสผ่าน" required name="password">
                </div>
                <div class="form-group">
                  <label for="exampleFormControlFile1">รูปภาพ</label>
                  <input type="file" class="form-control-file" id="exampleFormControlFile1" name="files">
                </div>
              </div>
              <!-- /.card-body -->
              
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">เพิ่มข้อมูล</button>
              </div>
            </form>
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
