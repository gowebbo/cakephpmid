<?php
App::uses('AppController', 'Controller');
/**
 * States Controller
 *
 * @property State $State
 */
class StatesController extends AppController {
	var $components = array('RequestHandler');
    var $helpers = array('Html', 'Form', 'Time','Js');
	public $paginate = array(
        'limit' => 15,
    );
	
    function beforeFilter()
    {	
		parent::beforeFilter();
        $this->layout = 'admin';
    }
    
/**
 * index method
 *
 * @return void
 */
	public function admin_index() {
		
		
		$condition = array();
		$savecrit = '';
		
		
		if(!empty($this->data['State']['search_value']) && $this->data['State']['search_value']!='Enter Sub Category Name'){
			$searchCriteriaTerm=trim($this->data['State']['search_value']);
			$condition[]    = "(State.name like '%".$searchCriteriaTerm."%')";		
			$savecrit = "search_value:".$searchCriteriaTerm;
		}else if(!empty($this->params['pass'][0])){
			$value_explode = explode(':',$this->params['pass'][0]);
			$searchCriteriaTerm=trim($value_explode[1]);
			$condition[]    = "(State.name like '%".$searchCriteriaTerm."%')";		
			$savecrit = "search_value:".$searchCriteriaTerm;
		}
		
		$this->State->recursive = 0;
		$data = $this->paginate('State', $condition);
		
		$this->set('savecrit', $savecrit);
		$this->set('data', $data);
	}

/**
 * add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->State->create();
			if ($this->State->save($this->request->data)) {
				$this->Session->setFlash('The State has been saved', 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The State could not be saved. Please, try again.', 'default', array('class' => 'error'));
			}
		}
		
		$this->loadModel('Country');
		$country_data = $this->Country->find('all');	
		$inchageList  = Set::combine($country_data, '{n}.Country.id', '{n}.Country.name');	 
		$this->set('inchageList', $inchageList);
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->State->id = $id;
		if (!$this->State->exists()) {
			throw new NotFoundException(__('Invalid State'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			
			if ($this->State->save($this->request->data)) {
				$this->Session->setFlash('The State has been saved', 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The State could not be saved. Please, try again.', 'default', array('class' => 'error'));
			}
		} else {
			$this->request->data = $this->State->read(null, $id);
		}
		
		$this->loadModel('Country');
		$country_data = $this->Country->find('all');	
		$inchageList  = Set::combine($country_data, '{n}.Country.id', '{n}.Country.name');	 
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
		$this->State->id = $id;
		if (!$this->State->exists()) {
			throw new NotFoundException(__('Invalid State'));
		}
		if ($this->State->delete()) {
			$this->Session->setFlash('State deleted', 'default', array('class' => 'success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash('State was not deleted', 'default', array('class' => 'error'));
		$this->redirect(array('action' => 'index'));
	}
}
