<div class="customers index">
	<h2><?php echo __('Customers');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('email');?></th>
			<th><?php echo $this->Paginator->sort('password');?></th>
			<th><?php echo $this->Paginator->sort('billing_firstname');?></th>
			<th><?php echo $this->Paginator->sort('billing_lastname');?></th>
			<th><?php echo $this->Paginator->sort('billing_address');?></th>
			<th><?php echo $this->Paginator->sort('billing_city');?></th>
			<th><?php echo $this->Paginator->sort('billing_state');?></th>
			<th><?php echo $this->Paginator->sort('billing_zipcode');?></th>
			<th><?php echo $this->Paginator->sort('billing_phone');?></th>
			<th><?php echo $this->Paginator->sort('shipping_firstname');?></th>
			<th><?php echo $this->Paginator->sort('shipping_lastname');?></th>
			<th><?php echo $this->Paginator->sort('shipping_address');?></th>
			<th><?php echo $this->Paginator->sort('shipping_city');?></th>
			<th><?php echo $this->Paginator->sort('shipping_state');?></th>
			<th><?php echo $this->Paginator->sort('shipping_zipcode');?></th>
			<th><?php echo $this->Paginator->sort('shipping_phone');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($customers as $customer): ?>
	<tr>
		<td><?php echo h($customer['Customer']['id']); ?>&nbsp;</td>
		<td><?php echo h($customer['Customer']['email']); ?>&nbsp;</td>
		<td><?php echo h($customer['Customer']['password']); ?>&nbsp;</td>
		<td><?php echo h($customer['Customer']['billing_firstname']); ?>&nbsp;</td>
		<td><?php echo h($customer['Customer']['billing_lastname']); ?>&nbsp;</td>
		<td><?php echo h($customer['Customer']['billing_address']); ?>&nbsp;</td>
		<td><?php echo h($customer['Customer']['billing_city']); ?>&nbsp;</td>
		<td><?php echo h($customer['Customer']['billing_state']); ?>&nbsp;</td>
		<td><?php echo h($customer['Customer']['billing_zipcode']); ?>&nbsp;</td>
		<td><?php echo h($customer['Customer']['billing_phone']); ?>&nbsp;</td>
		<td><?php echo h($customer['Customer']['shipping_firstname']); ?>&nbsp;</td>
		<td><?php echo h($customer['Customer']['shipping_lastname']); ?>&nbsp;</td>
		<td><?php echo h($customer['Customer']['shipping_address']); ?>&nbsp;</td>
		<td><?php echo h($customer['Customer']['shipping_city']); ?>&nbsp;</td>
		<td><?php echo h($customer['Customer']['shipping_state']); ?>&nbsp;</td>
		<td><?php echo h($customer['Customer']['shipping_zipcode']); ?>&nbsp;</td>
		<td><?php echo h($customer['Customer']['shipping_phone']); ?>&nbsp;</td>
		<td><?php echo h($customer['Customer']['created']); ?>&nbsp;</td>
		<td><?php echo h($customer['Customer']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $customer['Customer']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $customer['Customer']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $customer['Customer']['id']), null, __('Are you sure you want to delete # %s?', $customer['Customer']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Customer'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Orders'), array('controller' => 'orders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Order'), array('controller' => 'orders', 'action' => 'add')); ?> </li>
	</ul>
</div>
