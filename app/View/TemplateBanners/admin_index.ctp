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
		<table cellspacing="0" cellpadding="0" style="width: 100%">
			<tr>
				<td><h2>Manage Temlates</h2></td>
				 
			</tr>
		</table>
		 
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
					 <th><?php echo $this->Paginator->sort('title','Title');?></th>
					 <th><?php echo $this->Paginator->sort('image','Banner');?></th>
				 
					<th class="actions"><?php echo __('Actions');?></th>
			</tr>
			<?php
			foreach ($Banners as $Banner): ?>
			<tr> 
				<td>
				<?php echo $Banner['TemplateBanner']['title']?>
				&nbsp;</td>
				<td>
				<img width="100" height="100" src="<?php echo $base_url?>/files/gallery/<?php echo $Banner['TemplateBanner']['image']?>" alt=""  />
				&nbsp;</td>
				<td class="actions">
					<?php echo $this->Html->link(__('Edit'), array('action' => 'add', $Banner['TemplateBanner']['id'])); ?> |
					<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $Banner['TemplateBanner']['id']), null, __('Are you sure you want to delete # %s?', $Banner['TemplateBanner']['id'])); ?>
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
