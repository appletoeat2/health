<?php

$con = "" ;

$success = "" ;
$failure = "" ;

$update_type = $_GET["update_type"] ;
$store_type = $_GET["store_type"] ;

if($_SERVER["HTTP_HOST"] == "localhost")
{ 
	$con = mysqli_connect("localhost", "root", "", "innovite_ivhealth") ;
	
	if($store_type == "estores") {
		$success = "Location: http://localhost/health/admin/stores/import_stores/estores/".$update_type."/3" ;
		$failure = "Location: http://localhost/health/admin/stores/estores" ;
	} else if($store_type == "pstores")  {
		$success = "Location: http://localhost/health/admin/stores/import_stores/stores/".$update_type."/1" ;
		$failure = "Location: http://localhost/health/admin/stores/" ;
	}
}
else
{
	$con = mysqli_connect("db150d.pair.com", "innovite_4", "skVwMfAH", "innovite_DEVELOP") ;
	
	if($store_type == "estores") {
		$success = "Location: http://www.innovitehealth.com/test/admin/stores/import_stores/estores/".$update_type."/3";
		$failure ="Location: http://www.innovitehealth.com/test/admin/stores/estores";
	} else if($store_type == "pstores") {
		$success = "Location: http://www.innovitehealth.com/test/admin/stores/import_stores/stores/".$update_type."/1";
		$failure ="Location: http://www.innovitehealth.com/test/admin/stores/";
	}
}
if(mysqli_connect_errno())
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error() ;
	exit ;
}
