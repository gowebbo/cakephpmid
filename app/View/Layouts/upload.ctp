<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en-US"><!--<![endif]-->
<head>
	<title><?php 
			if(!empty($pageTitle)){
				echo $pageTitle." | ".WEBSITE_NAME;
			}else if(!empty($product['Product']['page_title'])){
				echo $product['Product']['page_title'];
			}else{
				echo WEBSITE_NAME;
			}
			?></title>
	<link rel="shortcut icon" href="<?php echo $base_url?>img/favicon.ico">
	
	<?php
		echo $this->Html->css('bootstrap.min.css');
		echo $this->Html->css('style-front.css'); 
		echo $this->Html->css('icons.css');
		echo $this->Html->css('animate.css');
		echo $this->Html->css('responsive.css'); 
		

		?>
	<!-- Styles -->
	 <?php echo $this->Html->script('jquery-1.8.3.min.js'); ?>
	 <?php //echo $this->Html->script('bootstrap.min.js'); ?>
  	 <?php
		echo $this->Html->css('verticalmenu/vertical_menu.css'); 
	 ?>
	<?php echo $this->Html->script('vertical_menu.js'); ?> 
   <?php
		echo $this->Html->css('sidebar-menu.css'); 
	 ?>
   
</head>

<body>
	<div id="frame_">
	<div id="layout" class="full">
		<header id="header">
			 

			<div class="head">
				<div class="row clearfix">
					<div class="logo">
						<a href="<?php echo $base_url?>" title="Kevins Banners"><img src="<?php echo $base_url?>img/logo.png" alt="Official - Premium Multi-purpose HTML5 Template"></a>
					</div><!-- end logo -->

					<div class="social social-head">
						
						<a href="#" class="toptip" title="Facebook"><i class="icon-facebook"></i></a>
						<a href="#" class="toptip" title="Twitter"><i class="icon-twitter"></i></a>
						<a href="#" class="toptip" title="Linkedin"><i class="icon-linkedin"></i></a>
					</div><!-- end social -->

					<div class="info">
					<?php if($userData){ ?>
						<a class="singin"  href="<?php echo $base_url?>customers/logout"  >LOGOUT </a>
						<a class="singin"  href="<?php echo $base_url?>banners/upload" >CREATE FREE AD </a>   
						<a class="singin"  href="<?php echo $base_url?>banners/mybanners" >My Banners </a>  
						<a class="singin"  href="<?php echo $base_url?>customers/update" >My Account </a>  
 
					<?php }else{?>
						 
						<a class="singin" href="<?php echo $base_url?>customers/register">SIGN UP</a> 
						<a class="singin" href="<?php echo $base_url?>customers/login">&nbsp;SIGN IN</a>
						<a class="singin" href="<?php echo $base_url?>"> &nbsp;HOME</a> 
						<a class="singin" href="<?php echo $base_url?>banners/upload"> &nbsp;CREATE FREE AD</a>  
					<?php }?>
					
					</div><!-- end info -->
				</div><!-- row -->
			</div><!-- head -->

			<div class="headdown">
				<div class="row clearfix">
					<nav>
						<!--<ul class="sf-menu">
							<li><a href="<?php echo $base_url?>">Home</a></li>
							<li><a href="#">ABOUT US</a></li>
							<li><a href="#">BLOG</a></li>
							<li><a href="#">JOBS</a></li>
							<li><a href="#">CONTACT US</a></li>
							 <li><a href="#">HELP</a>
							
							<ul>
									<li><a href=" ">FAQ</a></li>
							<li><a href=" ">CUSTOMERS SUPPORT</a></li>
							<li><a href=" ">RETURN POLICY</a></li>
							<li><a href=" ">TERMS OF USE</a></li>
							<li><a href=" ">PRIVACY STATEMENT</a></li>
								</ul>
							</li> 
						</ul>--><!-- end menu -->
					</nav><!-- end nav -->

					<div class="search">
						 
							<input id="inputhead" name="search" type="text" onfocus="if (this.value=='Start Searching...') this.value = '';" onblur="if (this.value=='') this.value = 'Start Searching...';" value="Start Searching..." placeholder="Start Searching ...">
							<button type="submit"><i class="icon-search"></i></button>
						 
					</div>
				</div><!-- row -->
			</div><!-- headdown -->
		</header><!-- end header -->

		
		 <?php echo $this->Session->flash(); ?>
		   <?php echo $this->fetch('content'); ?>
		

		 <footer id="footer">
			<div class="row clearfix">
				 

				<div class="grid_4">
					<h3 class="col-title">COMPANY</h3><span class="liner"></span>

					<div class="widget-content">
						<ul class="links">
							<li><a href="index.html">Home</a></li>
							<li><a href="#">ABOUT US</a></li>
							<li><a href="#">BLOG</a></li>
							<li><a href="#">JOBS</a></li>
							<li><a href="#">CONTACT US</a></li>
						</ul>
					</div> 
				</div> 

				<div class="grid_4">
					<h3 class="col-title">HELPS</h3><span class="liner"></span>

					<div class="widget-content">
						<ul class="links">
							<li><a href="#">FAQ</a></li>
							<li><a href="#">CUSTOMERS SUPPORT</a></li>
							<li><a href="#">RETURN POLICY</a></li>
							<li><a href="#">TERMS OF USE</a></li>
							<li><a href="#">PRIVACY STATEMENT</a></li>
						</ul>
					</div> 
				</div> 
	
				<div class="grid_4">
					<h3 class="col-title">Follow Us</h3><span class="liner"></span>

					<div class="widget-content">
						<div class="social  " style="float: none;">
						
						<a href="#" class="toptip" title="Facebook"><i class="icon-facebook"></i></a>
						<a href="#" class="toptip" title="Twitter"><i class="icon-twitter"></i></a>
						<a href="#" class="toptip" title="Linkedin"><i class="icon-linkedin"></i></a>
					</div> 
					</div> 
				</div> 
			</div> 

			<div class="footer-last row mtf clearfix">
				<span class="copyright">© 2014 Inc. All Rights Reserved. </span>

				 

			</div> 

		</footer> <!-- end footer -->

	</div><!-- end layout -->
	</div><!-- end frame -->

<div id="toTop"><i class="icon-angle-up"></i></div><!-- Back to top -->
<!-- Scripts -->
 
	 
   
 
	
	<?php 
 
	
	$this->Js->get('#BannerCategoryId')->event('change', 
	$this->Js->request(array(
		'controller'=>'banners',
		'action'=>'getsubcategory'
		), array(
		'update'=>'#BannerSubCategoryId',
		'async' => true,
		'method' => 'post',
		'dataExpression'=>true,
		'data'=> $this->Js->serializeForm(array(
			'isForm' => true,
			'inline' => true
			))
		))
	);
	
	$this->Js->get('#BannerCountryId')->event('change', 
	$this->Js->request(array(
		'controller'=>'banners',
		'action'=>'getstate'
		), array(
		'update'=>'#BannerStateId',
		'async' => true,
		'method' => 'post',
		'dataExpression'=>true,
		'data'=> $this->Js->serializeForm(array(
			'isForm' => true,
			'inline' => true
			))
		))
	);
	
 ?> 
 <?php     echo $this->Js->writeBuffer();?>
 <script>
	$('#BannerPrice').keypress(function(event) {
	  if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
		event.preventDefault();
	  }
	});
	$('#BannerOffPercentage').keypress(function(event) {
	  if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
		event.preventDefault();
	  }
	});
	(function($) {
    $.fn.extend( {
        limiter: function(limit, elem) {
            $(this).on("keyup focus", function() {
                setCount(this, elem);
            });
            function setCount(src, elem) {
                var chars = src.value.length;
                if (chars > limit) {
                    src.value = src.value.substr(0, limit);
                    chars = limit;
                }
                elem.html( limit - chars );
            }
            setCount($(this)[0], elem);
        }
    });
})(jQuery);

var elem = $("#chars");
$("#BannerDescription").limiter(61, elem);

var elem1 = $("#chars1");
$("#BannerTitle").limiter(20, elem1);

var elem1 = $("#chars2");
$("#BannerLargeDescription").limiter(700, elem1);

 $(document).ready(function(){
		$('#image_upload_from_computer').hide();
		$('#image_upload_from_sample').hide();
	});
</script>
</body>
</html>