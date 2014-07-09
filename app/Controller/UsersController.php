<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 */
class UsersController extends AppController
{
	var $components = array('RequestHandler');
	var $helpers = array('Html', 'Form', 'Time','Js');
	
    public $paginate = array(
        'limit' => 15,
    );

    function beforeFilter()
    {
		parent::beforeFilter();
        $this->layout = 'admin';
		$this->Auth->allow(' ');		
    }

    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index()
    {
       
	   
	
		$condition = array();
		$savecrit = '';
		
		
		if(!empty($this->data['User']['search_value']) && $this->data['User']['search_value']!='Enter username'){
			$searchCriteriaTerm=trim($this->data['User']['search_value']);
			$condition[]    = "(User.username like '%".$searchCriteriaTerm."%')";		
			$savecrit = "search_value:".$searchCriteriaTerm;
		}else if(!empty($this->params['pass'][0])){
			$value_explode = explode(':',$this->params['pass'][0]);
			$searchCriteriaTerm=trim($value_explode[1]);
			$condition[]    = "(User.username like '%".$searchCriteriaTerm."%')";		
			$savecrit = "search_value:".$searchCriteriaTerm;
		}
		
		$this->User->recursive = 0;
		$data = $this->paginate('User', $condition);
		
		$this->set('savecrit', $savecrit);
		$this->set('users', $data);
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add()
    {
        if ($this->request->is('post')) {
            $this->User->set($this->request->data);
            if ($this->User->validates()) {
                //$this->request->data['User']['password'] = Security::hash($this->request->data['User']['password'], 'sha256', true);
				$this->request->data['User']['password'] = Security::hash($this->request->data['User']['password'], null, true);
                $this->User->create();
                if ($this->User->save($this->request->data)) {
                    $this->Session->setFlash('The user has been saved', 'default', array('class' => 'success'));
                    $this->redirect(array('action' => 'index'));
                } else {
                    $this->request->data['User']['password'] = "";
                    $this->Session->setFlash('The user could not be saved. Please, try again.', 'default', array('class' => 'error'));
                }
            }
            else
            {
                $this->request->data['User']['password'] = "";
                $this->Session->setFlash('The user could not be saved. Please, try again.', 'default', array('class' => 'error'));

            }
        }
    }

    /**
     * admin_edit method
     *
     * @param string $id
     * @return void
     */
    public function admin_edit($id = null)
    {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            $this->Session->setFlash('The user does not exits.', 'default', array('class' => 'error'));
            $this->redirect(array('action' => 'index'));

        }
        $this->User->set($this->request->data);
        if ($this->User->validates()) {
            if ($this->request->is('post') || $this->request->is('put')) {

                $this->request->data['User']['password'] = Security::hash($this->request->data['User']['password'], null, true);
                if ($this->User->save($this->request->data)) {
                    $this->Session->setFlash('The user has been saved', 'default', array('class' => 'success'));
                    $this->redirect(array('action' => 'index'));
                } else {
                    $this->Session->setFlash('The user could not be saved. Please, try again.', 'default', array('class' => 'error'));
                }
            } else {
                $this->request->data = $this->User->read(null, $id);
                $this->request->data['User']['password'] = "";
            }
        }
        else
        {
            $this->Session->setFlash('The user could not be saved. Please, try again.', 'default', array('class' => 'error'));
        }
    }

    /**
     * admin_delete method
     *
     * @param string $id
     * @return void
     */
    public function admin_delete($id = null)
    {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->User->delete()) {
            $this->Session->setFlash('User deleted', 'default', array('class' => 'success'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash('User was not deleted', 'default', array('class' => 'error'));
        $this->redirect(array('action' => 'index'));
    }
	
	/*
        * @Method      :admin_login
        * @Description :Throgh this function admin can login to admin section
        * @access      :null
        * @param       :null
        * @return      :null
        */

	function admin_login(){
		
		$this->layout	= 'admin_login';
		if ($this->request->is('post')) {
			if ($this->Auth->login()) {
				return $this->redirect(array('controller'=>'banners','action' => 'index'));
			} else {
				$this->Session->setFlash(__('Username or password is incorrect'), 'default', array('class' => 'error'), 'auth');
			}
		}
	 	/*$admin	= $this->Auth->User();
		
	  	if (isset($admin['User']['id']) && $admin['User']['id'] != ''){
			$this->User->id = $this->Auth->User('id'); // target correct record
			$this->redirect(array('action' => 'index'));
		}else{
			if(!empty($this->request->data)){
				
				if($this->Auth->login($this->request->data)){
					
				}else{
					echo $this->Session->setFlash('Username/Password Incorrect', 'default', array('class' => 'error'));
					die;
					//setting blank for username and password field
					$this->request->data['User']['username'] = '';
					$this->request->data['User']['password'] = '';
				}
			}
	    }*/
	}
	
	 function admin_logout(){
		$this->Auth->logout();
		$this->redirect('/admin/');
	}
}
