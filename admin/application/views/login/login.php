<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <title><?php echo $title ; ?></title>

<style type="text/css">
	@import url("<?php echo base_url()."stylesheets/style1.css" ; ?>");
	@import url("<?php echo base_url()."stylesheets/forms.css" ; ?>");
	@import url("<?php echo base_url()."stylesheets/forms-btn.css" ; ?>");
	@import url("<?php echo base_url()."stylesheets/menu.css" ; ?>");
	@import url("<?php echo base_url()."stylesheets/style_text.css" ; ?>");
	@import url("<?php echo base_url()."stylesheets/datatables.css" ; ?>");
	@import url("<?php echo base_url()."stylesheets/fullcalendar.css" ; ?>");
	@import url("<?php echo base_url()."stylesheets/pirebox.css" ; ?>");
	@import url("<?php echo base_url()."stylesheets/modalwindow.css" ; ?>");
	@import url("<?php echo base_url()."stylesheets/statics.css" ; ?>");
	@import url("<?php echo base_url()."stylesheets/tabs-toggle.css" ; ?>");
	@import url("<?php echo base_url()."stylesheets/system-message.css" ; ?>");
	@import url("<?php echo base_url()."stylesheets/tooltip.css" ; ?>");
	@import url("<?php echo base_url()."stylesheets/wizard.css" ; ?>");
	@import url("<?php echo base_url()."stylesheets/wysiwyg.css" ; ?>");
	@import url("<?php echo base_url()."stylesheets/wysiwyg.modal.css" ; ?>");
	@import url("<?php echo base_url()."stylesheets/wysiwyg-editor.css" ; ?>");
</style>

<!--[if lte IE 8]>
	<script type="text/javascript" src="<?php echo base_url()."javascript/excanvas.min.js" ; ?>"></script>
<![endif]-->

<script type="text/javascript" src="<?php echo base_url()."javascript/jquery-1.7.1.min.js" ; ?>"></script>
<script type="text/javascript" src="<?php echo base_url()."javascript/jquery.backgroundPosition.js" ; ?>"></script>
<script type="text/javascript" src="<?php echo base_url()."javascript/jquery.placeholder.min.js" ; ?>"></script>
<script type="text/javascript" src="<?php echo base_url()."javascript/jquery.ui.1.8.17.js" ; ?>"></script>
<script type="text/javascript" src="<?php echo base_url()."javascript/jquery.ui.select.js" ; ?>"></script>
<script type="text/javascript" src="<?php echo base_url()."javascript/jquery.ui.spinner.js" ; ?>"></script>
<script type="text/javascript" src="<?php echo base_url()."javascript/superfish.js" ; ?>"></script>
<script type="text/javascript" src="<?php echo base_url()."javascript/supersubs.js" ; ?>"></script>
<script type="text/javascript" src="<?php echo base_url()."javascript/jquery.datatables.js" ; ?>"></script>
<script type="text/javascript" src="<?php echo base_url()."javascript/fullcalendar.min.js" ; ?>"></script>
<script type="text/javascript" src="<?php echo base_url()."javascript/jquery.smartwizard-2.0.min.js" ; ?>"></script>
<script type="text/javascript" src="<?php echo base_url()."javascript/pirobox.extended.min.js" ; ?>"></script>
<script type="text/javascript" src="<?php echo base_url()."javascript/jquery.tipsy.js" ; ?>"></script>
<script type="text/javascript" src="<?php echo base_url()."javascript/jquery.elastic.source.js" ; ?>"></script>
<script type="text/javascript" src="<?php echo base_url()."javascript/jquery.customInput.js" ; ?>"></script>
<script type="text/javascript" src="<?php echo base_url()."javascript/jquery.validate.min.js" ; ?>"></script>
<script type="text/javascript" src="<?php echo base_url()."javascript/jquery.metadata.js" ; ?>"></script>
<script type="text/javascript" src="<?php echo base_url()."javascript/jquery.filestyle.mini.js" ; ?>"></script>
<script type="text/javascript" src="<?php echo base_url()."javascript/jquery.filter.input.js" ; ?>"></script>
<script type="text/javascript" src="<?php echo base_url()."javascript/jquery.flot.js" ; ?>"></script>
<script type="text/javascript" src="<?php echo base_url()."javascript/jquery.flot.pie.min.js" ; ?>"></script>
<script type="text/javascript" src="<?php echo base_url()."javascript/jquery.flot.resize.min.js" ; ?>"></script>
<script type="text/javascript" src="<?php echo base_url()."javascript/jquery.graphtable-0.2.js" ; ?>"></script>
<script type="text/javascript" src="<?php echo base_url()."javascript/jquery.wysiwyg.js" ; ?>"></script>
<script type="text/javascript" src="<?php echo base_url()."javascript/controls/wysiwyg.image.js" ; ?>"></script>
<script type="text/javascript" src="<?php echo base_url()."javascript/controls/wysiwyg.link.js" ; ?>"></script>
<script type="text/javascript" src="<?php echo base_url()."javascript/controls/wysiwyg.table.js" ; ?>"></script>
<script type="text/javascript" src="<?php echo base_url()."javascript/plugins/wysiwyg.rmFormat.js" ; ?>"></script>
<script type="text/javascript" src="<?php echo base_url()."javascript/costum.js" ; ?>"></script>

</head>

<body>
	
    <div id="wrapper" class="login">
    	<div class="box">
        	<div class="title">Please login
			<span class="hide"></span>
		</div>
		<div class="content">
			
            <div class="message inner blue">
				<span><b>Information</b>: Click the submit button to proceed.</span>
			</div>
            
            <form method="post" action="<?php echo base_url()."home/login" ; ?>">
				<div class="row">
					<label for="username">Username</label>
					<div class="right"><input type="text" id="username" name="username" value="" /></div>
				</div>
				<div class="row">
					<label for="password">Password</label>
					<div class="right"><input type="password" id="password" name="password" value="" /></div>
				</div>
				<div class="row">
					<div class="right">
						<button type="submit"><span>Submit</span></button>
					</div>
				</div>
			</form>
		</div>
	</div>
	
</div>

</body>

</html> 