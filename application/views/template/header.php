<!DOCTYPE html>
<!-- [if (gte IE 9)|!(IE)]> <!--><html lang="en"> <!--<![endif]-->
<head>
<!-- Basic Page Needs -->
<meta charset="utf-8">

<?php if($meta_data["seo_page_title"] == "") { ?>
	<?php if($view == "products/product_details") { ?>
		<title><?php echo "innoviteHEALTH: ".$product_detail->product_name ; ?></title>
    <?php } else { ?>
    	<title><?php echo "innoviteHEALTH" ; ?></title>
    <?php } ?>
<?php } else { ?>
	<title><?php echo "innoviteHEALTH: ".$meta_data["seo_page_title"] ; ?></title>
<?php } ?>

<meta name="description" content="<?php echo $meta_data["seo_page_description"] ; ?>">

<meta name="author" content="">

<!-- Mobile Specific Metas -->
<meta name="viewport" content="initial-scale=1">
<meta charset="UTF-8">

<!-- CSS -->
<link rel="stylesheet" href="<?php echo base_url() ; ?>stylesheets/style.css" type="text/css" media="all">
<link href='http://fonts.googleapis.com/css?family=Signika+Negative:600,300,400' rel='stylesheet' type='text/css'>

<!-- JS -->
<script type="text/javascript" src="<?php echo base_url() ; ?>javascript/jquery.min.js"></script>
<!--[if lt IE 9]> <script src="<?php echo base_url() ; ?>javascript/modernizr.custom.11889.js" type="text/javascript"></script> <![endif]-->

<!-- HTML5 Shiv events (end)-->
<script type="text/javascript" src="<?php echo base_url() ; ?>javascript/nav-resp.js"></script>

<!-- Favicons -->
<link rel="shortcut icon" href="<?php echo base_url() ; ?>images/favicon.ico">

<!-- Share This Code -->
<script type="text/javascript">var switchTo5x=false;</script>
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">stLight.options({publisher: "2cbcaf97-89e8-4a94-8fdb-6f21e75394a5", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>

</head>

<body>
<!-- Primary Page Layout -->
<?php if($view == "home/index") { ?>
	<div id="wrap" class="colorskin-4">
<?php } else { ?>
	<div id="boxed-wrap" class="colorskin-4">
<?php } ?>

<div class="top-bar">
	<div class="container">
		<!--<div class="top-links"><a href="<?php echo base_url("") ; ?>">Francais</a> | <a href="<?php echo base_url("") ; ?>">Retailer Login</a></div>-->
		<div class="socailfollow">
        	<a href="http://facebook.com/InnoviteHealth" target="_blank" class="facebook"><i class="icomoon-facebook"></i></a>
        	<a href="http://twitter.com/InnoviteCanada" target="_blank" class="twitter"><i class="icomoon-twitter"></i></a>
            <a href="http://www.youtube.com/user/innovitecanada" target="_blank" class="youtube"><i class="icomoon-youtube"></i></a>
            <!--<a href="<?php echo base_url("") ; ?>" class="instagram"><i class="icomoon-instagram"></i></a>-->
            <!--<a href="<?php echo base_url("") ; ?>" class="pinterest"><i class="icomoon-pinterest"></i></a>-->
            <a href="https://plus.google.com/101210095383195582761" target="_blank" class="google"><i class="icomoon-google"></i></a>
        </div>
	</div>
</div>

<header id="header">
	<div class="container">
    	<div class="four columns logo"><a href="<?php echo base_url() ; ?>"><img src="<?php echo base_url() ; ?>images/global-images/brand.png" width="480" id="img-logo" alt="logo"></a></div>
    	<?php $this->load->view("template/top_navigation") ?> 
	</div>
	<div id="search-form2">
    	<form action="<?php echo base_url("")."products/search_products" ; ?>" method="POST">
     		<input type="text" id="search_box" name="search_box" class="search-text-box2"/>
    	</form>
	</div>
    <!--<input type="hidden" id="base_url" value="<?php echo base_url() ; ?>" />-->
</header>