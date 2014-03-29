<div id="right">
	<div class="section">
			<?php if($message == 1) { ?><div class="message green"><br /><ul><li>Image Uploaded successfully.</li></ul><br /></div><?php } ?>
			<?php if($message == 2) { ?><div class="message red"><br /><ul><li>Failed to Upload Image.</li></ul><br /></div><?php } ?>
			<?php if($message == 3) { ?><div class="message green"><br /><ul><li>Image removed successfully.</li></ul><br /></div><?php } ?>
			<?php if($message == 4) { ?><div class="message red"><br /><ul><li>Failed to remove image.</li></ul><br /></div><?php } ?>
		<div class="box">
			<div class="title">Gallery<span class="hide"></span></div>
			<div class="content nopadding">
				<div class="gallery">
					<?php if($files) { ?>
						<?php foreach($files as $rec): ?>
							<div class="thumb">
								<div class="hover"><a href="javascript:void(0);" id="<?php echo $rec->image_id ; ?>" class="delete_image"></a></div>
								<a href="<?php echo base_url()."image_library/".$rec->image_name ; ?>" class="pirobox" rel="single" title="<?php echo base_url()."image_library/".$rec->image_name ; ?>" target="_blank">
									<img src="<?php echo base_url()."image_library/thumbnails/".$rec->image_name ; ?>" alt="Photo" />
								</a>
							</div>
						<?php endforeach ; ?>
					<?php } ?>
					
					<!--<div class="thumb">
						<div class="hover"><a href="#"></a></div>
						<a href="<?php // echo base_url()."images/ace-60.jpg" ; ?>" class="pirobox" rel="single" title="asdasdas"><img src="<?php // echo base_url()."images/ace-60.jpg" ; ?>" alt="Photo" /></a>
					</div>
					<div class="thumb">
						<div class="hover"><a href="#"></a></div>
						<a href="#" class="pirobox" rel="single" title=""><img src="<?php // echo base_url()."images/photo.jpg" ; ?>" alt="Photo" /></a>
					</div> -->
				</div>
				<?php echo $links ; ?>
				<!--<div class="pager">
					Pages:<a href="#" class="current">01</a>
					<a href="#">02</a>
					<a href="#">03</a>
					<a href="#">04</a>
					<a href="#">05</a>
					<a href="#">06</a>
					<a href="#">07</a>
					<a href="#">08</a>
					<a href="#">09</a>
					<a href="#">10</a>
				</div> -->
			</div>
		</div>
	</div>
</div>

<script>
$(function(){
	$("a.delete_image").click(function(){
		if(confirm('Are you sure want to remove this image?')) {
			//alert("<?php echo base_url()."dynamic_content/delete_image/" ; ?>" + $(this).attr("id")) ;
			window.location.href = "<?php echo base_url()."dynamic_content/delete_image/" ; ?>" + $(this).attr("id") ;	
		} else {
			return false ;
		}
	}) ;
}) ;
</script>