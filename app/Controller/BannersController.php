<?php
App::uses('AppController', 'Controller');
/**
 * Banners Controller
 *
 * @property Banner $Banner
 */
class BannersController extends AppController {
	var $components = array('RequestHandler' ,'Upload','Mailer');
    var $helpers = array('Html', 'Form', 'Time','Js','Text');
	public $paginate = array(
        'limit' =>15,
    );
	
    function beforeFilter()
    {
		parent::beforeFilter();
		$this->Auth->allow('view','index');
		//$this->check_status();		
	    
        // commented by wpc
		//$this->set('base_url','http://'.$_SERVER['SERVER_NAME'].Router::url('/'));
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
		
		if(!empty($this->data['Banner']['search_value']) && $this->data['Banner']['search_value']!='Banner title'){
			$searchCriteriaTerm=trim($this->data['Banner']['search_value']);
			$condition[]    = "(Banner.description like '%".$searchCriteriaTerm."%' || Banner.title like '%".$searchCriteriaTerm."%')";		
			$savecrit = "search_value:".$searchCriteriaTerm;
                }
		
		if(!empty($this->data['Banner']['filter_status']) && $this->data['Banner']['filter_status']!='all'){
			if ($this->data['Banner']['filter_status'] == 'active') {
                $filter = "1";
            }elseif ($this->data['Banner']['filter_status'] == 'inactive') {
				 $filter = "0";
			}
			$searchCriteriaTerm=trim($filter);
			$condition[]    = "(Banner.status = '".$searchCriteriaTerm."')";		
			$savecrit = "filter_status:".$this->data['Banner']['filter_status'];
		}else if(!empty($this->params['pass'][0]) && $this->params['pass'][0]!='filter_status:all'){
			$value_explode = explode(':',$this->params['pass'][0]);
			if ($value_explode[1] == 'active') {
                $filter = "1";
            }elseif ($value_explode[1] == 'inactive') {
				 $filter = "0";
			}
			$searchCriteriaTerm=trim($filter);
			$condition[]    = "(Banner.status = '".$searchCriteriaTerm."')";		
			$savecrit = "filter_status:".$value_explode[1];
		}
	 	$condition[]    = "(Banner.status = '1')";	
		$this->Banner->recursive = 1;
		$this->paginate = array(
		    'conditions' => array('Banner.status' => 1),
		    'limit' => 20,
		    'order' => array('id' => 'DESC'),
		     );
		$data = $this->paginate('Banner', $condition);
		//$data_sorted = $this->Banner->find('all',array('order'=>array("Banner.created DESC")));
		
		$this->set('savecrit', $savecrit);
		$this->set('Banners', $data);
		
		
		
	}



/**
 * index method
 *
 * @return void
 */
	public function admin_daily_deals() {
		$condition = array();
		$savecrit = '';
		
		if(!empty($this->data['Banner']['search_value']) && $this->data['Banner']['search_value']!='Banner title'){
			$searchCriteriaTerm=trim($this->data['Banner']['search_value']);
			$condition[]    = "(Banner.description like '%".$searchCriteriaTerm."%' || Banner.title like '%".$searchCriteriaTerm."%')";		
			$savecrit = "search_value:".$searchCriteriaTerm;
                }
		
		if(!empty($this->data['Banner']['filter_status']) && $this->data['Banner']['filter_status']!='all'){
			if ($this->data['Banner']['filter_status'] == 'active') {
                $filter = "1";
            }elseif ($this->data['Banner']['filter_status'] == 'inactive') {
				 $filter = "0";
			}
			$searchCriteriaTerm=trim($filter);
			$condition[]    = "(Banner.status = '".$searchCriteriaTerm."')";		
			$savecrit = "filter_status:".$this->data['Banner']['filter_status'];
		}else if(!empty($this->params['pass'][0]) && $this->params['pass'][0]!='filter_status:all'){
			$value_explode = explode(':',$this->params['pass'][0]);
			if ($value_explode[1] == 'active') {
                $filter = "1";
            }elseif ($value_explode[1] == 'inactive') {
				 $filter = "0";
			}
			$searchCriteriaTerm=trim($filter);
			$condition[]    = "(Banner.status = '".$searchCriteriaTerm."')";		
			$savecrit = "filter_status:".$value_explode[1];
		}
	 	$condition[]    = "(Banner.status = '1')";	
		$this->Banner->recursive = 1;
		$this->paginate = array(
		    'conditions' => array('Banner.status' => 1),
		    'limit' => 20,
		    'order' => array('id' => 'DESC'),
		     );
		$data = $this->paginate('Banner', $condition);
		//$data_sorted = $this->Banner->find('all',array('order'=>array("Banner.created DESC")));
		
		$this->set('savecrit', $savecrit);
		$this->set('Banners', $data);
		
		
		
	}


	public function admin_premium_ads() {
		$condition = array();
		$savecrit = '';
		
		if(!empty($this->data['Banner']['search_value']) && $this->data['Banner']['search_value']!='Banner title'){
			$searchCriteriaTerm=trim($this->data['Banner']['search_value']);
			$condition[]    = "(Banner.description like '%".$searchCriteriaTerm."%' || Banner.title like '%".$searchCriteriaTerm."%')";		
			$savecrit = "search_value:".$searchCriteriaTerm;
                }
		
		if(!empty($this->data['Banner']['filter_status']) && $this->data['Banner']['filter_status']!='all'){
			if ($this->data['Banner']['filter_status'] == 'premium') {
                $filter = "1";
            }elseif ($this->data['Banner']['filter_status'] == 'non-premium') {
				 $filter = "0";
			}
			$searchCriteriaTerm=trim($filter);
			$condition[]    = "(Banner.status = '".$searchCriteriaTerm."')";		
			$savecrit = "filter_status:".$this->data['Banner']['filter_status'];
		}else if(!empty($this->params['pass'][0]) && $this->params['pass'][0]!='filter_status:all'){
			$value_explode = explode(':',$this->params['pass'][0]);
			if ($value_explode[1] == 'premium') {
                $filter = "1";
            }elseif ($value_explode[1] == 'non-premium') {
				 $filter = "0";
			}
			$searchCriteriaTerm=trim($filter);
			$condition[]    = "(Banner.status = '".$searchCriteriaTerm."')";		
			$savecrit = "filter_status:".$value_explode[1];
		}
		$condition[]    = "(Banner.is_premium = '1')";	
		$this->Banner->recursive = 1;
		$this->paginate = array(
		    'conditions' => array('Banner.is_premium' => 1),
		    'limit' => 20,
		    'order' => array('id' => 'DESC'),
		     );

		$data = $this->paginate('Banner', $condition);
		//$data_sorted = $this->Banner->find('all',array('order'=>array("Banner.created DESC")));
		
		$this->set('savecrit', $savecrit);
		$this->set('Banners', $data);

		
		
		
	}

	public function admin_pending_requests() {
		$condition = array();
		$savecrit = '';
		
		if(!empty($this->data['Banner']['search_value']) && $this->data['Banner']['search_value']!='Banner title'){
			$searchCriteriaTerm=trim($this->data['Banner']['search_value']);
			$condition[]    = "(Banner.description like '%".$searchCriteriaTerm."%' || Banner.title like '%".$searchCriteriaTerm."%')";		
			$savecrit = "search_value:".$searchCriteriaTerm;
                }
		
		if(!empty($this->data['Banner']['filter_status']) && $this->data['Banner']['filter_status']!='all'){
			if ($this->data['Banner']['filter_status'] == 'active') {
                $filter = "1";
            }elseif ($this->data['Banner']['filter_status'] == 'inactive') {
				 $filter = "0";
			}
			$searchCriteriaTerm=trim($filter);
			$condition[]    = "(Banner.status = '".$searchCriteriaTerm."')";		
			$savecrit = "filter_status:".$this->data['Banner']['filter_status'];
		}else if(!empty($this->params['pass'][0]) && $this->params['pass'][0]!='filter_status:all'){
			$value_explode = explode(':',$this->params['pass'][0]);
			if ($value_explode[1] == 'active') {
                $filter = "1";
            }elseif ($value_explode[1] == 'inactive') {
				 $filter = "0";
			}
			$searchCriteriaTerm=trim($filter);
			$condition[]    = "(Banner.status = '".$searchCriteriaTerm."')";		
			$savecrit = "filter_status:".$value_explode[1];
		}
		$condition[]    = "(Banner.status = '0')";
		$this->paginate = array(
		    'conditions' => array('Banner.status' => 0),
		    'limit' => 20,
		    'order' => array('id' => 'DESC'),
		     );
	
		$this->Banner->recursive = 1;
		$data = $this->paginate('Banner', $condition);
		//$data_sorted = $this->Banner->find('all',array('order'=>array("Banner.created DESC")));
		

		$this->set('savecrit', $savecrit);
		$this->set('Banners', $data);
		
		
		
	}
/**
 * index method
 *
 * @return void
 */
	public function admin_flag() {
		$condition = array();
		$savecrit = '';
		
		if(!empty($this->data['Banner']['search_value']) && $this->data['Banner']['search_value']!='Banner title'){
			$searchCriteriaTerm=trim($this->data['Banner']['search_value']);
			$condition[]    = "(Banner.description like '%".$searchCriteriaTerm."%' || Banner.title like '%".$searchCriteriaTerm."%')";		
			$savecrit = "search_value:".$searchCriteriaTerm;
                }
		
		if(!empty($this->data['Banner']['filter_status']) && $this->data['Banner']['filter_status']!='all'){
			if ($this->data['Banner']['filter_status'] == 'active') {
                $filter = "1";
            }elseif ($this->data['Banner']['filter_status'] == 'inactive') {
				 $filter = "0";
			}
			$searchCriteriaTerm=trim($filter);
			$condition[]    = "(Banner.status = '".$searchCriteriaTerm."')";		
			
			$savecrit = "filter_status:".$this->data['Banner']['filter_status'];
		}else if(!empty($this->params['pass'][0]) && $this->params['pass'][0]!='filter_status:all'){
			$value_explode = explode(':',$this->params['pass'][0]);
			if ($value_explode[1] == 'active') {
                $filter = "1";
            }elseif ($value_explode[1] == 'inactive') {
				 $filter = "0";
			}
			$searchCriteriaTerm=trim($filter);
			$condition[]    = "(Banner.status = '".$searchCriteriaTerm."')";		
			$savecrit = "filter_status:".$value_explode[1];
		}
		$condition[]    = "(Banner.is_flag = '1')";	
		$this->Banner->recursive = 1;
		$data = $this->paginate('Banner', $condition);
		
		$this->set('savecrit', $savecrit);
		$this->set('Banners', $data);
		
		
		
	}

/** 
*
* Checks weather the banners are old enough to be turned back to non-premium
* and change the status to 0 , in case of non-premium
* 
* @return void 
*/

   protected function check_status(){
   	 $non_premium_expire = 5*24*60*60;
   	 $premium_expire = 14*24*60*60;
   	 $data = $this->Banner->find('all');
   	 //pr ($Banners);
   	 //pr ((time() - strtotime($Banners['Banner']['modified'])) > 5*24*60*60);
   	 //pr ((time() - strtotime($Banners['Banner']['modified'])) > 14*24*60*60);
   	 //die();
  	 foreach ($data as $Banners) {
     	 	if ($Banners['Banner']['is_premium'] == 0) {
     	 		if ((time() - strtotime($Banners['Banner']['modified'])) > $non_premium_expire) {
    	 			 $id = $Banners['Banner']['id'];
    	 			 //pr ("in non premium loop");
    	 			 //pr ($id);
    	 			 //die();
    	 			 $data_one = array('id' => $id , 'status'=> 0, 'modified' => false);
    	 			 $this->Banner->save($data_one);
    	 			 //$this->Banner->clear();
     	 		}
     	 	}
     	 	if ($Banners['Banner']['is_premium'] == 1) {
     	 		if ((time() - strtotime($Banners['Banner']['modified'])) > $premium_expire) {
    	 			 $id = $Banners['Banner']['id'];
    	 			 //pr ("in premium loop");
    	 			 //pr ($id);
    	 			 //die();
    	 			 $data_one = array('id' =>$id , 'status'=> 0, 'modified' => false);
    	 			//pr ($data_one);
    	 			//die();
    	 			 $this->Banner->save($data_one);
    	 			 //$this->Banner->clear();
     	 		}
     	 	}
   	 }
   }



/**
 * add method
 *
 * @return void
 */
	public function admin_add($id = 0) {
	$add_type = true;
		if(!empty($this->data)){
			
			if($this->data['Banner']['template_banner']==0){ //if client upload directly from compluter
				$result = $this->dimensionsee($this->data['Banner'],292,205);
			 
				if($result){
					$this->Session->setFlash('Your image should be greater then 292x205', 'default', array('class' => 'error'));
					$this->redirect(array('action' => 'upload'));
				}
				$img_dest = BANNER_DIRECTORY.'/';  	
				
				$allowed = array('image/jpeg', 'image/jpg',  'image/pjpeg', 'image/jpg', 'image/gif', 'image/png', 'image/bmp');
				//main image upload
				if($this->data['Banner']['image']['error']!='4'){
					$fileArr1    = $this->data['Banner']['image'];
					
					$randNumImg1 = time();
					$farr1 = explode(".", $fileArr1['name']);				
					$ext1  = $farr1[(count($farr1)-1)];
					$coverPhoto1   = $randNumImg1."2.".$ext1;
					$file1 = $this->Upload->upload($fileArr1, $img_dest, $coverPhoto1, null, $allowed); 
					$this->request->data['Banner']['image'] = $coverPhoto1;
					
					/*$imageactualSize = getimagesize(BANNER_DIRECTORY.'/'.$coverPhoto1); 
				 
					if($imageactualSize[0] > 295 && $imageactualSize[1] > 205){
						if($ext1 == 'png'){
							$this->resizeImage('resize', $coverPhoto1, BANNER_DIRECTORY, $randNumImg1.'_crop.jpg', 295, 205,9);
							$this->resizeImage('crop', $randNumImg1.'_crop.jpg', BANNER_DIRECTORY, $randNumImg1.'_crop2.jpg', 295, 205,9);
							$this->request->data['Banner']['image'] = $randNumImg1.'_crop2.jpg'; 
						}else{
							$this->resizeImage('resize', $coverPhoto1, BANNER_DIRECTORY, $randNumImg1.'_crop.jpg', 295, 205);
							$this->resizeImage('crop', $randNumImg1.'_crop.jpg', BANNER_DIRECTORY, $randNumImg1.'_crop2.jpg', 295, 205);
							$this->request->data['Banner']['image'] = $randNumImg1.'_crop2.jpg'; 
						} 
					}else{
						if($ext1 == 'png'){
							$this->resizeImage('crop', $coverPhoto1, BANNER_DIRECTORY, $randNumImg1.'_crop.jpg', 295, 205,9);
							$this->request->data['Banner']['image'] = $randNumImg1.'_crop.jpg'; 
						}else{
							$this->resizeImage('crop', $coverPhoto1, BANNER_DIRECTORY, $randNumImg1.'_crop.jpg', 295, 205);
							$this->request->data['Banner']['image'] = $randNumImg1.'_crop.jpg'; 
						}
					}
					
					if($imageactualSize[0] > 540 && $imageactualSize[1] > 341){
						if($ext1 == 'png'){
							$this->resizeImage('resize', $coverPhoto1, BANNER_DIRECTORY, '540x341'.$randNumImg1.'_crop.jpg', 540, 341,9);
							$this->resizeImage('crop', '540x341'.$randNumImg1.'_crop.jpg', BANNER_DIRECTORY, '540x341'.$randNumImg1.'_crop2.jpg', 540, 341,9);
							$this->request->data['Banner']['big_image'] = '540x341'.$randNumImg1.'_crop2.jpg'; 
						 }else{
							$this->resizeImage('resize', $coverPhoto1, BANNER_DIRECTORY, '540x341'.$randNumImg1.'_crop.jpg',540, 341);
							$this->resizeImage('crop', '540x341'.$randNumImg1.'_crop.jpg', BANNER_DIRECTORY, '540x341'.$randNumImg1.'_crop2.jpg', 540, 341);
							 $this->request->data['Banner']['big_image'] =  '540x341'.$randNumImg1.'_crop2.jpg'; 
							 
						 } 
					}else{
						if($ext1 == 'png'){
							$this->resizeImage('crop', $coverPhoto1, BANNER_DIRECTORY, '540x341'.$randNumImg1.'_crop.jpg', 540, 341,9);
							$this->request->data['Banner']['big_image'] = '540x341'.$randNumImg1.'_crop.jpg'; 
						 }else{
							$this->resizeImage('crop', $coverPhoto1, BANNER_DIRECTORY, '540x341'.$randNumImg1.'_crop.jpg', 540, 341);
							$this->request->data['Banner']['big_image'] = '540x341'.$randNumImg1.'_crop.jpg'; 
						 }
					}
					unlink(BANNER_DIRECTORY.'/'.$coverPhoto1);*/
					 
				} else{
					$BannerDetail = $this->Banner->find("first", array('conditions'=>array('Banner.id='.$id)));
					$this->request->data['Banner']['image']=$BannerDetail['Banner']['image'];
					
				}

			}else{
				$this->request->data['Banner']['image'] = $this->data['Banner']['template_image']; 
			}
			
			
		 
			
			 
			 
			$this->Banner->set($this->request->data);
			if($this->Banner->validates()){		
				if ($this->Banner->save($this->request->data)) {
					$BannerId = $this->Banner->getLastInsertId();
					if($this->request->data['Banner']['is_flag']==0){    
						$this->Session->setFlash('Banner has been saved', 'default', array('class' => 'success'));
						$this->redirect(array('action' => 'index'));
					}else{
						$this->Session->setFlash('Banner has been flagged', 'default', array('class' => 'success'));
						$this->redirect(array('action' => 'flag'));
					}
				} else {
					$this->Session->setFlash('Banner could not be saved. Please try again..', 'default', array('class' => 'error'));
				}
			}else{
				$this->Session->setFlash('Banner could not be saved. Please try again..', 'default', array('class' => 'error'));
			}
			if($id > 0){
				$add_type   = false;
			}
		}else{
			
			if($id > 0){		
				$this->request->data = $this->Banner->read(null, $id);
				$add_type   = false; 
				if($this->request->data['Banner']['template_banner']==1){
					$this->request->data['Banner']['template_image'] = $this->request->data['Banner']['image']; 
				}
			}
			
		}
		$this->set('add_type', $add_type);
		
		//category listing
		$this->loadModel('Category');
		$category_data = $this->Category->find('all');	
		$inchageList  = Set::combine($category_data, '{n}.Category.id', '{n}.Category.name');	 
		$this->set('inchageList', $inchageList);
		
		//category listing
		$this->loadModel('Country');
		$Country_data = $this->Country->find('all');	
		$inchageList1  = Set::combine($Country_data, '{n}.Country.id', '{n}.Country.name');	 
		$this->set('inchageList1', $inchageList1);
		
		//template Banners
		$this->loadModel('TemplateBanner');
		$banner_data = $this->TemplateBanner->find('all');	
		$bannerList  = Set::combine($banner_data, '{n}.TemplateBanner.image', '{n}.TemplateBanner.title');	  
		$this->set('bannerList', $bannerList);
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
	            $this->Banner->id = $id;
		if (!$this->Banner->exists()) {
			throw new NotFoundException(__('Invalid Banner'));
		}
		if ($this->Banner->delete()) {
			$this->Session->setFlash('Banner deleted', 'default', array('class' => 'success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash('Banner was not deleted', 'default', array('class' => 'error'));
		$this->redirect(array('action' => 'index'));
	}
	
	public function view($id=null) {
		
		$this->layout = 'index';
	 	
		
		
		$Banner = $this->Banner->find("first", array('conditions'=>array('Banner.id'=>$id)));	
		 
		//pr($Banner);
		//die;
		$this->set('loggedInUserId',$this->Auth->user('id'));
		$this->set('Banner', $Banner);	
	}


	function admin_getsubcategory($id){
		$this->layout = 'ajax';
		$this->loadModel('SubCategory');
		$SubCategories = $this->SubCategory->find('all',array('conditions'=>array('SubCategory.category_id'=>$id)));	
		$value = '';
		$value['--Select--'] = '';
		foreach ($SubCategories as $SubCategory) {
				$value[$SubCategory['SubCategory']['name']] = $SubCategory['SubCategory']['id'];
		}
		
		echo json_encode($value);
		die;
		//$this->set('cities', $cities);
	}
	function getsubcategory1($id){
		$this->layout = 'ajax';
		$this->loadModel('SubCategory');
		$SubCategories = $this->SubCategory->find('all',array('conditions'=>array('SubCategory.category_id'=>$id)));	
		$value = '';
		$value['--Select--'] = '';
		foreach ($SubCategories as $SubCategory) {
				$value[$SubCategory['SubCategory']['name']] = $SubCategory['SubCategory']['id'];
		}
		
		echo json_encode($value);
		die;
		//$this->set('cities', $cities);
	}
	function getsubcategory(){
		$this->layout = 'ajax';
		$this->loadModel('SubCategory');
		 
		$category_data = $this->SubCategory->find('all',array('conditions'=>array('SubCategory.category_id'=>$this->request->data['Banner']['category_id'])));	
		$inchageList  = Set::combine($category_data, '{n}.SubCategory.id', '{n}.SubCategory.name');	 
		$this->set('inchageList', $inchageList);
		
	 
	}
	function getstate1($id){
		$this->layout = 'ajax';
		$this->loadModel('State');
		$States = $this->State->find('all',array('conditions'=>array('State.country_id'=>$id)));	
		$value = '';
		$value['--Select--'] = '';
		foreach ($States as $State) {
				$value[$State['State']['name']] = $State['State']['id'];
		}
		
		echo json_encode($value);
		die;
		//$this->set('cities', $cities);
	}
	function getstate(){
		$this->layout = 'ajax';
		$this->loadModel('State');
		 
		$category_data = $this->State->find('all',array('conditions'=>array('State.country_id'=>$this->request->data['Banner']['country_id'])));	
		$inchageList  = Set::combine($category_data, '{n}.State.id', '{n}.State.name');	 
		$this->set('inchageList', $inchageList);
		
	 
	}
	
	public function mybanners()
    {


    	$this->check_status();
		$this->layout = 'index';
		$this->loadModel('Banner');	
		$loggedUserId	= $this->Auth->user('id');
		 
		$condition = array();
		$savecrit = '';
		$cat_id = '';
		$sub_cat_id = '';
		$occId = '';
		$SpecialDayId = '';
		$FestivalId = '';
		$expired = false;
			
		

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
		if(!empty($this->request->data['Banner']['subCatId'])){
			$searchCriteriaTerm=trim($this->request->data['Banner']['subCatId']);
			$condition[]    = "(Banner.sub_category_id = '".$searchCriteriaTerm."')";		
			$sub_cat_id = $this->request->data['Banner']['subCatId'];
		}elseif(!empty($this->params['named']['subCatId'])){
			$searchCriteriaTerm=trim($this->params['named']['subCatId']);
			$condition[]    = "(Banner.sub_category_id = '".$searchCriteriaTerm."')";		
			$sub_cat_id = $this->params['named']['subCatId'];
		}
		
	   
		if(!empty($this->request->data['Banner']['filter'])){
			$searchCriteriaTerm=trim($this->request->data['Banner']['filter']);
			$condition[]    = "(Banner.name LIKE '%".$searchCriteriaTerm."%' || Banner.long_description LIKE '%".$searchCriteriaTerm."%')";		
		}
		
	 
		
		$condition[] = 'Banner.customer_id  = "'.$loggedUserId.'"';
		
		
		 
	  
		$this->Banner->recursive = 2;
		
		$this->paginate = array(
		    'conditions' => array('Banner.customer_id' => $loggedUserId),
		    'limit' => 20,
		    'order' => array('id' => 'DESC'),
		     );
		$data = $this->paginate('Banner', $condition);
		//$data_sorted = $this->Banner->find('all',array('order'=>array("Banner.created DESC")));		
		
		$this->set('loggedInUserId', $loggedUserId);
		$this->set('savecrit', $savecrit);
		$this->set('Banners', $data);
    }
	
	
	public function upload($id = 0) {
		$this->layout = 'upload';
		$add_type = true;
		$status_encoded = false;
		if(!empty($this->data)){
			 
			 
			if($this->data['Banner']['template_banner']==0){ //if client upload directly from computer
				$result = $this->dimensionsee($this->data['Banner'],292,205);
			 
				if($result){
					$this->Session->setFlash('Your image should be greater then 292x205', 'default', array('class' => 'error'));
					$this->redirect(array('action' => 'upload'));
				}
				$img_dest = BANNER_DIRECTORY.'/';  	
				
				$allowed = array('image/jpeg', 'image/jpg',  'image/pjpeg', 'image/jpg', 'image/gif', 'image/png', 'image/bmp');
				//main  and extra two images upload
				if($this->data['Banner']['image']['error']!='4'){
					$fileArr1    = $this->data['Banner']['image'];
					$fileArr2 	 = $this->data['Banner']['image1'];
					$fileArr3 	 = $this->data['Banner']['image2'];
					
					$randNumImg1 = time() + rand(0,1000);
					$randNumImg2 = time() + rand(0,1000);
					$randNumImg3 = time() + rand(0,1000);

					$farr1 = explode(".", $fileArr1['name']);
					$farr2 = explode(".", $fileArr2['name']);
					$farr3 = explode(".", $fileArr3['name']);

					$ext1  = $farr1[(count($farr1)-1)];
					$ext2  = $farr2[(count($farr2)-1)];
					$ext3  = $farr3[(count($farr3)-1)];

					$coverPhoto1   = $randNumImg1."2.".$ext1;
					$coverPhoto2   = $randNumImg2."3.".$ext2;
					$coverPhoto3   = $randNumImg3."4.".$ext3;

					$file1 = $this->Upload->upload($fileArr1, $img_dest, $coverPhoto1, null, $allowed); 
					$file2 = $this->Upload->upload($fileArr2, $img_dest, $coverPhoto2, null, $allowed);
					$file3 = $this->Upload->upload($fileArr3, $img_dest, $coverPhoto3, null, $allowed);
					//$imageactualSize = getimagesize(BANNER_DIRECTORY.'/'.$coverPhoto1); 
					$this->request->data['Banner']['image'] = $coverPhoto1; 
					$this->request->data['Banner']['image1'] = $coverPhoto2;
					$this->request->data['Banner']['image2'] = $coverPhoto3;
					//$this->request->data['Banner']['status'] = 0;
					
					/*if($imageactualSize[0] > 295 && $imageactualSize[1] > 205){
						if($ext1 == 'png'){
							$this->resizeImage('resize', $coverPhoto1, BANNER_DIRECTORY, $randNumImg1.'_crop.jpg', 295, 205,9);
							$this->resizeImage('crop', $randNumImg1.'_crop.jpg', BANNER_DIRECTORY, $randNumImg1.'_crop2.jpg', 295, 205,9);
							$this->request->data['Banner']['image'] = $randNumImg1.'_crop2.jpg'; 
						}else{
							$this->resizeImage('resize', $coverPhoto1, BANNER_DIRECTORY, $randNumImg1.'_crop.jpg', 295, 205);
							$this->resizeImage('crop', $randNumImg1.'_crop.jpg', BANNER_DIRECTORY, $randNumImg1.'_crop2.jpg', 295, 205);
							$this->request->data['Banner']['image'] = $randNumImg1.'_crop2.jpg'; 
						} 
					}else{
						if($ext1 == 'png'){
							$this->resizeImage('crop', $coverPhoto1, BANNER_DIRECTORY, $randNumImg1.'_crop.jpg', 295, 205,9);
							$this->request->data['Banner']['image'] = $randNumImg1.'_crop.jpg'; 
						}else{
							$this->resizeImage('crop', $coverPhoto1, BANNER_DIRECTORY, $randNumImg1.'_crop.jpg', 295, 205);
							$this->request->data['Banner']['image'] = $randNumImg1.'_crop.jpg'; 
						}
					}
					 
					if($imageactualSize[0] > 540 && $imageactualSize[1] > 341){
						if($ext1 == 'png'){
							$this->resizeImage('resize', $coverPhoto1, BANNER_DIRECTORY, '540x341'.$randNumImg1.'_crop.jpg', 540, 341,9);
							$this->resizeImage('crop', '540x341'.$randNumImg1.'_crop.jpg', BANNER_DIRECTORY, '540x341'.$randNumImg1.'_crop2.jpg', 540, 341,9);
							$this->request->data['Banner']['big_image'] = '540x341'.$randNumImg1.'_crop2.jpg'; 
						 }else{
							$this->resizeImage('resize', $coverPhoto1, BANNER_DIRECTORY, '540x341'.$randNumImg1.'_crop.jpg',540, 341);
							$this->resizeImage('crop', '540x341'.$randNumImg1.'_crop.jpg', BANNER_DIRECTORY, '540x341'.$randNumImg1.'_crop2.jpg', 540, 341);
							 $this->request->data['Banner']['big_image'] =  '540x341'.$randNumImg1.'_crop2.jpg'; 
							 
						 } 
					}else{
						if($ext1 == 'png'){
							$this->resizeImage('crop', $coverPhoto1, BANNER_DIRECTORY, '540x341'.$randNumImg1.'_crop.jpg', 540, 341,9);
							$this->request->data['Banner']['big_image'] = '540x341'.$randNumImg1.'_crop.jpg'; 
						 }else{
							$this->resizeImage('crop', $coverPhoto1, BANNER_DIRECTORY, '540x341'.$randNumImg1.'_crop.jpg', 540, 341);
							$this->request->data['Banner']['big_image'] = '540x341'.$randNumImg1.'_crop.jpg'; 
						 }
					}
					unlink(BANNER_DIRECTORY.'/'.$coverPhoto1);*/
					 
				} else{
					$BannerDetail = $this->Banner->find("first", array('conditions'=>array('Banner.id='.$id)));
					//$this->request->data['Banner']['image1'] = null;
					//$this->request->data['Banner']['image2'] = null;
					$this->request->data['Banner']['image']=$BannerDetail['Banner']['image'];
					//$this->request->data['Banner']['status'] = 0;
					
				}
			}else{
				$this->request->data['Banner']['image'] = $this->data['Banner']['template_image'];
				$this->request->data['Banner']['image1'] = null;
				$this->request->data['Banner']['image2'] = null;
				//$this->request->data['Banner']['status'] = 0;

			}
			
			//pr($this->request->data);
			//die;
			 
			$this->request->data['Banner']['customer_id']= $this->Auth->user('id'); 
			$this->Banner->set($this->request->data);
			if($this->Banner->validates()){		
				if ($this->Banner->save($this->request->data)) {
					$BannerId = $this->Banner->getLastInsertId();
					
					
					$this->Mailer->from = '<'.FROM_EMAIL.'>';							
					
					$this->Mailer->to     = 'giftyleo6@gmail.com';
					$this->Mailer->sendAs = 'both';
					$link = 'http://'.$_SERVER['SERVER_NAME'].Router::url('/').'admin/banners/edit/'.$BannerId;
					
					$banner_link = "<a href='".$link."'>Click Here To See Banner Detail</a>";
					App::Import("Model", "EmailTemplate");
					$EmailModel  = new EmailTemplate();  
					$emailDetail = $EmailModel->find("first", array('conditions'=>array("code='BN001'", "status='1'"), 'fields'=>array('EmailTemplate.content', 'EmailTemplate.subject')));						
					$emailContent           = $emailDetail['EmailTemplate']['content'];
					$originalContent        = array("{LINK}");//These are the variables that are used in email templates
					$userContent            = array($banner_link);//user details variables
					$finalEmail             = str_replace($originalContent, $userContent,  $emailContent);//replacing the variables with user variables
					$this->Mailer->text_body = $finalEmail;
					
					$this->Mailer->subject   = $emailDetail['EmailTemplate']['subject']; 

					$this->Mailer->send();
					
					
					$this->Session->setFlash('Banner has been saved', 'default', array('class' => 'success'));
					$this->redirect(array('action' => 'mybanners/'));
				} else {
					$this->Session->setFlash('Banner could not be saved. Please try again..', 'default', array('class' => 'error'));
				}
			}else{
				$this->Session->setFlash('Banner could not be saved. Please try again..', 'default', array('class' => 'error'));
			}
			if($id > 0){
				$add_type   = false;
			}
		}else{
			
			if($id > 0){		
				$this->request->data = $this->Banner->read(null, $id);
				$add_type   = false;
				

				if ($this->request->data['Banner']['status'] == 0) {
					$status_encoded = true;

				}
				
				//pr($this->request->data);
				//pr($status_encoded);
				//die;

				if($this->request->data['Banner']['template_banner'] == 1){
					$this->request->data['Banner']['template_image'] = $this->request->data['Banner']['image']; 
				}

				

				//pr($this->request->data);
				//pr($status_encoded);
				//die;

			
			
		}
		$this->set('status_encoded', $status_encoded);
		$this->set('add_type', $add_type);
		
		//category listing
		$this->loadModel('Category');
		$category_data = $this->Category->find('all');	
		$inchageList  = Set::combine($category_data, '{n}.Category.id', '{n}.Category.name');	 
		$this->set('inchageList', $inchageList);
		
		//category listing
		$this->loadModel('Country');
		$Country_data = $this->Country->find('all');	
		$inchageList1  = Set::combine($Country_data, '{n}.Country.id', '{n}.Country.name');	 
		$this->set('inchageList1', $inchageList1);
		
			//template Banners
		$this->loadModel('TemplateBanner');
		$banner_data = $this->TemplateBanner->find('all');	
		$bannerList  = Set::combine($banner_data, '{n}.TemplateBanner.image', '{n}.TemplateBanner.title');	  
		$this->set('bannerList', $bannerList);

		// implementing the premium functionality
		 
	}
}
	
	public function flag_banner() {
		$this->loadModel('FlaggedBanner');
		if(!empty($this->data)){ 
			$this->request->data['FlaggedBanner']['customer_id']= $this->Auth->user('id'); 
			$this->request->data['FlaggedBanner']['banner_id']= $this->request->data['Banner']['banner_id']; 
			$this->FlaggedBanner->set($this->request->data);
			if ($this->FlaggedBanner->save($this->request->data)) { 
				$cnd=array("Banner.id = '".$this->request->data['Banner']['banner_id']."'");
				$this->Banner->updateAll(array('Banner.is_flag'=>"'1'"),$cnd);
				
				$this->Session->setFlash('Banner has been flagged', 'default', array('class' => 'success'));
				$this->redirect($this->request->referer());
			}  
		}  
		 
	}
	public function  delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
	     $this->Banner->id = $id;
		if (!$this->Banner->exists()) {
			throw new NotFoundException(__('Invalid Banner'));
		}
		if ($this->Banner->delete()) {
			$this->Session->setFlash('Banner deleted', 'default', array('class' => 'success'));
			$this->redirect(array('action' => 'mybanners'));
		}
		$this->Session->setFlash('Banner was not deleted', 'default', array('class' => 'error'));
		$this->redirect(array('action' => 'mybanners'));
	}
	
	function resizeImage($cType = 'resize', $id, $imgFolder, $newName = false, $newWidth=false, $newHeight=false, $quality = 75, $bgcolor = false)
    {
        $img = $imgFolder . $id;
        list($oldWidth, $oldHeight, $type) = getimagesize($img); 
        $ext = $this->image_type_to_extension($type);
        
        //check to make sure that the file is writeable, if so, create destination image (temp image)
        if (is_writeable($imgFolder))
        {
            if($newName){
                $dest = $imgFolder . $newName;
            } else {
                $dest = $imgFolder . 'tmp_'.$id;
            }
        }
        else
        {
            //if not let developer know
            $imgFolder = substr($imgFolder, 0, strlen($imgFolder) -1);
            $imgFolder = substr($imgFolder, strrpos($imgFolder, '\\') + 1, 20);
            debug("You must allow proper permissions for image processing. And the folder has to be writable.");
            debug("Run \"chmod 777 on '$imgFolder' folder\"");
            exit();
        }
        
        //check to make sure that something is requested, otherwise there is nothing to resize.
        //although, could create option for quality only
        if ($newWidth OR $newHeight)
        {
            /*
             * check to make sure temp file doesn't exist from a mistake or system hang up.
             * If so delete.
             */
            if(file_exists($dest))
            {
                unlink($dest);
            }
            else
            {
                switch ($cType){
                    default:
                    case 'resize':
                        # Maintains the aspect ration of the image and makes sure that it fits
                        # within the maxW(newWidth) and maxH(newHeight) (thus some side will be smaller)
                        $widthScale = 2;
                        $heightScale = 2;
                        
                        if($newWidth) $widthScale =     $newWidth / $oldWidth;
                        if($newHeight) $heightScale = $newHeight / $oldHeight;
                        //debug("W: $widthScale  H: $heightScale<br>");
                        if($widthScale < $heightScale) {
                            $maxWidth = $newWidth;
                            $maxHeight = false;                            
                        } elseif ($widthScale > $heightScale ) {
                            $maxHeight = $newHeight;
                            $maxWidth = false;
                        } else {
                            $maxHeight = $newHeight;
                            $maxWidth = $newWidth;
                        }
                        
                        if($maxWidth > $maxHeight){
                            $applyWidth = $maxWidth;
                            $applyHeight = ($oldHeight*$applyWidth)/$oldWidth;
                        } elseif ($maxHeight > $maxWidth) {
                            $applyHeight = $maxHeight;
                            $applyWidth = ($applyHeight*$oldWidth)/$oldHeight;
                        } else {
                            $applyWidth = $maxWidth; 
                                $applyHeight = $maxHeight;
                        }
                        //debug("mW: $maxWidth mH: $maxHeight<br>");
                        //debug("aW: $applyWidth aH: $applyHeight<br>");
                        $startX = 0;
                        $startY = 0;
                        //exit();
                        break;
                    case 'resizeCrop':
                        // -- resize to max, then crop to center
                        $ratioX = $newWidth / $oldWidth;
                        $ratioY = $newHeight / $oldHeight;
    
                        if ($ratioX < $ratioY) { 
                            $startX = round(($oldWidth - ($newWidth / $ratioY))/2);
                            $startY = 0;
                            $oldWidth = round($newWidth / $ratioY);
                            $oldHeight = $oldHeight;
                        } else { 
                            $startX = 0;
                            $startY = round(($oldHeight - ($newHeight / $ratioX))/2);
                            $oldWidth = $oldWidth;
                            $oldHeight = round($newHeight / $ratioX);
                        }
                        $applyWidth = $newWidth;
                        $applyHeight = $newHeight;
                        break;
                    case 'crop':
                        // -- a straight centered crop
                        $startY = ($oldHeight - $newHeight)/2;
                        $startX = ($oldWidth - $newWidth)/2;
                        $oldHeight = $newHeight;
                        $applyHeight = $newHeight;
                        $oldWidth = $newWidth; 
                        $applyWidth = $newWidth;
                        break;
                }
                
                switch($ext)
                {
                    case 'gif' :
                        $oldImage = imagecreatefromgif($img);
                        break;
                    case 'png' :
                        $oldImage = imagecreatefrompng($img);
                        break;
                    case 'jpg' :
                    case 'jpeg' :
                        $oldImage = imagecreatefromjpeg($img);
                        break;
                    default :
                        //image type is not a possible option
                        return false;
                        break;
                }
                
                //create new image
                $newImage = imagecreatetruecolor($applyWidth, $applyHeight);
                
                if($bgcolor):
                //set up background color for new image
                    sscanf($bgcolor, "%2x%2x%2x", $red, $green, $blue);
                    $newColor = ImageColorAllocate($newImage, $red, $green, $blue); 
                    imagefill($newImage,0,0,$newColor);
                endif;
                
                //put old image on top of new image
                imagecopyresampled($newImage, $oldImage, 0,0 , $startX, $startY, $applyWidth, $applyHeight, $oldWidth, $oldHeight);
                
                    switch($ext)
                    {
                        case 'gif' :
                            imagegif($newImage, $dest, $quality);
                            break;
                        case 'png' :
                            imagepng($newImage, $dest, $quality);
                            break;
                        case 'jpg' :
                        case 'jpeg' :
                            imagejpeg($newImage, $dest, $quality);
                            break;
                        default :
                            return false;
                            break;
                    }
                
                imagedestroy($newImage);
                imagedestroy($oldImage);
                
                if(!$newName){
                    unlink($img);
                    rename($dest, $img);
                }
                
                return true;
            }

        } else {
            return false;
        }
        

    } 
	function image_type_to_extension($imagetype)
    {
    if(empty($imagetype)) return false;
        switch($imagetype)
        {
            case IMAGETYPE_GIF    : return 'gif';
            case IMAGETYPE_JPEG    : return 'jpg';
            case IMAGETYPE_PNG    : return 'png';
            case IMAGETYPE_SWF    : return 'swf';
            case IMAGETYPE_PSD    : return 'psd';
            case IMAGETYPE_BMP    : return 'bmp';
            case IMAGETYPE_TIFF_II : return 'tiff';
            case IMAGETYPE_TIFF_MM : return 'tiff';
            case IMAGETYPE_JPC    : return 'jpc';
            case IMAGETYPE_JP2    : return 'jp2';
            case IMAGETYPE_JPX    : return 'jpf';
            case IMAGETYPE_JB2    : return 'jb2';
            case IMAGETYPE_SWC    : return 'swc';
            case IMAGETYPE_IFF    : return 'aiff';
            case IMAGETYPE_WBMP    : return 'wbmp';
            case IMAGETYPE_XBM    : return 'xbm';
            default                : return false;
        }
    } 
	public function  dimensionsee($data, $width = 100, $height = null) {
		
		$data = array_values($data);
		//pr($data);
		 $field = $data[0];

		if (empty($field['tmp_name'])) {
			return false;
		} else {
			$file = getimagesize($field['tmp_name']);
			 
			if (!$file) {
				return false;
			}
			
			$w = $file[0];
			$h = $file[1];
			$width = intval($width);
			$height = intval($height);
			
			if ($width > 0 && $height > 0) {
				//echo $w .'---'. $width.'<br>';
				//echo $h .'---'. $height;
				return ($w > $width && $h > $height) ? false : true;
				
			} else if ($width > 0 && !$height) {
				return ($w > $width) ? false : true;
				
			} else if ($height > 0 && !$width) {
				return ($h > $height) ? false : true;
				
			} else {
				return false;
			}
		}
		
		return true;
	}

}
