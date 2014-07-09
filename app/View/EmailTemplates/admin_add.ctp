<h2>Update Email Template</h2>

<?php echo $this->Form->create('EmailTemplate'); ?>
<?php echo $this->Form->input('EmailTemplate.id'); ?>
<table cellspacing="0" cellpadding="0" class="table1">
    <tr>
        <td style="width:200px;">Subject:<span class="req">*</span></td>
        <td><?php echo $this->Form->input('subject', array('label'=>'','class' => 'curve1 text1','maxLength'=>'230','style' => 'width:230px')); ?></td>
    </tr>
        <tr>
        <td>Content:<span class="req">*</span></td>
        <td>
		<?php echo $this->Form->input('content', array('class'=>'curve1 tarea1','rows'=>8,'cols'=>100,'label'=>false,'error'=>false,'div'=>false,'size'=>'1','tabindex'=>'4','readonly'=>false)); ?>
		<script type="text/javascript">
		CKEDITOR.replace('EmailTemplateContent',
			{
			 width:"574",height:"174",
			 filebrowserBrowseUrl : '/app/webroot/js/ckfinder/ckfinder.html',
			 filebrowserImageBrowseUrl : '/app/webroot/js/ckfinder/ckfinder.html?Type=Images',
			 filebrowserImageUploadUrl : '/app/webroot/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images'
			});
			//]]>
		</script>
	

        </td>
    </tr>
    <tr>
        <td>
            <?php
             $options = array(
                'label' => 'Update',
                'class' => 'curve2 button1',
            );
            echo $this->Form->end($options); ?></td>
        <td style="vertical-align:middle; "><?php echo $this->Html->link('Cancel', array('action' => 'index'),array('class'=>'curve2 button1'));?></td>
    </tr>
</table>
