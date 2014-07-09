<div class="page-content">
			<div class="row official-shop checkout clearfix mbs">


				<div class="dialog">
        <div class="block">
            <p class="block-heading"><span style="color:#32C4DA;font-size:20px;">UPDATE YOUR ACCOUNT</span></p>
			<?php echo $this->Session->flash(); ?>
					<?php
					if(isset($msgs)) { ?>
					<div id="error">
						<p>Error: Please correct the below errors.</p>
						
							 <?php echo $this->Utility->showArr($msgs); ?>
						
					</div>
				<?php }?>
            <div class="block-body">
					<?php echo $this->Form->create('Customer',array('controllers'=>'customers','action'=>'update')); ?>
				<label>First Name</label>
                    
					<?php if(!empty($this->request->data['Customer']['billing_firstname']) && $this->request->data['Customer']['billing_firstname']!='First Name'){?>
						<?php echo $this->Form->input('billing_firstname', array('value'=>$this->request->data['Customer']['billing_firstname'],'label' => '','error' => false,'div' => false, 'class' => 'span12','style'=>'color:black')); ?>
					<?php }else{?>
						<?php echo $this->Form->input('billing_firstname', array('value'=>'','label' => '','div' => false,'error' => false, 'class' => 'span12','onfocus'=>"if(this.value=='First Name'){this.value='';this.style.color='#000';}",'onblur'=>"if(this.value==''){this.value='First Name';this.style.color='#AAA';}")); ?>
					<?php }?>
                    <label>Last Name</label>
                    <?php if(!empty($this->request->data['Customer']['billing_lastname']) && $this->request->data['Customer']['billing_lastname']!='Last Name'){?>
						<?php echo $this->Form->input('billing_lastname', array('value'=>$this->request->data['Customer']['billing_lastname'],'error' => false,'label' => '','div' => false, 'class' => 'span12','style'=>'color:black')); ?>
					<?php }else{?>
						<?php echo $this->Form->input('billing_lastname', array('value'=>'','label' => '','div' => false, 'class' => 'span12','error' => false,'onfocus'=>"if(this.value=='Last Name'){this.value='';this.style.color='#000';}",'onblur'=>"if(this.value==''){this.value='Last Name';this.style.color='#AAA';}")); ?>
					<?php }?>
                    <label>Email Address</label>
					<?php echo $this->Form->input('email', array('error'=>false,'label' => '', 'class' => 'span12', 'div' => false)); ?>
                     
                     
					 <?php
											 $options = array(
									'label' => 'Update!',
									'class' => 'btn btn-primary pull-right',
								);
									echo $this->Form->end($options); ?>			      
                    <!--<label class="remember-me"><input type="checkbox"> I agree with the <a href="terms-and-conditions.html">Terms and Conditions</a></label>-->
                    <div class="clearfix"></div>
                 
            </div>
        </div>
        
            </div>
				 
			</div><!-- row -->
		</div>