<?php
session_start();
include('header.php');
include('config.php');

$username = $_POST['username'];
$password = md5($_POST['password']);
$date = date('Y-m-d H:i:s');

//echo $username,$password;
//exit;

$objCon = mysqli_connect($serverName, $userName, $userPassword, $dbName);
mysqli_query($objCon, "SET NAMES 'utf8'");
date_default_timezone_set('Asia/Bangkok');

$strSQL = "SELECT * FROM tb_user WHERE username = '$username' 
	and password = '$password' ";

$objQuery = mysqli_query($objCon, $strSQL);
$objResult = mysqli_fetch_array($objQuery, MYSQLI_ASSOC);
?>
<div class="container">
  <div class="row">
    <div class="col-sm-12">
      <hr>
      <div class="alert alert-danger" role="alert" style="font-size: 25px">
        <?php
        if (!$objResult) {

          echo "<center>การเชื่อมต่อฐานข้อมูลล้มเหลว<br><br> <a  href=\"login.php\">ตกลง</a> </center>";
        } else {
          $_SESSION["name"] = $objResult["name"];
          $_SESSION["dep_id"] = $objResult["dep_id"];
          $_SESSION["main_dep"] = $objResult["main_dep"];
          $_SESSION["admin"] = $objResult["admin"];
          $_SESSION["username"] = $objResult["username"];
          $_SESSION["Id"] = $objResult["Id"];


          session_write_close();

          if ($objResult["admin"] == '1') {
            header("location:admin/index.php");
            "INSERT INTO tb_user_stam (id,username,date) VALUES ('','$username','$date')";
          } elseif ($objResult["admin"] == '2') {
            header("location:admin/index.php");
          } else {
            header("location:index.php");
          }
        }
        ?>
      </div>
    </div>
  </div>
</div>
<?php
mysqli_close($objCon);
?>