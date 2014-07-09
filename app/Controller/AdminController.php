<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 */
class AdminController extends AppController
{

    public function index()
    {
        $this->redirect(array('controller' => 'admin/users', 'action' => 'index'));
       // $this->set('title_for_layout', 'Dashboard Login');
       // $this->layout = 'login';

    }



}
