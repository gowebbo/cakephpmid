 <?php
$controller = $this->params['controller'];
$action = $this->params['action'];
?>
 <center><h2 class="h2_color">
 <?php if($controller == 'banners' && $action == "mybanners"){?>
		MY BANNERS
		<?php }else{?>
	  <?php if(empty($sub_cat_name)){?>
		  DAILY DEALS
		  <?php }else{
			 echo $sub_cat_name;
		  ?>
		  <?php }?>
		  <?php }?>
 </h2></center>
	             <center><h3 class="day"><?php echo date('D M d');?></h3></center>