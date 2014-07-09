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
	<h2>
	<?php if($add_type){?>
	Add Template Banner
	<?php }else{?>
	Edit Template Banner
	<?php }?>
	</h2>
	<p>
	<?php if($add_type){?>
	This section allows you to add a new Template Banner.  Fields marked with <span class="req">*</span> are mandatory.</p>
	<?php }else{?>
	This section allows you to edit a Template Banner. Fields marked with * are mandatory.
	<?php }?>
	
	<?php echo $this->Form->create('TemplateBanner',array('enctype'=>'multipart/form-data')); ?>
	
	<table cellspacing="0" cellpadding="0" class="table1">
	 
		 

	<table cellspacing="0" cellpadding="0" class="table1">
		
		<tr>
			<td style="width:180px;">Title:<span class="req">*</span> </td>
			<td>
			<?php echo $this->Form->input('TemplateBanner.id'); ?>
			<?php echo $this->Form->input('title', array('label'=>'','class' => 'curve1 text1','style' => 'width:80%')); ?>
			</td>
		</tr>
		 
		<tr>
			<td style="width:180px;">Image:</td>
			<td>
			<?php echo $this->Form->input('image', array('label'=>'','type' => 'file','style' => '40')); ?>
			<font size="1px;">Image should be greater then 292x205</font>
			</td>
		</tr>
		<?php if(!$add_type && !empty($this->request->data['TemplateBanner']['image'])){?>
		<tr>
			<td></td>
			<td> 
			<a href="<?php echo $base_url?>/files/gallery/<?php echo $this->request->data['TemplateBanner']['image']?>" rel="facebox">
			<img width="100" height="100" src="<?php echo $base_url?>/files/gallery/<?php echo $this->request->data['TemplateBanner']['image']?>" alt=""  />
			</a>	<!--<p><input type="submit" class="curve3 button2" value="Remove" /></p>-->
			</td>
		</tr>
		<?php }?>
		   
		<tr>
			<td>
			<?php if($add_type){?>
				<?php
				 $options = array(
					'label' => 'Add Template Banner',
					'class' => 'curve2 button1',
				);
				echo $this->Form->end($options); ?>
			<?php }else{?>
				<?php
				 $options = array(
					'label' => 'Update Template Banner',
					'class' => 'curve2 button1',
				);
				echo $this->Form->end($options); ?>
			<?php }?>
			<?php //echo $this->Form->submit('Add Product', array('type'=>'submit','class'=>'curve2 button1'));?>
			</td>
			 <td style="vertical-align:middle; "><?php echo $this->Html->link('Cancel', array('action' => 'index'), array('class' => 'curve2 button1'));?></td>
			  <td></td>
        <td></td>
		</tr>
	</table>
	<script>
	 
	</script>
	<script>
	<?php if(!empty($this->request->data['Banner']['category_id'])){?>
	window.addEventListener("load", function() { getSubCategory('<?php echo $this->request->data['Banner']['category_id']?>'); }, false);
	<?php }?>
	function getSubCategory(id){
	
		 $.ajax({
				  async:false,  
				  //data:$('#quoteform1').serialize(),
				  type:'GET',
				  url:'<?php echo $base_url?>admin/banners/getsubcategory/'+id,
				  dataType:'json',
				  success: function(data){
					
					var newdata = data;
					var newOptions = data;
					
					var $el = $("#BannerSubCategoryId");
					$el.empty(); // remove old options
					
					
					$.each(newOptions, function(key, value) {
					  $el.append($("<option></option>")
						 .attr("value", value).text(key));
					});
					
					<?php if(!empty($this->request->data['Banner']['sub_category_id'])){?>
						var theValue = '<?php echo $this->request->data['Banner']['sub_category_id']?>';
						jQuery("#BannerSubCategoryId").val( theValue ).prop('selected',true);
						
						 
						
					<?php }?>
				}
			  });
	 
	}
	</script>