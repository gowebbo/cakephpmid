<?php
App::uses('AppController', 'Controller');
class ContentsController  extends AppController {
	var $components = array('RequestHandler','Upload','Mailer');
    var $helpers = array('Html', 'Form', 'Time','Js','Utility');
	
	
	/*__________________________________________________________
        * @Method      :beforeFilter
        * @Description :to set up the Auth component
        * @access      :null
        * @param      :null
        * @return     :null
        */
	function beforeFilter(){
		parent::beforeFilter();		
		$this->Auth->allow('index','about','contact','page','wholesale','gallery','thanks','sell');
	}
	
	
	function admin_index(){
	
		$this->layout	= 'admin';
		$condition = array();
		$savecrit = '';
		
	
		if(!empty($this->data['Product']['filter_status']) && $this->data['Product']['filter_status']!='all'){
			if ($this->data['Product']['filter_status'] == 'active') {
                $filter = "0";
            }elseif ($this->data['Product']['filter_status'] == 'inactive') {
				 $filter = "1";
			}
			$searchCriteriaTerm=trim($filter);
			$condition[]    = "(Product.active = '".$searchCriteriaTerm."')";		
			$savecrit = "filter_status:".$this->data['Product']['filter_status'];
		}else if(!empty($this->params['pass'][0]) && $this->params['pass'][0]!='filter_status:all'){
			$value_explode = explode(':',$this->params['pass'][0]);
			if ($value_explode[1] == 'active') {
                $filter = "0";
            }elseif ($value_explode[1] == 'inactive') {
				 $filter = "1";
			}
			$searchCriteriaTerm=trim($filter);
			$condition[]    = "(Product.active = '".$searchCriteriaTerm."')";		
			$savecrit = "filter_status:".$value_explode[1];
		}
		
		$this->Content->recursive = 0;
		$data = $this->paginate('Content', $condition);
		
		$this->set('savecrit', $savecrit);
		$this->set('contents', $data);
	}
	
	/*
	* @Method      :admin_add
	* @Description :Through this function admin can add/edit
	* @access      :null
	* @param       :$id 
	* @return      :null
	*/
	function admin_add($id = 0){
	
		
		$this->layout = 'admin';
		
		$this->Content->id = $id;
		if (!$this->Content->exists()) {
			throw new NotFoundException(__('Invalid shipping box'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Content->save($this->request->data)) {
				$this->Session->setFlash('The content has been updated', 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The content could not be saved. Please, try again.', 'default', array('class' => 'error'));
			}
		} else {
			$this->request->data = $this->Content->read(null, $id);
		}
	}
	/*
	* @Method      :admin_view
	* @Description :Through this function admin can add/edit the jobs
	* @access      :null
	* @param       :$id of job while editing a job
	* @return      :null
	*/
	function admin_view($id = 0){
		$this->layout = 'admin';		
		App::Import("Model", "EmailTemplate");		
		$this->EmailTemplate = new EmailTemplate();		
		
		$detail = array();
		$add_type = true;
		
		if($id > 0){		
			//get EmailTemplate details
			$detail = $this->EmailTemplate->find("first", array('conditions'=>array('EmailTemplate.id='.$id)));		
			
			if(is_array($detail) && count($detail) >= 1){
				$this->data = $detail;
				$add_type   = false;
			}
		}
		
		$this->set('add_type', $add_type);
	}
	
	function page($value = NULL){
		$this->layout = 'index';
		$data = $this->Content->find("first", array('conditions'=>array('Content.code'=>$value)));		
		$this->set('data', $data);
	}
	function contact(){
		$this->layout = 'index';
		//$data = $this->Content->find("first", array('conditions'=>array('Content.code'=>'contact-us')));	
		
		//$this->set('data', $data);
		if ($this->request->is('post') || $this->request->is('put')) {
			//pr($this->request->data);
			//die;
			if(empty($this->request->data['Content']['email'])){
				$this->Content->validationErrors[] = "Please enter valid email.";
			}
			if(empty($this->request->data['Content']['billing_firstname']) || $this->request->data['Content']['billing_firstname']=='First Name'){
				$this->Content->validationErrors[] = "Firstname should not be emtpy.";
			}
			if(empty($this->request->data['Content']['billing_lastname']) || $this->request->data['Content']['billing_lastname']=='Last Name'){
				$this->Content->validationErrors[] = "Lastname should not be emtpy.";
			}
			if(empty($this->request->data['Content']['billing_address']) || $this->request->data['Content']['billing_address']=='Address'){
				$this->Content->validationErrors[] = "Address should not be emtpy.";
			}
			if(empty($this->request->data['Content']['billing_city']) || $this->request->data['Content']['billing_city']=='City'){
				$this->Content->validationErrors[] = "City should not be emtpy.";
			}
			if(empty($this->request->data['Content']['billing_state'])){
				$this->Content->validationErrors[] = "State should not be emtpy.";
			}
			if(empty($this->request->data['Content']['billing_zipcode']) || $this->request->data['Content']['billing_zipcode']=='Postal Code'){
				$this->Content->validationErrors[] = "Zipcode should not be emtpy.";
			}
			if(empty($this->request->data['Content']['billing_phone']) || $this->request->data['Content']['billing_city']=='Phone'){
				$this->Content->validationErrors[] = "Phone should not be emtpy.";
			}
			
			
			
			$this->Content->set($this->request->data);	
			if($this->Content->validates()){
			//pr($this->request->data);
			
			$billing_firstname = $this->request->data['Content']['billing_firstname'];
			$billing_lastname = $this->request->data['Content']['billing_lastname'];
			$billing_address = $this->request->data['Content']['billing_address'];
			$billing_city = $this->request->data['Content']['billing_city'];
			$billing_state = $this->request->data['Content']['billing_state'];
			$billing_zipcode = $this->request->data['Content']['billing_zipcode'];
			$billing_phone = $this->request->data['Content']['billing_phone'];
			$email = $this->request->data['Content']['email'];
			$message = $this->request->data['Content']['message'];
			
			
			
				
		
					//send email to customer and admin
					$this->Mailer->from = $email;							
					
					$this->Mailer->to     = FROM_EMAIL;
					$this->Mailer->sendAs = 'both';
					
					App::Import("Model", "EmailTemplate");
					$EmailModel  = new EmailTemplate();  
					$emailDetail = $EmailModel->find("first", array('conditions'=>array("code='REG004'", "status='1'"), 'fields'=>array('EmailTemplate.content', 'EmailTemplate.subject')));						
					$emailContent           = $emailDetail['EmailTemplate']['content'];
					$originalContent        = array("{FIRSTNAME}", "{LASTNAME}",'{DATE}','{SHIPPINGADDRESS}','{EMAIL}','{PHONE}','{MESSAGE}','{ZIPCODE}');//These are the variables that are used in email templates
					$userContent            = array($billing_firstname, $billing_lastname,date('M d Y , H:i A'),$billing_address.'<br>'.$billing_city.', '.$billing_state,$email,$billing_phone,$message,$billing_zipcode);//user details variables
					$finalEmail             = str_replace($originalContent, $userContent,  $emailContent);//replacing the variables with user variables
				 
					$this->Mailer->text_body = $finalEmail;
				 	$this->Mailer->subject   = "Contact Us"; 

					$this->Mailer->send();
					
					//delete from the cart table
					
					
					//remove all the sessions
					
					//$this->Session->delete('sessionid');
					
					
					$this->Session->setFlash(__('Thank you, The enquiry has been submited. We will contact you soon.'), 'default', array('class' => 'success'));
					$this->redirect(array('controller'=>'contents','action' => 'contact'));
					
				 
			}else{
				$msgs = $this->Content->invalidFields();
				
				$this->set('msgs', $msgs);
			}
		}
	}
	
	function gallery(){
		$this->layout = 'index';
		$this->loadModel('StudentPhoto');
		
		$condition = array();
	
		$this->paginate = array(
        'limit' => 15
		);
		$this->StudentPhoto->recursive = 0;
		$data = $this->paginate('StudentPhoto', $condition);
	
		$this->set('photos', $data);
	}
	function thanks(){
		$this->layout = 'index';
		
		
	}
	
	
}
?>