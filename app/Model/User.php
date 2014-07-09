<?php
App::uses('AppModel', 'Model');
/**
 * User Model
 *
 */
/**
 *@property User $User
 */
class User extends AppModel
{
    /**
     * Display field
     *
     * @var string
     */
    public $name = 'User';
    public $validate = array(
      'username' => array('required' => array('rule'=> 'notEmpty','message' => 'Please enter Username')),
      'password' => array('required' => array('rule'=> 'notEmpty','message' => 'Please enter Password'))
    );

  }
