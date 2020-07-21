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
    <a href="index.php" class="brand-link"> <img src="../dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8"> <span
                    class="brand-text font-weight-light">RM-BRJ</span> </a> 
    
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
		 // echo $id;
		 // exit;
        include( '../config.php' );
        $objCon = mysqli_connect( $serverName, $userName, $userPassword, $dbName );
        mysqli_query( $objCon, "SET NAMES 'utf8'" );
		  
		  $sql = "SELECT u.*,d.`name` AS depname,a.*,g.* FROM tb_user u
INNER JOIN tb_department d ON u.dep_id = d.dep_id
INNER JOIN tb_admin_level a ON u.admin = a.id
INNER JOIN tb_department_group g on u.main_dep = g.main_dep
WHERE u.id = $id ";
        $query = mysqli_query( $objCon, $sql );

		  ?>
        <div class="row">
          <div class="col-sm-12">
            <div class="card">
              <div class="card-header bg-warning">
                <h5>ข้อมูลผู้ใช้งาน | <a href="data-user.php">ผู้ใช้งาน</a></h5>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="card card-primary card-outline">
                      <?php         while ( $result = mysqli_fetch_array( $query, MYSQLI_ASSOC ) ) { 
												?>
                      <div class="card-body box-profile">
                        <div class="text-center"> <img class="img-thumbnail"
                                                            src="img/<?php echo $result["files"]; ?>"
                                                            width="15%" height="10%"> </div>
						  <br>
                        <ul class="list-group list-group-unbordered mb-3">
                          <li class="list-group-item"> <b>ชื่อ-นามสกุล</b> <a
                                                                class="float-right"><?php echo $result['name']; ?></a> </li>
                          <li class="list-group-item"> <b>งาน</b> <a
                                                                class="float-right"><?php echo $result['depname']; ?></a> </li>
							<li class="list-group-item"> <b>แผนก</b> <a
                                                                class="float-right"><?php echo $result['dep_name']; ?></a> </li>
                          <li class="list-group-item"> <b>ระดับสิทธิ์</b> <a
                                                                class="float-right"><?php echo $result['admin_level']; ?></a> </li>
                          <li class="list-group-item"> <b>username</b> <a
                                                                class="float-right"><?php echo $result['username']; ?></a> </li>
                        </ul>
                        <a href="#" class="btn btn-primary btn-block"><b></b></a> </div>
                      <?php } ?>
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