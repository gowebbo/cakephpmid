<?php

/**

 * Application level Controller

 *

 * This file is application-wide controller file. You can put all

 * application-wide controller-related methods here.

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

 * @package       app.Controller

 * @since         CakePHP(tm) v 0.2.9

 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)

 */



App::uses('DboSource','Controller', 'Controller');



/**

 * Application Controller

 *

 * Add your application-wide methods in the class below, your controllers

 * will inherit them.

 *

 * @package       app.Controller

 * @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller

 */

/**

 * CakePHP Component &amp; Model Code Completion

 * @author junichi11

 *

 * ==============================================

 * CakePHP Core Components

 * ==============================================

 * @property AuthComponent $Auth

 * @property AclComponent $Acl

 * @property CookieComponent $Cookie

 * @property EmailComponent $Email

 * @property RequestHandlerComponent $RequestHandler

 * @property SecurityComponent $Security

 * @property SessionComponent $Session

 */

class AppController extends Controller

{
	
	public $helpers = array('Session', 'Html','Form','PaypalIpn.Paypal');

    var $components = array(

        'Session','Auth'

    );

	function beforeFilter(){

		$this->set('base_url','http://'.$_SERVER['SERVER_NAME'].Router::url('/'));
		 
       // $this->set('base_url',MYSTOREWEBROOTURL);

		//$this->getProductCategories();

		if(isset($this->params['prefix']) && $this->params['prefix']) { 

		

		}else{

			

			$this->Auth->authenticate = array(

					'Form' => array(

						'fields' => array('username' => 'email', 'password' => 'password'), 

						'userModel' => 'Customer', 'scope' => array("Customer.status" => 1,"Customer.verify" => 1)));

			$this->Auth->authorize = 'Controller';

			$this->Auth->loginAction = array('plugin' => '', 'controller' => 'customers', 'action' => 'login', 'admin' => false);

			$this->Auth->loginRedirect = array('controller' => 'carts', 'action' => 'index');

			$this->Auth->logoutRedirect = array('controller' => 'customers', 'action' => 'login');

			$this->Auth->authError = __('Sorry, but you need to login to access this location.');

			$this->Auth->loginError = __('Invalid e-mail / password combination.  Please try again');

			$this->Auth->autoRedirect = true;
			
			

			$this->set('userData', "");

			

			if ($this->Auth->user()) {

				$this->set('userData', $this->Auth->user());

				$this->set('isAuthorized', ($this->Auth->user('id') != ''));

			}

			

		} 

		 $this->getCategorySubCategory();
		
		$this->getCountriesStates();
	}
	
	
	function getCategorySubCategory(){

		
		$this->loadModel('Category');	
		
		$contain = array();
			
			$contain = array(
'SubCategory' => array('Banner' => array(
'conditions'=>array('Banner.status  = 1 && Banner.pause  = 1'))));
	
		$this->Category->Behaviors->attach('Containable');
		
			$allcategory = $this->Category->find("all", array('conditions'=>array(''),'contain'=>$contain));
		 
	
			$this->set('allcategory', $allcategory); 

	
	}
	
		function getCountriesStates(){

		
			$this->loadModel('Country');	

		
			$allcountry = $this->Country->find("all", array('conditions'=>array()));

		 
		$this->set('allcountry', $allcountry); 


	}
	 

	function beforeRender () {  

		  $this->_setErrorLayout();

		

	}



	function _setErrorLayout() {  

		 if ($this->name == 'CakeError') {  

			$this->layout = 'error';  

		 }    

	} 

   

	public function isRequestedAction() {

		return array_key_exists('requested', $this->params);

	}

	

	public function isAuthorized() {

		return true;

	}

	

	public function getStandardServiceRates($toZipCode,$weight,$shipping_date) {

		$rate = new RocketShipRate('UPS');

		$rate->setParameter('toCode', $toZipCode);

		$rate->setParameter('weight',$weight);

		$rate->setParameter('pickupDate',$shipping_date);

		$response = $rate->getSimpleRates();

		return $response;

	}


	 	public function generateRandStr($length){
				$randstr = "";
				for($i=0; $i<$length; $i++){
				   $randnum = mt_rand(0,61);
				   if($randnum < 10){
					  $randstr .= chr($randnum+48);
				   }else if($randnum < 36){
					  $randstr .= chr($randnum+55);
				   }else{
					  $randstr .= chr($randnum+61);
				   }
				}
				return $randstr;
			}

	function afterPaypalNotification($txnId){
    ClassRegistry::init('PaypalIpn.InstantPaymentNotification')->email(array(
        'id' => $txnId,
        'subject' => 'Thanks!',
        'message' => 'Thank you for the transaction!'
    ));
}
}



