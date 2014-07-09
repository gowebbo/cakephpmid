<h2>Add Customer User</h2>
<p>This section allows you to add new customer user . Fields marked with <span class="req">*</span> are mandatory.</p>

<?php echo $this->Form->create('Customer'); ?>
<table cellspacing="0" cellpadding="0" class="table1">
    <tr>
        <td>Email:<span class="req">*</span></td>
        <td><?php echo $this->Form->input('Customer.email', array('label'=>'','class' => 'curve1 text1')); ?></td>
    </tr>

    <tr>
        <td>Password:<span class="req">*</span></td>
        <td><?php echo $this->Form->input('Customer.password', array('label'=>'','class' => 'curve1 text1')); ?></td>
    </tr>
    <tr>
        <td> Verify: <span class="req"> * </span></td>
        <td> <?php echo $this->Form->input('Customer.verify', array('default' => '1', 'readonly' => 'true' , 'label' => '', 'class' => 'curve1 text1')); ?> </td>
    </tr>
    <tr>
        <td> <?php
 $options = array(
            'label' => 'Add Customer',
            'class' => 'curve2 button1',
        );
            echo $this->Form->end($options); ?></td>
        <td style="vertical-align:middle; "><?php echo $this->Html->link('Cancel', array('action' => 'index'), array('class' => 'curve2 button1'));?></td>
        <td></td>
        <td></td>
    </tr>
</table>

