<?php
App::uses('AppModel', 'Model');
/**
 * FlaggedBanner Model
 *
 * @property Product $Product
 */
class FlaggedBanner extends AppModel {
/**
 * Validation rules
 *
 * @var array
 */
  var $belongsTo = array(
		'Banner' => array(
		'className' => 'Banner',
		'foreignKey' => 'banner_id'
		) 
		);

}
