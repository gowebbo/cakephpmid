		<?php
$controller = $this->params['controller'];
$action = $this->params['action'];
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en-US"><!--<![endif]-->
<head>
	<title>Kevins Banners <?php 
			/*if(!empty($pageTitle)){
				//echo $pageTitle." | ".WEBSITE_NAME;
				echo "hello";
			}else if(!empty($product['Product']['page_title'])){
				
				echo "hello else if";
			}else{
				echo WEBSITE_NAME;
				
			}*/
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
 <!--[if IE]>
   <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
   <![endif]-->
   <!--Google Analytics-->
   <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-51241506-1', 'kevinsbanners.com');
  ga('send', 'pageview');

</script>
</head>

<body>
	<div id="frame_">
	<div id="layout" class="full">
		<?php if(($controller=='customers' && $action == 'login') || ($controller=='customers' && $action == 'register')){?>
			<header id="header">
			<div class="head_signin">
					<div class="logo_signin">
						<a href="<?php echo $base_url?>" title="Kevins Banners"><img src="<?php echo $base_url?>img/logo.png" alt="Official - Premium Multi-purpose HTML5 Template"></a>
					</div><!-- end logo -->
			
			</div>
			</header>
		<?php }else{?>
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
<!--<a class="singin" href="<?php echo $base_url?>"> &nbsp;HOME</a> 							-->
	 
						<?php }else{?>
							 
							<a class="singin" href="<?php echo $base_url?>customers/register">SIGN UP</a> 
							<a class="singin" href="<?php echo $base_url?>customers/login">&nbsp;SIGN IN</a>
							<!--<a class="singin" href="<?php echo $base_url?>"> &nbsp;HOME</a> -->
							<a class="singin" href="<?php echo $base_url?>banners/upload"> &nbsp;CREATE FREE AD</a>  
						<?php }?>
						
						</div><!-- end info -->
					</div><!-- row -->
				</div><!-- head -->

				<div class="headdown" style="height: 40px;">
					<div class="row clearfix">
						<nav>
							<ul class="sf-menu">
								<?php if(($controller=='homes' && $action == 'index') || ($controller=='banners' && $action == 'view')){?>
								
								<?php }else{?>
									<!--<li><a href="<?php echo $base_url?>">Home</a></li>
								<li><a href="#">ABOUT US</a></li>
								<li><a href="#">BLOG</a></li>
								<li><a href="#">JOBS</a></li>
								<li><a href="#">CONTACT US</a></li>
								 <li><a href="#">HELP</a></li>-->
								<?php }?>
								<!--<ul>
										<li><a href=" ">FAQ</a></li>
								<li><a href=" ">CUSTOMERS SUPPORT</a></li>
								<li><a href=" ">RETURN POLICY</a></li>
								<li><a href=" ">TERMS OF USE</a></li>
								<li><a href=" ">PRIVACY STATEMENT</a></li>
									</ul>-->
								</li> 
							</ul><!-- end menu -->
						</nav><!-- end nav -->

						<!--<div class="search">
							 
								<input id="inputhead" name="search" type="text" onfocus="if (this.value=='Start Searching...') this.value = '';" onblur="if (this.value=='') this.value = 'Start Searching...';" value="Start Searching..." placeholder="Start Searching ...">
								<button type="submit"><i class="icon-search"></i></button>
							 
						</div>-->
					</div><!-- row -->
				</div><!-- headdown -->
				<?php if($controller == 'homes' && $action="index"){?>
				<style>
				 iframe{
width:100%;
}
			#top_banner { 
clear: both;
text-align:center;
width: 60%;
margin: auto;
clear: left;
}
#top_banner iframe{
width:100%;
}

#top_banner img{
width:100%;
}
				</style>
				
		<div id="top_banner"> <!--style=" margin-bottom: 32px; margin-left: 315px; position: relative;">-->
<!--<a href='http://trkur.com/trk?o=9596&p=151727&s1=kevinsbanners2&s2=&s3='><img src='http://pixxur.com/151727/51560-728x90.jpg&s1=kevinsbanners2&s2=&s3=' /></a>-->
		<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- Kevins Banners Header Ad -->
<ins class="adsbygoogle"
     style="display:inline-block;width:728px;height:90px"
     data-ad-client="ca-pub-2586429484433327"
     data-ad-slot="5148982311"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
</div>
<?php }?>
			</header><!-- end header -->
			
		<?php }?>
		
<div style="clear:both;"></div>
		
		 <?php echo $this->Session->flash(); ?>
		   <?php echo $this->fetch('content'); ?>
		   <?php if($controller == 'homes' && $action="index"){?>
		   <style>
			#footer_banner {
text-align:center;
width: 40%;
margin: auto;
#footer_banner img {
width: 100%;
}
		   </style>
		<div id="footer_banner"> <!--style=" margin-bottom: 32px; margin-left: 448px; position: relative;"-->
<!--<a href='http://trkur.com/trk?o=9596&p=151727&s1=kevinsbanners2&s2=&s3='><img src='http://pixxur.com/151727/51560-728x90.jpg&s1=kevinsbanners2&s2=&s3=' /></a>-->
		<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
		<!-- Kevins Banners Footer -->
		<ins class="adsbygoogle"
			 style="display:inline-block;width:468px;height:60px"
			 data-ad-client="ca-pub-2586429484433327"
			 data-ad-slot="5288583117"
			 data-ad-format="auto"
			 ></ins>
		<script>
		(adsbygoogle = window.adsbygoogle || []).push({});
		</script>
</div>
<?php }?>
		 <footer id="footer">
			
			<div class="row clearfix">
				 

				<div class="grid_4">
					<h3 class="col-title">COMPANY</h3><span class="liner"></span>

					<div class="widget-content">
						<ul class="links">
							<li><a href="index.html">Home</a></li>
							<li><a href="#">ABOUT US</a></li>
							<li><a href="#">BLOG</a></li>
							<li><a href="<?php echo $base_url?>jobs">JOBS</a></li>
							<li><a href="<?php echo $base_url?>contact-us">CONTACT US</a></li>
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
				<span class="copyright">@2014 Kevins Banners. All Rights Reserved.</span>

				 

			</div> 

		</footer> <!-- end footer -->
<div class="headdown">
					<div class="row clearfix">
						<nav>
							<ul class="sf-menu">
								 
									<li>&#169; 2014 Kevins Banners. All Rights Reserved.</li>
									<li><a href="<?php echo $base_url?>">Home</a></li>
									<li><a href="<?php echo $base_url?>contact-us">CONTACT US</a></li>
								<li><a href="<?php echo $base_url?>about-us">ABOUT US</a></li>
								 <li><a href="<?php echo $base_url?>privacy-policy">PRIVACY</a></li>
								
								 <li><a href="<?php echo $base_url?>terms-conditions">TERMS</a></li>
								 <li><a href="<?php echo $base_url?>jobs">JOBS</a></li>
								 
								<ul>
										<li><a href=" ">FAQ</a></li>
								<li><a href=" ">CUSTOMERS SUPPORT</a></li>
								<li><a href=" ">RETURN POLICY</a></li>
								<li><a href=" ">TERMS OF USE</a></li>
								<li><a href=" ">PRIVACY STATEMENT</a></li>
									</ul>
								</li> 
							</ul><!-- end menu -->
						</nav><!-- end nav -->

						 
					</div><!-- row -->
				</div>
	</div><!-- end layout -->
	</div><!-- end frame -->

<div id="toTop"><i class="icon-angle-up"></i></div><!-- Back to top -->
<!-- Scripts -->

 
  <script type="text/javascript">
$(document).ready(function() {
	var s = $("#rightsidebar");
	var s1 = $("#leftsidebar");
	var s2 = $("#middle");
	var pos = s.position();	
	var pos1 = s1.position();	
		function scrollupdown()
	{
	 
		if ($(document).outerWidth()>=1024)
		{
			var windowpos = $(window).scrollTop();
			var Leftwindowpos=0;
			var Rightwindowpos=0;
 
			var stickermax = $(document).outerHeight() - $("footer").outerHeight()   - s.outerHeight() -245; //40 value is the total of the top and bottom margin
			 Leftwindowpos=350-windowpos;
			 if(Leftwindowpos<0)
			 {
				Leftwindowpos=0;
			 }
			 Rightwindowpos=350-windowpos;
			 if(Rightwindowpos<0)
			 {
				Rightwindowpos=0;
			 }
			 
			if ($(document).outerWidth()>1024)
			{
				s.css({position: "fixed",right: "175px",top: Rightwindowpos + "px", width:"230px"});
				s1.css({position: "fixed",left: "175px", top: Leftwindowpos + "px", width:"230px"});
				s2.css({position: "relative",left: "248px"});
				
			}else
			{
				s.css({position: "fixed",right: "15px",top: Rightwindowpos + "px",width:"230px"});
				s1.css({position: "fixed",left: "10px", top: Leftwindowpos + "px",width:"230px"});
				s2.css({position: "relative",left: "255px"});	
			}
			
		}
	}
 	
	//alert(stickermax);alert(stickermax1);
	$(window).scroll(function() {
		<?php if(count($Banners)>3){?>
		scrollupdown();
		<?php }?> 
	});
	 
});
</script>  
	 
  
 
	<script src="js/scripts.js"></script>
	<script>
		jQuery(document).ready(function() { 
			App.init();
		});
	</script>
</body>
</html>