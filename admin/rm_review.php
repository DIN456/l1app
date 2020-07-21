<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['username'] == "") {
    header("Location:../login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('header.php'); ?>
</head>

<body>
    <?php
    include('../config.php');
    $objCon = mysqli_connect($serverName, $userName, $userPassword, $dbName);
    mysqli_query($objCon, "SET NAMES 'utf8'");

    $sql = "SELECT m.*,r.rm_date as fdate,r.last_update,s.name as supname FROM tb_m m
                    INNER JOIN tb_rm r ON m.id_rm = r.id
                    INNER JOIN tb_subcategory s ON m.rm_subcategory = s.subcategory
                    WHERE m.tm_status = 1
                    ORDER BY m.id DESC";
    $query = mysqli_query($objCon, $sql);
    ?>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header bg-fuchsia">
                    <h5 class="card-text"><i class="fas fa-recycle"></i> รายการรอทบทวน</h5>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th width="5%">#</th>
                                <th width="60%%">รายการ</th>
                                <th width="10%" align="center">เกิดขึ้นเมื่อ</th>
                                <th width="15%" align="center">ได้รับแจ้งเมื่อ</th>
                                <th width="10%" align="center">ทบทวน</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($result = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
                            ?>
                                <tr>
                                    <td><?php echo $result['id']; ?></td>
                                    <td>
                                        <?php echo $result['supname']; ?>
                                    </td>
                                    <td align="center">
                                        <?php echo $result['fdate']; ?>
                                    </td>
                                    <td align="center"><?php echo $result['last_update'];
                                                        ?></td>
                                    <td align="center"><a href="rm_details_m.php?ID=<?php echo $result["id"]; ?>">
                                            <button type="button" class="btn btn-success"><i class="nav-icon fas fa-edit"></i></button>
                                        </a></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>