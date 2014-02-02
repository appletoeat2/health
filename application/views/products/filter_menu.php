<aside class="four columns sidebar leftside">
        <h4 class="subtitle">Health Group</h4>
        <div class="listbox1">
        	<ul>
            	<?php
				if($product_group_recs) 
				{
			echo '<li>
					<label>
						<input type="checkbox" id="main_product_group" name="" class="" checked="checked" />
						<div id="label">View All</div>
					</label>
				</li>' ;
					foreach($product_group_recs as $rec):
						echo '<li><label><input type="checkbox" id="'.$rec->id.'" name="" class="product_group" /><div id="label">'.$rec->group_title.'</div></label></li>' ;
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
					echo '<li><a class="view_all_product_categories" href="javascript:void(0);">View All</a></li>' ;
		//echo '<li><input type="checkbox" id="main_categories" name="" class="" checked="checked" /><a href="javascript:void(0);">View All</a></li>' ;
					foreach($product_category_recs as $rec):
						echo '<li><label><input type="radio" id="'.$rec->id.'" name="categories_id" class="product_category" /><div id="label">'.$rec->category_name.'</div></label></li>' ;
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
		//echo '<li><input type="checkbox" id="main_food_sensitivites" name="" class="" checked="checked" /><a href="javascript:void(0);">View All</a></li>' ;
					echo '<li><a class="view_all_food_sensitivites" href="javascript:void(0);">View All</a></li>' ;
					foreach($food_sensitivity_recs as $rec):
						echo '<li><label><input type="radio" id="'.$rec->id.'" name="food_sensitivity_id" class="food_sensitivity" /><div id="label">'.$rec->name.'</div></label></li>' ;
					endforeach ;
				}
				?>
        	</ul>
      	</div><!-- end-listbox1 -->
	</aside><!-- end-sidebar-->