<div class="grid_3 leftsidebar" style="z-index:999;" id="leftsidebar">
				 <div class="meta-box">
				 <script language="javascript" type="text/javascript">
            $(function() {
                $("#webwidget_vertical_menu").webwidget_vertical_menu({
                    menu_width: '230',
                    menu_height: '30',
                    menu_margin: '0',
                    menu_text_size: '14',
                    menu_text_color: '#A8353D',
                    menu_background_color: '#FFF',
                    menu_border_size: '1',
                    menu_border_color: '#E6E6E6',
                    menu_border_style: 'solid',
                    menu_background_hover_color: '#999',
                    directory: '<?php echo $base_url?>img'
                });
				$("#webwidget_vertical_menu1").webwidget_vertical_menu1({
                    menu_width: '230',
                    menu_height: '30',
                    menu_margin: '0',
                    menu_text_size: '14',
                    menu_text_color: '#A8353D',
                    menu_background_color: '#FFF',
                    menu_border_size: '1',
                    menu_border_color: '#E6E6E6',
                    menu_border_style: 'solid',
                    menu_background_hover_color: '#999',
                    directory: '<?php echo $base_url?>img'
                });
            });
        </script>
		<h3 class="col-title"> Categories <?php if(!empty($cat_name)){?>- <?php echo $cat_name; }?> </h3><span class="liner"></span> 	
			<div id="webwidget_vertical_menu" class="webwidget_vertical_menu">
				
				<ul>
					<?php $a=0; foreach($allcategory as $category){?>
					<li><a href="#1"> <?php echo  $category['Category']['name'];?></a>
						<ul>
							<?php foreach($category['SubCategory'] as $subcategory){?>
							<li>
							<a href="<?php echo $base_url?>homes/index/subCatId:<?php echo $subcategory['id']?>">
							<?php echo $subcategory['name']?> 
							</a> 
							</li>
							 
							 <?php }?> 
						</ul>
						</li>
					 <?php }?> 

				</ul>
			<div style="clear: both"></div>
			</div>
				 
			
					<div id="sidebar" class="nav-collapse collapse widget ">
							<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
							  
				 
							<!-- BEGIN SIDEBAR MENU -->
							<ul class="sidebar-menu">
								 <?php $a=0; foreach($allcategory as $category){?>
								<li class="has-sub">
									<a href="javascript:;" class="">
										 <?php echo  $category['Category']['name'];?>
										<span class="arrow"></span>
									</a>
									<ul class="sub">
										<?php foreach($category['SubCategory'] as $subcategory){?>
										<li>
										<a href="<?php echo $base_url?>homes/index/subCatId:<?php echo $subcategory['id']?>">
										<?php echo $subcategory['name']?> 
										</a> 
										</li>
										 <?php }?> 
									</ul>
								</li>
								<?php }?>   
								 
								 
								  
								 
								 
								  
								 
					
			</ul>
			<!-- END SIDEBAR MENU -->
		</div>	 
					 
		<!-- END SIDEBAR -->
				</div>	 
				</div>