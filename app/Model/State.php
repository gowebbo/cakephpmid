<?php
App::uses('AppModel', 'Model');
/**
 * State Model
 *
 * @property Order $Order
 */
class State extends AppModel {

var $belongsTo = array(
		'Country' => array(
		'className' => 'Country',
		'foreignKey' => 'country_id'
		),
		); 
    
    public $validate = array(
        'name' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Please enter state name.',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        )
		
    ); 
}
