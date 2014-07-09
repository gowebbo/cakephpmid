<!DOCTYPE HTML>
<html>
<head>
<link rel="shortcut icon" href="<?php echo $base_url?>img/favicon.ico">
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <meta name="Robots" content="index/follow"/>
    <meta name="Author" content=""/>
    <meta name="Distribution" content="Global"/>
    <meta name="ROBOTS" content="ALL"/>
    <meta name="resource-type" content="Document"/>
    <meta name="rating" content="General"/>
    <meta name="revisit" content="7 days"/>
    <title>
        <?php 
			if(!empty($pageTitle)){
				echo $pageTitle." | ".WEBSITE_NAME;
			}else if(!empty($product['Product']['page_title'])){
				echo $product['Product']['page_title'];
			}else{
				echo WEBSITE_NAME;
			}
			?>
    </title>
    <?php
            echo $this->Html->css('style.css');
    ?>
    <!--[if lte IE 7]>
    <?php
            echo $this->Html->css('ie.css');
    ?>
    <![endif]-->
    <?php echo $this->Html->script('jquery-1.3.2.min'); ?>
    <?php echo $this->Html->script('admin_script'); ?>
	<?php echo $this->Html->script('ckeditor/ckeditor.js');?>

</head>

<body>
<div id="wrap">
    <!-- start header -->
    <div id="topbar">
        <div class="top-lf">
            <h3><?php  echo WEBSITE_NAME;?></h3>
        </div>
        <div class="top-rt">
            <p>Welcome, admin | 
				<?php echo $this->Html->link('Logout',array('controller' => 'users', 'action' => 'logout'),array());?></p>
        </div>
        <div class="clear"></div>
    </div>
    <!-- #end header -->

    <div id="container">
        <!-- start menu -->
        <div class="menubar">
            <ul class="menu">
               <!-- <li class="menuitem">
					<?php echo $this->Html->link('Dashboard',array('controller' => 'orders', 'action' => 'index'),array('class'=>'menulink home'));?>
				</li>

                <li class="menuitem">
                  	<?php echo $this->Html->link('Orders',array('controller' => 'orders', 'action' => 'index'),array('class'=>'menulink order'));?>
				</li>-->
                  <li class="menuitem">
                   	<?php echo $this->Html->link('Customers',array('controller' => 'customers', 'action' => 'index'),array('class'=>'menulink member'));?>
				</li>
                <!--<li class="menuitem">
					<?php echo $this->Html->link('Products',array('controller' => 'products', 'action' => 'index'),array('class'=>'menulink products'));?>
					<div class="toggler">
                        <a href="#" onclick="toggle_visibility('subprodcuts');return false;">&nbsp;</a>
                    </div>
                    <ul id="subprodcuts">
                        <li>
						<?php echo $this->Html->link('Add Product',array('controller' => 'products', 'action' => 'add'));?>
						</li>
					</ul>
                </li>-->
                <!--<li class="menuitem">
							<?php //echo $this->Html->link('Shipping Box',array('controller' => 'ShippingBoxes', 'action' => 'index'),array('class'=>'menulink ship'));?>
							<div class="toggler">
								<a href="#" onclick="toggle_visibility('subship');return false;">&nbsp;</a>
							</div>
							<ul id="subship">
								<li>
									<?php //echo $this->Html->link('Add Shipping Box',array('controller' => 'ShippingBoxes', 'action' => 'add'));?>
								</li>
							</ul>
						</li>-->
                <li class="menuitem">
					<?php echo $this->Html->link('Categories',array('controller' => 'categories', 'action' => 'index'),array('class'=>'menulink cat'));?>
					<div class="toggler">
                        <a href="#" onclick="toggle_visibility('subprocat');return false;">&nbsp;</a>
                    </div>
                    <ul id="subprocat">
                        <li>
						<?php echo $this->Html->link('Add Category',array('controller' => 'categories', 'action' => 'add'));?>
						</li>
                    </ul>
                </li>

				<li class="menuitem">
					<?php echo $this->Html->link('Sub Categories',array('controller' => 'sub_categories', 'action' => 'index'),array('class'=>'menulink cat'));?>
					<div class="toggler">
                        <a href="#" onclick="toggle_visibility('subprocatsub');return false;">&nbsp;</a>
                    </div>
                    <ul id="subprocatsub">
                        <li>
						<?php echo $this->Html->link('Add Sub Category',array('controller' => 'sub_categories', 'action' => 'add'));?>
						</li>
                    </ul>
                </li>	
				<li class="menuitem">
                   <?php echo $this->Html->link('Countries',array('controller' => 'countries', 'action' => 'index'),array('class'=>'menulink coupon'));?>
				   <div class="toggler">
                        <a href="#" onclick="toggle_visibility('subcoupon');return false;">&nbsp;</a>
                    </div>
                    <ul id="subcoupon">
                        <li>
						<?php echo $this->Html->link('Add Country',array('controller' => 'countries', 'action' => 'add'));?>
						</li>
                    </ul>
                </li>
				<li class="menuitem">
                   <?php echo $this->Html->link('States',array('controller' => 'states', 'action' => 'index'),array('class'=>'menulink coupon'));?>
				   <div class="toggler">
                        <a href="#" onclick="toggle_visibility('state');return false;">&nbsp;</a>
                    </div>
                    <ul id="state">
                        <li>
						<?php echo $this->Html->link('Add State',array('controller' => 'states', 'action' => 'add'));?>
						</li>
                    </ul>
                </li>
				<li class="menuitem">
					<?php echo $this->Html->link('Banners',array('controller' => 'banners', 'action' => 'index'),array('class'=>'menulink products'));?>
					 <!--<div class="toggler">
                        <a href="#" onclick="toggle_visibility('subprodcuts');return false;">&nbsp;</a>
                    </div>
                   <ul id="subprodcuts">
                        <li>
						<?php echo $this->Html->link('Add Product',array('controller' => 'products', 'action' => 'add'));?>
						</li>
					</ul>-->
                </li>
				 <li class="menuitem">
					<?php echo $this->Html->link('Flagged Banners',array('controller' => 'banners', 'action' => 'flag'),array('class'=>'menulink products'));?>
					 <div class="toggler">
                        <a href="#" onclick="toggle_visibility('subprodcuts');return false;">&nbsp;</a>
                    </div>
                   <ul id="subprodcuts">
                        <li>
						<?php //echo $this->Html->link('Add Product',array('controller' => 'products', 'action' => 'add'));?>
						</li>
					</ul>
                </li> 
				 <li class="menuitem">
					<?php echo $this->Html->link('Review the pending requests',array('controller' => 'banners', 'action' => 'pending_requests'),array('class'=>'menulink products'));?>
					  
                </li>

                 <li class="menuitem">
                    <?php echo $this->Html->link('Daily Deals Section',array('controller' => 'banners', 'action' => 'daily_deals'),array('class'=>'menulink products'));?>
                      
                </li>
                 <li class="menuitem">
                    <?php echo $this->Html->link('Review the Premium Ads',array('controller' => 'banners', 'action' => 'premium_ads'),array('class'=>'menulink products'));?>
                      
                </li>
				<li class="menuitem">
					<?php echo $this->Html->link('Banner Templates',array('controller' => 'template_banners', 'action' => 'index'),array('class'=>'menulink products'));?>
					 <div class="toggler">
                        <a href="#" onclick="toggle_visibility('subprodcuts1');return false;">&nbsp;</a>
                    </div>
                   <ul id="subprodcuts1">
                        <li>
						<?php echo $this->Html->link('Add',array('controller' => 'template_banners', 'action' => 'add'));?>
						</li>
					</ul>
                </li>
               <!-- <li class="menuitem">
                   <?php echo $this->Html->link('Coupon',array('controller' => 'coupons', 'action' => 'index'),array('class'=>'menulink coupon'));?>
				   <div class="toggler">
                        <a href="#" onclick="toggle_visibility('subcoupon');return false;">&nbsp;</a>
                    </div>
                    <ul id="subcoupon">
                        <li>
						<?php echo $this->Html->link('Add Coupon',array('controller' => 'coupons', 'action' => 'add'));?>
						</li>
                    </ul>
                </li>-->


                <li class="menuitem">
                    <?php echo $this->Html->link('Admin Users',array('controller' => 'users', 'action' => 'index'),array('class'=>'menulink users'));?>
					<div class="toggler">
                        <a href="#" onclick="toggle_visibility('subusers');return false;">&nbsp;</a>
                    </div>
                    <ul id="subusers">
                        <li>
						<?php echo $this->Html->link('Add Admin User',array('controller' => 'users', 'action' => 'add'));?>
						</li>
                    </ul>
                </li>
				 <li class="menuitem">
					<?php echo $this->Html->link('Email Templates',array('controller' => 'EmailTemplates', 'action' => 'index'),array('class'=>'menulink home'));?>
				</li>
				<!--<li class="menuitem">
                  	<?php echo $this->Html->link('Service Category',array('controller' => 'service_categories', 'action' => 'index'),array('class'=>'menulink order'));?>
					<div class="toggler">
                        <a href="#" onclick="toggle_visibility('servicecategory');return false;">&nbsp;</a>
                    </div>
                    <ul id="servicecategory">
                        <li>
						<?php echo $this->Html->link('Add Service Category',array('controller' => 'service_categories', 'action' => 'add'));?>
						</li>
                    </ul>
				</li> 
				 <li class="menuitem">
                  	<?php echo $this->Html->link('Service Gallery',array('controller' => 'service_galleries', 'action' => 'index'),array('class'=>'menulink order'));?>
					<div class="toggler">
                        <a href="#" onclick="toggle_visibility('servicegallery');return false;">&nbsp;</a>
                    </div>
                    <ul id="servicegallery">
                        <li>
						<?php echo $this->Html->link('Add Service Gallery',array('controller' => 'service_galleries', 'action' => 'add'));?>
						</li>
                    </ul>
				</li> 
				 <li class="menuitem">
                  	<?php echo $this->Html->link('Event Category',array('controller' => 'event_categories', 'action' => 'index'),array('class'=>'menulink order'));?>
					<div class="toggler">
                        <a href="#" onclick="toggle_visibility('eventcategory');return false;">&nbsp;</a>
                    </div>
                    <ul id="eventcategory">
                        <li>
						<?php echo $this->Html->link('Add Event Category',array('controller' => 'event_categories', 'action' => 'add'));?>
						</li>
                    </ul>
				</li> 
				  <li class="menuitem">
                  	<?php echo $this->Html->link('Event Gallery',array('controller' => 'galleries', 'action' => 'index'),array('class'=>'menulink order'));?>
					<div class="toggler">
                        <a href="#" onclick="toggle_visibility('gallery');return false;">&nbsp;</a>
                    </div>
                    <ul id="gallery">
                        <li>
						<?php echo $this->Html->link('Add Event Gallery',array('controller' => 'galleries', 'action' => 'add'));?>
						</li>
                    </ul>
				</li>-->
				 <li class="menuitem">
					<?php echo $this->Html->link('Content Management',array('controller' => 'contents', 'action' => 'index'),array('class'=>'menulink home'));?>
				</li>
            </ul>
        </div>
        <!-- #end menu -->
        <div class="main">
            <?php echo $this->Session->flash(); ?>

            <?php echo $this->fetch('content'); ?>
        </div>

        <!-- start footer -->
        <div id="foot">
            <div class="ft-lf">
                <p>Copyright &copy; <?php echo WEBSITE_NAME;?> Company. All rights reserved. </p>
            </div>
            <div class="ft-rt">
                <p>version 1.1</p>
            </div>
            <div class="clear"></div>
        </div>
        <!-- #end footer -->
        <div class="clear"></div>
    </div>

</div>


</body>
</html>



