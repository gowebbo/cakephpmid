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
<div class="page-content">
			 
			<div class="row clearfix mbs">
				 <?php echo $this->element("left");?>  
				<!-- grid 3 sidebar -->

				<div class="grid_6 posts" id="middle" >
				 <?php echo $this->element("header");?>  
				<div class="meta-box1">
				<script>

			 function openFlagDiv(id){
				$('#div_'+id).toggle();
			 }
			 </script>
				<?php 
					if(empty($Banners)){
						echo "No record found";
					}
				?>
					<?php foreach($Banners as $Banner){?>
					<?php if($Banner['Banner']['is_premium'] == 0) { ?>
					 <div class="post">
						<h6 class="dd"><?php echo strtoupper($Banner['SubCategory']['name'])?></h6>
						<div  class="meta-box">
							<div class="left-img">
								<a   href="<?php echo $base_url?>banners/view/<?php echo $Banner['Banner']['id'] ?>"><img src="<?php echo $base_url.'timthumb.php?src='.$base_url.'/files/gallery/'.$Banner['Banner']['image'].'&w=286&h=192'?>"></a>
							</div>
							<div class="right-cont">
								<a href="<?php echo $base_url?>banners/view/<?php echo $Banner['Banner']['id'] ?>"><h6 class="h1"><?php echo $this->Text->truncate($Banner['Banner']['title'], 20, array('ending' => ''))?></h6> </a>
								<ul>   
									<li style="color: #888888; font-family: Carrois; font-size: 13px;line-height: 30px;list-style: none outside none;}">Post Date: <?php echo $Banner['Banner']['created']?>&nbsp;</li>
									<?php 
										$flaggedByUser = 'No';
										if($Banner['FlaggedBanner']){
											foreach($Banner['FlaggedBanner'] as $FlaggedBanner){
												if($FlaggedBanner['banner_id'] == $Banner['Banner']['id'] && $FlaggedBanner['customer_id'] == $loggedInUserId){
													$flaggedByUser = 'Yes';
													break;
												}
											}
										}
										 
									?>
									<li>
			  <?php if($flaggedByUser == 'No'){?>
					<span style="cursor:pointer;" class="fl" onclick="openFlagDiv('<?php echo $Banner['Banner']['id']?>');"> Flag this banner </span>
					<?php echo $this->Form->create('Banner',array('controllers'=>'banners','action'=>'flag_banner','id'=>'form_'.$Banner['Banner']['id'])); ?>
					<?php echo $this->Form->input('banner_id', array('value'=>$Banner['Banner']['id'],'type'=>'hidden')); ?>
					
					<div  style="margin-left:10px;display:none;" id="div_<?php echo $Banner['Banner']['id']?>">
						<input type="radio" value="Miscategorized " name="data[FlaggedBanner][description]">&nbsp;<font color="black">Miscategorized</font>
						<br>
						<input type="radio" value="misleading " name="data[FlaggedBanner][description]">&nbsp;<font color="black">misleading </font>
						<br>
						<input type="radio" value="in violation" name="data[FlaggedBanner][description]">&nbsp;<font color="black">in violation</font>
						<br>
						<div class="submit"><br><input type="submit" value="Submit" class="btn btn-primary"></div>
					</div>
					</form> 
			  <?php }else{?>
					<span class="fl">You Flagged This Banner</span>
			  <?php }?>
			  </li>
									<li style="color: #888888; font-family: OpenSansRegular; font-size: 13px;line-height: 30px;list-style: none outside none;}">
									<?php 
										 
										if(strlen($Banner['Banner']['description'])>60){
											echo $this->Text->truncate($Banner['Banner']['description'], 60, array('ending' => '...')).'<br><a href="'.$base_url.'banners/view/'.$Banner['Banner']['id'].'">Try it now click here</a>'; 
										}else{
											echo $Banner['Banner']['description'];
										}
										?>
									   <li>
						 
									<span class="fl">
									<?php echo $this->Html->link(__('Edit'), array('action' => 'upload', $Banner['Banner']['id'])); ?>  
					|
									<?php echo $this->Form->postLink(__('Remove'), array('action' => 'delete', $Banner['Banner']['id']), null, __('Are you sure you want to delete # %s?', $Banner['Banner']['title'])); ?>
					
									</span>
							   
							  </li>
								</ul>
									<div class="price">
									<?php 
									if($Banner['Banner']['off_percentage']>0){
									$percentage =  $Banner['Banner']['price'] * $Banner['Banner']['off_percentage']/100;
									$newPrice = $Banner['Banner']['price'] - $percentage;

									?>
									<div class="orgprice"> Org price <br/><span  style="color:#808080;text-decoration: line-through;"> <span style="color:#A8353D">
									$<?php echo number_format ($Banner['Banner']['price'],2)?> </span></span></div>
									<div class="orgprice kbs"> Kbs Deal <br/>
									$<?php echo number_format ($newPrice,2)?> </div>
									<?php }else{?>
									<div class="orgprice"> Org price <br/><span  style="color:#808080;"> <span style="color:#A8353D">
									$<?php echo number_format ($Banner['Banner']['price'],2)?> </span></span></div>
									<?php }?>
									</div>
							</div>
							 <?php if($Banner['Banner']['off_percentage']>0){?>
								<div   class="offer" >
									<?php echo $Banner['Banner']['off_percentage']?>%<br> off 
								</div>
							 <?php }?> 
						</div>

					</div> 
					<?php }else{?>
						<div class="post">
						<h6 class="dd"><?php echo strtoupper($Banner['SubCategory']['name'])?></h6>
						<div  class="meta-box">
							<div class="left-img_premium">
								<a   href="<?php echo $base_url?>banners/view/<?php echo $Banner['Banner']['id'] ?>"><img src="<?php echo $base_url.'timthumb.php?src='.$base_url.'/files/gallery/'.$Banner['Banner']['image'].'&w=286&h=192'?>"></a>
							</div>
							<div class="right-cont">
								<a href="<?php echo $base_url?>banners/view/<?php echo $Banner['Banner']['id'] ?>"><h6 class="h1"><?php echo $this->Text->truncate($Banner['Banner']['title'], 20, array('ending' => ''))?></h6> </a>
								<ul>   
									<li style="color: #888888; font-family: Carrois; font-size: 13px;line-height: 30px;list-style: none outside none;}">Post Date: <?php echo $Banner['Banner']['created']?>&nbsp;</li>
									<?php 
										$flaggedByUser = 'No';
										if($Banner['FlaggedBanner']){
											foreach($Banner['FlaggedBanner'] as $FlaggedBanner){
												if($FlaggedBanner['banner_id'] == $Banner['Banner']['id'] && $FlaggedBanner['customer_id'] == $loggedInUserId){
													$flaggedByUser = 'Yes';
													break;
												}
											}
										}
										 
									?>
									<li>
							
			  <?php if($flaggedByUser == 'No'){?>
					<span style="cursor:pointer;" class="fl" onclick="openFlagDiv('<?php echo $Banner['Banner']['id']?>');"> Flag this banner </span>
					<?php echo $this->Form->create('Banner',array('controllers'=>'banners','action'=>'flag_banner','id'=>'form_'.$Banner['Banner']['id'])); ?>
					<?php echo $this->Form->input('banner_id', array('value'=>$Banner['Banner']['id'],'type'=>'hidden')); ?>
					
					<div  style="margin-left:10px;display:none;" id="div_<?php echo $Banner['Banner']['id']?>">
						<input type="radio" value="Miscategorized " name="data[FlaggedBanner][description]">&nbsp;<font color="black">Miscategorized</font>
						<br>
						<input type="radio" value="misleading " name="data[FlaggedBanner][description]">&nbsp;<font color="black">misleading </font>
						<br>
						<input type="radio" value="in violation" name="data[FlaggedBanner][description]">&nbsp;<font color="black">in violation</font>
						<br>
						<div class="submit"><br><input type="submit" value="Submit" class="btn btn-primary"></div>
					</div>
					</form> 
			  <?php }else{?>
					<span class="fl">You Flagged This Banner</span>
			  <?php }?>
									  </li>
									<li style="color: #888888; font-family: OpenSansRegular; font-size: 13px;line-height: 30px;list-style: none outside none;}">
									<?php 
										 
										if(strlen($Banner['Banner']['description'])>60){
											echo $this->Text->truncate($Banner['Banner']['description'], 60, array('ending' => '...')).'<br><a href="'.$base_url.'banners/view/'.$Banner['Banner']['id'].'">Try it now click here</a>'; 
										}else{
											echo $Banner['Banner']['description'];
										}
										?>
									   <li>
						 
									<span class="fl">
									<?php echo $this->Html->link(__('Edit'), array('action' => 'upload', $Banner['Banner']['id'])); ?>  
					|
									<?php echo $this->Form->postLink(__('Remove'), array('action' => 'delete', $Banner['Banner']['id']), null, __('Are you sure you want to delete # %s?', $Banner['Banner']['title'])); ?>
					
									</span>
							   
							  </li>
								</ul>
									<div class="price">
									<?php 
									if($Banner['Banner']['off_percentage']>0){
									$percentage =  $Banner['Banner']['price'] * $Banner['Banner']['off_percentage']/100;
									$newPrice = $Banner['Banner']['price'] - $percentage;

									?>
									<div class="orgprice"> Org price <br/><span  style="color:#808080;text-decoration: line-through;"> <span style="color:#A8353D">
									$<?php echo number_format ($Banner['Banner']['price'],2)?> </span></span></div>
									<div class="orgprice kbs"> Kbs Deal <br/>
									$<?php echo number_format ($newPrice,2)?> </div>
									<?php }else{?>
									<div class="orgprice"> Org price <br/><span  style="color:#808080;"> <span style="color:#A8353D">
									$<?php echo number_format ($Banner['Banner']['price'],2)?> </span></span></div>
									<?php }?>
									</div>
							</div>
							 <?php if($Banner['Banner']['off_percentage']>0){?>
								<div   class="offer"  >
									<?php echo $Banner['Banner']['off_percentage']?>%<br> off 
								</div>
							 <?php }?> 
						</div>

					</div>
					<?php } ?> 
					<?php }?> 
 
 	 
 
 	 
 
 	 
					<div class="pagination-tt clearfix">
						<ul>
					<?php if($this->Paginator->numbers(array('separator' => ''))){?>
						<?php //echo $this->Paginator->prev(__('<<', true),array('tag'=>'li')); ?>
						 <?php echo $this->Paginator->numbers(array('separator' => '','tag'=>'li')); ?>&nbsp;
						<?php //echo $this->Paginator->next(__('>>', true),array('tag'=>'','tag'=>'li')); ?>
					<?php }?>
					    </ul>
					</div>
					<!--<div class="pagination-tt clearfix">
						<ul>
							<li><span>1</span></li>
							<li><a href="#">2</a></li>
							<li><a href="#">3</a></li>
							<li><a href="#">4</a></li>
							<li><a href="#">5</a></li>
							<li><span>...</span></li>
							<li><a href="#">27</a></li>
						</ul>
						<span class="pages">Page 1 of 27</span>
					</div>--><!-- pagination -->
					</div>
				</div><!-- grid 6 posts -->

				 <?php echo $this->element("right");?>  <!-- grid 3 sidebar -->

			</div><!-- row -->
		</div><!-- end page content -->