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
      <a href="index.php" class="brand-link"> <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> <span class="brand-text font-weight-light">RM-BRJ</span> </a>

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
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
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
          <?php // include('Dashboard.php'); 
          ?>

          <!---------- row main --->
          <div class="row">
            <div class="col-sm-12">
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">กรุณา Login เข้าสู่ระบบงานความเสี่ยง</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form id="quickForm" action="chaeck_login.php" method="post" enctype="multipart/form-data">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">UserName</label>
                      <input type="text" name="username" class="form-control" id="exampleInputEmail1" placeholder="Username" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Password</label>
                      <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
                    </div>
                    <div class="form-group mb-0">
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" name="terms" class="custom-control-input" id="exampleCheck1">
                        <label class="custom-control-label" for="exampleCheck1">I agree to the <a href="#">terms of service</a>.</label>
                        <p style="color: red"><small>หาก Login ไม่ได้ กรุณาติดต่อผู้ดูแลระบบ</small></p>
                      </div>
                    </div>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">เข้าสู่ระบบ</button>
                  </div>
                </form>
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

    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <?php include('footer.php'); ?>
</body>

</html>