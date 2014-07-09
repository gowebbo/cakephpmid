<?php
/**
 *@property Product $Product
 */
App::uses('AppModel', 'Model');
/**
 * Product Model
 *
 */
class Product extends AppModel
{
    /**
     * Validation rules
     *
     * @var array
     */
	var $belongsTo = array(
		'SubCategory' => array(
		'className' => 'SubCategory',
		'foreignKey' => 'sub_category_id'
		),
		'Category' => array(
		'className' => 'Category',
		'foreignKey' => 'category_id'
		)
		); 
    
    public $validate = array(
        'name' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Please enter product name.',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'slug' => array(
            'alphaNumericDashUnderscore' => array(
                'rule' => array('alphaNumericDashUnderscore'),
                'message' => 'Slug can only be letters, numbers, hyphens and all should be in lowercase',
                'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
			 'isUnique' => array(
                'rule' => array('isUnique'),
                'message' => 'This slug has already been taken',
                'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            )
        ),
        'sku' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'SKU should not be empty.',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'price' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'message' => 'Price should not be empty and should be numeric value',
                'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ) ,
		'category_id' => array(
            'multiple' => array(
                'rule' => array('multiple'),
                'message' => 'Please select atleast one category.',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ) ,
		'sub_category_id' => array(
            'multiple' => array(
                'rule' => array('multiple'),
                'message' => 'Please select atleast one sub category.',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ) 
		
    );
	function alphaNumericDashUnderscore($check) {
	// $data array is passed using the form field name as the key
		// have to extract the value to make the function generic
		$value = array_shift($check);
		return preg_match('|^[0-9a-z-]*$|', $value);
	}
	function numericonly($check) {
	// $data array is passed using the form field name as the key
		// have to extract the value to make the function generic
		$value = array_shift($check);
		return preg_match('|^[1-9]*$|', $value);
	}
	function numericonlyweight($check) {
	// $data array is passed using the form field name as the key
		// have to extract the value to make the function generic
		$value = array_shift($check);
		return preg_match('|^[1-900]*$|', $value);
	}
}
