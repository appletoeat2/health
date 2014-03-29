<?php

	$con=mysqli_connect("localhost", "root", "", "innovite_ivhealth");
	if(mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
		exit ;
	}
	
	$result = mysqli_query($con, "SELECT * FROM estores") ;
	
	require_once 'PHPExcel.php' ;
	$objPHPExcel = new PHPExcel();
	
	$objPHPExcel->getProperties()->setCreator("Inno-Vite Health")
								 ->setLastModifiedBy("Inno-Vite Health")
								 ->setTitle("Stores Records")
								 ->setSubject("Stores Records")
								 ->setDescription("Stores Records")
								 ->setKeywords("Stores Records")
								 ->setCategory("Stores Records");
	$objPHPExcel->setActiveSheetIndex(0)
				->setCellValue('A1', 'Store Name (English)')
				->setCellValue('B1', 'Store Name (French)')
				->setCellValue('C1', 'Website URL')
				->setCellValue('D1', 'Status');
	
	$i = 2 ;
	
	while($row = mysqli_fetch_array($result))
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A' . $i, $row['store_name_english'])
									  ->setCellValue('B' . $i, $row['store_name_french'])
									  ->setCellValue('C' . $i, $row['website_url'])
									  ->setCellValue('D' . $i, $row['status']) ;
		$i++ ;
	}
	
	$objPHPExcel->getActiveSheet()->setTitle('Stores');

	$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true) ;
	$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true) ;
	$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true) ;
	$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true) ;

	$objPHPExcel->setActiveSheetIndex(0);

	header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
	header('Content-Disposition: attachment;filename="eStores.xlsx"');
	header('Cache-Control: max-age=0');
	// If you're serving to IE 9, then the following may be needed
	header('Cache-Control: max-age=1');

	// If you're serving to IE over SSL, then the following may be needed
	header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
	header('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
	header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
	header('Pragma: public'); // HTTP/1.0

	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
	$objWriter->save('php://output');
	
	mysqli_close($con);
	
	exit ;
