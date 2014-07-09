<div class="page-content">
			<div class="row official-shop checkout clearfix mbs">

			
			<?php echo $this->Session->flash(); ?>
				<div class="dialog" style="margin:-4em auto 0;">
<div class="dialog">
		<div class="block">
			<p class="block-heading"><span style="color:#32C4DA;font-size:20px;">Sign In</span></p>
			<div class="block-body">
					<?php 
						echo $this->Form->create("Customer",array("controller"=>'customers',"action"=>'login',"method"=>"POST","id"=>"userForm","name"=>"loginform"));
					?>
					<label>Email</label> 
					<?php echo $this->Form->input('Customer.email', array('class'=>'span12','label'=>false,'div'=>false)); ?>
					 			<label>Password</label>
					<?php echo $this->Form->input('Customer.password', array('class'=>'span12','label'=>false,'div'=>false)); ?>
												 											 
					<?php echo $this->Form->submit('Sign In', array('class' => 'btn btn-primary pull-right', 'div' => false,'alt'=>'Login Now','title'=>'Login Now' ));?>	
					
												
					<!--<label class="remember-me"><input type="checkbox"> Remember me</label>-->
					<div class="clearfix"></div>
				</form>
			</div>
		</div>
	    
		<p><a href="<?php echo $base_url?>customers/forgot_password">Forgot your password?</a></p> 
	</div>
 

				 

			</div><!-- row -->
		</div><!-- end page content -->
 <!-- end footer -->

	</div>