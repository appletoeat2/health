<nav id="nav-wrap" class="nav-wrap1 twelve columns">
      		<div id="search-form">
        		<form action="<?php echo base_url("")."products/search_products" ; ?>" method="POST">
          			<input type="text" class="search-text-box" id="search-box" name="search_box" autocomplete="off" />
        		</form>
      		</div>
      		<ul id="nav">
        	
            	<li><a href="<?php echo base_url()."products" ; ?>">PRODUCTS</a>
                	<ul>
                    	<li><a href="<?php echo base_url()."products" ; ?>">Show All Products</a></li>
                        <?php if($product_groups) { ?>
                        	<?php foreach($product_groups as $rec): ?>
                        		<li><a class="special" href="<?php echo base_url()."products/group_product/".$rec->id ; ?>"><?php echo $rec->group_name ; ?></a></li>    	
							<?php endforeach ; ?>
						<?php } ?>
                      	<!--<li class="submenu"><a href="<?php echo base_url()."products/index/7" ; ?>">Digestive Restoration</a>
                        	<ul>
                            	<li><a href="<?php echo base_url() ; ?>">General cleanse and detox</a></li>
                            	<li><a href="<?php echo base_url() ; ?>">Probiotics</a></li>
                                <li><a href="<?php echo base_url() ; ?>">Candida detox: Yeast Buster</a></li>
                            </ul>
                        </li>-->
                        <li><a href="<?php echo base_url()."products/new_products/" ; ?>">New Products</a></li>
                        <li><a href="<?php echo base_url("")."about_us/staff_picks" ; ?>">Staff Picks</a></li>
                        <li><a href="<?php echo base_url()."/resources/current_promotions" ; ?>">Latest Campaign</a></li>
                        <li><a href="<?php echo base_url("")."resources/coupons" ; ?>">Coupons</a></li>
                    </ul>
        		</li>
        		
                <li><a href="<?php echo base_url()."stores" ; ?>">SHOP</a>
        			<ul>
            			<li><a href="<?php echo base_url()."stores" ; ?>">Store Locator</a></li>
            			<li><a href="<?php echo base_url("")."resources/estores" ; ?>">e-Stores</a></li>
          			</ul>
          		</li>
           		
                <li><a href="<?php echo base_url("")."resources/index" ; ?>">RESOURCES</a>
          			<ul>
            			<li><a href="<?php echo base_url("")."resources/heart_to_heart" ; ?>">Heart to heart</a></li>
            			<li><a href="<?php echo base_url("")."resources/brain_power" ; ?>">Brain power</a></li>
            			<li><a href="<?php echo base_url("")."resources/bone_and_braun" ; ?>">Bone and braun</a></li>
            			<li><a href="<?php echo base_url("")."resources/probiotics101" ; ?>">Probiotics 101</a></li>
            			<li><a href="<?php echo base_url("")."resources/candida_questionnaire" ; ?>">Candida questionnaire</a></li>
            			<li><a href="<?php echo base_url("")."resources/healthy_journal" ; ?>">Healthy Journal</a></li>
            			<!--<li><a href="<?php echo base_url("")."resources/research_and_articles" ; ?>">Research and Articles</a></li>-->
            			<li><a href="<?php echo base_url("")."resources/recipes" ; ?>">Recipes</a></li>
            			<li><a href="<?php echo base_url("")."resources/coupons" ; ?>">Coupons</a></li>
          			</ul>
        		</li>
        
        		<li><a  href="<?php echo base_url("")."ecommunity/innovite_your_life" ; ?>">E-COMMUNITY</a>
        			<ul>
            			<!--<li><a href="<?php echo base_url("")."ecommunity/innovite_your_life" ; ?>">Innovite your Life</a></li>
-->            			<li><a href="<?php echo base_url("")."ecommunity/innovite_igniters" ; ?>">Innovite Igniters</a></li>
            			<li><a href="<?php echo base_url("")."ecommunity/ask_the_expert_blog" ; ?>">Ask our experts</a></li>
            			<!--<li><a href="<?php echo base_url("")."ecommunity/forum" ; ?>">Forum</a></li>-->
            			<li><a href="<?php echo base_url("")."ecommunity/upcoming_events" ; ?>">Upcoming events</a></li>
          			</ul>
        		</li>
                
        		<li><a href="<?php echo base_url("")."about_us/our_story" ; ?>">ABOUT US</a>
                    <ul>
                        <li><a href="<?php echo base_url("")."about_us/our_story" ; ?>">Our story</a></li>
                        <li><a href="<?php echo base_url("")."about_us/innovite_in_the_community" ; ?>">Innovite in the community</a></li>
                        <li><a href="<?php echo base_url("")."about_us/news_and_press" ; ?>">News and press</a></li>
                        <li><a href="<?php echo base_url("")."about_us/innovite_igniters" ; ?>">Innovite Igniters</a></li>
                        <li><a href="<?php echo base_url("")."about_us/staff_picks" ; ?>">Staff picks</a></li>
                        <li><a href="<?php echo base_url("")."about_us/careers" ; ?>">Careers</a></li>
                        <li><a href="<?php echo base_url("")."about_us/contact_us" ; ?>">Contact us</a></li>
                    </ul>
        		</li>
        	</ul>
    	</nav><!-- /nav-wrap -->