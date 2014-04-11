<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/

define('FOPEN_READ',							'rb');
define('FOPEN_READ_WRITE',						'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE',		'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE',	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE',					'ab');
define('FOPEN_READ_WRITE_CREATE',				'a+b');
define('FOPEN_WRITE_CREATE_STRICT',				'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',		'x+b');

define("LARGE_IMAGE_DIR", $_SERVER['DOCUMENT_ROOT']."/health/admin/images/prod_images/large/") ;
define("MEDIUM_IMAGE_DIR", $_SERVER['DOCUMENT_ROOT']."/health/admin/images/prod_images/medium/") ;
define("SMALL_IMAGE_DIR", $_SERVER['DOCUMENT_ROOT']."/health/admin/images/prod_images/small/") ;
define("BANNER_IMAGE_DIR", $_SERVER['DOCUMENT_ROOT']."/health/admin/images/banner_images/") ;

define("COUPON_DIR", $_SERVER['DOCUMENT_ROOT']."/health/admin/coupons/") ;
define("SLIDER_DIR", $_SERVER['DOCUMENT_ROOT']."/health/admin/sliders/") ;
define("IMAGE_LIB", $_SERVER['DOCUMENT_ROOT']."/health/admin/image_library/") ;
define("BROCHURE_ENGLISH_DIR", $_SERVER['DOCUMENT_ROOT']."/health/admin/product_brochures/english/") ;
define("BROCHURE_FRENCH_DIR", $_SERVER['DOCUMENT_ROOT']."/health/admin/product_brochures/french/") ;
define("EXCEL_SHEET", $_SERVER['DOCUMENT_ROOT']."/health/admin/import_datafiles/") ;

define("LINK1", "http://searchenginewatch.com/article/2154469/How-to-Write-Title-Tags-For-Search-Engine-Optimization!") ;
define("LINK2", "http://blog.kissmetrics.com/meta-description-magic/!") ;

/* End of file constants.php */
/* Location: ./application/config/constants.php */