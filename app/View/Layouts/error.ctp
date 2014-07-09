<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />	
		<meta name="Robots" content="index/follow" />
		<meta name="Author" content="P&S Ravioli Company" />
		<meta name="Distribution" content="Global" />
		<meta name="ROBOTS" content="ALL" />
		<meta name="resource-type" content="Document" />
		<meta name="rating" content="General" />
		<meta name="revisit" content="7 days" />

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
		<?php if(!empty($product['Product']['meta_keyword'])){?>
			<meta name="keywords" content="<?php echo $product['Product']['meta_keyword'];?>" />
		<?php }else{?>
			<meta name="keywords" content="" />
		<?php }?>

		<?php if(!empty($product['Product']['meta_description'])){?>
			<meta name="description" content="<?php echo $product['Product']['meta_description'];?>" />
		<?php }else{?>
			<meta name="description" content="" />
		<?php }?>

    <?php
            echo $this->Html->css('style-front.css');
    ?>
    <!--[if lte IE 7]>
    <?php
            echo $this->Html->css('ie.css');
    ?>
	
	 <?php echo $this->Html->script('pngfix'); ?>
    <![endif]-->
     <?php echo $this->Html->script('jquery-1.3.2.min'); ?>
</head>

<body>
		<div id="wrap">
			<div id="sha-lf"><div id="sha-rt">
<!-- start header -->
				<div id="head">
					<div class="hd-lf">
						<a href="#">
						<?php echo $this->Html->image('logo.gif',array("P&S Ravioli Company"));?>
						</a>
					</div>
					<div class="hd-rt">
						<ul>
							<li><a href="#">Home</a></li>
							<li><a href="#">About Us</a></li>
							<li class="active">
							<?php echo $this->Html->link('Products', '/', array()); ?>
							</li>
							<li><a href="#">Store Locator</a></li>
							<li><a href="#">Menus</a></li>
							<li><a href="#">Reviews</a></li>
							<li><a href="#">Recipes</a></li>
							<li><a href="#">Gift Certificates</a></li>
							<li class="last"><a href="#">Contact Us</a></li>
						</ul>
						<div class="slogan">
							<p>&nbsp;</p>
							<h2>Makers of All Natural Fine Pasta Since 1966</h2>
						</div>
					</div>
					<div class="clear"></div>
				</div>
<!-- #end header -->

				<div id="container">
					
					<?php echo $this->fetch('content'); ?>
<!-- start company locations -->
					<div id="loc">
						<h2>P&S Ravioli Company Locations</h2>
						<ul>
							<li>1722 Oregon Avenue<br />Philadelphia, PA 19145 <br />(215) 339-9929 <br /><a href="#">&raquo; Download Menu</a></li>
							<li>7051 Torresdale Avenue<br />Philadelphia, PA 19135<br />(215) 624-9925<br /><a href="#">&raquo; Download Menu</a></li>
							<li>1640 S. 10th Street <br />Philadelphia, PA 19148 <br />(215) 271-7781<br /><a href="#">&raquo; Download Menu</a></li>
							<li>30 Brookline Boulevard <br />Havertown, PA 19083 <br />(610) 446-9977<br /><a href="#">&raquo; Download Menu</a></li>
							<li class="last">511 BlackHorse Pike <br />Haddon Heights, NJ 08035 <br />(856) 547-9804<br /><a href="#">&raquo; Download Menu</a></li>
						</ul>
						<div class="clear"></div>
						<p>Follow Us
							<a href="#">
							<?php echo $this->Html->image('ico_facebook.png',array("Facebook"));?>
										
							</a>
							<a href="#">
							<?php echo $this->Html->image('ico_rss.png',array("RSS"));?>
							</a>
						</p>
						<div class="clear"></div>

					</div>
<!-- #end company locations -->
				</div>

<!-- start footer-->
				<div id="foot">
					<div class="ft-lf">
						<p><span>P&S Ravioli Company <br />2001 South 26th Street, Philadelphia, PA 19145</span></p>
						<p>Copyright &copy;  P&S Ravioli Company. All rights reserved.</p>
					</div>
					<div class="ft-rt">
						<a href="#">DELIVERY INFORMATION</a> | 
						<a href="#">CUSTOMER SERVICE</a> | 
						<a href="#">PRIVACY POLICY</a> | 
						<a href="#">RETURN POLICY</a>
					</div>
					<div class="clear"></div>
				</div>
<!-- #end footer -->

			</div></div>
		</div>
	</body>
	<?php echo $this->element('sql_dump'); ?>
</html>



