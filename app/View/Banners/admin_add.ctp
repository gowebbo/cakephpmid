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
	Add Banner
	<?php }else{?>
	Edit Banner
	<?php }?>
	</h2>
	<p>
	<?php if($add_type){?>
	This section allows you to add a new Banner.  Fields marked with <span class="req">*</span> are mandatory.</p>
	<?php }else{?>
	This section allows you to edit a Banner. Fields marked with * are mandatory.
	<?php }?>
	
	<?php echo $this->Form->create('Banner',array('enctype'=>'multipart/form-data')); ?>
	
	<table cellspacing="0" cellpadding="0" class="table1">
	 
		<tr>
			<td style="width:180px;">Title:<span class="req">*</span> </td>
			<td>
			<?php echo $this->Form->input('Banner.id'); ?>
			<?php echo $this->Form->input('title', array('label'=>'','class' => 'curve1 text1','style' => 'width:80%')); ?>
			</td>
		</tr>
		 
		 <tr>
			<td style="width:180px;">Price:<span class="req">*</span> </td>
			<td>
			 <?php echo $this->Form->input('price', array('label'=>'','class' => 'curve1 text1','style' => 'width:80%')); ?>
			</td>
		</tr>
		 <tr>
			<td style="width:180px;">Off Percentage(%): </td>
			<td>
			 <?php echo $this->Form->input('off_percentage', array('label'=>'','class' => 'curve1 text1','style' => 'width:80%')); ?>
			</td>
		</tr>
		<tr>
			<td>Small Description:</td>
			<td>
			<?php echo $this->Form->textarea('description', array('label'=>'','rows'=>8,'cols'=>5,'class' => 'curve1 tarea1', 'style' => 'width:80%;height:250px;')); ?>
			</td>
		</tr>
		<tr>
			<td>Long Description:</td>
			<td>
			<?php echo $this->Form->textarea('large_description', array('label'=>'','rows'=>8,'cols'=>5,'class' => 'curve1 tarea1', 'style' => 'width:80%;height:250px;')); ?>
			</td>
		</tr>
	</table>

	 

	<table cellspacing="0" cellpadding="0" class="table1">
		 
		<tr>
			<td style="width:180px;">Category:<span class="req">*</span> </td>
			<td>
				<?php
					  if(!isset($inchageList)){
						$inchageList=array();
					  }
					   echo $this->Form->input('category_id',array('options' => $inchageList,'label'=>false,'class' =>'combo curve1','empty'=>"--Select--",'onchange'=>'getSubCategory(this.value)'));
				?>
			</td>
		</tr>
		<tr>
			<td>Sub Category:<span class="req">*</span> </td>
			<td>
				<?php
					  
					   echo $this->Form->input('sub_category_id',array('options' => array(),'label'=>false,'class' =>'combo curve1','empty'=>"--Select--"));
				?>
			</td>
		</tr>
		   
	</table>
 

	<table cellspacing="0" cellpadding="0" class="table1">
		<tr>
			<td>Banner Type:<span class="req">*</span> </td>
			<td>
				<?php 
					  $template_banner = array('0'=>'Upload From Computer','1'=>'Select Sample Template');
					   echo $this->Form->input('template_banner',array('options' => $template_banner,'label'=>false,'class' =>'span6','empty'=>"Select Banner Type",'onchange'=>'selectBannerType(this.value);'));
				?>
			</td>
		</tr>
		 
			 	 
		<tr  id="image_upload_from_computer">
			<td style="width:180px;">Image:</td>
			<td>
			<?php echo $this->Form->input('image', array('label'=>'','type' => 'file','style' => '40')); ?>
			<font size="1px;">Image should be greater then 292x205</font>
			</td>
		</tr>
			 
		 
		<tr id="image_upload_from_sample">
			<td style="width:180px;">Select Banner Template:</td>
			<td>
			<?php
				  if(!isset($bannerList)){
					$bannerList=array();
				  }
				   echo $this->Form->input('template_image',array('options' => $bannerList,'label'=>false,'class' =>'span6','empty'=>"Choose a template"));
			?>
			</td>
		</tr>
		 
		<?php if(!$add_type && !empty($this->request->data['Banner']['image'])){?>
		<tr>
			<td></td>
			<td> 
			<a href="<?php echo $base_url?>/files/gallery/<?php echo $this->request->data['Banner']['image']?>" rel="facebox">
			<img width="100" height="100" src="<?php echo $base_url?>/files/gallery/<?php echo $this->request->data['Banner']['image']?>" alt=""  />
			</a>	<!--<p><input type="submit" class="curve3 button2" value="Remove" /></p>-->
			</td>
		</tr>
		<?php }?>
		  
		<tr>
			<td>Status:</td>
			<td>
			<?php
				$options=array('1'=>'Active','0'=>'InActive');
				echo $this->Form->input('status',array('type'=>'select','label' => '', 'options' => $options, 'class' => 'combo2 curve1')); 
			?>
			</td>
		</tr>

		<tr>
			<td>Premium Status:</td>
			<td>
			<?php
				$options_one =array('0'=>'Non-Premium','1'=>'Premium');
				echo $this->Form->input('is_premium',array('type'=>'select','label' => '', 'options' => $options_one, 'class' => 'combo2 curve1')); 
			?>
			</td>
		</tr>

		<tr>
			<td>Static:</td>
			<td>
			<?php
				$options_two=array('0'=>'Non-Static','1'=>'Static');
				echo $this->Form->input('static',array('type'=>'select','label' => '', 'options' => $options_two, 'class' => 'combo2 curve1')); 
			?>
			</td>
		</tr>
		
		<!--<tr>
			<td>Flagged this banner:</td>
			<td>
			<?php
				//$options=array('0'=>'No','1'=>'Yes');
				//echo $this->Form->input('is_flag',array('type'=>'select','label' => '', 'options' => $options, 'class' => 'combo2 curve1')); 
			?>
			</td>
		</tr>-->
		<tr>
			<td>
			<?php if($add_type){?>
				<?php
				 $options = array(
					'label' => 'Add Banner',
					'class' => 'curve2 button1',
				);
				echo $this->Form->end($options); ?>
			<?php }else{?>
				<?php
				 $options = array(
					'label' => 'Update Banner',
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
	function selectBannerType(value){
		if(value=='0'){
			$('#image_upload_from_computer').show();
			$('#image_upload_from_sample').hide();
		}else if(value =='1'){
			$('#image_upload_from_computer').hide();
			$('#image_upload_from_sample').show();
		}
	}
	window.addEventListener("load", function() { selectBannerType('<?php echo $this->request->data['Banner']['template_banner']?>'); }, false);
	
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