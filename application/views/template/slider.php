<?php
/*
echo '<div class="flexslider">' ;
	echo '<ul class="slides">' ;
		echo '<li><a href="'.base_url().'resources/current_promotions"><img src="'.base_url().'images/slider/heart-health.jpg" alt=""></a></li>' ;
  	    echo '<li><a href="'.base_url().'products/product_details/6/44"><img src="'.base_url().'images/slider/mood.jpg" alt=""></a></li>' ;
  	    echo '<li><a href="'.base_url().'products/product_details/4/51"><img src="'.base_url().'images/slider/bone.jpg" alt=""></a></li>' ;
		echo '<li><a href="'.base_url().'products/product_details/0/5"><img src="'.base_url().'images/slider/digestive.jpg" alt=""></a></li>' ;
		echo '<li><a href="'.base_url().'products/product_details/5/27"><img src="'.base_url().'images/slider/anti-aging.jpg" alt=""></a></li>' ;
  	echo '</ul>' ;
echo '</div>' ;
/**/

echo '<div class="flexslider">' ;
	echo '<ul class="slides">' ;
		if($sliders) {
			foreach($sliders as $rec):
				echo '<li><a href="'.($rec->link).'"><img src="'.base_url().'admin/sliders/english_image_'.($rec->slider_id).'.jpg" alt=""></a></li>' ;
			endforeach ;
		}
	echo '</ul>' ;
echo '</div>'
/**/
?>