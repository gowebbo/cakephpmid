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
<?php echo $this->Form->create('Banner'); ?>
		<!-- page title -->
		<table cellspacing="0" cellpadding="0" style="width: 100%">
			<tr>
				<td><h2>Premium Ads Listing</h2></td>
				<td class="searches">
					<?php echo $this->Form->input('search_value', array('div'=>false,'label' => false, 'class' => 'curve1 text2','onblur'=>"if(this.value == '') {this.value='Banner title';}",'onfocus'=>"if(this.value == 'Banner title') {this.value='';}",'value'=>'Banner title')); ?>
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
	<?php echo  $this->Form->create('Banner', array('action' => 'banners/premium_ads'));?>
	<table cellspacing="0" cellpadding="0" class="table3">
		<tr>
			<td class="filters">
	<?php

	  
		echo $this->Form->input('filter_status', array('type' => 'select', 'label' => '', 'options' => array('all' => 'Select Status', 
								'premium' => 'Premium', 'non_premium' => 'Non-Premium'), 'class' => 'combo2 curve1','div'=>false)); ?>
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
					<th><?php echo $this->Paginator->sort('customer_id','User');?></th>
					<th><?php echo $this->Paginator->sort('category_id','Category');?></th>
					<th><?php echo $this->Paginator->sort('sub_category_id','Sub Category');?></th>
					<th><?php echo $this->Paginator->sort('title','Banner Name');?></th>
					<th><?php echo $this->Paginator->sort('price','Price');?></th>
					<th><?php echo $this->Paginator->sort('is_premium','Status');?></th>
					<!--<th>Total Flags</th>-->
					<th class="actions"><?php echo __('Actions');?></th>
			</tr>
			<?php
			foreach ($Banners as $Banner): ?>
			<tr> 
				<td><?php echo h($Banner['Customer']['billing_firstname'].' '.$Banner['Customer']['billing_lastname']); ?>&nbsp;</td>
				<td><?php echo h($Banner['Category']['name']); ?>&nbsp;</td>
				<td><?php echo h($Banner['SubCategory']['name']); ?>&nbsp;</td>
				<td><?php echo h($Banner['Banner']['title']); ?>&nbsp;</td>
				<td>$<?php echo h(number_format($Banner['Banner']['price'], 2)); ?>&nbsp;</td>
				
				<td><?php 
						if(h($Banner['Banner']['is_premium']==1)){
							echo 'Premium'; 
						}else if(h($Banner['Banner']['is_premium']==0)){
							echo 'Non_Premium'; 
						}
						?>&nbsp;</td>
				<!--<td>
				<?php if(count($Banner['FlaggedBanner'])==1){ 
					echo '<img src="'.$base_url.'img/blue.png" alt="1" />';
				}else if(count($Banner['FlaggedBanner'])==2){ 
					echo '<img src="'.$base_url.'img/green.png" alt="2" />';
				}else if(count($Banner['FlaggedBanner'])==3){ 
					echo '<img src="'.$base_url.'img/yellow.png" alt="3" />';
				}else if(count($Banner['FlaggedBanner'])>=4){ 
					echo '<img src="'.$base_url.'img/red.png" alt="4" />';
				} 
				?>&nbsp;</td>-->
				<td class="actions">
					<?php echo $this->Html->link(__('Edit'), array('action' => 'add', $Banner['Banner']['id'])); ?> |
					<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $Banner['Banner']['id']), null, __('Are you sure you want to delete # %s?', $Banner['Banner']['id'])); ?>
				</td>
			</tr>
		<?php endforeach; ?>
			<?php if(count($Banners)==0){?>
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
