<script type="text/javascript">
$(document).ready(function(){
		    $('#paypalbutton').hide();
		});

function payPaypal(value) {
		if (value =='1' ) {
			$('#paypalbutton').show();
		}
		else if(value == '0') {
			$('#paypalbutton').hide();
		}
	}
</script>


<div class="page-content">
			<div class="row official-shop checkout clearfix mbs">


				<div class="dialog" style="width:auto;">
        <div class="block">
            <p class="block-heading"><span style="color:#32C4DA;font-size:20px;">Upload</span></p>
			<?php echo $this->Session->flash(); ?>
					<?php
					if(isset($msgs)) { ?>
					<div id="error">
						<p>Error: Please correct the below errors.</p>
						
							 <?php echo $this->Utility->showArr($msgs); ?>
						
					</div>
				<?php }?>
            <div class="block-body">
					 
							 <?php echo $this->Form->create('Banner',array('class'=>'form-horizontal','enctype'=>'multipart/form-data', )); ?>
                              <?php echo $this->Form->input('Banner.id'); ?>
                           
								 <div class="control-group">
								  <label class="control-label">Title</label>
								  <div class="controls">
									<?php echo $this->Form->input('title', array('label'=>'','class' => 'span12')); ?>
				<div id="chars1">60</div>
								  </div>
								  
									</div>
									<div class="control-group">
								  <label class="control-label">Price</label>
								  <div class="controls">
									<?php echo $this->Form->input('price', array('label'=>'','class' => 'span12')); ?>
				
								  </div>
								  
									</div>
									<div class="control-group">
								  <label class="control-label">Off Percentage(%)</label>
								  <div class="controls">
									<?php echo $this->Form->input('off_percentage', array('label'=>'','class' => 'span12')); ?>
								</div>
								  
									</div>
									
									<div class="control-group">
									  <label class="control-label">Banner</label>
									  <div class="controls">
										<?php
											
											  $template_banner = array('0'=>'Upload From Computer','1'=>'Select Sample Template');
											   echo $this->Form->input('template_banner',array('options' => $template_banner,'label'=>false,'style' =>'height:30px; ','empty'=>"Select Banner Type",'onchange'=>'selectBannerType(this.value);'));
										?>
									  </div> 
									</div>
									<div class="control-group" id="image_upload_from_computer">
								  <label class="control-label">Upload Image</label>
								  <div class="controls">
									 <?php echo $this->Form->input('image', array('label'=>'','type' => 'file','class' => 'span12')); ?>
									<font size="1px;">Image should be greater then 292x205</font>
								  </div>
								  <label class="control-label">Upload Image 1</label>
								  <div class="controls">
									 <?php echo $this->Form->input('image1', array('label'=>'','type' => 'file','class' => 'span12')); ?>
									<font size="1px;">Image should be greater then 292x205</font>
								  </div>
								  <label class="control-label">Upload Image 2</label>
								  <div class="controls">
									 <?php echo $this->Form->input('image2', array('label'=>'','type' => 'file','class' => 'span12')); ?>
									<font size="1px;">Image should be greater then 292x205</font>
								  </div>
									</div>
									
								<div class="control-group" id="image_upload_from_sample">
								  <label class="control-label">Select Banner Template</label>
								  <div class="controls">
									<?php
										  if(!isset($bannerList)){
											$bannerList=array();
										  }
										   echo $this->Form->input('template_image',array('options' => $bannerList,'label'=>false,'style' =>'height:30px; ','empty'=>"Choose a template"));
									?>
								  </div>
								  
								</div>
									
									<?php if(!$add_type && !empty($this->request->data['Banner']['image'])){?>
										<div class="control-group">
										<label class="control-label">&nbsp;</label>
										<div class="controls">
											<a href="<?php echo $base_url?>/files/gallery/<?php echo $this->request->data['Banner']['image']?>" rel="facebox">
											<img width="100" height="100" src="<?php echo $base_url?>/files/gallery/<?php echo $this->request->data['Banner']['image']?>" alt=""  />
											</a>
										</div>
									  
										</div>
                                <?php }?>
                                   <div class="control-group">
                              <label class="control-label">Short Description</label>
                              <div class="controls">
                                 <?php echo $this->Form->textarea('description', array('label'=>'','rows'=>3,'style' => 'height:100px;width:446px;')); ?>
								<div id="chars">61</div>
							  </div>
                           </div>
								<div class="control-group">
                              <label class="control-label">Full Description</label>
                              <div class="controls">
                                 <?php echo $this->Form->textarea('large_description', array('label'=>'','rows'=>3,'style' => 'height:100px;width:446px;')); ?>
								<div id="chars2">700</div>
							 </div>
                           </div>

                                 <div class="control-group">
                              <label class="control-label">Category</label>
                              <div class="controls">
								<?php
									  if(!isset($inchageList)){
										$inchageList=array();
									  }
									   echo $this->Form->input('category_id',array('options' => $inchageList,'label'=>false,'style' =>'height:30px; ','empty'=>"Choose a Category"));
								?>
                                 
                              </div>
                           </div>

                            <div class="control-group">
                              <label class="control-label">Sub Category</label>
                              <div class="controls">
								<span id="sub_category_div">
                                <?php 
									   echo $this->Form->input('sub_category_id',array('options' => array(),'label'=>false,'style' =>'height:30px; ','empty'=>"Choose a Sub Category"));
								?>
								</span>
								</div>
                              </div> 
                            <div class="control-group">
                              <label class="control-label">State</label>
                              <div class="controls">
								<?php
									  if(!isset($inchageList1)){
										$inchageList1=array();
									  }
									   echo $this->Form->input('country_id',array('options' => $inchageList1,'label'=>false,'style' =>'height:30px; ','empty'=>"Choose a State"));
								?>
                                 
                              </div>
                           </div>
						   
						   <div class="control-group">
                              <label class="control-label">City</label>
                              <div class="controls">
								<span id="state_div">
                                <?php 
									   echo $this->Form->input('state_id',array('options' => array(),'label'=>false,'style' =>'height:30px; ','empty'=>"Choose a city"));
								?>
								</span>
								</div>
                              </div> 
							  

							<?php if ($status_encoded == true) { ?>							  
							  <div class="control-group">
                              <label class="control-label">Active Banner (Click yes to make banner live)</label>
                              <div class="controls">
                                 <?php
									$options=array('0'=>'No','1'=>'Yes');
									echo $this->Form->input('pause',array('type'=>'select','label' => '', 'options' => $options, 'style' =>'height:30px; ')); 
								?>
                              </div>
                          		</div>
                          	<?php } ?>
                          	
                          	<div class="control-group">
                              <label class="control-label">Premium Banner(Only for 99 cents)</label>
                              <div class="controls">
                                 <?php
									$options_one=array('0'=>'No','1'=>'Yes');
									echo $this->Form->input('is_premium',array('type'=>'select','label' => '', 'options' => $options_one,'style' =>'
										height:30px;','empty'=>"Select Payment Through paypal",'onchange'=>'payPaypal(this.value);'));
								?>
                              </div>
                           </div>

                           <!--
                           <div id="paypalbutton" class="control-group" >
                           <label class="control-label">Pay Now</label>
                           <div class="controls">
                        		
                           		<?php echo $this->Paypal->button('Pay Now', array('test' => true, 'amount' => '12.00', 'item_name' => 'test item')); ?>
                    		-->

                    		<!--
                           <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top">
							<input type="hidden" name="cmd" value="_s-xclick">
							<input type="hidden" name="hosted_button_id" value="MNH8M7ZBRV3GW">
							<input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
							<img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
							</form>
                           	</div>
                           </div>
							-->




                           	<!-- 
                            <form  action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
							<input type="hidden" name="cmd" value="_s-xclick">
							<input type="hidden" name="hosted_button_id" value="2MXGBLB8JGW7W">
							<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
							<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
							</form>
							 </div>
                        	</div>
                       	-->
                           <div class="control-group">
                              <label class="control-label"></label>
                              <div class="controls">
                            
							<?php
							$options = array(
							'label' => 'Upload',
							'class' => 'btn btn-primary',
							);
							echo $this->Form->end($options); ?>							
                              </div>
                               
                           </div>				      
                    <!--<label class="remember-me"><input type="checkbox"> I agree with the <a href="terms-and-conditions.html">Terms and Conditions</a></label>-->
                    <div class="clearfix"></div>
                 
            </div>
        </div>
        
            </div>
				 
			</div><!-- row -->
		</div>
		
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

	function payPaypal(value) {
		if (value =='1' ) {
			$('#paypalbutton').show();
		}
		else if(value == '0') {
			$('#paypalbutton').hide();
		}
	}


	window.addEventListener("load", function() { selectBannerType('<?php echo $this->request->data['Banner']['template_banner']?>'); }, false);
	
   <?php if(!empty($this->request->data['Banner']['category_id'])){?>
	window.addEventListener("load", function() { getSubCategory('<?php echo $this->request->data['Banner']['category_id']?>'); }, false);
	<?php }?>
	<?php if(!empty($this->request->data['Banner']['country_id'])){?>
	window.addEventListener("load", function() { getState('<?php echo $this->request->data['Banner']['country_id']?>'); }, false);
	<?php }?>
	function getSubCategory(id){
	
		 $.ajax({
				  async:false,  
				  //data:$('#quoteform1').serialize(),
				  type:'GET',
				  url:'<?php echo $base_url?>banners/getsubcategory1/'+id,
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
	function getState(id){
	
		 $.ajax({
				  async:false,  
				  //data:$('#quoteform1').serialize(),
				  type:'GET',
				  url:'<?php echo $base_url?>banners/getstate1/'+id,
				  dataType:'json',
				  success: function(data){
					
					var newdata = data;
					var newOptions = data;
					
					var $el = $("#BannerStateId");
					$el.empty(); // remove old options
					
					
					$.each(newOptions, function(key, value) {
					  $el.append($("<option></option>")
						 .attr("value", value).text(key));
					});
					
					<?php if(!empty($this->request->data['Banner']['state_id'])){?>
						var theValue = '<?php echo $this->request->data['Banner']['state_id']?>';
						jQuery("#BannerStateId").val( theValue ).prop('selected',true);
						
						 
						
					<?php }?>
				}
			  });
	 
	}
	</script>