<?php

	require_once("mysql_connection.php") ;
	
	$query1 = "(SELECT products.id AS food_sensitivity_products_id, ".
			  "GROUP_CONCAT(food_sensitivities.name) AS All_Food_Sensitivities ".
			  "FROM products INNER JOIN products_food_sensitivites_relation ON products.id = products_food_sensitivites_relation.product_id ".
			  "INNER JOIN food_sensitivities ON products_food_sensitivites_relation.food_sensitivity_id = food_sensitivities.id ".
			  "WHERE 1 GROUP BY products.id) AS Product_Food_Sensitivity" ;
			  
	$query2 = "(SELECT products.id AS product_category_products_id, ".
			  "GROUP_CONCAT(product_categories.category_name) AS All_Product_Categories ".
			  "FROM products INNER JOIN products_categories_relation ON products.id = products_categories_relation.product_id ".
			  "INNER JOIN product_categories ON products_categories_relation.category_id = product_categories.id ".
			  "WHERE 1 GROUP BY products.id) AS Product_Category" ;
			  
	$query3 = "(SELECT products.id AS product_group_id, product_groups.group_title AS group_title ".
			  "FROM products INNER JOIN product_groups ON products.group_id = product_groups.id ".
			  "WHERE 1) AS Product_group" ;
	
	$query = "SELECT products.id, products.product_code, products.product_name, products.sub_heading, products.health_claim, products.short_description, ".
			 "products.description, products.formula, products.dosage, products.seo_page_title, products.seo_page_description, ".
			 "products.product_name_french, products.sub_heading_french, products.health_claim_french, products.short_description_french, products.description_french, ".
			 "products.formula_french, products.dosage_french, products.seo_page_title_french, products.seo_page_description_french, products.sort_order, ".
			 "products.isnew, products.filter, products.npn, ".
			 "skus.sku_code, skus.size, skus.size_french, skus.price, skus.wholesale_price, skus.weight, skus.upc, ".
			 "Product_group.group_title, ".
			 "Product_Food_Sensitivity.All_Food_Sensitivities, ".
			 "Product_Category.All_Product_Categories ".
			 "FROM products LEFT OUTER JOIN skus ON products.id = skus.product_id ".
			 "LEFT OUTER JOIN ".$query1." ON products.id = Product_Food_Sensitivity.food_sensitivity_products_id ".
			 "LEFT OUTER JOIN ".$query2." ON products.id = Product_Category.product_category_products_id ".
			 "LEFT OUTER JOIN ".$query3." ON products.id = Product_group.product_group_id ".
			 "WHERE 1;" ;
			 
	$result = mysqli_query($con, $query) ;
	
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
				->setCellValue('A1', 'Product Code')
				->setCellValue('B1', 'Product Name (French)')
				->setCellValue('C1', 'Sub Heading (English)')
				->setCellValue('D1', 'Health Claim (English)')
				->setCellValue('E1', 'Short Description (English)')
				->setCellValue('F1', 'Description (English)')
				->setCellValue('G1', 'Formula (English)')
				->setCellValue('H1', 'Dosage (English)')
				->setCellValue('I1', 'SEO Page Title (English)')
				->setCellValue('J1', 'SEO Page Description (English)')
				->setCellValue('K1', 'Product Name (French)')
				->setCellValue('L1', 'Sub Heading (French)')
				->setCellValue('M1', 'Health Claim (French)')
				->setCellValue('N1', 'Short Description (French)')
				->setCellValue('O1', 'Description (French)')
				->setCellValue('P1', 'Formula (French)')
				->setCellValue('Q1', 'Dosage (French)')
				->setCellValue('R1', 'SEO Page Title (French)')
				->setCellValue('S1', 'SEO Page Description (French)')
				->setCellValue('T1', 'Product Sort Order')
				->setCellValue('U1', 'Is New')
				->setCellValue('V1', 'NPN')
				->setCellValue('W1', 'Group Title')
				->setCellValue('X1', 'Food Sensitivites')
				->setCellValue('Y1', 'Product Categories')
				->setCellValue('Z1', 'SKU Code')
				->setCellValue('AA1', 'Size (English)')
				->setCellValue('AB1', 'Size French')
				->setCellValue('AC1', 'Price')
				->setCellValue('AD1', 'Wholesale Price')
				->setCellValue('AE1', 'Weight')
				->setCellValue('AF1', 'UPC')
				->setCellValue('AG1', 'PRODUCT ID') ;
	
	$i = 2 ;
	
	while($row = mysqli_fetch_array($result))
	{
		$objPHPExcel->getActiveSheet()->setCellValue('A' . $i, $row['product_code'])
									  ->setCellValue('B' . $i, $row['product_name'])
									  ->setCellValue('C' . $i, $row['sub_heading'])
									  ->setCellValue('D' . $i, $row['health_claim'])
									  ->setCellValue('E' . $i, $row['short_description'])
									  ->setCellValue('F' . $i, $row['description'])
									  ->setCellValue('G' . $i, $row['formula'])
									  ->setCellValue('H' . $i, $row['dosage'])
									  ->setCellValue('I' . $i, $row['seo_page_title'])
									  ->setCellValue('J' . $i, $row['seo_page_description'])
									  ->setCellValue('K' . $i, $row['product_name_french'])
									  ->setCellValue('L' . $i, $row['sub_heading_french'])
									  ->setCellValue('M' . $i, $row['health_claim_french'])
									  ->setCellValue('N' . $i, $row['short_description_french'])
									  ->setCellValue('O' . $i, $row['description_french'])
									  ->setCellValue('P' . $i, $row['formula_french'])
									  ->setCellValue('Q' . $i, $row['dosage_french'])
									  ->setCellValue('R' . $i, $row['seo_page_title_french'])
									  ->setCellValue('S' . $i, $row['seo_page_description_french'])
									  ->setCellValue('T' . $i, $row['sort_order'])
									  ->setCellValue('U' . $i, $row['isnew'])
									  ->setCellValue('V' . $i, $row['npn'])
									  ->setCellValue('W' . $i, $row['group_title'])
									  ->setCellValue('X' . $i, $row['All_Food_Sensitivities'])
									  ->setCellValue('Y' . $i, $row['All_Product_Categories'])
									  ->setCellValue('Z' . $i, $row['sku_code'])
									  ->setCellValue('AA' . $i, $row['size'])
									  ->setCellValue('AB' . $i, $row['size_french'])
									  ->setCellValue('AC' . $i, $row['price'])
									  ->setCellValue('AD' . $i, $row['wholesale_price'])
									  ->setCellValue('AE' . $i, $row['weight'])
									  ->setCellValue('AF' . $i, $row['upc']) 
									  ->setCellValue('AG' . $i, $row['id']) ;
		$i++ ;
	}
	/**/
	$objPHPExcel->getActiveSheet()->setTitle('Products');
	
	$objPHPExcel->setActiveSheetIndex(0);

	header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
	header('Content-Disposition: attachment;filename="products_skus.xls"');
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
	/**/
