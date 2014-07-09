<div class="customers form">
<?php echo $this->Form->create('Customer');?>
	<fieldset>
		<legend><?php echo __('Edit Customer'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('email');
		echo $this->Form->input('password');
		echo $this->Form->input('billing_firstname');
		echo $this->Form->input('billing_lastname');
		echo $this->Form->input('billing_address');
		echo $this->Form->input('billing_city');
		echo $this->Form->input('billing_state');
		echo $this->Form->input('billing_zipcode');
		echo $this->Form->input('billing_phone');
		echo $this->Form->input('shipping_firstname');
		echo $this->Form->input('shipping_lastname');
		echo $this->Form->input('shipping_address');
		echo $this->Form->input('shipping_city');
		echo $this->Form->input('shipping_state');
		echo $this->Form->input('shipping_zipcode');
		echo $this->Form->input('shipping_phone');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Customer.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Customer.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Customers'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Orders'), array('controller' => 'orders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Order'), array('controller' => 'orders', 'action' => 'add')); ?> </li>
	</ul>
</div>
