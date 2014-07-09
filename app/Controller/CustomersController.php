<?php
App::uses('AppController', 'Controller');
/**
 * Customers Controller
 *
 * @property Customer $Customer
 */
class CustomersController extends AppController {
	var $components = array('RequestHandler','Mailer');
    var $helpers = array('Html', 'Form', 'Time','Js','Session','Utility');
	public $paginate = array(
        'limit' =>15,
    );

    function beforeFilter()
    {
	   
		parent::beforeFilter();
        $this->layout = 'admin';
		
		$this->Auth->allow('register', 'logout','forgot_password','verify','resetpassword');

		if ($this->action == 'register') {
			$this->Auth->enabled = false;
		}
		
		if ($this->action == 'login') {
			$this->Auth->autoRedirect = false;
		}
		
		
    }

/**
 * index method
 *
 * @return void
 */
	public function admin_index() {
	
		$condition = array();
		$savecrit = '';
		
		
		if(!empty($this->data['Customer']['search_value']) && $this->data['Customer']['search_value']!='Enter Customer Name or Email'){
			$searchCriteriaTerm=trim($this->data['Customer']['search_value']);
			$condition[]    = "(Customer.billing_firstname like '%".$searchCriteriaTerm."%' || Customer.email like '%".$searchCriteriaTerm."%'  )";		
			$savecrit = "search_value:".$searchCriteriaTerm;
		}else if(!empty($this->params['pass'][0])){
			$value_explode = explode(':',$this->params['pass'][0]);
			$searchCriteriaTerm=trim($value_explode[1]);
			$condition[]    = "(Customer.billing_firstname like '%".$searchCriteriaTerm."%' || Customer.email like '%".$searchCriteriaTerm."%'  )";		
			$savecrit = "search_value:".$searchCriteriaTerm;
		}
		
		$this->Customer->recursive = 0;
		$data = $this->paginate('Customer', $condition);
		
		$this->set('savecrit', $savecrit);
		$this->set('customers', $data);
	}

/**
     * admin_add method
     *
     * @return void
     */
    public function admin_add()
    {
        if ($this->request->is('post')) {
            $this->Customer->set($this->request->data);
            if ($this->Customer->validates()) {
                //$this->request->data['User']['password'] = Security::hash($this->request->data['User']['password'], 'sha256', true);
				$this->request->data['Customer']['password'] = Security::hash($this->request->data['Customer']['password'], null, true);
                $this->Customer->create();
                if ($this->Customer->save($this->request->data)) {
                    $this->Session->setFlash('The Customer has been saved', 'default', array('class' => 'success'));
                    $this->redirect(array('action' => 'index'));
                } else {
                    $this->request->data['Customer']['password'] = "";
                    $this->Session->setFlash('The Customer could not be saved. Please, try again.', 'default', array('class' => 'error'));
                }
            }
            else
            {
                $this->request->data['Customer']['password'] = "";
                $this->Session->setFlash('The Customer could not be saved. Please, try again.', 'default', array('class' => 'error'));

            }
        }
    }

 /**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->Customer->id = $id;
		if (!$this->Customer->exists()) {
			 $this->Session->setFlash('Customer does not exits.', 'default', array('class' => 'error'));
			 $this->redirect(array('action' => 'index'));
		}

		if ($this->request->is('post') || $this->request->is('put')) {
            if($this->request->data['Customer']['password1'] != "")
            {
                if ($this->request->data['Customer']['password1'] == $this->request->data['Customer']['password2'])
                {
                    $this->request->data['Customer']['password'] = Security::hash($this->request->data['Customer']['password1'], '', true);
                }
                else
                {
					$this->Session->setFlash('New Password and Confirm Password does not match. Please enter same password for both.', 'default', array('class' => 'error'));
			         return;
                }
            }
			if ($this->Customer->save($this->request->data)) {
				$this->Session->setFlash(__('The customer has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The customer could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		} else {
			$this->request->data = $this->Customer->read(null, $id);
            $this->request->data['Customer']['password'] = "";

		}
		
		//category listing
		$this->loadModel('State');
		$state_data = $this->State->find('all');	
		$inchageList  = Set::combine($state_data, '{n}.State.abbreviation', '{n}.State.name');	 
		$this->set('inchageList', $inchageList);
		
	}

/**
 * delete method
 *
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Customer->id = $id;
		if (!$this->Customer->exists()) {
			throw new NotFoundException(__('Invalid customer'));
		}
		if ($this->Customer->delete()) {
			$this->Session->setFlash(__('Customer deleted'), 'default', array('class' => 'success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Customer was not deleted'), 'default', array('class' => 'error'));
		$this->redirect(array('action' => 'index'));
	}
	
	
	/**
 * login method
 ** @return void
 */
	public function login() {
		//$this->layout = 'login';
		$this->layout = 'index';
		
		if ($this->Auth->user()) {
			return $this->redirect($this->Auth->redirect());
		}
		$regiter_user = false;
		if ($this->request->is('post')) {
			if ($this->Auth->login()) {
				 
				//check if user comes from registration page
				//$register_user = $this->Session->read('register_user');
				//if($register_user){
					//return $this->redirect(array('controller'=>'carts','action' => 'checkout'));
				//}
				return $this->redirect(array('controller'=>'banners','action' => 'mybanners'));
			} else {
				$this->Session->setFlash(__('Username or password is incorrect'), 'default', array('class' => 'error'));
			}
		}

		 
		 
		$this->set('title_for_layout', __('Login'));
	}

		
		
		
	
	 
	
	function logout(){
		$this->Session->setFlash(__('you have successfully logged out'), 'default', array('class' => 'success'));
		//$this->Session->setFlash(sprintf(__d('users', '%s you have successfully logged out'), $this->Auth->user('username'), array('class' => 'success')));
		$this->Auth->logout();
		 
		$this->redirect($this->Auth->logout());

	}
	
	/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function register($id = null) {
		//$this->layout = 'login';
		$this->layout = 'index';
		if ($this->request->is('post') || $this->request->is('put')) {
			
			$this->Customer->unbindValidation('remove', array(
					'email',
					'billing_firstname',
					'billing_lastname',
					'billing_address',
					'billing_city',
					'billing_state',
					'billing_zipcode',
					'billing_phone',
					'shipping_firstname',
					'shipping_lastname',
					'shipping_address',
					'shipping_city',
					'shipping_state',
					'shipping_zipcode',
					'shipping_phone'
					), true); 
					
			if(empty($this->request->data['Customer']['email'])){
				$this->Customer->validationErrors[] = "Please enter valid email.";
			}
			
			if (!$this->Customer->isUnique(array('email'=>$this->request->data['Customer']['email']))){
				$this->Customer->validationErrors[] = "This email has already been taken";
		    }
			if(empty($this->request->data['Customer']['password1'])){
				$this->Customer->validationErrors[] = "Please enter password.";
			}
            if($this->request->data['Customer']['password1'] != ""){
                if ($this->request->data['Customer']['password1'] == $this->request->data['Customer']['password2']){
                    $this->request->data['Customer']['password'] = Security::hash($this->request->data['Customer']['password1'], '', true);
                }else{
					$this->Customer->validationErrors[] = "New Password and Confirm Password does not match. Please enter same password for both.";
				}
            }
			
			
			if(empty($this->request->data['Customer']['billing_firstname']) || $this->request->data['Customer']['billing_firstname']=='First Name'){
				$this->Customer->validationErrors[] = "Firstname should not be empty.";
			}
			if(empty($this->request->data['Customer']['billing_lastname']) || $this->request->data['Customer']['billing_lastname']=='Last Name'){
				$this->Customer->validationErrors[] = "Lastname should not be empty.";
			}
			/*if(empty($this->request->data['Customer']['billing_address']) || $this->request->data['Customer']['billing_address']=='Address'){
				$this->Customer->validationErrors[] = "Billing address should not be emtpy.";
			}
			if(empty($this->request->data['Customer']['billing_city']) || $this->request->data['Customer']['billing_city']=='City'){
				$this->Customer->validationErrors[] = "Billing city should not be emtpy.";
			}
			if(empty($this->request->data['Customer']['billing_state'])){
				$this->Customer->validationErrors[] = "Billing state should not be emtpy.";
			}
			if(empty($this->request->data['Customer']['billing_zipcode']) || $this->request->data['Customer']['billing_zipcode']=='Postal Code'){
				$this->Customer->validationErrors[] = "Billing zipcode should not be emtpy.";
			}else{
				if(!preg_match("/^[0-9]{5}$/", $this->request->data['Customer']['billing_zipcode'])) {
					$this->Customer->validationErrors[] = "The Billing postal code must be a 5-digit number.";
				} 
			}
			if(empty($this->request->data['Customer']['billing_phone']) || $this->request->data['Customer']['billing_city']=='Phone'){
				$this->Customer->validationErrors[] = "Billing phone should not be emtpy.";
			}
			if($this->request->data['Customer']['same_as_billing_address']!=1){
			
				if(empty($this->request->data['Customer']['shipping_firstname']) || $this->request->data['Customer']['shipping_firstname']=='First Name'){
					$this->Customer->validationErrors[] = "Shipping firstname should not be emtpy.";
				}
				if(empty($this->request->data['Customer']['shipping_lastname']) || $this->request->data['Customer']['shipping_lastname']=='Last Name'){
					$this->Customer->validationErrors[] = "Shipping lastname should not be emtpy.";
				}
				if(empty($this->request->data['Customer']['shipping_address']) || $this->request->data['Customer']['shipping_address']=='Address'){
					$this->Customer->validationErrors[] = "Shipping address should not be emtpy.";
				}
				if(empty($this->request->data['Customer']['shipping_city']) || $this->request->data['Customer']['shipping_city']=='City'){
					$this->Customer->validationErrors[] = "Shipping city should not be emtpy.";
				}
				
				if(empty($this->request->data['Customer']['shipping_zipcode']) || $this->request->data['Customer']['shipping_zipcode']=='Postal Code'){
					$this->Customer->validationErrors[] = "Shipping zipcode should not be emtpy.";
				}else{
					if(!preg_match("/^[0-9]{5}$/", $this->request->data['Customer']['shipping_zipcode'])) {
						$this->Customer->validationErrors[] = "The shipping postal code must be a 5-digit number.";
					} 
				}
				
				if(empty($this->request->data['Customer']['shipping_state'])){
					$this->Customer->validationErrors[] = "Shipping state should not be emtpy.";
				}
			}else{
				$this->request->data['Customer']['shipping_firstname'] = $this->request->data['Customer']['billing_firstname'];
				$this->request->data['Customer']['shipping_lastname'] = $this->request->data['Customer']['billing_lastname'];
				$this->request->data['Customer']['shipping_address'] = $this->request->data['Customer']['billing_address'];
				$this->request->data['Customer']['shipping_city'] = $this->request->data['Customer']['billing_city'];
				$this->request->data['Customer']['shipping_zipcode'] =  $this->request->data['Customer']['billing_zipcode'];
				$this->request->data['Customer']['shipping_state'] = $this->request->data['Customer']['billing_state'];
			}*/
			
			$this->request->data['Customer']['pass'] = $this->request->data['Customer']['password1'];
			
			$this->Customer->set($this->request->data);	
			if($this->Customer->validates()){
				$activationNumber = $this->generateRandStr(32);//defining the activation number to be send by link
				$this->request->data['Customer']['verification_code'] = $activationNumber;
				
				if ($this->Customer->save($this->request->data)) {
					$CustomerId = $this->Customer->getLastInsertId();
					$first_name  = $this->request->data['Customer']['billing_firstname'];
					$last_name  = $this->request->data['Customer']['billing_lastname'];
					
					
					$this->Mailer->from = '<'.FROM_EMAIL.'>';							
					
					$this->Mailer->to     = $this->request->data['Customer']['email'];
					$this->Mailer->sendAs = 'both';
					
					$activation_url = 'http://'.$_SERVER['SERVER_NAME'].Router::url('/').'customers/verify/'.$CustomerId.'/'.$activationNumber;
					
					
					App::Import("Model", "EmailTemplate");
					$EmailModel  = new EmailTemplate();  
					$emailDetail = $EmailModel->find("first", array('conditions'=>array("code='REG002'", "status='1'"), 'fields'=>array('EmailTemplate.content', 'EmailTemplate.subject')));						
					$emailContent           = $emailDetail['EmailTemplate']['content'];
					$originalContent        = array("{FIRST_NAME}", "{LAST_NAME}","{ACTIVATION_LINK}");//These are the variables that are used in email templates
					$userContent            = array($first_name, $last_name,$activation_url);//user details variables
					$finalEmail             = str_replace($originalContent, $userContent,  $emailContent);//replacing the variables with user variables
					 $this->Mailer->text_body = $finalEmail;
					 
					$this->Mailer->subject   = $emailDetail['EmailTemplate']['subject']; 

					$this->Mailer->send();
					
					
					$this->Session->setFlash(__('Please check your email to confirm registration. You may have to check your junk/spam box and move it to inbox or mark as NO SPAM to continue receiving emails. If you have problems registering or need support please contact us through our contact form.'), 'default', array('class' => 'success'));
						
					/*$this->Session->write('register_user',true);
					echo '<body onLoad=document.forms["paypal_form"].submit();>
					<form method="post" name="paypal_form" action="'.'http://'.$_SERVER['SERVER_NAME'].Router::url('/').'customers/login">
					<input type="hidden" name="data[Customer][email]" value="'.$this->request->data['Customer']['email'].'"/>
					<input type="hidden" name="data[Customer][password]" value="'.$this->request->data['Customer']['password2'].'"/>
					</form>
					</body>';
					
					die;*/
					$this->redirect(array('action' => 'login'));
				} else {
					$this->Session->setFlash(__('The customer could not be saved. Please, try again.'), 'default', array('class' => 'error'));
				}
			}else{
				$msgs = $this->Customer->invalidFields();
				
				$this->set('msgs', $msgs);
			}
		}
		
		//category listing
		$this->loadModel('State');
		$state_data = $this->State->find('all');	
		$inchageList  = Set::combine($state_data, '{n}.State.abbreviation', '{n}.State.name');	 
		$this->set('inchageList', $inchageList);
		
	}
	public function verify($customer_id = NULL,$verification_code = NULL) {
		//verify user
		$verify_customer = $this->Customer->find('first',array('condition'=>array('Customer.id'=>$customer_id,'Customer.verification_code'=>$verification_code),'fields'=>array('Customer.id')));	
		
		if($verify_customer){
			$this->request->data['Customer']['id'] = $customer_id;
			$this->request->data['Customer']['verify'] =1;
			$this->Customer->save($this->request->data);
			
			 $this->Session->setFlash(__('Your account has been successfully activated, You can login now'), 'default', array('class' => 'success'));
					

			$this->redirect(array('controller'=>'customers','action' => 'login'));
		}else{
			 
			$this->Session->setFlash(__('Your account has not been activated, Please contact to administrator'), 'default', array('class' => 'success'));
					

			$this->redirect(array('controller'=>'customers','action' => 'login'));
		}
		die;
	}
	/*public function forgot_password() {
			$this->layout="index";
			if ($this->request->is('post') || $this->request->is('put')) {
				$customer = $this->Customer->find('first',array('conditions'=>array('Customer.email'=>$this->request->data['Customer']['email'])));	
				if(!$customer){
					$this->Session->setFlash(__('Email Not found. Please, try again.'), 'default', array('class' => 'error'));
				}else{
					$this->Mailer->from = '<'.FROM_EMAIL.'>';							
					
					$this->Mailer->to     = $this->request->data['Customer']['email'];
					$this->Mailer->sendAs = 'both';
					
					App::Import("Model", "EmailTemplate");
					$EmailModel  = new EmailTemplate();  
					$emailDetail = $EmailModel->find("first", array('conditions'=>array("code='FP0001'", "status='1'"), 'fields'=>array('EmailTemplate.content', 'EmailTemplate.subject')));						
					$emailContent           = $emailDetail['EmailTemplate']['content'];
					$originalContent        = array("{USERNAME}", "{PASSWORD}");//These are the variables that are used in email templates
					$userContent            = array($this->request->data['Customer']['email'], $customer['Customer']['pass']);//user details variables
					$finalEmail             = str_replace($originalContent, $userContent,  $emailContent);//replacing the variables with user variables
					$this->Mailer->text_body = $finalEmail;
					
					$this->Mailer->subject   = $emailDetail['EmailTemplate']['subject']; 

					$this->Mailer->send();
					
					$this->Session->setFlash(__('Please check your email to get your password.'), 'default', array('class' => 'success'));
				
				}
			}
	}*/
	
	public function forgot_password() {
			$this->layout = 'login';
			if ($this->request->is('post') || $this->request->is('put')) {
				$customer = $this->Customer->find('first',array('conditions'=>array('Customer.email'=>$this->request->data['Customer']['email'])));	
				if(!$customer){
					$this->Session->setFlash(__('Email Not found. Please, try again.'), 'default', array('class' => 'error-flash'));
				}else{
					$this->Customer->id = $customer['Customer']['id'];	
					$password_reset_code = $this->generateRandStr(32);
					$this->Customer->saveField('password_reset_code',$password_reset_code);
					
					$this->Mailer->from = '<'.FROM_EMAIL.'>';							
					
					$this->Mailer->to     = $this->request->data['Customer']['email'];
					$this->Mailer->sendAs = 'both';
					$link = 'http://'.$_SERVER['SERVER_NAME'].Router::url('/').'customers/resetpassword/'.$customer['Customer']['id'].'/'.$password_reset_code;
					
					App::Import("Model", "EmailTemplate");
					$EmailModel  = new EmailTemplate();  
					$emailDetail = $EmailModel->find("first", array('conditions'=>array("code='FP0001'", "status='1'"), 'fields'=>array('EmailTemplate.content', 'EmailTemplate.subject')));						
					$emailContent           = $emailDetail['EmailTemplate']['content'];
					$originalContent        = array("{LINK}");//These are the variables that are used in email templates
					$userContent            = array($link);//user details variables
					$finalEmail             = str_replace($originalContent, $userContent,  $emailContent);//replacing the variables with user variables
					 $this->Mailer->text_body = $finalEmail;
					 
					$this->Mailer->subject   = $emailDetail['EmailTemplate']['subject']; 

					$this->Mailer->send();
					
					$this->Session->setFlash(__('Please check your email to get your password.'), 'default', array('class' => 'success'));
				
				}
			}
	}
	
	public function resetpassword($id=null,$resetpasswordid=null) {
		$this->loadModel('Customer');
		$this->layout = 'login';
		$this->Customer->set($this->data);
		if(isset($id)){
			$customer_id = $id;
		}elseif(isset($this->data['Customer']['id'])){
			$customer_id = $this->data['Customer']['id'];
		}
		if(isset($resetpasswordid)){
			$resetpasswordid_customer = $resetpasswordid;
		}elseif(isset($this->data['Customer']['resetpasswordid'])){
			$resetpasswordid_customer = $this->data['Customer']['resetpasswordid'];
		}
		
		if(empty($resetpasswordid_customer)){
			 $message = __d('default', "The Customer does not exits", true);
			 $this->Session->setFlash($message, 'default', array('class' => 'error-flash'));
			 $this->redirect(array('controller'=>'customers','action' => 'login'));
		}
		if(empty($customer_id)){
			$message = __d('default', "The Customer does not exits", true);
			 $this->Session->setFlash($message, 'default', array('class' => 'error-flash'));
			 $this->redirect(array('controller'=>'customers','action' => 'login'));
		}
		
	   	if(!empty($this->data)){
		
			$this->Customer->id = $customer_id;
			
			if (!$this->Customer->exists()) {
				$message = __d('default', "The Customer does not exits", true);
				$this->Session->setFlash($message, '', array('class' => '','div'=>false));
				$this->redirect(array('controller'=>'customers','action' => 'resetpassword/'.$customer_id.'/'.$resetpasswordid_customer));
			}
			//if(!empty($this->data['Customer']['oldPassword']) && !empty($this->data['Customer']['newPassword'])){			
			if(!empty($this->data['Customer']['newPassword'])){			
				$Customerid =  $customer_id;
				$CustomerDetails = $this->Customer->findById($Customerid,array('password','id'));			
				$new_password = Security::hash($this->request->data['Customer']['newPassword'],'',true);			
				
				
				//___If new password and confirm password is not match
				if($this->data['Customer']['newPassword'] != $this->data['Customer']['confirmPassword']){
					$message = __d('default', 'New password and confirm password is not match', true);
					$this->Session->setFlash($message, 'default', array('class' => 'error-flash'));
					$this->redirect(array('controller'=>'customers','action' => 'resetpassword/'.$customer_id.'/'.$resetpasswordid_customer));
				}		
			}else{
				$message = __d('default', 'Password could not be changed. Please, try again', true);
				$this->Session->setFlash($message, 'default', array('class' => 'error-flash'));
				$this->redirect(array('controller'=>'customers','action' => 'resetpassword/'.$customer_id.'/'.$resetpasswordid_customer));
			}
			$this->Customer->set($this->request->data);
			if ($this->Customer->validates()) {
				 $this->Customer->id = $Customerid;					
				 $this->Customer->saveField('password',$new_password);
				 $this->Customer->saveField('password_reset_code'," ");
				 $message = __d('default', 'Password has been changed', true);
				 $this->Session->setFlash($message, 'default', array('class' => 'success'));
				 $this->redirect(array('controller'=>'customers','action' => 'login'));
			}else{
				$message = __d('default', 'Password could not be changed. Please, try again', true);
				$this->Session->setFlash($message, 'default', array('class' => 'error-flash'));
			}
		}else{
				
			
			$check_reset_id = $this->Customer->find("first",array('conditions'=>array('Customer.id'=>$customer_id, 'Customer.password_reset_code' => $resetpasswordid_customer),'fields'=>array('Customer.id')));
			
			if(empty($check_reset_id)){
				$message = __d('default', "The Customer does not exits", true);
				$this->Session->setFlash($message, 'default', array('class' => 'error-flash'));
				$this->redirect(array('controller'=>'customers','action' => 'login'));
			}
		}
		
		$this->set('customer_id', $customer_id);
		$this->set('resetpasswordid', $resetpasswordid_customer);
	}	
	public function update() {
		//$this->layout = 'login';
		$this->layout = 'index';
		$id	= $this->Auth->user('id');
		
		if ($this->request->is('post') || $this->request->is('put')) {
			 
			
			$this->request->data['Customer']['id'] = $id;
			$this->Customer->set($this->request->data);	
			if($this->Customer->validates()){
				if ($this->Customer->save($this->request->data)) {
					$this->Session->setFlash(__('Updated Sucessfully.'), 'default', array('class' => 'success'));
				
					$this->redirect(array('controller'=>'customers','action' => 'update'));
				} else {
					$this->Session->setFlash(__('The customer could not be saved. Please, try again.'), 'default', array('class' => 'error'));
				}
			}else{
				$msgs = $this->Customer->invalidFields();
				$msgs1 = array();
				foreach($msgs as $key=>$data){
					
					$msgs1[] = $data[0];
				}
				 
				$this->set('msgs', $msgs1);
			}
		}else{
			$customer_data = $this->Customer->find("first", array('conditions'=>array('Customer.id'=>$id)));	
			$this->request->data = $customer_data;
			
		}
		 
		
	}
    
}
