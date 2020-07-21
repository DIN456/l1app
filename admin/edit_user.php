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
        $ID = $_GET[ 'ID' ];
        include( '../config.php' );
        $objCon = mysqli_connect( $serverName, $userName, $userPassword, $dbName );
        mysqli_query( $objCon, "SET NAMES 'utf8'" );
        $sql = "SELECT u.*,d.`name` AS depname,a.* FROM tb_user u
INNER JOIN tb_department d ON u.dep_id = d.dep_id
INNER JOIN tb_admin_level a ON u.admin = a.id
WHERE u.Id = $ID";
        $query = mysqli_query( $objCon, $sql );

        ?>
        <div class="row">
          <div class="col-sm-12">
            <div class="card">
              <div class="card-header bg-warning">
                <h5 class="card-text">แก้ไขข้อมูลผู้ใช้งาน | <a href="data-user.php">ข้อมูลผู้ใช้งาน</a></h5>
              </div>
              <div class="card-body">
                <form action="add_edit_user.php" method="post">
                  <div class="card-body">
                    <?php while ( $result = mysqli_fetch_array( $query, MYSQLI_ASSOC ) ) { ?>
                    <div class="form-group">
                      <input type="hidden" class="form-control"
                                                    value="<?php echo $result['Id']; ?>" name="Id">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">ชื่อ-นามสกุล</label>
                      <input type="text" class="form-control"
                                                    value="<?php echo $result['name']; ?>" name="name">
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlSelect1">เลือกหน่วยงาน</label>
                      <select class="form-control" id="exampleFormControlSelect1" name="dep_id">
                        <option selected value="<?php echo $result['dep_id']; ?>"><?php echo $result['depname']; ?></option>
                        <?php } ?>
                        <?php
                        $sql2 = "SELECT * FROM tb_department ORDER BY dep_id ASC";
                        $query2 = mysqli_query( $objCon, $sql2 );
                        while ( $result2 = mysqli_fetch_array( $query2, MYSQLI_ASSOC ) ) {
                          ?>
                        <option value="<?php echo $result2['dep_id']; ?>"><?php echo $result2['name']; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label for="exampleFormControlSelect1">เลือกแผนก</label>
                        <select class="form-control" id="exampleFormControlSelect1" required name="main_dep">
                          <option selected value="">กรุณาเลือกแผนก</option>
                          <?php
                          $sql3 = "SELECT * FROM tb_department_group ORDER BY main_dep ASC";
                          $query3 = mysqli_query( $objCon, $sql3 );
                          while ( $result3 = mysqli_fetch_array( $query3, MYSQLI_ASSOC ) ) {
                            ?>
                          <option value="<?php echo $result3['main_dep']; ?>"><?php echo $result3['dep_name']; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label for="exampleFormControlSelect1">เลือกระดับสิทธิ์</label>
                        <select class="form-control" id="exampleFormControlSelect1" required name="admin">
                          <option selected value="">กรุณาเลือกระดับสิทธิ์</option>
                          <?php
                          $sql4 = "SELECT * FROM tb_admin_level ORDER BY id ASC";
                          $query4 = mysqli_query( $objCon, $sql4 );
                          while ( $result4 = mysqli_fetch_array( $query4, MYSQLI_ASSOC ) ) {
                            ?>
                          <option value="<?php echo $result4['id']; ?>"><?php echo $result4['admin_level']; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
					   <?php
                          $sql5 = "SELECT * FROM tb_user 
						  WHERE Id = $ID ORDER BY Id ASC";
                          $query5 = mysqli_query( $objCon, $sql5 );
                          while ( $result5 = mysqli_fetch_array( $query5, MYSQLI_ASSOC ) ) {
                            ?>
                    <div class="form-group">
                      <label>Username</label>
                      <input type="text" class="form-control"value="<?php echo $result5['username']; ?>" name="username">
                    </div>
					  
					  <div class="form-group">
                      <label>Password</label>
                      <input type="password" class="form-control"value="<?php echo $result5['password']; ?>" name="password">
                    </div>
					  <?php } ?>
                    <button type="submit" class="btn btn-primary">แก้ไขข้อมูล</button>
                  </div>
                  <!-- /.card-body -->
                </form>
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
  <footer class="main-footer"> <strong>Copyright &copy; 2014-2020 <a
                    href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
    <div class="float-right d-none d-sm-inline-block"> <b>Version</b> 3.1.0-pre </div>
  </footer>
  
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