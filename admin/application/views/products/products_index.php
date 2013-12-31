<div id="right">
	<div class="section">
    	<div class="box">
            <div class="title">Products Detail<span class="hide"></span></div>
            <div class="content">
            	<table cellspacing="0" cellpadding="0" border="0" class="all"> 
					<thead> 
						<tr>
							<th width="25%">Product Name</th>
							<th width="20%">Product Code</th>
							<th width="25%">Health Claim</th>
							<th width="10%">Is New</th>
							<th width="10%">Status</th>
							<th width="10%">Action</th>
						</tr>
					</thead>
				<?php if($products) { ?>	
                    <tbody>
                    <?php foreach($products as $rec): ?>
						<tr>
							<td><?php echo stripslashes($rec->product_name) ; ?></td>
							<td><?php echo stripslashes($rec->product_code) ; ?></td>
							<td><?php echo stripslashes($rec->health_claim) ; ?></td>
							<td><?php echo stripslashes($rec->isnew) ; ?></td>
							<td><?php echo stripslashes($rec->status) ; ?></td>
							<td><a href="<?php echo base_url()."products/product_detail/".$rec->id ; ?>">View</a> - <a href="<?php echo base_url()."products/edit_product/".$rec->id ; ?>">Edit</a></td>
						</tr>
                    <?php endforeach ; ?>
					</tbody>
				<?php } ?>
                </table>
			</div>
            
            <div class="content">
           		<div class="right">
                	<button id="add_new_product" type="button"><span>Click Here to Add New Product</span></button>
            	</div>
            </div>
            
		</div>
	</div>
</div>
<script type="text/javascript">
$(function(){
	$("#add_new_product").click(function(){
		window.location.href = "<?php echo base_url()."products/insert_product" ; ?>" ;
	}) ;
}) ;
</script>