<?php
/**
 *@property SubCategory $SubCategory
 */
App::uses('AppModel', 'Model');
/**
 * SubCategory Model
 *
 */
class SubCategory extends AppModel
{
    /**
     * Validation rules
     *
     * @var array
     */
	var $belongsTo = array(
		'Category' => array(
		'className' => 'Category',
		'foreignKey' => 'category_id'
		),
		); 
    var $hasMany = array(
		'Banner' => array(
			'className' => 'Banner',
			'foreignKey' => 'sub_category_id',
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
        'name' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Please enter Sub Category name.',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        )
		
    ); 
}
