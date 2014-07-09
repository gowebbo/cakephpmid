<?php
	  if(!isset($inchageList)){
		$inchageList=array();
	  }
	   echo $this->Form->input('sub_category_id',array('options' => $inchageList,'label'=>false,'class' =>'span6','empty'=>"Choose a Sub Category"));
?>