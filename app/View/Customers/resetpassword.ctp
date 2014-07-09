<?php echo $this->Session->flash(); ?>
<div class="row-fluid">
	<div class="dialog">
		<div class="block">
			<p class="block-heading"><span style="color:#32C4DA;font-size:20px;">Reset Password</span></p>
			<div class="block-body">
					<?php  echo $this->Form->create('Customer',array('name'=>'CustomerResetPasswordForm','controllers'=>'customers','action'=>'resetpassword','language'=>$this->Session->read('Config.language'))); ?>
					<?php
					echo $this->Form->input('id', array('type'=>'hidden','value'=>$customer_id,'label' => '', 'class' => '', 'div' => false)); 
					echo $this->Form->input('resetpasswordid', array('type'=>'hidden','value'=>$resetpasswordid,'label' => '', 'class' => '', 'div' => false)); 
					?> 
					<label>New Password</label> 
					<?php echo $this->Form->input('newPassword', array('type' => 'password','class'=>'span12','label'=>false,'div'=>false)); ?>
					<label>Retype Password</label>
					<?php echo $this->Form->input('confirmPassword', array('type' => 'password','class'=>'span12','label'=>false,'div'=>false)); ?>
												 
					<?php echo $this->Form->submit('Change Password', array('class' => 'btn btn-primary pull-right', 'div' => false,'alt'=>'Change Password','title'=>'Change Password' ));?>	
												
					<!--<label class="remember-me"><input type="checkbox"> Remember me</label>-->
					<div class="clearfix"></div>
				</form>
			</div>
		</div> 
	 
	</div>
</div>
