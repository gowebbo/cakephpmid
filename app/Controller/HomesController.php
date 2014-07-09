<?php
App::uses('AppController', 'Controller');
/**
 * Coupons Controller
 *
 * @property Coupon $Coupon
 */
class HomesController extends AppController
{
	var $components = array('RequestHandler',);
	var $helpers = array('Html', 'Form','Js','Text');
	public $paginate = array(
        'limit' => 2,
    );

    function beforeFilter()
    {
		parent::beforeFilter();
		$this->layout = 'index';
		$this->Auth->allow('index','get_more');		
    }

    /**
     * index method
     *
	* @return void
*/
    public function index()
    {
		 $this->loadModel('Banner');
		 $this->loadModel('SubCategory');
		/*																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																														$this->loadModel('Product');
		$this->loadModel('Content');		
		$condition = array();
		$condition[] = 'Product.active = 0 && Product.featured = 1';
		$data = $this->Product->find("all", array('conditions'=>$condition));	
		
		$home_page_text = $this->Content->find("first", array('conditions'=>array('Content.code'=>'home-page-text')));	
		$this->set('home_page_text', $home_page_text);
		$this->set('products', $data);*/
		
		
		 
		$condition = array();
		$savecrit = '';
		$cat_id = '';
		$sub_cat_id = 0;
		$occId = '';
		$SpecialDayId = '';
		$FestivalId = '';
		$sub_cat_name = '';
		$cat_name = '';
		
		
		$args = $this->params['url']; 
		unset($args['url']); 
		
		if(isset($args['submit'])) 
		unset($args['submit']); 
		
		if(!empty($this->request->data)) { 
			foreach($this->data['Banner'] as $key=>$value) 
			$args[$key] = $value; 
		} else { 
			foreach($args as $key=>$value) 
			$this->request->data['Banner'][$key] = $value; 
		}
		
		if(!empty($this->request->data['Banner']['catId'])){
			$searchCriteriaTerm=trim($this->request->data['Banner']['catId']);
			$condition[]    = "(Banner.category_id = '".$searchCriteriaTerm."')";		
			$cat_id = $this->request->data['Banner']['catId'];
		}elseif(!empty($this->params['named']['catId'])){
			$searchCriteriaTerm=trim($this->params['named']['catId']);
			$condition[]    = "(Banner.category_id = '".$searchCriteriaTerm."')";		
			$cat_id = $this->params['named']['catId'];
			
		}
		if(!empty($this->request->data['Banner']['subCatId']) && $this->request->data['Banner']['subCatId']!=0){
			$searchCriteriaTerm=trim($this->request->data['Banner']['subCatId']);
			$condition[]    = "(Banner.sub_category_id = '".$searchCriteriaTerm."')";		
			$sub_cat_id = $this->request->data['Banner']['subCatId'];
		}elseif(!empty($this->params['named']['subCatId']) && $this->params['named']['subCatId']!=0){
			$searchCriteriaTerm=trim($this->params['named']['subCatId']);
			$condition[]    = "(Banner.sub_category_id = '".$searchCriteriaTerm."')";		
			$sub_cat_id = $this->params['named']['subCatId'];
			
			$sub_cat_name_array = $this->SubCategory->find("first", array('conditions'=>array('SubCategory.id='.$sub_cat_id),'fields'=>'SubCategory.name,Category.name'));
			$sub_cat_name = $sub_cat_name_array['SubCategory']['name'];
			$cat_name = $sub_cat_name_array['Category']['name'];
		}
		
		if(!empty($this->request->data['Banner']['stateId'])){
			$searchCriteriaTerm=trim($this->request->data['Banner']['stateId']);
			$condition[]    = "(Banner.state_id = '".$searchCriteriaTerm."')";		
			$state_id = $this->request->data['Banner']['stateId'];
		}elseif(!empty($this->params['named']['stateId'])){
			$searchCriteriaTerm=trim($this->params['named']['stateId']);
			$condition[]    = "(Banner.state_id = '".$searchCriteriaTerm."')";		
			$state_id = $this->params['named']['stateId'];
		}
		
		if(!empty($this->request->data['Banner']['filter'])){
			$searchCriteriaTerm=trim($this->request->data['Banner']['filter']);
			$condition[]    = "(Banner.name LIKE '%".$searchCriteriaTerm."%' || Banner.long_description LIKE '%".$searchCriteriaTerm."%')";		
		}
		
	 
		
		$condition[] = 'Banner.status  = 1 && Banner.pause  = 1';
		
		
		 
		//$data = $this->Banner->find("all", array('conditions'=>$condition,'offset'=>0, 'limit'=>10));
		//$total = $this->Banner->find("count", array('conditions'=>$condition));			
		$this->Banner->recursive = 2;
		//$this->paginate = array(
		//'limit' => 10,
		// );
		$this->paginate = array(
		    'limit' => 10,
		    'order' => array('is_premium'=>'DESC','modified'=> 'DESC','id' => 'DESC'),
		     );
		$data = $this->paginate('Banner', $condition);
		
		
		
		$this->set('sub_cat_id', $sub_cat_id);
		//$this->set('total', $total);
		$this->set('sub_cat_name', $sub_cat_name);
		$this->set('cat_name', $cat_name);
		$this->set('savecrit', $savecrit);
		$this->set('Banners', $data);
		$this->set('loggedInUserId',$this->Auth->user('id'));
    }
	
	 
	
	public function get_more($offset=0)
    {
		$this->layout = 'ajax';
		 $this->loadModel('Banner');
		 $this->loadModel('SubCategory');
		 
		
		
		 
		$condition = array();
		$savecrit = '';
		$cat_id = '';
		$sub_cat_id = '';
		$occId = '';
		$SpecialDayId = '';
		$FestivalId = '';
		$sub_cat_name = '';
		$sub_cat_id = '';
		
		
		$args = $this->params['url']; 
		unset($args['url']); 
		
		if(isset($args['submit'])) 
		unset($args['submit']); 
		
		if(!empty($this->request->data)) { 
			foreach($this->data['Banner'] as $key=>$value) 
			$args[$key] = $value; 
		} else { 
			foreach($args as $key=>$value) 
			$this->request->data['Banner'][$key] = $value; 
		}
		
		if(!empty($this->request->data['Banner']['catId'])){
			$searchCriteriaTerm=trim($this->request->data['Banner']['catId']);
			$condition[]    = "(Banner.category_id = '".$searchCriteriaTerm."')";		
			$cat_id = $this->request->data['Banner']['catId'];
		}elseif(!empty($this->params['named']['catId'])){
			$searchCriteriaTerm=trim($this->params['named']['catId']);
			$condition[]    = "(Banner.category_id = '".$searchCriteriaTerm."')";		
			$cat_id = $this->params['named']['catId'];
		}
		if(!empty($this->request->data['Banner']['subCatId']) && $this->request->data['Banner']['subCatId']){
			$searchCriteriaTerm=trim($this->request->data['Banner']['subCatId']);
			$condition[]    = "(Banner.sub_category_id = '".$searchCriteriaTerm."')";		
			$sub_cat_id = $this->request->data['Banner']['subCatId'];
		}elseif(!empty($this->params['named']['subCatId']) && $this->params['named']['subCatId']){
			$searchCriteriaTerm=trim($this->params['named']['subCatId']);
			$condition[]    = "(Banner.sub_category_id = '".$searchCriteriaTerm."')";		
			$sub_cat_id = $this->params['named']['subCatId'];
			
			$sub_cat_name_array = $this->SubCategory->find("first", array('conditions'=>array('SubCategory.id='.$sub_cat_id),'fields'=>'SubCategory.name'));
			$sub_cat_name = $sub_cat_name_array['SubCategory']['name'];
		}
		
		if(!empty($this->request->data['Banner']['stateId'])){
			$searchCriteriaTerm=trim($this->request->data['Banner']['stateId']);
			$condition[]    = "(Banner.state_id = '".$searchCriteriaTerm."')";		
			$state_id = $this->request->data['Banner']['stateId'];
		}elseif(!empty($this->params['named']['stateId'])){
			$searchCriteriaTerm=trim($this->params['named']['stateId']);
			$condition[]    = "(Banner.state_id = '".$searchCriteriaTerm."')";		
			$state_id = $this->params['named']['stateId'];
		}
		
		if(!empty($this->request->data['Banner']['filter'])){
			$searchCriteriaTerm=trim($this->request->data['Banner']['filter']);
			$condition[]    = "(Banner.name LIKE '%".$searchCriteriaTerm."%' || Banner.long_description LIKE '%".$searchCriteriaTerm."%')";		
		}
		
	 
		
		$condition[] = 'Banner.status  = 1 && Banner.pause  = 1';
		
		
		 
		$data = $this->Banner->find("all", array('conditions'=>$condition,'offset'=>$offset, 'limit'=>8));
		$total = $this->Banner->find("count", array('conditions'=>$condition));			
		/*$this->Banner->recursive = 2;
		$this->paginate = array(
		'limit' => 5,
		 );
		$data = $this->paginate('Banner', $condition);*/
		
		
		 if($offset == $total){
			$offset = $total;
			 $this->set('offset', $offset);
		 }else{
			 $this->set('offset', $offset+1);
		 }
		$data_sorted = $this->Banner->find('all',array('order'=>array("Banner.created DESC")));	
		 
		$this->set('total', $total);
		$this->set('sub_cat_name', $sub_cat_name);
		$this->set('sub_cat_id', $sub_cat_id);
		$this->set('savecrit', $savecrit);
		$this->set('Banners', $data_sorted);
		$this->set('loggedInUserId',$this->Auth->user('id'));
    }

}
