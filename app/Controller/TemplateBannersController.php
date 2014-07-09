<?php
App::uses('AppController', 'Controller');
/**
 * TemplateBanners Controller
 *
 * @property TemplateBanner $TemplateBanner
 */
class TemplateBannersController extends AppController {
	var $components = array('RequestHandler','Upload');
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
		
		
		if(!empty($this->data['TemplateBanner']['search_value']) && $this->data['TemplateBanner']['search_value']!='Enter TemplateBanner Name'){
			$searchCriteriaTerm=trim($this->data['TemplateBanner']['search_value']);
			$condition[]    = "(TemplateBanner.name like '%".$searchCriteriaTerm."%')";		
			$savecrit = "search_value:".$searchCriteriaTerm;
		}else if(!empty($this->params['pass'][0])){
			$value_explode = explode(':',$this->params['pass'][0]);
			$searchCriteriaTerm=trim($value_explode[1]);
			$condition[]    = "(TemplateBanner.name like '%".$searchCriteriaTerm."%')";		
			$savecrit = "search_value:".$searchCriteriaTerm;
		}
		
		$this->TemplateBanner->recursive = 0;
		$data = $this->paginate('TemplateBanner', $condition);
		
		$this->set('savecrit', $savecrit);
		$this->set('Banners', $data);
	}

/**
 * add method
 *
 * @return void
 */
	public function admin_add($id = 0) {
	$add_type = true;
		if(!empty($this->data)){
			
			$img_dest = BANNER_DIRECTORY.'/';  	
			
			$allowed = array('image/jpeg', 'image/jpg',  'image/pjpeg', 'image/jpg', 'image/gif', 'image/png', 'image/bmp');
			//main image upload
			if($this->data['TemplateBanner']['image']['error']!='4'){
				$result = $this->dimensionsee($this->data['TemplateBanner'],292,205);
				 
				if($result){
					//$this->Session->setFlash('Your image should be greater then 292x205', 'default', array('class' => 'error'));
					//$this->redirect(array('action' => 'add'));
				}
				
				$fileArr1    = $this->data['TemplateBanner']['image'];
				
				$randNumImg1 = time();
				$farr1 = explode(".", $fileArr1['name']);				
				$ext1  = $farr1[(count($farr1)-1)];
				$coverPhoto1   = $randNumImg1."2.".$ext1;
				$file1 = $this->Upload->upload($fileArr1, $img_dest, $coverPhoto1, null, $allowed); 
				$this->request->data['TemplateBanner']['image']=$coverPhoto1;
				
				/*$imageactualSize = getimagesize(BANNER_DIRECTORY.'/'.$coverPhoto1); 
			 
				if($imageactualSize[0] > 295 && $imageactualSize[1] > 205){
					if($ext1 == 'png'){
						$this->resizeImage('resize', $coverPhoto1, BANNER_DIRECTORY, $randNumImg1.'_crop.jpg', 295, 205,9);
						$this->resizeImage('crop', $randNumImg1.'_crop.jpg', BANNER_DIRECTORY, $randNumImg1.'_crop2.jpg', 295, 205,9);
						$this->request->data['TemplateBanner']['image'] = $randNumImg1.'_crop2.jpg'; 
					}else{
						$this->resizeImage('resize', $coverPhoto1, BANNER_DIRECTORY, $randNumImg1.'_crop.jpg', 295, 205);
						$this->resizeImage('crop', $randNumImg1.'_crop.jpg', BANNER_DIRECTORY, $randNumImg1.'_crop2.jpg', 295, 205);
						$this->request->data['TemplateBanner']['image'] = $randNumImg1.'_crop2.jpg'; 
					} 
				}else{
					if($ext1 == 'png'){
						$this->resizeImage('crop', $coverPhoto1, BANNER_DIRECTORY, $randNumImg1.'_crop.jpg', 295, 205,9);
						$this->request->data['TemplateBanner']['image'] = $randNumImg1.'_crop.jpg'; 
					}else{
						$this->resizeImage('crop', $coverPhoto1, BANNER_DIRECTORY, $randNumImg1.'_crop.jpg', 295, 205);
						$this->request->data['TemplateBanner']['image'] = $randNumImg1.'_crop.jpg'; 
					}
				}
				unlink(BANNER_DIRECTORY.'/'.$coverPhoto1); */
			} else{
				$BannerDetail = $this->TemplateBanner->find("first", array('conditions'=>array('TemplateBanner.id='.$id)));
				$this->request->data['TemplateBanner']['image']=$BannerDetail['TemplateBanner']['image'];
				
			}
			
			
		 
			
			 
			 
			$this->TemplateBanner->set($this->request->data);
			if($this->TemplateBanner->validates()){		
				if ($this->TemplateBanner->save($this->request->data)) {
					$BannerId = $this->TemplateBanner->getLastInsertId();
					    
					$this->Session->setFlash('Banner has been saved', 'default', array('class' => 'success'));
					$this->redirect(array('action' => 'index'));
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
				$this->request->data = $this->TemplateBanner->read(null, $id);
				$add_type   = false; 
				
			}
			
		}
		$this->set('add_type', $add_type);
	 
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->TemplateBanner->id = $id;
		if (!$this->TemplateBanner->exists()) {
			throw new NotFoundException(__('Invalid TemplateBanner'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->TemplateBanner->save($this->request->data)) {
				$this->Session->setFlash('The TemplateBanner has been saved', 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The TemplateBanner could not be saved. Please, try again.', 'default', array('class' => 'error'));
			}
		} else {
			$this->request->data = $this->TemplateBanner->read(null, $id);
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
		$this->TemplateBanner->id = $id;
		if (!$this->TemplateBanner->exists()) {
			throw new NotFoundException(__('Invalid TemplateBanner'));
		}
		if ($this->TemplateBanner->delete()) {
			$this->Session->setFlash('TemplateBanner deleted', 'default', array('class' => 'success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash('TemplateBanner was not deleted', 'default', array('class' => 'error'));
		$this->redirect(array('action' => 'index'));
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
