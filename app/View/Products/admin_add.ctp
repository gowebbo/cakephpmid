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
	Add Product
	<?php }else{?>
	Edit Product
	<?php }?>
	</h2>
	<p>
	<?php if($add_type){?>
	This section allows you to add a new product.  Fields marked with <span class="req">*</span> are mandatory.</p>
	<?php }else{?>
	This section allows you to edit a product. Fields marked with * are mandatory.
	<?php }?>
	
	<?php echo $this->Form->create('Product',array('enctype'=>'multipart/form-data')); ?>
	
	<table cellspacing="0" cellpadding="0" class="table1">
		<tr>
			<td colspan="2"><h5 class="curve1">Product Description</h5></td>
		</tr>
		<tr>
			<td style="width:180px;">Product Name:<span class="req">*</span> </td>
			<td>
			<?php echo $this->Form->input('Product.id'); ?>
			<?php echo $this->Form->input('name', array('onkeyup'=>'updateSlug()','label'=>'','class' => 'curve1 text1','style' => 'width:80%')); ?>
			</td>
		</tr>
		<tr>
			<td>Product Slug:<span class="req">*</span></td>
			<td>
			<?php echo $this->Form->input('slug', array('label'=>'','class' => 'curve1 text1','style' => 'width:80%')); ?>
				<p><small>The "slug" is the URL-friendly version of the name. It is usually all lowercase and contains only letters, numbers, and hyphens.</small></p>
			</td>
		</tr>
		<!--<tr>
			<td>Short Description:</td>
			<td>
			<?php echo $this->Form->textarea('short_description', array('label'=>'','rows'=>8,'cols'=>5,'class' => 'curve1 tarea1', 'style' => 'width:80%;height:70px;')); ?>
			</td>
		</tr>-->
		<tr>
			<td>Long Description:</td>
			<td>
			<?php echo $this->Form->textarea('long_description', array('label'=>'','rows'=>8,'cols'=>5,'class' => 'curve1 tarea1', 'style' => 'width:80%;height:250px;')); ?>
			</td>
		</tr>
	</table>

	<table cellspacing="0" cellpadding="0" class="table1">
		<tr>
			<td colspan="4"><h5 class="curve1">Product Details</h5></td>
		</tr>
		<tr>
			<td style="width:180px;">SKU:<span class="req">*</span> </td>
			<td  style="width:320px;">
			<?php echo $this->Form->input('sku', array('label'=>'','class' => 'curve1 text1','style' => 'width:100px')); ?>
			</td>
			
		</tr>
		<tr>
			<td>Price (Rs):<span class="req">*</span> </td>
			<td>
			<?php echo $this->Form->input('price', array('label'=>'','class' => 'curve1 text1','style' => 'width:100px')); ?>
			</td>
		</tr>
		 
		 
	</table>

	<table cellspacing="0" cellpadding="0" class="table1">
		<tr>
			<td colspan="2"><h5 class="curve1">Product Category/Occassions/Special Days/Festivals</h5></td>
		</tr>
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
		<tr>
			<td>Occassion:  </td>
			<td><small>(Hold down the Ctrl key to select more than one term)</small><br />
				<?php
					  if(!isset($inchageList1)){
						$inchageList1=array();
					  }
					  if(!isset($OccassionArray)){
						$OccassionArray=array();
					  }
					  echo $this->Form->input('occassion_id',array('options' => $inchageList1,'label'=>false,'class' =>'combo curve1','multiple'=>true,'style'=>'5','style'=> "height:auto;width:400px;",'selected'=> $OccassionArray));
				?>
				
			</td>
		</tr>
		<tr>
			<td>Special Days:  </td>
			<td><small>(Hold down the Ctrl key to select more than one term)</small><br />
				<?php
					  if(!isset($inchageList2)){
						$inchageList1=array();
					  }
					  if(!isset($ProductSpecialDayArray)){
						$ProductSpecialDayArray=array();
					  }
					  echo $this->Form->input('special_day_id',array('options' => $inchageList2,'label'=>false,'class' =>'combo curve1','multiple'=>true,'style'=>'5','style'=> "height:auto;width:400px;",'selected'=> $ProductSpecialDayArray));
				?>
				
			</td>
		</tr>
		<tr>
			<td>Festival:  </td>
			<td><small>(Hold down the Ctrl key to select more than one term)</small><br />
				<?php
					  if(!isset($inchageList3)){
						$inchageList3=array();
					  }
					  if(!isset($ProductFestivalArray)){
						$ProductFestivalArray=array();
					  }
					  echo $this->Form->input('festival_id',array('options' => $inchageList3,'label'=>false,'class' =>'combo curve1','multiple'=>true,'style'=>'5','style'=> "height:auto;width:400px;",'selected'=> $ProductFestivalArray));
				?>
				
			</td>
		</tr>
	</table>

	<table cellspacing="0" cellpadding="0" class="table1">
		<tr>
			<td colspan="2"><h5 class="curve1">Search Engine Optimization</h5></td>
		</tr>
		<tr>
			<td style="width:180px;">Page Title:</td>
			<td>
			<?php echo $this->Form->input('page_title', array('label'=>'','class' => 'curve1 text1','style' => 'width:80%')); ?>
			</td>
		</tr>
		<tr>
			<td>Meta Description:</td>
			<td>
			<?php echo $this->Form->textarea('meta_description', array('label'=>'','rows'=>8,'cols'=>5,'class' => 'curve1 tarea1', 'style' => 'width:80%;height:70px;')); ?>
			</td>
		</tr>
		<tr>
			<td>Meta Keyword:</td>
			<td>
			<?php echo $this->Form->textarea('meta_keyword', array('label'=>'','rows'=>8,'cols'=>5,'class' => 'curve1 tarea1', 'style' => 'width:80%;height:70px;')); ?>
			</td>
		</tr>
	</table>


	<table cellspacing="0" cellpadding="0" class="table1">
		<tr>
			<td colspan="2"><h5 class="curve1">Product Images</h5></td>
		</tr>
		<tr>
			<td style="width:180px;">Thumbnail Image:</td>
			<td>
			<?php echo $this->Form->input('thumbnail_image_filepath', array('label'=>'','type' => 'file','style' => '40')); ?>
			</td>
		</tr>
		<?php if(!$add_type && !empty($this->request->data['Product']['thumbnail_image_filepath'])){?>
		<tr>
			<td></td>
			<td> 
			<a href="<?php echo $base_url?>/files/products/<?php echo $this->request->data['Product']['thumbnail_image_filepath']?>" rel="facebox">
			<img width="100" height="100" src="<?php echo $base_url?>/files/products/<?php echo $this->request->data['Product']['thumbnail_image_filepath']?>" alt=""  />
			</a>	<!--<p><input type="submit" class="curve3 button2" value="Remove" /></p>-->
			</td>
		</tr>
		<?php }?>
		<tr>
			<td>Product Image: </td>
			<td>
			<?php echo $this->Form->input('full_image_filepath', array('label'=>'','type' => 'file','style' => '40')); ?>
			</td>
		</tr>
		<?php if(!$add_type && !empty($this->request->data['Product']['full_image_filepath'])){?>
		<tr>
			<td></td>
			<td> 
			<a href="<?php echo $base_url?>/files/products/<?php echo $this->request->data['Product']['full_image_filepath']?>" rel="facebox">
			<img width="100" height="100" src="<?php echo $base_url?>/files/products/<?php echo $this->request->data['Product']['full_image_filepath']?>" alt=""  />
			</a>	<!--<p><input type="submit" class="curve3 button2" value="Remove" /></p>-->
			</td>
		</tr>
		<?php }?>
		<tr>
			<td>Featured:</td>
			<td>
			<?php
				$options=array('0'=>'No','1'=>'Yes');
				echo $this->Form->input('featured',array('type'=>'select','label' => '', 'options' => $options, 'class' => 'combo2 curve1')); 
			?>
			</td>
		</tr>
		<tr>
			<td>Status:</td>
			<td>
			<?php
				$options=array('0'=>'Active','1'=>'InActive');
				echo $this->Form->input('active',array('type'=>'select','label' => '', 'options' => $options, 'class' => 'combo2 curve1')); 
			?>
			</td>
		</tr>
		<tr>
			<td>
			<?php if($add_type){?>
				<?php
				 $options = array(
					'label' => 'Add Product',
					'class' => 'curve2 button1',
				);
				echo $this->Form->end($options); ?>
			<?php }else{?>
				<?php
				 $options = array(
					'label' => 'Update Product',
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
	function updateSlug(){
		var value = $('#ProductName').val();
		
		value=value.replace(/ /g,"-");
		
		value=value.toLowerCase();
		$('#ProductSlug').val(value);
	}
	function showShippingUnit(){
		var val = $('#ProductProductType').val();
		if(val=='Standard'){
			$("#unit_div").hide();
			$("#weight_div").show();
			$("#ProductShippingUnits").val('0');
		}else{
			$("#unit_div").show();
			$("#weight_div").hide();
			$("#ProductWeight").val('0');
		}
	}
	</script>
	<script>
	<?php if(!empty($this->request->data['Product']['category_id'])){?>
	window.addEventListener("load", function() { getSubCategory('<?php echo $this->request->data['Product']['category_id']?>'); }, false);
	<?php }?>
	function getSubCategory(id){
	
		 $.ajax({
				  async:false,  
				  //data:$('#quoteform1').serialize(),
				  type:'GET',
				  url:'<?php echo $base_url?>admin/products/getsubcategory/'+id,
				  dataType:'json',
				  success: function(data){
					
					var newdata = data;
					var newOptions = data;
					
					var $el = $("#ProductSubCategoryId");
					$el.empty(); // remove old options
					
					
					$.each(newOptions, function(key, value) {
					  $el.append($("<option></option>")
						 .attr("value", value).text(key));
					});
					
					<?php if(!empty($this->request->data['Product']['sub_category_id'])){?>
						var theValue = '<?php echo $this->request->data['Product']['sub_category_id']?>';
						jQuery("#ProductSubCategoryId").val( theValue ).prop('selected',true);
						
						 
						
					<?php }?>
				}
			  });
	 
	}
	</script>