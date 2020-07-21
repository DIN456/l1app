       <?php
        include('../config.php');
        $objCon = mysqli_connect($serverName, $userName, $userPassword, $dbName);
        mysqli_query($objCon, "SET NAMES 'utf8'");
        ?>
       <div class="row">
         <div class="col-md-2 col-sm-6 col-12">
           <div class="info-box">
             <span class="info-box-icon bg-danger"><i class="far fa-envelope"></i></span>
             <?php
              $sql = "SELECT COUNT(status) as status FROM tb_rm WHERE status in('1','2')";
              $query = mysqli_query($objCon, $sql);
              while ($result = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
              ?>
               <div class="info-box-content">
                 <span class="info-box-text">ความเสี่ยงทั้งหมด</span>
                 <a href="index.php?page=rm_all"> <span class="info-box-number"><?php echo $result['status']; ?> รายการ</span></a>
               </div>
             <?php } ?>
             <!-- /.info-box-content -->
           </div>
           <!-- /.info-box -->
         </div>
         <!-- /.col -->
         <div class="col-md-2 col-sm-6 col-12">
           <div class="info-box">
             <span class="info-box-icon bg-fuchsia"><i class="far fa-flag"></i></span>
             <?php
              $sql2 = "SELECT COUNT(tm_status) as status FROM tb_m WHERE tm_status = 1";
              $query2 = mysqli_query($objCon, $sql2);
              while ($result2 = mysqli_fetch_array($query2, MYSQLI_ASSOC)) {
              ?>
               <div class="info-box-content">
                 <span class="info-box-text">รายการรอทบทวน</span>
                 <a href="index.php?page=rm_review"><span class="info-box-number"><?php echo $result2['status']; ?> รายการ</span></a>
               </div>
             <?php } ?>
             <!-- /.info-box-content -->
           </div>
           <!-- /.info-box -->
         </div>
         <!-- /.col -->
         <div class="col-md-2 col-sm-6 col-12">
           <div class="info-box">
             <span class="info-box-icon bg-warning"><i class="far fa-copy"></i></span>

             <div class="info-box-content">
               <span class="info-box-text">รายการรอประเมิน</span>
               <a href="index.php?page=test2"><span class="info-box-number">13,648 รายการ</span></a>
             </div>
             <!-- /.info-box-content -->
           </div>
           <!-- /.info-box -->
         </div>
         <!-- /.col -->
         <div class="col-md-2 col-sm-6 col-12">
           <div class="info-box">
             <span class="info-box-icon bg-gradient-gray"><i class="far fa-stop-circle"></i></span>

             <div class="info-box-content">
               <span class="info-box-text">กำลังดำเนินการ</span>
               <a href=""><span class="info-box-number">93,139 รายการ</span></a>
             </div>
             <!-- /.info-box-content -->
           </div>
           <!-- /.info-box -->
         </div>
         <div class="col-md-2 col-sm-6 col-12">
           <div class="info-box">
             <span class="info-box-icon bg-orange"><i class="far fa-arrow-alt-circle-down"></i></span>

             <div class="info-box-content">
               <span class="info-box-text">ทบทวนซ้ำ</span>
               <a href=""><span class="info-box-number">93,139 รายการ</span></a>
             </div>
             <!-- /.info-box-content -->
           </div>
           <!-- /.info-box -->
         </div>
         <div class="col-md-2 col-sm-6 col-12">
           <div class="info-box">
             <span class="info-box-icon bg-success"><i class="far fa-star"></i></span>

             <div class="info-box-content">
               <span class="info-box-text">ผ่านประเมิน</span>
               <a href=""> <span class="info-box-number">93,139 รายการ</span></a>
             </div>
             <!-- /.info-box-content -->
           </div>
           <!-- /.info-box -->
         </div>
         <!-- /.col -->
       </div>