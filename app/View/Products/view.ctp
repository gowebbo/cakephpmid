<?php
		echo $this->Html->css('facebox/facebox.css');
?>
<?php echo $this->Html->script('facebox/facebox'); ?>
<script type="text/javascript">
jQuery(document).ready(function($) {
  $('a[rel*=facebox]').facebox({
	loadingImage : '<?php echo $base_url?>/img/loading.gif',
	closeImage   : '<?php echo $base_url?>/img/closelabel.png'
  })
})
</script>
<div id="center">
<?php echo $this->Session->flash(); ?>
	<div class="products">
	<div style="height:750px">
   <div style="float:left; width:30%">
   <a href="<?php echo $base_url?>/files/products/<?php echo $product['Product']['full_image_filepath']?>" rel="facebox">
	<img style="border:0;" width="200" height="250" src="<?php echo $base_url?>/files/products/<?php echo $product['Product']['full_image_filepath']?>" alt=""  />
	</a>
     </div>
   <?php echo $this->Form->create('Cart', array('controller'=>'carts','action' => 'add','name'=>'form_'. $product['Product']['id'])); ?>
	<?php echo $this->Form->input('qnty', array('type'=>'hidden','value' => 1)); ?>
	<?php echo $this->Form->input('product_id', array('type' => 'hidden', 'value' => $product['Product']['id'])); ?>

   <div style="float:right; width:60%">
		<h1 style="color:#E9274C; font-size:160%; margin-left:30px; font-family:calibri"><?php echo $product['Product']['name']?></h1><br>
		<p style="margin-left:30px; font-size:12px;">Item Code : <?php echo $product['Product']['sku']?></p>	
		<p style="margin-left:30px; margin-top:10px; border-bottom: thin solid #ccc; height:10px;"></p>
		<p style="margin-left:30px; margin-top:20px; text-align:justify; font-family:calibri; font-size:13px;"><?php echo $product['Product']['long_description']?></p>
		<p style="margin-left:30px; font-size:18px; margin-top:20px;">PRICE : <span style="color:#E9274C;">Rs <?php echo number_format($product['Product']['price'],2)?>/-</span></p>
		<p style="margin-left:30px; font-size:18px; margin-top:20px;">
		 <input src="img/buy.jpg" type="image" value="Add to cart"   />
						 </p>

   </div>
   </form>
   <div style="clear:both; border-bottom:thin solid #ccc; width:100%; height:35px; "></div>
   </div>
   </div>
</div>