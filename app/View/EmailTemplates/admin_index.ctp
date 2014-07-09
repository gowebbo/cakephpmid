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
		<!-- page title -->
		<?php echo $this->Form->create('EmailTemplate'); ?>
		<table cellspacing="0" cellpadding="0" style="width: 100%">
			<tr>
				<td><h2>Manage Email Template</h2></td>
			<!--	<td class="searches">
										<?php echo $this->Form->input('search_value', array('div'=>false,'label' => false, 'class' => 'curve1 text2','onblur'=>"if(this.value == '') {this.value='Enter Box Name';}",'onfocus'=>"if(this.value == 'Enter Box Name') {this.value='';}",'value'=>'Enter Box Name')); ?>
										<?php
										echo $this->Js->submit('Search',array(
											  'before' => $this->Js->get('#busy-indicator')->effect('fadeIn', array('buffer' => false)),
											  'complete' => $this->Js->get('#busy-indicator')->effect('fadeOut', array('buffer' => false)),
											   'update' => '#content',
											   'class'=>'curve3 button2',
												'div'=>false,'label' => false
											));
										?>
									</td>-->
			</tr>
		</table>
		<?php echo $this->Form->end(); ?>
		<!-- manage options -->
		<table cellspacing="0" cellpadding="0" class="table3">
			<tr>
				<td class="filters">
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
			<table cellpadding="0" cellspacing="0" class="table2 curve1">
			<tr>
					<th><?php echo $this->Paginator->sort('code','Code');?></th>
					<th><?php echo $this->Paginator->sort('subject','Subject');?></th>
					<th class="actions"><?php echo __('Actions');?></th>
			</tr>
			<?php
			foreach ($emailtemplates as $emailtemplate): ?>
			<tr>
				<td><?php echo h($emailtemplate['EmailTemplate']['code']); ?>&nbsp;</td>
				<td><?php echo h($emailtemplate['EmailTemplate']['subject']); ?>&nbsp;</td>
				<td class="actions">
					<?php echo $this->Html->link(__('Edit'), array('action' => 'add', $emailtemplate['EmailTemplate']['id'])); ?> 
					<?php //echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $EmailTemplate['EmailTemplate']['id']), null, __('Are you sure you want to delete # %s?', $EmailTemplate['EmailTemplate']['id'])); ?>
				</td>
			</tr>
		<?php endforeach; ?>
			<?php if(count($emailtemplates)==0){?>
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
