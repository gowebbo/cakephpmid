<?php
	  if(!isset($inchageList)){
		$inchageList=array();
	  }
	   echo $this->Form->input('state_id',array('options' => $inchageList,'label'=>false,'class' =>'span6','empty'=>"Choose a State"));
?>