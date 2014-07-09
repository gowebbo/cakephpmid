<h2>Edit Customer</h2>
<p>This section allows you to edit a customer. Fields marked with <span class="req">*</span> are mandatory.</p>
<?php echo $this->Form->create('Customer'); ?>
<table cellspacing="0" cellpadding="0" class="table1">
    <tr>
        <td colspan="2"><h5 class="curve1">Account Information</h5></td>
    </tr>
    <tr>
        <td style="width:180px;">Email Address:<span class="req">*</span></td>
        <td> <?php echo $this->Form->input('email', array('readonly'=>true,'label' => '', 'class' => 'curve1 text1', 'div' => false)); ?>
            <small>(Email address is the username.)</small>
        </td>
    </tr>
    <tr>
        <td>New Password:</td>
        <td><?php echo $this->Form->input('password1', array('label' => '', 'class' => 'curve1 text1', 'type'
                                                    => 'text')); ?></td>
    </tr>
        <tr>
        <td>Confirm Password:</td>
        <td><?php echo $this->Form->input('password2', array('label' => '', 'class' => 'curve1 text1', 'type'
                                                    => 'text')); ?></td>
    </tr>
</table>

<table cellspacing="0" cellpadding="0" class="table1">
    <tr>
        <td colspan="4"><h5 class="curve1">Address</h5></td>
    </tr>
    <tr>
        <td style="width:180px;">First Name:<span class="req">*</span></td>
        <td style="width:320px;"><?php echo $this->Form->input('billing_firstname', array('label' => '', 'class' => 'curve1 text1')); ?></td>
        <td style="width:180px;">Last Name:<span class="req">*</span></td>
        <td><?php echo $this->Form->input('billing_lastname', array('label' => '', 'class' => 'curve1 text1')); ?></td>
    </tr>
     
   <tr>
			<td>Status:</td>
			<td>
			<?php
				$options=array('1'=>'Active','0'=>'InActive');
				echo $this->Form->input('status',array('type'=>'select','label' => '', 'options' => $options, 'class' => 'combo2 curve1')); 
			?>
			</td>
		</tr>
</table>

<table cellspacing="0" cellpadding="0" class="table1">
     
    <tr>
        <td>
            <?php
                         $options = array(
                'label' => 'Update Customer',
                'class' => 'curve2 button1',
            );
                echo $this->Form->end($options); ?></td>
        <td style="vertical-align:middle; "><?php echo $this->Html->link('Cancel', array('action' => 'index'), array('class' => 'curve2 button1'));?></td>
        <td></td>
        <td></td>
    </tr>
</table>

