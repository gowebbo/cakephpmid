<?php
App::uses('AppController', 'Controller');
/**
 * Categories Controller
 *
 * @property Category $Category
 */
class CategoriesController extends AppController {
	var $components = array('RequestHandler','Security');
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
		
		
		if(!empty($this->data['Category']['search_value']) && $this->data['Category']['search_value']!='Enter Category Name'){
			$searchCriteriaTerm=trim($this->data['Category']['search_value']);
			$condition[]    = "(Category.name like '%".$searchCriteriaTerm."%')";		
			$savecrit = "search_value:".$searchCriteriaTerm;
		}else if(!empty($this->params['pass'][0])){
			$value_explode = explode(':',$this->params['pass'][0]);
			$searchCriteriaTerm=trim($value_explode[1]);
			$condition[]    = "(Category.name like '%".$searchCriteriaTerm."%')";		
			$savecrit = "search_value:".$searchCriteriaTerm;
		}
		
		$this->Category->recursive = 0;
		$data = $this->paginate('Category', $condition);
		
		$this->set('savecrit', $savecrit);
		$this->set('categories', $data);
	}

/**
 * add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Category->create();
			if ($this->Category->save($this->request->data)) {
				$this->Session->setFlash('The category has been saved', 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The category could not be saved. Please, try again.', 'default', array('class' => 'error'));
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
		$this->Category->id = $id;
		if (!$this->Category->exists()) {
			throw new NotFoundException(__('Invalid category'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Category->save($this->request->data)) {
				$this->Session->setFlash('The category has been saved', 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The category could not be saved. Please, try again.', 'default', array('class' => 'error'));
			}
		} else {
			$this->request->data = $this->Category->read(null, $id);
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
		$this->Category->id = $id;
		if (!$this->Category->exists()) {
			throw new NotFoundException(__('Invalid category'));
		}
		if ($this->Category->delete()) {
			$this->Session->setFlash('Category deleted', 'default', array('class' => 'success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash('Category was not deleted', 'default', array('class' => 'error'));
		$this->redirect(array('action' => 'index'));
	}
}
