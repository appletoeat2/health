<?php
	if($_SERVER["HTTP_HOST"] == "localhost") header("Location: http://".$_SERVER["HTTP_HOST"]."/health/admin/");
	else header("Location: http://".$_SERVER["HTTP_HOST"]."/admin/") ;
	die() ;
?>