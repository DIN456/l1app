<?php
//session_start();
?>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<div class="sidebar">
  <!-- Sidebar user panel (optional) -->
  <div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <div class="image"> <img src="../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image"> </div><br>
    <div class="info"> <a href="#" class="d-block"><?php echo $_SESSION['name']; ?></a> </div>
  </div>

  <!-- Sidebar Menu -->
  <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
      <li class="nav-item"> <a href="#" class="nav-link active"> <i class="nav-icon fas fa-home"></i>
          <p> ระบบหลัก <i class="right fas fa-angle-left"></i> </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item"> <a href="list_rm.php" class="nav-link"> <i class="far fa-circle nav-icon"></i>
              <p>รายการความเสี่ยง</p>
            </a> </li>
          <li class="nav-item"> <a href="list_rm_bin.php" class="nav-link"> <i class="far fa-circle nav-icon"></i>
              <p>รายการถังขยะ</p>
            </a> </li>
          <li class="nav-item"> <a href="tm_list_m.php" class="nav-link"> <i class="far fa-circle nav-icon"></i>
              <p>รายการรอทบทวน</p>
            </a> </li>
        </ul>
      </li>
      <li class="nav-item"> <a href="#" class="nav-link active"> <i class="nav-icon fas fa-edit"></i>
          <p> เขียนความเสี่ยง <i class="right fas fa-angle-left"></i> </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item"> <a href="add_rm.php" class="nav-link"> <i class="far fa-circle nav-icon"></i>
              <p>เพิ่มความเสี่ยง</p>
            </a> </li>
          <li class="nav-item"> <a href="#" class="nav-link"> <i class="far fa-circle nav-icon"></i>
              <p>ติดตามประเมินผล</p>
            </a> </li>
        </ul>
      </li>

      <li class="nav-item has-treeview"> <a href="#" class="nav-link"> <i class="nav-icon fa fa-cog"></i>
          <p> ตั้งค่า <i class="fas fa-angle-left right"></i> </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item"> <a href="add_user.php" class="nav-link"> <i class="far fa-circle nav-icon"></i>
              <p>เพิ่มผู้ใช้งาน</p>
            </a> </li>
          <li class="nav-item"> <a href="data-user.php" class="nav-link"> <i class="far fa-circle nav-icon"></i>
              <p>ผู้ใช้งาน</p>
            </a> </li>
          <li class="nav-item"> <a href="department.php" class="nav-link"> <i class="far fa-circle nav-icon"></i>
              <p>ตั้งค่าแผนก</p>
            </a> </li>
          <li class="nav-item"> <a href="work.php" class="nav-link"> <i class="far fa-circle nav-icon"></i>
              <p>ตั้งค่าหน่วยงาน</p>
            </a> </li>
          <li class="nav-item"> <a href="category.php" class="nav-link"> <i class="far fa-circle nav-icon"></i>
              <p>ตั้งค่าหมวดความเสี่ยง</p>
            </a> </li>
          <li class="nav-item"> <a href="sub_category.php" class="nav-link"> <i class="far fa-circle nav-icon"></i>
              <p>รายการความเสี่ยง</p>
            </a> </li>
          <li class="nav-item"> <a href="location.php" class="nav-link"> <i class="far fa-circle nav-icon"></i>
              <p>เพิ่มสถานที่</p>
            </a> </li>
          <li class="nav-item"> <a href="pages/forms/general.html" class="nav-link"> <i class="far fa-circle nav-icon"></i>
              <p>ตั้งค่าผลประเมิน</p>
            </a> </li>
        </ul>
      </li>
      <li class="nav-item has-treeview"> <a href="rm_admin.php" class="nav-link"> <i class="nav-icon fas fa-user"></i>
          <p>ทีมพัฒนา</p>
        </a>

      </li>
      <li class="nav-item has-treeview"> <a href="../logout.php" class="nav-link"> <i class="nav-icon fa fa-unlock-alt"></i>
          <p>ลงชื่อออก</p>
        </a>

      </li>

    </ul>
  </nav>
  <!-- /.sidebar-menu -->
</div>