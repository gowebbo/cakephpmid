<?php 
echo $this->Form->create("User",array("controller"=>'users',"action"=>'login',"prefix"=>"admin","method"=>"POST","id"=>"userForm","name"=>"forgetpasswordform", "onsubmit"=>"return jQuery(this).valid();"));
?>
						<h1>Dashboard Login</h1>

						<div class="logbox curve3 shadow">
							<p>Username<br />
							 <?php echo $this->Form->input('User.username', array('class'=>'text1 curve1','label'=>false,'div'=>false)); ?>
							</p>
							<p>Password<br />
							 <?php echo $this->Form->input('User.password', array('class'=>'text1 curve1','label'=>false,'div'=>false)); ?>
             
							</p>
							<p style="text-align:right">
							 <?php echo $this->Form->submit('Log In', array('class' => 'button1 curve2', 'div' => false,'alt'=>'Login Now','title'=>'Login Now' ));?>	
							</p>
						</div>
<?php echo $this->Form->end(); ?>