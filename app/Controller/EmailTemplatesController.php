<?php
App::uses('AppController', 'Controller');
class EmailTemplatesController  extends AppController {
	var $components = array('RequestHandler','Upload');
    var $helpers = array('Html', 'Form', 'Time','Js');
	
	
	/*__________________________________________________________
        * @Method      :beforeFilter
        * @Description :to set up the Auth component
        * @access      :null
        * @param      :null
        * @return     :null
        */
	function beforeFilter(){
		parent::beforeFilter();		
		$this->Auth->allow('index');

		$admin_type = $this->Auth->User('admin_type');// get admin user type
		
		if($admin_type == 'sub'){
			$this->redirect('/admin/users/home');
		}
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
		
		$this->EmailTemplate->recursive = 0;
		$data = $this->paginate('EmailTemplate', $condition);
		
		$this->set('savecrit', $savecrit);
		$this->set('emailtemplates', $data);
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
		
		$this->EmailTemplate->id = $id;
		if (!$this->EmailTemplate->exists()) {
			throw new NotFoundException(__('Invalid shipping box'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->EmailTemplate->save($this->request->data)) {
				$this->Session->setFlash('The email template has been updated', 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The email template could not be saved. Please, try again.', 'default', array('class' => 'error'));
			}
		} else {
			$this->request->data = $this->EmailTemplate->read(null, $id);
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
}
?>