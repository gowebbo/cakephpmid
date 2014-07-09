<?php echo $this->Session->flash(); ?>
<div class="row-fluid">
	<div class="dialog">
		<div class="block">
			<p class="block-heading"><span style="color:#32C4DA;font-size:20px;">Forgot Password</span></p>
			<div class="block-body">
					<?php echo $this->Form->create('Customer',array('controllers'=>'customers','action'=>'forgot_password')); ?>
			
					<label>Email</label> 
					<?php echo $this->Form->input('Customer.email', array('class'=>'span12','label'=>false,'div'=>false)); ?>
					 <input class="btn btn-primary pull-right" type="submit" value="Get Password" />							
					<!--<label class="remember-me"><input type="checkbox"> Remember me</label>-->
					<div class="clearfix"></div>
				</form>
			</div>
		</div>
	  <!--  <p class="pull-right" style=""><a href="http://www.portnine.com" target="blank">Theme by Portnine</a></p>
		<p><a href="reset-password.html">Forgot your password?</a></p>-->
	</div>
</div>
