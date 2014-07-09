<?php
/**
 * @var $this View
 */
?>

<?php 
$this->Paginator->options(array(
	'update' => '#content',
	'evalScripts' => true,
	'before' => $this->Js->get('#busy-indicator')->effect('fadeIn', array('buffer' => false)),
	'complete' => $this->Js->get('#busy-indicator')->effect('fadeOut', array('buffer' => false)),
	'url' => $savecrit
	));
	
?>
<div id="content">
<?php echo $this->Form->create('Product'); ?>
		<!-- page title -->
		<table cellspacing="0" cellpadding="0" style="width: 100%">
			<tr>
				<td><h2>Manage Products</h2></td>
				<td class="searches">
					<?php echo $this->Form->input('search_value', array('div'=>false,'label' => false, 'class' => 'curve1 text2','onblur'=>"if(this.value == '') {this.value='Product Name or Sku';}",'onfocus'=>"if(this.value == 'Product Name or Sku') {this.value='';}",'value'=>'Product Name or Sku')); ?>
					<?php
					echo $this->Js->submit('Search',array(
						  'before' => $this->Js->get('#busy-indicator')->effect('fadeIn', array('buffer' => false)),
						  'complete' => $this->Js->get('#busy-indicator')->effect('fadeOut', array('buffer' => false)),
						   'update' => '#content',
						   'class'=>'curve3 button2',
							'div'=>false,'label' => false
						));
					?>
				</td>
			</tr>
		</table>
		<?php echo $this->Form->end(); ?>
		<!-- manage options -->
	<?php echo  $this->Form->create('Product');?>
	<table cellspacing="0" cellpadding="0" class="table3">
		<tr>
			<td class="filters">
	<?php

	  
		echo $this->Form->input('filter_status', array('type' => 'select', 'label' => '', 'options' => array('all' => 'Select Status', 'active' => 'Active', 'inactive' => 'InActive'), 'class' => 'combo2 curve1','div'=>false)); ?>
		&nbsp;
		<?php
		//echo $this->Form->end(array('label'=>'Filter','class'=> 'curve3 button2','div'=>false));
	 ?>
	 <?php
		echo $this->Js->submit('Filter',array(
			  'before' => $this->Js->get('#busy-indicator')->effect('fadeIn', array('buffer' => false)),
			  'complete' => $this->Js->get('#busy-indicator')->effect('fadeOut', array('buffer' => false)),
			   'update' => '#content',
			   'class'=>'curve3 button2',
				'div'=>false,'label' => false
			));
		?>

			</td>
			<td></td>
			<td></td>
			<td></td>
			<td class="records-total">
				Total Records: <b>    <?php
		echo $this->Paginator->counter(array(
											'format' => __('{:count}')
									   ));
				?></b>
			</td>
		</tr>
	</table>
	<?php echo $this->Form->end(); ?>
			<table cellpadding="0" cellspacing="0" class="table2 curve1">
			<tr>
					<th><?php echo $this->Paginator->sort('sku','SKU');?></th>
					<th><?php echo $this->Paginator->sort('category_id','Category');?></th>
					<th><?php echo $this->Paginator->sort('sub_category_id','Sub Category');?></th>
					<th><?php echo $this->Paginator->sort('name','Product Name');?></th>
					<th><?php echo $this->Paginator->sort('price','Price');?></th>
					<th><?php echo $this->Paginator->sort('active','Status');?></th>
					<th class="actions"><?php echo __('Actions');?></th>
			</tr>
			<?php
			foreach ($products as $product): ?>
			<tr> 
				<td><?php echo h($product['Product']['sku']); ?>&nbsp;</td>
				<td><?php echo h($product['Category']['name']); ?>&nbsp;</td>
				<td><?php echo h($product['SubCategory']['name']); ?>&nbsp;</td>
				<td><?php echo h($product['Product']['name']); ?>&nbsp;</td>
				<td>Rs. <?php echo h(number_format($product['Product']['price'], 2)); ?>&nbsp;</td>
				<td><?php 
						if(h($product['Product']['active']==0)){
							echo 'Active'; 
						}else if(h($product['Product']['active']==1)){
							echo 'InActive'; 
						}
						?>&nbsp;</td>
				<td class="actions">
					<?php echo $this->Html->link(__('Edit'), array('action' => 'add', $product['Product']['id'])); ?> |
					<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $product['Product']['id']), null, __('Are you sure you want to delete # %s?', $product['Product']['id'])); ?>
				</td>
			</tr>
		<?php endforeach; ?>
			<?php if(count($products)==0){?>
			<tr>
			<td colspan="10" align="center">
			No records found
			</td>
			</tr>
			<?php }?>
			</table>
			<table cellspacing="0" cellpadding="0" class="table4">
			<tr>
				<td></td>
				
				<td class="pagnavi">
					<?php if($this->Paginator->numbers(array('separator' => ''))){?>
						<?php echo $this->Paginator->prev(__('<<', true)); ?>
						&nbsp;<?php echo $this->Paginator->numbers(array('separator' => '')); ?>&nbsp;
						<?php echo $this->Paginator->next(__('>>', true)); ?>
					<?php }?>
				</td>
			</tr>
			</table>
			<div id="busy-indicator" style="background:#fff;opacity:0.5;filter: alpha(opacity=50);padding-top:20%;position:absolute;top:0;left:0;text-align:center;vertical-align:middle; height:60%;width:100%;display:none;">
			<?php echo $this->Html->image("indicator.gif",array('style'=>'opacity:1.0 !important;filter: alpha(opacity=100) !important')); ?>
			</div>
			<?php     echo $this->Js->writeBuffer();?>
</div>
