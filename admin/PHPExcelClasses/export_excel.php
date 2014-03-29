<?php

	$con=mysqli_connect("localhost", "root", "", "innovite_ivhealth");
	if(mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
		exit ;
	}
	
	$result = mysqli_query($con, "SELECT * FROM stores") ;
	
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
				->setCellValue('A1', 'Customer Code')
				->setCellValue('B1', 'Retailer Name')
				->setCellValue('C1', 'Email1')
				->setCellValue('D1', 'Email2')
				->setCellValue('E1', 'Address1')
				->setCellValue('F1', 'Address2')
				->setCellValue('G1', 'City')
				->setCellValue('H1', 'Province')
				->setCellValue('I1', 'Postal Code')
				->setCellValue('J1', 'Telephone')
				->setCellValue('K1', 'Website')
				->setCellValue('L1', 'Ecommerce')
				->setCellValue('M1', 'Facebook')
				->setCellValue('N1', 'Twitter')
				->setCellValue('O1', 'Googleplus')
				->setCellValue('P1', 'Linkedin')
				->setCellValue('Q1', 'Youtube')
				->setCellValue('R1', 'Status');
	$i = 2 ;
	while($row = mysqli_fetch_array($result))
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A' . $i, $row['customer_code'])
									  ->setCellValue('B' . $i, $row['retailer_name'])
									  ->setCellValue('C' . $i, $row['email1'])
	                                  ->setCellValue('D' . $i, $row['email2'])
									  ->setCellValue('E' . $i, $row['address1'])
									  ->setCellValue('F' . $i, $row['address2'])
									  ->setCellValue('G' . $i, $row['city'])
									  ->setCellValue('H' . $i, $row['province'])
									  ->setCellValue('I' . $i, $row['postal_code'])
									  ->setCellValue('J' . $i, $row['telephone'])
									  ->setCellValue('K' . $i, $row['website'])
									  ->setCellValue('L' . $i, $row['ecommerce'])
									  ->setCellValue('M' . $i, $row['facebook'])
									  ->setCellValue('N' . $i, $row['twitter'])
									  ->setCellValue('O' . $i, $row['googleplus'])
									  ->setCellValue('P' . $i, $row['linkedin'])
									  ->setCellValue('Q' . $i, $row['youtube'])
									  ->setCellValue('R' . $i, $row['status']) ;
		$i++ ;
	}
	
	$objPHPExcel->getActiveSheet()->setTitle('Stores');

	$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true) ;
	$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true) ;
	$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true) ;
	$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true) ;
	$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true) ;
	$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true) ;
	$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setAutoSize(true) ;
	$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setAutoSize(true) ;
	$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setAutoSize(true) ;
	$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setAutoSize(true) ;
	$objPHPExcel->getActiveSheet()->getColumnDimension('K')->setAutoSize(true) ;
	$objPHPExcel->getActiveSheet()->getColumnDimension('L')->setAutoSize(true) ;
	$objPHPExcel->getActiveSheet()->getColumnDimension('M')->setAutoSize(true) ;
	$objPHPExcel->getActiveSheet()->getColumnDimension('N')->setAutoSize(true) ;
	$objPHPExcel->getActiveSheet()->getColumnDimension('O')->setAutoSize(true) ;
	$objPHPExcel->getActiveSheet()->getColumnDimension('P')->setAutoSize(true) ;
	$objPHPExcel->getActiveSheet()->getColumnDimension('Q')->setAutoSize(true) ;
	$objPHPExcel->getActiveSheet()->getColumnDimension('R')->setAutoSize(true) ;

	$objPHPExcel->setActiveSheetIndex(0);

	header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
	header('Content-Disposition: attachment;filename="Stores.xlsx"');
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
