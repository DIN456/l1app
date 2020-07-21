<?php
session_start();
if ( !isset( $_SESSION[ 'Username' ] ) || $_SESSION[ 'Username' ] == "" ) {
	header( "Location:../login.php" );
	exit;
}
?>
<!doctype html>
<html>


<head>
	<meta charset="utf-8">
	<title>BRJ</title>
	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
	<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css"/>
	<?php include('header-mew.php'); ?>
</head>

<body>

	<?php include(__DIR__ . '/nav-new.php'); ?>
	<?php
	$ID = $_GET[ 'ID' ];
	include( '../config.php' );
	$objCon = mysqli_connect( $serverName, $userName, $userPassword, $dbName );
	mysqli_query( $objCon, "SET NAMES 'utf8'" );

	$sql = "SELECT * FROM news where ID = '$ID'";
	$query = mysqli_query( $objCon, $sql );

	?>
	<div class="container-fluid">
		<p></p>
		<div class="row">
			<div class="col-md-1"></div>

			<div class="col-md-10">
				<div class="card">
					<div class="card-body">
						<?php
						while ( $result = mysqli_fetch_array( $query, MYSQLI_ASSOC ) ) {
							?>

						<div class="form-group row">
							<h1><label class="col-lg-12 form-control-label text-primary">รายละเอียดข่าว</label></h1>

						</div>
						<hr>
						<div class="row">
							<div class="col-md-1">
							</div>
							<label class="col-lg-11 form-control-label ">
								<h4>
									<p class="font-weight-bold text-danger">เรื่อง : [
										<?php echo $result["Title"]; ?>]</p>
								</h4>
							</label>
						</div>

						<div class="row">
							<div class="col-md-1">
							</div>
							<label class="col-lg-11 form-control-label">วันที่โพสต์ :  [<?php echo $result["Date"]; ?>]</label>
						</div>

						<div class="row">
							<div class="col-md-1">
							</div>
							<label class="col-lg-11 form-control-label ">
								<p>โพสต์โดย : [
									<?php echo $result["Name"]; ?>]</p>
							</label>
						</div>

						<div class="row">
							<div class="col-md-1 text-left">
							</div>
							<label class="col-lg-11 form-control-label ">
								<div class="form-group text-left">
									<label for="exampleFormControlTextarea1">รายละเอียด</label>
									<textarea class="form-control" id="exampleFormControlTextarea1" rows="5"><?php echo $result["Detle"]; ?></textarea>
								</div>
							</label>
						</div>
						
						<div class="row">
							<div class="col-md-1 text-left">
							</div>
							<label class="col-lg-11 form-control-label ">
								<font size="+1">Download: [
							<a href="File_Upload/<?php echo $result["files"]; ?>">
								<?php echo $result["files"]; ?>
							</a>]</font>
							</label>
						</div>
<?php } ?>
					</div>

				</div>

				

			</div>

			<div class="col-md-1"></div>
		</div>
	</div>
	<?php include(__DIR__ . '/foodter.php'); ?>
</body>

</html>