<?php 

if($_GET)
{
	require_once("mysql_connection.php") ;
	require_once("reader.php") ;
	$excel = new Spreadsheet_Excel_Reader();
	$content = array() ;
	
	$filename = $_GET["filename"] ;
	$update_type = $_GET["update_type"] ;
	$full_path = $_GET["full_path"] ;
	
	$excel->read($filename) ;
	
	$k = 1 ;
	$x = 1 ;
	
	while($x<=$excel->sheets[0]['numRows'])
	{
		$y = 1 ;
		$row = array() ;
		while($y<=$excel->sheets[0]['numCols'])
		{
			$cell = isset($excel->sheets[0]['cells'][$x][$y]) ? $excel->sheets[0]['cells'][$x][$y] : '';
			$row[] = $cell ; 
			$y++ ;
		}  
				
		$content[] = $row ;
		$x++;
	} 
	
	if(sizeof($content) > 0)
	{
		if($update_type == "replace") mysqli_query($con, "TRUNCATE estores") ;
		
		for($i = 1 ; $i < sizeof($content) ; $i++)
		{
			$sql = "INSERT INTO estores(`store_name_english`, `store_name_french`, `website_url`, `status`) ".
				   "VALUES ('".$content[$i][0]."', '".$content[$i][1]."', '".$content[$i][2]."', 'Active')" ;
			mysqli_query($con, $sql) ;
		}
	}
	
	unlink($full_path) ;
	
	header($success);
	die() ;
}
header($failure);
die() ;
