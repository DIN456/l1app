<?php

//ini_set( 'display_errors', 1 );
//error_reporting( ~0 );

$serverName = "localhost";
$userName = "root";
$userPassword = "";
$dbName = "db_rm";

$objCon = mysqli_connect($serverName, $userName, $userPassword, $dbName);
mysqli_query($objCon, "SET NAMES 'utf8'");
mysqli_query($objCon, "SET character_set_results=utf8");
mysqli_query($objCon, "SET character_set_client=utf8");
mysqli_query($objCon, "SET character_set_connection=utf8");
date_default_timezone_set('Asia/Bangkok');

if (mysqli_connect_errno()) {
	echo "Database Connect Failed : " . mysqli_connect_error();
} else {
	//echo "Database Connected.";
}

mysqli_close($objCon);
