<?php
App::uses('AppController', 'Controller');
/**
 * SubCategories Controller
 *
 * @property SubCategory $SubCategory
 */
class SubCategoriesController extends AppController {
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
		
		
		if(!empty($this->data['SubCategory']['search_value']) && $this->data['SubCategory']['search_value']!='Enter Sub Category Name'){
			$searchCriteriaTerm=trim($this->data['SubCategory']['search_value']);
			$condition[]    = "(SubCategory.name like '%".$searchCriteriaTerm."%')";		
			$savecrit = "search_value:".$searchCriteriaTerm;
		}else if(!empty($this->params['pass'][0])){
			$value_explode = explode(':',$this->params['pass'][0]);
			$searchCriteriaTerm=trim($value_explode[1]);
			$condition[]    = "(SubCategory.name like '%".$searchCriteriaTerm."%')";		
			$savecrit = "search_value:".$searchCriteriaTerm;
		}
		
		$this->SubCategory->recursive = 0;
		$data = $this->paginate('SubCategory', $condition);
		
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
			$this->SubCategory->create();
			if ($this->SubCategory->save($this->request->data)) {
				$this->Session->setFlash('The SubCategory has been saved', 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The SubCategory could not be saved. Please, try again.', 'default', array('class' => 'error'));
			}
		}
		
		$this->loadModel('Category');
		$category_data = $this->Category->find('all');	
		$inchageList  = Set::combine($category_data, '{n}.Category.id', '{n}.Category.name');	 
		$this->set('inchageList', $inchageList);
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->SubCategory->id = $id;
		if (!$this->SubCategory->exists()) {
			throw new NotFoundException(__('Invalid SubCategory'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			
			if ($this->SubCategory->save($this->request->data)) {
				$this->Session->setFlash('The SubCategory has been saved', 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The SubCategory could not be saved. Please, try again.', 'default', array('class' => 'error'));
			}
		} else {
			$this->request->data = $this->SubCategory->read(null, $id);
		}
		
		$this->loadModel('Category');
		$category_data = $this->Category->find('all');	
		$inchageList  = Set::combine($category_data, '{n}.Category.id', '{n}.Category.name');	 
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
		$this->SubCategory->id = $id;
		if (!$this->SubCategory->exists()) {
			throw new NotFoundException(__('Invalid SubCategory'));
		}
		if ($this->SubCategory->delete()) {
			$this->Session->setFlash('SubCategory deleted', 'default', array('class' => 'success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash('SubCategory was not deleted', 'default', array('class' => 'error'));
		$this->redirect(array('action' => 'index'));
	}
}
