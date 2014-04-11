<?php

$con = "" ;

if($_SERVER["HTTP_HOST"] == "localhost") { 
	$con = mysqli_connect("localhost", "root", "", "innovite_ivhealth") ;
} else {
	$con = mysqli_connect("db150d.pair.com", "innovite_4", "skVwMfAH", "innovite_DEVELOP") ;
}
if(mysqli_connect_errno())
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error() ;
	exit ;
}
