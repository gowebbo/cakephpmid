<!DOCTYPE html>
<html lang="en">
  <head>
  <link rel="shortcut icon" href="<?php echo $base_url?>img/favicon.ico">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Bootbusiness | Short description about company">
    <meta name="author" content="Your name">
    <title><?php 
			if(!empty($pageTitle)){
				echo $pageTitle." | ".WEBSITE_NAME;
			}else if(!empty($product['Product']['page_title'])){
				echo $product['Product']['page_title'];
			}else{
				echo WEBSITE_NAME;
			}
			?></title>
    <!-- Bootstrap -->
	<?php
		echo $this->Html->css('login/bootstrap.css');
		echo $this->Html->css('login/theme.css');
		echo $this->Html->css('login/font-awesome.css'); 
		echo $this->Html->css('style-front.css'); 
		 
    ?> 
		<?php echo $this->Html->script('jquery-1.7.2.min.js'); ?>
		<style type="text/css">
        #line-chart {
            height:300px;
            width:800px;
            margin: 0px auto;
            margin-top: 1em;
        }
        .brand { font-family: georgia, serif; }
        .brand .first {
            color: #ccc;
            font-style: italic;
        }
        .brand .second {
            color: #fff;
            font-weight: bold;
        }
    </style>
	  <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
	    <link rel="shortcut icon" href="../assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
  </head>
  <body>
  <div class="navbar">
        <div class="tophead" >
		<a href="<?php echo $base_url?>">
<img src="<?php echo $base_url?>img/logo.png">        
        </a>
        </div>
    </div>
      <?php echo $this->fetch('content'); ?>
 
	<?php echo $this->Html->script('bootstrap.js'); ?>
    <script type="text/javascript">
        $("[rel=tooltip]").tooltip();
        $(function() {
            $('.demo-cancel-click').click(function(){return false;});
        });
    </script>
    
  </body>
</html>
