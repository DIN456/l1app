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
        <?php
        include( '../config.php' );
        $objCon = mysqli_connect( $serverName, $userName, $userPassword, $dbName );
        mysqli_query( $objCon, "SET NAMES 'utf8'" );

        $sql = "SELECT u.*,d.`name` AS depname,a.* FROM tb_user u
INNER JOIN tb_department d ON u.dep_id = d.dep_id
INNER JOIN tb_admin_level a ON u.admin = a.id";
        $query = mysqli_query( $objCon, $sql );
        ?>
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">ข้อมูลผู้ใช้งาน</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th width="30%">ชื่อ-นามสกุล</th>
                  <th width="30%">กลุ่มงาน</th>
                  <th width="25%">ระดับการใช้งาน</th>
				  <th width="5%" align="center"></th>
                  <th width="5%" align="center"></th>
                  <th width="5%" align="center"></th>
                </tr>
              </thead>
              <tbody>
                <?php
                while ( $result = mysqli_fetch_array( $query, MYSQLI_ASSOC ) ) {
                  ?>
                <tr>
                  <td><?php echo $result['name']; ?></td>
                  <td><?php echo $result['depname']; ?></td>
                  <td><?php echo $result['admin_level']; ?></td>
                  <td align="center"><a href="edit_user.php?ID=<?php echo $result["Id"]; ?>">
                    <button type="button" class="btn btn-success">แก้ไข</button>
                    </a></td>
					<td align="center"><a href="user_details.php?ID=<?php echo $result["Id"]; ?>">
                    <button type="button" class="btn btn-warning">Details</button>
                    </a></td>
                  <td align="center"><a href="delete_user.php?ID=<?php echo $result["Id"]; ?>">
                    <button type="button" class="btn btn-danger">ลบ</button>
                    </a></td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
          <!-- /.card-body --> 
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
