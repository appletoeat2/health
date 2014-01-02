<?php $this->load->view("template/header") ; ?>
<?php $this->load->view("template/top_menu") ; ?>

<?php
	if($side_menu_type == "products")
		$this->load->view("template/products_side_menu") ;
	else
		$this->load->view("template/side_menu") ;
?>
<?php $this->load->view($view) ; ?>
<?php $this->load->view("template/footer") ; ?>