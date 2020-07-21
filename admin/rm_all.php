<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include('header.php');
    ?>
</head>

<body>
    <?php
    include('../config.php');
    $objCon = mysqli_connect($serverName, $userName, $userPassword, $dbName);
    mysqli_query($objCon, "SET NAMES 'utf8'");

    $sql = "SELECT t.*,ts.name FROM tb_rm t
		INNER JOIN  tb_subcategory ts ON t.id = ts.subcategory
    WHERE t.status in ('1','2')
		ORDER BY t.id DESC ";
    $query = mysqli_query($objCon, $sql);
    ?>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header bg-danger">
                    <h5 class="card-text"><i class="fas fa-list-ol"></i> รายการความเสี่ยงทั้งหมด [นับทุกเคสที่บันทึกเข้ามา ยกเว้นรายการขยะ]</h5>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th width="5%">#</th>
                                <th width="60%%">รายการ</th>
                                <th width="10%" align="center">เกิดขึ้นเมื่อ</th>
                                <th width="15%" align="center">ได้รับแจ้งเมื่อ</th>
                                <th width="10%" align="center"></th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($result = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
                            ?>
                                <tr>
                                    <td><?php echo $result['id']; ?></td>
                                    <td>
                                        <?php
                                        $ms = $result['ms_status'];
                                        if ($ms == 1) {
                                            echo "<font color=\"red\">" . $result['name'] . "</font>";
                                        } else {
                                            echo $result['name'];
                                        }
                                        ?>

                                    </td>
                                    <td align="center"><?php echo $result['rm_date'];
                                                        ?></td>
                                    <td align="center"><?php echo $result['last_update'];
                                                        ?></td>
                                    <td align="center"><a href="rm_details_2.php?ID=<?php echo $result["id"]; ?>">
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