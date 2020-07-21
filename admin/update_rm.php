 <?php
    include('../config.php');
    $objCon = mysqli_connect($serverName, $userName, $userPassword, $dbName);
    mysqli_query($objCon, "SET NAMES 'utf8'");
    date_default_timezone_set('Asia/Bangkok');
    //$dat2 = dat("Y-m-d H:i:s");
    $id = $_POST['id'];

    $sql = "UPDATE tb_rm SET status = 2 WHERE id = $id";

    $query = mysqli_query($objCon, $sql);

    if ($query) {
        // echo "<center>แก้ไขรายการสำเร็จแล้วครับ<br><br> <a  href=\"list_rm.php\">ตกลง</a></center>";
    } else {
        // echo "<center>แก้ไขรายการไม่สำเร็จ<br><br><< <a  href=\"list_rm.php\">ตกลง</a> >></center>";
    }

    //  mysqli_close($objCon);
    ?>