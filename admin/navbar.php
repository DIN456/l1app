<?php
include('../config.php');
$objCon = mysqli_connect($serverName, $userName, $userPassword, $dbName);
mysqli_query($objCon, "SET NAMES 'utf8'");
?>
<nav class="main-header navbar navbar-expand navbar-white navbar-light fixed-top">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="index.php" class="nav-link">Home</a>
    </li>
  </ul>
  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <!-- Messages Dropdown Menu -->
    <!-- Notifications Dropdown Menu -->
    <?php
    $sql = "SELECT COUNT(ms_status) as ms_status FROM tb_rm WHERE ms_status = 1";
    $query = mysqli_query($objCon, $sql);
    ?>
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="far fa-bell"></i>
        <?php
        while ($result = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
        ?>
          <span class="badge badge-danger navbar-badge"><?php echo $result['ms_status']; ?></span>

      </a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <span class="dropdown-item dropdown-header" style="color: red;">รายการแจ้งเตือน</span>
        <div class="dropdown-divider"></div>
        <a href="list_rm.php" class="dropdown-item">
          <i class="fas fa-envelope mr-2" style="color:red;"></i><?php echo $result['ms_status']; ?><p style="color: red;">คุณมีรายการที่ยังไม่ได้เปิดอ่าน</p>


        </a>
      <?php
        }
      ?>
      </div>
    </li>
  </ul>
</nav>