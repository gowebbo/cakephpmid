<?php
App::uses('AppModel', 'Model');
/**
 * Customer Model
 *
 * @property Order $Order
 */
class Customer extends AppModel {
/**
 * Validation rules
 *
 * @var array
 */
	
	public $validate = array(
		'email' => array(
			'email' => array(
				'rule' => array('email'),
				'message' => 'Please enter valid email.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			 'checkUniqueEmail' => array(
                'rule' => array('checkUniqueEmail'),
                'message' => 'Email already exist',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                'on' => 'create', // Limit validation to 'create' or 'update' operations
            )
		),
		'billing_firstname' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Firstname should not be emtpy.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'billing_lastname' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Lastname should not be emtpy.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'billing_address' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Billing address should not be emtpy.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'billing_city' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Billing city should not be emtpy.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'billing_state' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Billing state should not be emtpy.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'billing_zipcode' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Billing zipcode should not be emtpy.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'billing_phone' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Billing phone should not be emtpy.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'shipping_firstname' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Shipping firstname should not be emtpy.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'shipping_lastname' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Shipping lastname should not be emtpy.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'shipping_address' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Shipping address should not be emtpy.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'shipping_city' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Shipping city should not be emtpy.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'shipping_state' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Shipping state should not be emtpy.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'shipping_zipcode' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Shipping zipcode should not be emtpy.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'shipping_phone' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Shipping phone should not be emtpy.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
	
	function checkUniqueEmail($data) {
		
		$isUnique = $this->find(
					'first',
					array(
						'fields' => array(
							'Customer.id',
							'Customer.email'
						),
						'conditions' => array(
							'Customer.email' => $data['email']
						)
					)
			);

		if(!empty($isUnique)){
			if($this->data['Customer']['id'] == $isUnique['Customer']['id']){
				return true; //Allow update
			}else{
				return false; //Deny update
			}
		}else{
			return true; //If there is no match in DB allow anyone to change
		}
    }

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	 

}
