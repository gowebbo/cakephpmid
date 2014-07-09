<?php
App::uses('AppController', 'Controller');
/**
 * Products Controller
 *
 * @property Product $Product
 */
class ProductsController extends AppController {
	var $components = array('RequestHandler' ,'Upload');
    var $helpers = array('Html', 'Form', 'Time','Js');
	public $paginate = array(
        'limit' =>15,
    );
	
    function beforeFilter()
    {
		parent::beforeFilter();
		$this->Auth->allow('view','index');		
	    
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
		
		if(!empty($this->data['Product']['search_value']) && $this->data['Product']['search_value']!='Product Name or Sku'){
			$searchCriteriaTerm=trim($this->data['Product']['search_value']);
			$condition[]    = "(Product.sku like '%".$searchCriteriaTerm."%' || Product.name like '%".$searchCriteriaTerm."%')";		
			$savecrit = "search_value:".$searchCriteriaTerm;
                }
		
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
		
		$this->Product->recursive = 0;
		$data = $this->paginate('Product', $condition);
		
		$this->set('savecrit', $savecrit);
		$this->set('products', $data);
		
		
		
	}


/**
 * add method
 *
 * @return void
 */
	public function admin_add($id = 0) {
		$this->loadModel('ProductOccassion');
		$this->loadModel('ProductSpecialDay');
		$this->loadModel('ProductFestival');
		 $add_type = true;
		if(!empty($this->data)){
			//pr($this->data);
			//die;
			
			$img_dest = PRODUCT_DIRECTORY.'/';  	
			
			$allowed = array('image/jpeg', 'image/jpg',  'image/pjpeg', 'image/jpg', 'image/gif', 'image/png', 'image/bmp');
			//main image upload
			if($this->data['Product']['thumbnail_image_filepath']['error']!='4'){
				$fileArr    = $this->data['Product']['thumbnail_image_filepath'];
				
				$randNumImg = time();
				$farr = explode(".", $fileArr['name']);				
				$ext  = $farr[(count($farr)-1)];
				$coverPhoto   = $randNumImg."1.".$ext;
				$file = $this->Upload->upload($fileArr, $img_dest, $coverPhoto, null, $allowed);
				
				if(isset($file['uploaderror'])){
					$this->Product->validationErrors[] = "Unable to upload the cover photo.";
				}
				$this->request->data['Product']['thumbnail_image_filepath'] = $coverPhoto;
			}else{
				$productDetail = $this->Product->find("first", array('conditions'=>array('Product.id='.$id)));
				$this->request->data['Product']['thumbnail_image_filepath']=$productDetail['Product']['thumbnail_image_filepath'];
			}
			
			if($this->data['Product']['full_image_filepath']['error']!='4'){
				$fileArr1    = $this->data['Product']['full_image_filepath'];
				
				$randNumImg1 = time();
				$farr1 = explode(".", $fileArr1['name']);				
				$ext1  = $farr1[(count($farr1)-1)];
				$coverPhoto1   = $randNumImg1."2.".$ext1;
				$file1 = $this->Upload->upload($fileArr1, $img_dest, $coverPhoto1, null, $allowed);
				
				
				$this->request->data['Product']['full_image_filepath'] = $coverPhoto1;
			}else{
				$productDetail = $this->Product->find("first", array('conditions'=>array('Product.id='.$id)));
				$this->request->data['Product']['full_image_filepath']=$productDetail['Product']['full_image_filepath'];
				
			}
			 
			$this->Product->set($this->request->data);
			if($this->Product->validates()){		
				if ($this->Product->save($this->request->data)) {
					$ProductId = $this->Product->getLastInsertId();
					//insert into book_board
					if($id==0){
						$ProductIdData = $ProductId;
					}else{
						$ProductIdData = $id;
					}
					//delete all the ocassions associate with the product and insert it from the begoining
					if(count($this->request->data['Product']['occassion_id'])>0 && !empty($this->request->data['Product']['occassion_id'])){
						
						
						$count = count($this->request->data['Product']['occassion_id']);
						$cnd=array("ProductOccassion.product_id IN ($ProductIdData) ");
						$this->ProductOccassion->deleteAll($cnd,$cascade=true);
						
						for($i=0;$i<$count;$i++){
							$this->request->data['ProductOccassion']['id'] = 0;
							$this->request->data['ProductOccassion']['product_id'] = $ProductIdData;
							$this->request->data['ProductOccassion']['occassion_id'] = $this->request->data['Product']['occassion_id'][$i];
							$this->ProductOccassion->save($this->request->data['ProductOccassion']);
						}
					} 
					//delete all the ocassions associate with the product and insert it from the begoining
					if(count($this->request->data['Product']['special_day_id'])>0 && !empty($this->request->data['Product']['special_day_id'])){
						
						
						$count = count($this->request->data['Product']['special_day_id']);
						$cnd=array("ProductSpecialDay.product_id IN ($ProductIdData) ");
						$this->ProductSpecialDay->deleteAll($cnd,$cascade=true);
						
						for($i=0;$i<$count;$i++){
							$this->request->data['ProductSpecialDay']['id'] = 0;
							$this->request->data['ProductSpecialDay']['product_id'] = $ProductIdData;
							$this->request->data['ProductSpecialDay']['special_day_id'] = $this->request->data['Product']['special_day_id'][$i];
							$this->ProductSpecialDay->save($this->request->data['ProductSpecialDay']);
						}
					} 
					if(count($this->request->data['Product']['festival_id'])>0 && !empty($this->request->data['Product']['festival_id'])){
						
						
						$count = count($this->request->data['Product']['festival_id']);
						$cnd=array("ProductFestival.product_id IN ($ProductIdData) ");
						$this->ProductFestival->deleteAll($cnd,$cascade=true);
						
						for($i=0;$i<$count;$i++){
							$this->request->data['ProductFestival']['id'] = 0;
							$this->request->data['ProductFestival']['product_id'] = $ProductIdData;
							$this->request->data['ProductFestival']['festival_id'] = $this->request->data['Product']['festival_id'][$i];
							$this->ProductFestival->save($this->request->data['ProductFestival']);
						}
					} 
					$this->Session->setFlash('Product has been saved', 'default', array('class' => 'success'));
					$this->redirect(array('action' => 'add/'.$ProductIdData));
				} else {
					$this->Session->setFlash('Product could not be saved. Please try again..', 'default', array('class' => 'error'));
				}
			}else{
				$this->Session->setFlash('Product could not be saved. Please try again..', 'default', array('class' => 'error'));
			}
			if($id > 0){
				$add_type   = false;
			}
		}else{
			
			if($id > 0){		
				$this->request->data = $this->Product->read(null, $id);
				$add_type   = false;
				
				
				$Occassion = $this->ProductOccassion->find("all", array('conditions'=>array('ProductOccassion.product_id='.$id)));	
				
				$OccassionArray = array();
				for($i=0;$i<count($Occassion);$i++){
					$OccassionArray[] = $Occassion[$i]['ProductOccassion']['occassion_id'];
				}
				
				$this->set('OccassionArray', $OccassionArray);
				
				$ProductSpecialDay = $this->ProductSpecialDay->find("all", array('conditions'=>array('ProductSpecialDay.product_id='.$id)));	
				
				$ProductSpecialDayArray = array();
				for($i=0;$i<count($ProductSpecialDay);$i++){
					$ProductSpecialDayArray[] = $ProductSpecialDay[$i]['ProductSpecialDay']['special_day_id'];
				}
				
				$this->set('ProductSpecialDayArray', $ProductSpecialDayArray);
				
				$ProductFestival = $this->ProductFestival->find("all", array('conditions'=>array('ProductFestival.product_id='.$id)));	
				
				$ProductFestivalArray = array();
				for($i=0;$i<count($ProductFestival);$i++){
					$ProductFestivalArray[] = $ProductFestival[$i]['ProductFestival']['festival_id'];
				}
				
				$this->set('ProductFestivalArray', $ProductFestivalArray);
				
			}
			
		}
		$this->set('add_type', $add_type);
		//category listing
		$this->loadModel('Category');
		$category_data = $this->Category->find('all');	
		$inchageList  = Set::combine($category_data, '{n}.Category.id', '{n}.Category.name');	 
		$this->set('inchageList', $inchageList);
		
		//Occassion listing
		$this->loadModel('Occassion');
		$Occassiony_data = $this->Occassion->find('all');	
		$inchageList1  = Set::combine($Occassiony_data, '{n}.Occassion.id', '{n}.Occassion.name');	 
		$this->set('inchageList1', $inchageList1);
		
		//SpecialDay listing
		$this->loadModel('SpecialDay');
		$SpecialDay_data = $this->SpecialDay->find('all');	
		$inchageList2  = Set::combine($SpecialDay_data, '{n}.SpecialDay.id', '{n}.SpecialDay.name');	 
		$this->set('inchageList2', $inchageList2);
		
		//Festival listing
		$this->loadModel('Festival');
		$Festival_data = $this->Festival->find('all');	
		$inchageList3  = Set::combine($Festival_data, '{n}.Festival.id', '{n}.Festival.name');	 
		$this->set('inchageList3', $inchageList3);
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
	            $this->Product->id = $id;
		if (!$this->Product->exists()) {
			throw new NotFoundException(__('Invalid product'));
		}
		if ($this->Product->delete()) {
			$this->Session->setFlash('Product deleted', 'default', array('class' => 'success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash('Product was not deleted', 'default', array('class' => 'error'));
		$this->redirect(array('action' => 'index'));
	}
	
	public function view($slug=null) {
		
		$this->layout = 'index';
		$this->loadModel('Product');
		
		
		
		$product = $this->Product->find("first", array('conditions'=>array('Product.slug'=>$slug,'Product.active'=>0)));	
		
		//get slected cateory name
		$category = '';
		$category_id = $this->Session->read('cat_id');
		if(!empty($category_id)){
			$category = $this->Category->find("first", array('conditions'=>array('Category.id'=>$category_id)));	
			$this->set('category_name', $category['Category']['name']);
			$this->set('category_id', $category['Category']['id']);
		}
		//end
		
		$this->set('category', $category);
		$this->set('product', $product);	
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
	
	public function index()
    {
		$this->layout = 'index';
		$this->loadModel('Product');	
		$this->loadModel('ProductOccassion');	
		$this->loadModel('ProductSpecialDay');
		$this->loadModel('ProductFestival');
		$loggedUserId	= $this->Auth->user('id');
		 
		$condition = array();
		$savecrit = '';
		$cat_id = '';
		$sub_cat_id = '';
		$occId = '';
		$SpecialDayId = '';
		$FestivalId = '';
		
		
		
		$args = $this->params['url']; 
		unset($args['url']); 
		
		if(isset($args['submit'])) 
		unset($args['submit']); 
		
		if(!empty($this->request->data)) { 
			foreach($this->data['Product'] as $key=>$value) 
			$args[$key] = $value; 
		} else { 
			foreach($args as $key=>$value) 
			$this->request->data['Product'][$key] = $value; 
		}
		
		if(!empty($this->request->data['Product']['catId'])){
			$searchCriteriaTerm=trim($this->request->data['Product']['catId']);
			$condition[]    = "(Product.category_id = '".$searchCriteriaTerm."')";		
			$cat_id = $this->request->data['Product']['catId'];
		}elseif(!empty($this->params['named']['catId'])){
			$searchCriteriaTerm=trim($this->params['named']['catId']);
			$condition[]    = "(Product.category_id = '".$searchCriteriaTerm."')";		
			$cat_id = $this->params['named']['catId'];
		}
		if(!empty($this->request->data['Product']['subCatId'])){
			$searchCriteriaTerm=trim($this->request->data['Product']['subCatId']);
			$condition[]    = "(Product.sub_category_id = '".$searchCriteriaTerm."')";		
			$sub_cat_id = $this->request->data['Product']['subCatId'];
		}elseif(!empty($this->params['named']['subCatId'])){
			$searchCriteriaTerm=trim($this->params['named']['subCatId']);
			$condition[]    = "(Product.sub_category_id = '".$searchCriteriaTerm."')";		
			$sub_cat_id = $this->params['named']['subCatId'];
		}
		
		if(!empty($this->request->data['Product']['occId'])){
			$searchCriteriaTerm=trim($this->request->data['Product']['occId']);
			$condition[]    = "(ProductOccassion.occassion_id = '".$searchCriteriaTerm."')";		
			$occId = $this->request->data['Product']['occId'];
		}elseif(!empty($this->params['named']['occId'])){
			$searchCriteriaTerm=trim($this->params['named']['occId']);
			$condition[]    = "(ProductOccassion.occassion_id = '".$searchCriteriaTerm."')";	
			$occId = $this->params['named']['occId'];
		}
		
		if(!empty($this->request->data['Product']['SpecialDayId'])){
			$searchCriteriaTerm=trim($this->request->data['Product']['SpecialDayId']);
			$condition[]    = "(ProductSpecialDay.special_day_id = '".$searchCriteriaTerm."')";		
			$SpecialDayId = $this->request->data['Product']['SpecialDayId'];
		}elseif(!empty($this->params['named']['SpecialDayId'])){
			$searchCriteriaTerm=trim($this->params['named']['SpecialDayId']);
			$condition[]    = "(ProductSpecialDay.special_day_id = '".$searchCriteriaTerm."')";	
			$SpecialDayId = $this->params['named']['SpecialDayId'];
		}
		
		if(!empty($this->request->data['Product']['FestivalId'])){
			$searchCriteriaTerm=trim($this->request->data['Product']['FestivalId']);
			$condition[]    = "(ProductFestival.festival_id = '".$searchCriteriaTerm."')";		
			$FestivalId = $this->request->data['Product']['FestivalId'];
		}elseif(!empty($this->params['named']['FestivalId'])){
			$searchCriteriaTerm=trim($this->params['named']['FestivalId']);
			$condition[]    = "(ProductFestival.festival_id = '".$searchCriteriaTerm."')";	
			$FestivalId = $this->params['named']['FestivalId'];
		}
		if(!empty($this->request->data['Product']['filter'])){
			$searchCriteriaTerm=trim($this->request->data['Product']['filter']);
			$condition[]    = "(Product.name LIKE '%".$searchCriteriaTerm."%' || Product.long_description LIKE '%".$searchCriteriaTerm."%')";		
		}
		
	 
		
		$condition[] = 'Product.active = 0';
		
		
		 
		 if(!empty($occId)){
			$this->ProductOccassion->recursive = 2;
			$this->paginate = array(
			'limit' => 20,
			 );
			$data = $this->paginate('ProductOccassion', $condition);
			
		 }else if(!empty($SpecialDayId)){
			$this->ProductSpecialDay->recursive = 2;
			$this->paginate = array(
			'limit' => 20,
			 );
			$data = $this->paginate('ProductSpecialDay', $condition);
		 }else if(!empty($FestivalId)){
			$this->ProductFestival->recursive = 2;
			$this->paginate = array(
			'limit' => 20,
			 );
			$data = $this->paginate('ProductFestival', $condition);
		 }else {
			$this->Product->recursive = 2;
			$this->paginate = array(
			'limit' => 20,
			 );
			$data = $this->paginate('Product', $condition);
		 }
		 
		$this->set('occId', $occId);
		$this->set('SpecialDayId', $SpecialDayId);
		$this->set('FestivalId', $FestivalId);
		
		$this->set('savecrit', $savecrit);
		$this->set('products', $data);
    }
}
