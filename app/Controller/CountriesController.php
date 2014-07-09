<?php
App::uses('AppController', 'Controller');
/**
 * Countries Controller
 *
 * @property Country $Country
 */
class CountriesController extends AppController {
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
		
		
		if(!empty($this->data['Country']['search_value']) && $this->data['Country']['search_value']!='Enter Country Name'){
			$searchCriteriaTerm=trim($this->data['Country']['search_value']);
			$condition[]    = "(Country.name like '%".$searchCriteriaTerm."%')";		
			$savecrit = "search_value:".$searchCriteriaTerm;
		}else if(!empty($this->params['pass'][0])){
			$value_explode = explode(':',$this->params['pass'][0]);
			$searchCriteriaTerm=trim($value_explode[1]);
			$condition[]    = "(Country.name like '%".$searchCriteriaTerm."%')";		
			$savecrit = "search_value:".$searchCriteriaTerm;
		}
		
		$this->Country->recursive = 0;
		$data = $this->paginate('Country', $condition);
		
		$this->set('savecrit', $savecrit);
		$this->set('countries', $data);
	}

/**
 * add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			 
			$this->Country->create();
			if ($this->Country->save($this->request->data)) {
				$this->Session->setFlash('The Country has been saved', 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The Country could not be saved. Please, try again.', 'default', array('class' => 'error'));
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
		$this->Country->id = $id;
		if (!$this->Country->exists()) {
			throw new NotFoundException(__('Invalid Country'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Country->save($this->request->data)) {
				$this->Session->setFlash('The Country has been saved', 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The Country could not be saved. Please, try again.', 'default', array('class' => 'error'));
			}
		} else {
			$this->request->data = $this->Country->read(null, $id);
		}
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
		$this->Country->id = $id;
		if (!$this->Country->exists()) {
			throw new NotFoundException(__('Invalid Country'));
		}
		if ($this->Country->delete()) {
			$this->Session->setFlash('Country deleted', 'default', array('class' => 'success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash('Country was not deleted', 'default', array('class' => 'error'));
		$this->redirect(array('action' => 'index'));
	}
}
