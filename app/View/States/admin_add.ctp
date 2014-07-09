<h2>Add State</h2>
<p>This section allows you to add new state. Fields marked with <span class="req">*</span> are mandatory.</p>
<?php echo $this->Form->create('State'); ?>
<table cellspacing="0" cellpadding="0" class="table1">
	<tr>
			<td> Country:<span class="req">*</span> </td>
			<td> 
				<?php
					  if(!isset($inchageList)){
						$inchageList=array();
					  }
					 
					  echo $this->Form->input('country_id',array('options' => $inchageList,'label'=>false,'class' =>'combo curve1','style'=>'5'));
				?>
				
			</td>
		</tr>
    <tr>
        <td style="width:150px;">State:<span class="req">*</span></td>
        <td><?php echo $this->Form->input('name', array('label'=>'','class' => 'curve1 text1','maxLength'=>'100','style' => 'width:250px')); ?></td>
    </tr>
    <tr>
        <td>
            <?php
             $options = array(
                'label' => 'Add State',
                'class' => 'curve2 button1',
            );
            echo $this->Form->end($options); ?></td>
			 <td style="vertical-align:middle; "><?php echo $this->Html->link('Cancel', array('action' => 'index'), array('class' => 'curve2 button1'));?></td>
         <td></td>
        <td></td>
    </tr>
</table>
