<div class="page-content">
			<div class="row official-shop checkout clearfix mbs">


				<div class="dialog" style="margin:-4em auto 0;">
        <div class="block">
            <p class="block-heading"><span style="color:#32C4DA;font-size:20px;">Sign Up</span></p>
			<?php echo $this->Session->flash(); ?>
					<?php
					if(isset($msgs)) { ?>
					<div id="error">
						<p>Error: Please correct the below errors.</p>
						
							 <?php echo $this->Utility->showArr($msgs); ?>
						
					</div>
				<?php }?>
            <div class="block-body">
					<?php echo $this->Form->create('Customer',array('controllers'=>'customers','action'=>'register','onsubmit'=>'return checkterms();')); ?>
                    <label>First Name</label>
                    
					<?php if(!empty($this->request->data['Customer']['billing_firstname']) && $this->request->data['Customer']['billing_firstname']!='First Name'){?>
						<?php echo $this->Form->input('billing_firstname', array('value'=>$this->request->data['Customer']['billing_firstname'],'label' => '','div' => false, 'class' => 'span12','style'=>'color:black')); ?>
					<?php }else{?>
						<?php echo $this->Form->input('billing_firstname', array('value'=>'','label' => '','div' => false, 'class' => 'span12','onfocus'=>"if(this.value=='First Name'){this.value='';this.style.color='#000';}",'onblur'=>"if(this.value==''){this.value='First Name';this.style.color='#AAA';}")); ?>
					<?php }?>
                    <label>Last Name</label>
                    <?php if(!empty($this->request->data['Customer']['billing_lastname']) && $this->request->data['Customer']['billing_lastname']!='Last Name'){?>
						<?php echo $this->Form->input('billing_lastname', array('value'=>$this->request->data['Customer']['billing_lastname'],'label' => '','div' => false, 'class' => 'span12','style'=>'color:black')); ?>
					<?php }else{?>
						<?php echo $this->Form->input('billing_lastname', array('value'=>'','label' => '','div' => false, 'class' => 'span12','onfocus'=>"if(this.value=='Last Name'){this.value='';this.style.color='#000';}",'onblur'=>"if(this.value==''){this.value='Last Name';this.style.color='#AAA';}")); ?>
					<?php }?>
                    <label>Email Address</label>
					<?php echo $this->Form->input('email', array('error'=>false,'label' => '', 'class' => 'span12', 'div' => false)); ?>
                     
                    <label>Password</label>
                    <?php echo $this->Form->input('password1', array('label' => '', 'class' => 'span12', 'type' => 'password')); ?>
					 <label>Confirm Password</label>
                    <?php echo $this->Form->input('password2', array('label' => '', 'class' => 'span12', 'type' => 'password')); ?>
					<div>
					<div  style='float:left;'>
					<?php echo $this->Form->input('terms_conditions', array('type' => 'checkbox', 'class' => '', 'label' => false,'div' => false)); ?>
					</div>
					<div  style='float:left;margin-left:17px;margin-top: -15px;'>
					Please accept our terms of services.
					</div>
						
					</div>	
<div style="clear:both;"></div>					
                     <div>
					 <?php
											 $options = array(
									'label' => 'Sign Up!',
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