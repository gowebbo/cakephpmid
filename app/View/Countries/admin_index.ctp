
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
		<?php echo $this->Form->create('Country'); ?>
		<table cellspacing="0" cellpadding="0" style="width: 100%">
			<tr>
				<td><h2>Manage Countries</h2></td>
				<td class="searches">
					<?php echo $this->Form->input('search_value', array('div'=>false,'label' => false, 'class' => 'curve1 text2','onblur'=>"if(this.value == '') {this.value='Enter Country Name';}",'onfocus'=>"if(this.value == 'Enter Country Name') {this.value='';}",'value'=>'Enter Country Name')); ?>
					<?php
					echo $this->Js->submit('Search',array(
						  'before' => $this->Js->get('#busy-indicator')->effect('fadeIn', array('buffer' => false)),
						  'complete' => $this->Js->get('#busy-indicator')->effect('fadeOut', array('buffer' => false)),
						   'update' => '#content',
						   'class'=>'curve3 button2',
							'div'=>false,'label' => false
						));
					?>
					<div class="submit" style="margin-top:10px;">
						<input onclick="window.location='<?php echo $base_url?>admin/countries/add'" type="button" value="Add" class="curve2 button1">
					</div>
				</td>
			</tr>
		</table>
		<?php echo $this->Form->end(); ?>
	<!-- manage options -->
	<table cellspacing="0" cellpadding="0" class="table3">
		<tr>
			<td class="filters">
			   
			</td>
			<td>

			</td>

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
	<!--

						<div class="success">Records deleted</div> -->
	<table cellspacing="0" cellpadding="0" class="table2 curve1">
		<tr>
			<th>
				<?php echo $this->Paginator->sort('id', 'Id');?></th>
			<th>
				<?php echo $this->Paginator->sort('name', 'Country Name');?></th>
			<th class="actions"><?php echo __('Actions');?></th>

		</tr>
									  <?php
										  $i = 0;
		foreach ($countries as $country):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="even"';
			}
			?>
			<tr<?php echo $class;?>>
				<td><?php echo h($country['Country']['id']); ?>&nbsp;</td>
				<td><?php echo h($country['Country']['name']); ?>&nbsp;</td>

				<td class="actions">

					<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $country['Country']['id'])); ?> |
					<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $country['Country']['id']), null, __('Are you sure you want to delete Country : %s ?', $country['Country']['name'])); ?>
				</td>
			</tr>
			<?php endforeach; ?>
			<?php if(count($countries)==0){?>
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