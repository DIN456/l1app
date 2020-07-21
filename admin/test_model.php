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
    $id = $_GET['ID'];
    // echo $id;
    ?>
    <div class="container">
        <div class="row">

            <div class="col-sm-12">
                <br>
                <div class="card card-danger">
                    <div class="card-header">
                        <h3 class="card-herder">คุณได้ทำการย้ายรายการเรียบร้อยแล้วครับ</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                            </button>
                        </div>
                        <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <a href="list_rm.php">
                            <button type="button" class="btn btn-warning">
                                <h5 class="card-text">กลับไปหน้ารายการรับแจ้งความเสี่ยง</h5>
                            </button>
                        </a>
                        <a href="list_rm_bin.php">
                            <button type="button" class="btn btn-primary">
                                <h5 class="card-text">ไปเมนูถังขยะ</h5>
                            </button>
                        </a>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">ย้ายรายการ</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <?php
                                        $sql = "UPDATE tb_rm SET status = 3 WHERE id = $id";

                                        if (mysqli_query($objCon, $sql)) {
                                            echo "ทำการย้ายข้อมูลเรียบร้อย";
                                        } else {
                                            echo "Error updating record: " . mysqli_error($objCon);
                                        }

                                        mysqli_close($objCon);
                                        ?>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
    <?php
    include('footer.php');
    ?>
</body>

</html>