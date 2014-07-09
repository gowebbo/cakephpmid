 <?php 
  $url = $this->params['url'];

    unset($url['url']);
    if(isset($this->request->data) && !empty($this->request->data)) {
        foreach($this->request->data['Banner'] as $key=>$value)
            $url[$key] = $value;
    }
    $get_var = http_build_query($url);

    $arg1 = array();
    $arg2 = array();
    //take the named url
    if(!empty($this->params['named']))
        $arg1 = $this->params['named'];

    //take the pass arguments
    if(!empty($this->params['pass']))
        $arg2 = $this->params['pass'];

    //merge named and pass
    $args = array_merge($arg1,$arg2);

    //add get variables
    $args["?"] = $get_var;
    $this->Paginator->options(array(
	'update' => '#right-container',
	'evalScripts' => true,
	'before' => $this->Js->get('#busy-indicator')->effect('fadeIn', array('buffer' => false)),
	'complete' => $this->Js->get('#busy-indicator')->effect('fadeOut', array('buffer' => false)),
	'url' =>  $args)); 
?>
<div class="row">
        <div class="span12">
		<?php if($userData){?>
			<a class="signout" href="<?php echo $base_url?>customers/logout" title="My Account">Logout</a> 
			<a class="singin"  href="<?php echo $base_url?>banners/upload" title="My Account">Upload Banner</a>   
		<?php }else{?>
			 <a class="signout" href="<?php echo $base_url?>customers/register">| &nbsp;SIGN UP</a> 
			<a class="singin" href="<?php echo $base_url?>customers/login">SIGN IN</a>
			 
		<?php }?>
       </div></div>
		
		 
		   <div style="text-align:center; font-weight:bold; font-size:30px; color:#1B9CB1; margin-bottom:30px;">
          <div class="row">
          <div class="span9"><span class="daily">MY DEALS</span></div>
          
          
          </div></div>
		  
		  <div class="row-fluid">
           
              <div class="span3">
                <!-- <div class="thumbnail">
                 
                 <div class="caption">
					<?php foreach($allcategory as $category){?>
                    <h3><?php echo $category['Category']['name']?></h3>
                    <ul class="list-group">
						<?php foreach($category['SubCategory'] as $subcategory){?>
						<li class="list-group-item">    <a href="#"><?php echo $subcategory['name']?></a> </li>
						<?php }?>
					</ul> 
					<?php }?>
                  </div> 
                </div>-->
              </div>
			<div id="right-container">
                <div class="middle">
				<?php foreach($Banners as $Banner){?>
               <h6 class="dd">&nbsp;</h6>  
                <div class="span6" id="s6"> 
					<div class="span3"><span class="shadow">
					
					<img src="<?php echo $base_url?>files/gallery/<?php echo $Banner['Banner']['image']?>"></span>
					<br>&nbsp;
					<?php echo $this->Html->link(__('Edit'), array('action' => 'upload', $Banner['Banner']['id'])); ?> |
					
					<?php echo $this->Form->postLink(__('Remove'), array('action' => 'delete', $Banner['Banner']['id']), null, __('Are you sure you want to delete # %s?', $Banner['Banner']['title'])); ?>
					
					</div>
					<?php if($Banner['Banner']['off_percentage']>0){?>
						<span class="img1"> <h3 class="offer"><?php echo $Banner['Banner']['off_percentage']?>%</h3><img src="<?php echo $base_url?>img/off.png"></span> 
					<?php }?>
					<section class="span3" id="sec">   
					<ul>
					<h6><a href="#"><span class="imghd"><?php echo $Banner['Banner']['title']?></span></a></h6>
					<li><?php echo $Banner['Banner']['description']?></li>
					<h6  class="price">
					<?php 
						if($Banner['Banner']['off_percentage']>0){
							$percentage =  $Banner['Banner']['price'] * $Banner['Banner']['off_percentage']/100;
							$newPrice = $Banner['Banner']['price'] - $percentage;
							
					?>
						<del class="oldprice">$<?php echo $Banner['Banner']['price']?></del>
					
						$<?php echo $newPrice?></h6>
					<?php }else{?>
						$<?php echo $Banner['Banner']['price']?></h6>
					<?php }?>
					</ul> 
					</section>
									
					</div>
						
             <?php }?>         
                
             </div> 
			 <div class="pagination">
				<?php if($this->Paginator->numbers(array('separator' => ''))){?>
					<?php echo $this->Paginator->prev(__('<<', true),array('tag'=>'div')); ?>
					&nbsp;<?php echo $this->Paginator->numbers(array('separator' => '','tag'=>'div')); ?>&nbsp;
					<?php echo $this->Paginator->next(__('>>', true),array('tag'=>'','tag'=>'div')); ?>
				<?php }?>
					 
				</div> 
			 </div>
              <div class="span3">
                <!--<div class="thumbnail">
                  <div class="caption">
				  <?php foreach($allcountry as $country){?>
                    <h3><?php echo $country['Country']['name']?></h3>
					<ul class="list-group1">
						<?php foreach($country['State'] as $state){?>  
						  <li  class="list-group-item"><img src="<?php echo $base_url?>img/hypersign.png">
						  <a href="#">&nbsp;&nbsp;<?php echo $state['name']?></a></li>
						<?php }?>
					</ul>  
					<?php }?>
					</div> 
                </div>-->
              </div> 
             </div>
			 <!--
			 <div class="but">
 
  <a class="button_example" href="#">Show More</a>
      <span class="pagination">5 Of 232</span></div>-->
          