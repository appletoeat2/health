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
		if($update_type == "replace") mysqli_query($con, "TRUNCATE stores") ;
		
		for($i = 1 ; $i < sizeof($content) ; $i++)
		{
			$sql = "INSERT INTO stores(`customer_code`, `retailer_name`, `email1`, `email2`, `address1`, `address2`, `city`, `province`, `postal_code`, ".
				   "`telephone`, `website`, `ecommerce`, `facebook`, `twitter`, `googleplus`, `linkedin`, `youtube`, `insertion_timestamp`, `updation_timestamp`, `map_request_status`, `status`) ".
				   "VALUES ('".$content[$i][0]."', '".$content[$i][1]."', '".$content[$i][2]."', '".$content[$i][3]."', '".$content[$i][4]."', '".$content[$i][5]."', ".
				   "'".$content[$i][6]."', '".$content[$i][7]."', '".$content[$i][8]."', '".$content[$i][9]."', '".$content[$i][10]."', '".$content[$i][11]."', ".
				   "'".$content[$i][12]."', '".$content[$i][13]."', '".$content[$i][14]."', '".$content[$i][15]."', '".$content[$i][16]."', '".date("Y-m-d G:i:s")."', '".date("Y-m-d G:i:s")."', 'NEW', 'Active')" ;
			mysqli_query($con, $sql) ;
		}
	}
	unlink($full_path) ;
	
	header($success);
	die() ;
}
header($failure);
die() ;
