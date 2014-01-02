<aside class="four columns sidebar leftside">
        <h4 class="subtitle">Health Group</h4>
        <div class="listbox1">
        	<ul>
            	<?php
				if($product_group_recs) 
				{
					echo '<li><input type="checkbox" id="main_product_group" name="" class="" checked="checked" /><a href="javascript:void(0);">View All</a></li>' ;
					foreach($product_group_recs as $rec):
						echo '<li><input type="checkbox" id="'.$rec->id.'" name="" class="product_group" checked="checked" /><a href="javascript:void(0);">'.$rec->group_name.'</a></li>' ;
					endforeach ;
				}
				?>
            </ul>
		</div><!-- end-listbox1 -->
        <br class="clear">
        
        <h4 class="subtitle">Categories</h4>
        <div class="listbox1">
        	<ul>
            	<?php
				if($product_category_recs) 
				{
					echo '<li><input type="checkbox" id="main_categories" name="" class="" checked="checked" /><a href="javascript:void(0);">View All</a></li>' ;
					foreach($product_category_recs as $rec):
						echo '<li><input type="checkbox" id="'.$rec->id.'" name="" class="product_category" checked="checked" /><a href="javascript:void(0);">'.$rec->category_name.'</a></li>' ;
					endforeach ;
				}
				?>
        	</ul>
      	</div><!-- end-listbox1 -->
      	<br class="clear">
      	
        <h4 class="subtitle">FOOD SENSITIVITIES</h4>
      	<div class="listbox1">
        	<ul>
                <?php
				if($food_sensitivity_recs) 
				{
					echo '<li><input type="checkbox" id="main_food_sensitivites" name="" class="" checked="checked" /><a href="javascript:void(0);">View All</a></li>' ;
					foreach($food_sensitivity_recs as $rec):
						echo '<li><input type="checkbox" id="'.$rec->id.'" name="" class="food_sensitivity" checked="checked" /><a href="javascript:void(0);">'.$rec->name.'</a></li>' ;
					endforeach ;
				}
				?>
        	</ul>
      	</div><!-- end-listbox1 -->
	</aside><!-- end-sidebar-->