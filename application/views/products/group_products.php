<section id="headline" style="background-image:url(<?php echo base_url()."admin/images/banner_images/".$groups->banner_file ; ?>); background-color:#01619e; background-repeat:no-repeat; background-position:center;">
	<div class="container">
    	<h3><a href="#"><?php echo $groups->group_name ; ?></a></h3>
	</div>
</section>

<section class="container page-content">
	<hr class="vertical-space2">
    	<section class="eleven columns">
		<?php $bodytag = str_replace( chr(13), "<br>", $groups->landing_page_description);  echo $bodytag ; ?>
        	
        	<?php if($products) { ?>
			<?php foreach($products as $rec): ?>
          		<div class="product_item">
                	<div class="img-item center" style="text-align:center">
                		<a href="<?php echo base_url()."products/product_details/".$groups->id."/".$rec->id ; ?>">
                        	<img src="<?php echo base_url()."admin/images/prod_images/small/".strtolower($rec->product_code).".jpg" ; ?>" border="1" />
                    	</a>
             		</div>
            	
                	<div class="product_title" style="text-align:center">
              			<p><a href="<?php echo base_url()."products/product_details/".$groups->id."/".$rec->id ; ?>"><?php echo $rec->product_name ; ?></a></p>
            		</div>
          		</div>
          	<?php endforeach ; } ?>
      		<!-- end-portfolio -->
      		
            <hr class="vertical-space2">
      		<script src="<?php echo base_url() ; ?>javascript/isotope/isotope.js"></script> 
      		<script src="<?php echo base_url() ; ?>javascript/isotope/isotope-custom.js"></script> 
      		<script src="<?php echo base_url() ; ?>javascript/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script> 
    	</section>
        <aside class="four columns offset-by-one sidebar">
        
        <div><!--waqas only show this coupon if a coupon is added and flagged to a specfic product group-->        
        <h4 class="subtitle">Product savings</h4>
<hr>
  <a class="button red full-width" href="#"><span class="icomoon-tag-8" aria-hidden="true"></span> Save now with coupons</a>
<hr>
</div>
  		<?php $this->load->view("template/product_questions") ; ?>
    	<hr class="vertical-space2">
        </aside>
  </section><!-- end- -->