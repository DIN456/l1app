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
        <div class="card">
          <div class="card-header bg-fuchsia">
            <h5>ลบรายการสถานที่</h5>
          </div>
          <div class="card-body">
            <?php
            include( '../config.php' );
            $objCon = mysqli_connect( $serverName, $userName, $userPassword, $dbName );
            mysqli_query( $objCon, "SET NAMES 'utf8'" );
            date_default_timezone_set( 'Asia/Bangkok' );
            //$dat2 = dat("Y-m-d H:i:s");

            $id = $_GET[ "ID" ];
			 // echo $id;
			 // exit;
            $sql = "DELETE FROM tb_location
			WHERE id = '" . $id . "' ";


            $query = mysqli_query( $objCon, $sql );

            if ( $query ) {
              echo "<center>ลบข้อมูลสำเร็จ<br><br><< <a  href=\"location.php\">ตกลง</a> >></center>";
            } else {
              echo "<center>ลบข้อมูลไม่สำเร็จ<br><br><< <a  href=\"location.php\">ตกลง</a> >></center>";
            }

            mysqli_close( $objCon );
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
