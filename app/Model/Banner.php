<?php
/**
 *@property Banner $Banner
 */
App::uses('AppModel', 'Model');
/**
 * Banner Model
 *
 */
class Banner extends AppModel
{
    /**
     * Validation rules
     *
     * @var array
     */
	var $belongsTo = array(
		'Customer' => array(
		'className' => 'Customer',
		'foreignKey' => 'customer_id'
		),
		'Category' => array(
		'className' => 'Category',
		'foreignKey' => 'category_id'
		),
		'SubCategory' => array(
		'className' => 'SubCategory',
		'foreignKey' => 'sub_category_id'
		),
		'Country' => array(
		'className' => 'Country',
		'foreignKey' => 'country_id'
		),
		'State' => array(
		'className' => 'State',
		'foreignKey' => 'state_id'
		)
		); 
    var $hasMany = array(
		'FlaggedBanner' => array(
			'className' => 'FlaggedBanner',
			'foreignKey' => 'banner_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		) 
		);
    public $validate = array(
        'title' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Please enter banner title.',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
		'price' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Please enter price.',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
		'description' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Please enter description.',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        )
		
    ); 
}
