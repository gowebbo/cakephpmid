<div class="page-content">
			<div class="row clearfix mbs">
				 <?php echo $this->element("left");?>  
				 <!-- grid 3 sidebar -->

				<div class="grid_6 posts" id="middle" >
				<div class="meta-box1">
				<script>

			 function openFlagDiv(id){
				$('#div_'+id).toggle();
			 }
			 </script>
					 <div class="post">
						<h6 class="dd"><?php echo  $Banner['SubCategory']['name']?></h6>
						<div  class="meta-box">
							<div class="left-img">
								<a  href="#">
								<img  src="<?php echo $base_url.'timthumb.php?src='.$base_url.'/files/gallery/'.$Banner['Banner']['image'].'&w=286&h=192'?>"  />
								
								</a>
							</div>
							<div class="right-cont">
								<a  href="#"><h6 class="h1"><?php echo $Banner['Banner']['title']?></h6> </a>
								<div class="clear"></div>
								<?php if($Banner['Banner']['off_percentage']>0){?>
								<div   class="offer1"  >
								<?php echo $Banner['Banner']['off_percentage']?>%<br> off 
								</div>
								  <?php }?>  
								<div class="clear"></div>
								<div class="price">
									<?php 
						if($Banner['Banner']['off_percentage']>0){
							$percentage =  $Banner['Banner']['price'] * $Banner['Banner']['off_percentage']/100;
							$newPrice = $Banner['Banner']['price'] - $percentage;
							
					?>
					<div class="orgprice" style="color:#808080;"><span style="color:#A8353D"> Org price    <br/> <span style="text-decoration: line-through;">$<?php echo number_format ($Banner['Banner']['price'],2)?></span></span> </div>
								<div class="orgprice kbs"> Kbs Deal  <br/> $<?php echo number_format ($newPrice,2)?> </div>
								<?php }else{?>
						<div class="orgprice">  Org price    <br/> $<?php echo number_format ($Banner['Banner']['price'],2)?> </div>
					
					 <?php }?>
								</div>
							</div>
							</div> 
							<div class="clear"></div>
							<div class="main-cont">
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
							<ul>   
									<li>
									  <?php if($flaggedByUser == 'No'){?>
											<span style="cursor:pointer;" class="fl" onclick="openFlagDiv('<?php echo $Banner['Banner']['id']?>');"> Flag this banner </span>

											<?php echo $this->Form->create('Banner',array('controllers'=>'banners','action'=>'flag_banner','id'=>'form_'.$Banner['Banner']['id'])); ?>
											<?php echo $this->Form->input('banner_id', array('value'=>$Banner['Banner']['id'],'type'=>'hidden')); ?>
											
											<div  style="margin-left:10px;display:none;" id="div_<?php echo $Banner['Banner']['id']?>">
												<input type="radio" value="Miscategorized " name="data[FlaggedBanner][description]">&nbsp;Miscategorized
												<br>
												<input type="radio" value="misleading " name="data[FlaggedBanner][description]">&nbsp;misleading 
												<br>
												<input type="radio" value="in violation" name="data[FlaggedBanner][description]">&nbsp;in violation
												<br>
												<div class="submit"><br><input type="submit" value="Submit" class="btn btn-primary"></div>
											</div>
											</form> 
									  <?php }else{?>
											<span class="fl">You Flagged This Banner</span>
									  <?php }?>
									  </li>


									<!-- Adding photos -->
									<?php if ($Banner['Banner']['image1'] != null) {?>

									<li class="left-img_thumbnail">
									<a  href="#">
									<img src="<?php echo $base_url.'timthumb.php?src='.$base_url.'/files/gallery/'.$Banner['Banner']['image1'].'&w=286&h=192'?>"  />
								
									</a>
									</li>

									<?php } ?>

									<?php if ($Banner['Banner']['image2'] != null) { ?>

									<li class="left-img_thumbnail">
									<a  href="#">
									<img  src="<?php echo $base_url.'timthumb.php?src='.$base_url.'/files/gallery/'.$Banner['Banner']['image2'].'&w=286&h=192'?>"  />
								
									</a>
									</li>
									<?php } ?>
									<?php echo "<br/>"; ?>
									<br/>

									<?php if ($Banner['Banner']['image1']  == null && $Banner['Banner']['image2'] == null)  { ?>
										<li style="color: #888888; font-family: Carrois; font-size: 13px;line-height: 0px;list-style: none outside none; padding-bottom: 5px;}"><?php echo "<br/> <br/>" . $Banner['Banner']['large_description']?></li>
									<?php } ?>

									<?php if ($Banner['Banner']['image1']  != null && $Banner['Banner']['image2'] != null)  { ?>
									<li style="color: #888888; font-family: Carrois; font-size: 13px;line-height: 30px;list-style: none outside none;}"><?php echo "<br/> <br/>" . $Banner['Banner']['large_description']?></li>
									<?php } ?>
									
									<li> Location: <?php echo $Banner['State']['name']?>, <?php echo $Banner['Country']['name']?></li>
								</ul>
							</div>
 	 
 	 </div>
					</div>
				</div><!-- grid 6 posts -->

				<?php echo $this->element("right");?> <!-- grid 3 sidebar -->

			</div><!-- row -->
		</div>