<link rel="stylesheet" href="<?php echo base_url()."stylesheets/chosen.css" ; ?>">
<form id="slider_form" name="slider_form" action="<?php echo base_url()."slider/insert_slider" ; ?>" method="post" enctype="multipart/form-data">
<div class="section">
	<div id="right">
        <div class="section">
            <?php if($errors) {  echo '<div class="message red"><br /><ul>'.$errors.'</ul><br /></div>' ; } ?>
            <div class="half">
				<div class="box">
					<div class="title">Slider Common Details<span class="hide"></span></div>
					<div class="content">
                        <div class="row"> 
							<label>Slider Title</label>
							<div class="right"><input type="text" id="slider_title" name="slider_title" value="<?php echo set_value("slider_title") ; ?>" /></div>
						</div>
            			<div class="row"> 
							<label>Sort Order</label>
							<div class="right"><input type="text" id="order" name="order" value="<?php echo set_value("order") ; ?>" /></div>
						</div>
                   	</div>
              	</div>
           	</div>
        	<div class="half">
				<div class="box">
					<div class="title">Slider Common Details<span class="hide"></span></div>
					<div class="content">
						<!--<div class="row"> 
							<label>Start Date</label>
							<div class="right"><input type="text" id="start_date" name="start_date" class="datepicker" value="<?php // echo set_value("start_date") ; ?>" /></div>
						</div>
						<div class="row"> 
							<label>End Date</label>
							<div class="right"><input type="text" id="end_date" name="end_date" class="datepicker" value="<?php // echo set_value("end_date") ; ?>" /></div>
						</div>-->
						<div class="row"> 
							<label>Link</label>
							<div class="right"><input type="text" id="link" name="link" value="<?php echo set_value("link") ; ?>" /></div>
						</div>
						<div class="row">
							<label>Status</label>
							<div class="right">
								<input type="radio" id="status-1" name="status" value="Active"  <?php echo set_radio("status", "Active", TRUE); ?> /> 
									<label for="status-1">Active</label>  
								<input type="radio" id="status-2" name="status" value="Disable" <?php echo set_radio("status", "Disable"); ?> /> 
									<label for="status-2">Disable</label>
							</div>
						</div>
					</div>
				</div>
			</div>
 		</div>
        
        <div class="section">
            <div class="half">
				<div class="box">
					<div class="title">Slider Image (English)<span class="hide"></span></div>
					<div class="content">
                        <div class="row">
                        	<label>Slider Image</label>
                            <div class="right"><input type="file" id="english_image" name="english_image" /></div>
                       	</div>
                   	</div>
              	</div>
           	</div>
        	<div class="half">
				<div class="box">
					<div class="title">Slider Image (French)<span class="hide"></span></div>
					<div class="content">
            			<div class="row">
                        	<label>Slider Image</label>
                            <div class="right"><input type="file" id="french_image" name="french_image" /></div>
                       	</div>
					</div>
				</div>
			</div>
 		</div>
		
        <div class="section">
			<div class="box">
				<div class="content">
    				<div class="row">
						<label></label>
                        <div class="right">
							<button type="submit" id="add_store"><span>Sumbit</span></button>
							<button type="button" id="cancel"><span>Cancel</span></button>
						</div>
                	</div>
				</div>
        	</div>
        </div>
        
	</div>    
</div>
</form>
<script type="text/javascript">
$(function(){
	$("#cancel").live('click',function(){
		window.location.href = "<?php echo base_url()."slider/index" ; ?>" ;
	}) ;
}) ;
</script>
<script src="<?php echo base_url()."javascript/chosen.jquery.js" ; ?>" type="text/javascript"></script>
<script src="<?php echo base_url()."javascript/prism.js" ; ?>" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
	var config = {'.chosen-select':{}} ;
	for (var selector in config)
	{
		$(selector).chosen(config[selector]) ;
    }
</script>
