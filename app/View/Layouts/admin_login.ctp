<!DOCTYPE HTML>
<html>
<head>
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
            echo $this->Html->css('login.css');
    ?>
    <!--[if lte IE 7]>
    <?php
            echo $this->Html->css('ie.css');
    ?>
    <![endif]-->
      <?php echo $this->Html->script('jquery-1.3.2.min'); ?>
    <?php echo $this->Html->script('admin_script'); ?>

</head>

<body>

<div id="wrap" >
	<table cellspacing="0" cellpadding="0" class="table">
		<tr>
			<td>
				 <div class="main">
					<?php echo $this->Session->flash(); ?>

					<?php echo $this->fetch('content'); ?>
				</div>
				<br /><br /><br /><br /><br /><br />
			</td>
		</tr>
	</table>
</div>



</body>
</html>



