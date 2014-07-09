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
		<?php echo $this->Form->create('User'); ?>
		<table cellspacing="0" cellpadding="0" style="width: 100%">
			<tr>
				<td><h2>Manage Admin Users</h2></td>
				<td class="searches">
					<?php echo $this->Form->input('search_value', array('div'=>false,'label' => false, 'class' => 'curve1 text2','onblur'=>"if(this.value == '') {this.value='Enter username';}",'onfocus'=>"if(this.value == 'Enter username') {this.value='';}",'value'=>'Enter username')); ?>
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
						<input onclick="window.location='<?php echo $base_url?>admin/users/add'" type="button" value="Add" class="curve2 button1">
					</div>
				</td>
			</tr>
		</table>
		<?php echo $this->Form->end(); ?>
		<!-- manage options -->
		<table cellspacing="0" cellpadding="0" class="table3">
			<tr>
				<td class="bulkactions">
					<!--
										   <select name="bulk-actions" class="combo2 curve1">
											   <option value="">Bulk Actions</option>
											   <option value="delete">Delete</option>
										   </select>
										   &nbsp;<input type="submit" class="curve3 button2" value="Apply" />
										   -->
				</td>
				<td class="filters"></td>
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

				<th><?php echo $this->Paginator->sort('id');?></th>
				<th><?php echo $this->Paginator->sort('username');?></th>
				<th><?php echo $this->Paginator->sort('created');?></th>
				<th><?php echo $this->Paginator->sort('modified');?></th>
				<th class="actions"><?php echo __('Actions');?></th>

			</tr>
										  <?php
											  $i = 0;
			foreach ($users as $user):
				$class = null;
				if ($i++ % 2 == 0) {
					$class = ' class="even"';
				}
				?>
				<tr <?php echo $class;?>>
					<td><?php echo h($user['User']['id']); ?>&nbsp;</td>
					<td><?php echo h($user['User']['username']); ?>&nbsp;</td>

					<td><?php echo h($user['User']['created']); ?>&nbsp;</td>
					<td><?php echo h($user['User']['modified']); ?>&nbsp;</td>
					<td class="actions">
						<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $user['User']['id'])); ?> |
						<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $user['User']['id']), null, __('Are you sure you want to delete User : %s ?', $user['User']['username'])); ?>
					</td>
				</tr>
				<?php endforeach; ?>
				<?php if(count($users)==0){?>
			<tr>
			<td colspan="10" align="center">
			No records found
			</td>
			</tr>
			<?php }?>
		</table>
		<!-- pagination -->
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