
<div id="main-content">
         <!-- BEGIN PAGE CONTAINER-->
         <div class="container-fluid">
            <!-- BEGIN PAGE HEADER-->   
                        <!-- END PAGE HEADER-->
            <!-- BEGIN PAGE CONTENT-->
            
            
            
            <div class="row-fluid">
                
                <div class="span10">
                    <!-- BEGIN widget-->
                    <div class="widget">
                     <!--   <div class="widget-title">
                            <h4><i class="icon-reorder"></i>File Upload</h4>
                        <span class="tools">
                           <a href="javascript:;" class="icon-chevron-down"></a>
                           <a href="javascript:;" class="icon-remove"></a>
                           </span>
                        </div>-->
                         <p class="block-heading"><span style="color:#32C4DA;font-size:20px;">Upload</span></p>
                        <div class="widget-body form">
                            <!-- BEGIN FORM-->
                             
							 <?php echo $this->Form->create('Banner',array('class'=>'form-horizontal','enctype'=>'multipart/form-data')); ?>
                              <?php echo $this->Form->input('Banner.id'); ?>
                           
								 <div class="control-group">
								  <label class="control-label">Title</label>
								  <div class="controls">
									<?php echo $this->Form->input('title', array('label'=>'','class' => 'span12')); ?>
				
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
								  <label class="control-label">Upload Image</label>
								  <div class="controls">
									 <?php echo $this->Form->input('image', array('label'=>'','type' => 'file','class' => 'span12')); ?>
									<font size="1px;">Image should be greater then 292x205</font>
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
                              <label class="control-label">Description</label>
                              <div class="controls">
                                 <?php echo $this->Form->textarea('description', array('label'=>'','rows'=>3,'class' => 'span6')); ?>
								<div id="chars">100</div>
							  </div>
                           </div>

                                 <div class="control-group">
                              <label class="control-label">Category</label>
                              <div class="controls">
								<?php
									  if(!isset($inchageList)){
										$inchageList=array();
									  }
									   echo $this->Form->input('category_id',array('options' => $inchageList,'label'=>false,'class' =>'span6','empty'=>"Choose a Category"));
								?>
                                 
                              </div>
                           </div>

                            <div class="control-group">
                              <label class="control-label">Sub Category</label>
                              <div class="controls">
								<span id="sub_category_div">
                                <?php 
									   echo $this->Form->input('sub_category_id',array('options' => array(),'label'=>false,'class' =>'span6','empty'=>"Choose a Sub Category"));
								?>
								</span>
								</div>
                              </div> 
                            <div class="control-group">
                              <label class="control-label">Country</label>
                              <div class="controls">
								<?php
									  if(!isset($inchageList1)){
										$inchageList1=array();
									  }
									   echo $this->Form->input('country_id',array('options' => $inchageList1,'label'=>false,'class' =>'span6','empty'=>"Choose a Country"));
								?>
                                 
                              </div>
                           </div>
						   
						   <div class="control-group">
                              <label class="control-label">State</label>
                              <div class="controls">
								<span id="state_div">
                                <?php 
									   echo $this->Form->input('state_id',array('options' => array(),'label'=>false,'class' =>'span6','empty'=>"Choose a State"));
								?>
								</span>
								</div>
                              </div> 
							  
							  <div class="control-group">
                              <label class="control-label">Pause</label>
                              <div class="controls">
								 
                                 <?php
									$options=array('1'=>'No','0'=>'Yes');
									echo $this->Form->input('pause',array('type'=>'select','label' => '', 'options' => $options, 'class' => 'span6')); 
								?>
                              </div>
                           </div>
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
                           
                        
                            
                            <!-- END FORM-->
                        </div>
                    </div>
                    <!-- END widget-->
                 

                </div>
            </div>

            
            
            <!-- END PAGE CONTENT-->         
         </div>
         <!-- END PAGE CONTAINER-->
      </div>
      <!-- END PAGE -->  
   </div>
   <script>
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