<h2>Edit Shipping Box</h2>
<p>This section allows you to edit shipping box. Fields marked with <span class="req">*</span> are mandatory.</p>
<?php echo $this->Form->create('ShippingBox'); ?>
<table cellspacing="0" cellpadding="0" class="table1">
    <tr>
        <td style="width:200px;">Sku:<span class="req">*</span></td>
        <td><?php echo $this->Form->input('sku', array('label'=>'','class' => 'curve1 text1','maxLength'=>'10','style' => 'width:130px')); ?></td>
    </tr>
    <tr>
        <td>Box Name:<span class="req">*</span></td>
        <td><?php echo $this->Form->input('name', array('label'=>'','class' => 'curve1 text1','maxLength'=>'100','style' => 'width:200px')); ?></td>
    </tr>
    <tr>
        <td>Non Product Weight:<span class="req">*</span></td>

        <td><?php echo $this->Form->input('non_product_weight', array('label'=>'','class' => 'curve1 text1','maxLength'=>'10','style' => 'width:130px')); ?></td>

    </tr>
    <tr>
        <td>Total Shipping Weight: <span class="req">*</span></td>
        <td>
            <?php echo $this->Form->input('total_shipping_weight', array('label' => '', 'class' => 'curve1 text1','maxLength'=>'10','style' => 'width:130px')); ?>
        </td>
    </tr>
    <tr>
        <td>Total Shipping Units:<span class="req">*</span></td>
        <td><?php echo $this->Form->input('total_shipping_units', array('label'=>'','class' => 'curve1 text1 numberOnly', 'style' => 'width:130px','div'=>false)); ?>
        <small>ie. 10 or 15</small></td>
    </tr>
    <tr>
        <td>Height (IN):<span class="req">*</span></td>
        <td><?php echo $this->Form->input('height', array('label'=>'','class' => 'curve1 text1','maxLength'=>'10','style' => 'width:130px')); ?>
        </td>
    </tr>
    <tr>
        <td>Length (IN):<span class="req">*</span></td>
        <td><?php echo $this->Form->input('length', array('label'=>'','class' => 'curve1 text1','maxLength'=>'10','style' => 'width:130px')); ?>

        </td>
    </tr>
        <tr>
        <td>Width (IN):<span class="req">*</span></td>
        <td><?php echo $this->Form->input('width', array('label'=>'','class' => 'curve1 text1','maxLength'=>'10','style' => 'width:130px')); ?>

        </td>
    </tr>
    <tr>
        <td>
            <?php
             $options = array(
                'label' => 'Edit Shipping Box',
                'class' => 'curve2 button1',
            );
            echo $this->Form->end($options); ?></td>
        <td style="vertical-align:middle; "><?php echo $this->Html->link('Cancel', array('action' => 'index'),array('class'=>'curve2 button1'));?></td>
    </tr>
</table>
