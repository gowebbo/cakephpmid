<?php
/**
 * Application model for Cake.
 *
 * This file is application-wide model file. You can put all
 * application-wide model-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Model
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Model', 'Model');

/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       app.Model
 */
class AppModel extends Model {
	function unbindValidation($type, $fields, $require=false)
	{
		if ($type === 'remove')
		{
			$this->validate = array_diff_key($this->validate, array_flip($fields));
		}
		else
		if ($type === 'keep')
		{
			$this->validate = array_intersect_key($this->validate, array_flip($fields));
		}
		
		if ($require === true)
		{
			foreach ($this->validate as $field=>$rules)
			{
				if (is_array($rules))
				{
					$rule = key($rules);
					
					$this->validate[$field][$rule]['required'] = true;
				}
				else
				{
					$ruleName = (ctype_alpha($rules)) ? $rules : 'required';
					
					$this->validate[$field] = array($ruleName=>array('rule'=>$rules,'required'=>true));
				}
			}
		}
	}
}
