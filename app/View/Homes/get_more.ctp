 
	<?php foreach($Banners as $Banner){?>
      <h6 class="dd"><?php echo strtoupper($Banner['SubCategory']['name'])?></h6>
       
      <div class="span6" id="s6">
        <a class="cat-bot" href="<?php echo $base_url?>banners/view/<?php echo $Banner['Banner']['id'] ?>">
		<div class="span3 shadow1"><span class="shadow">
		 
		<img src="<?php echo $base_url?>files/gallery/<?php echo $Banner['Banner']['image']?>">
		
		</span></div>
		</a>
        <?php if($Banner['Banner']['off_percentage']>0){?>
		  <span class="img1">
		  <h3 class="offer" style=""><?php echo $Banner['Banner']['off_percentage']?>%<br /><span>off</span></h3>
		  <img src="<?php echo $base_url?>img/off.png"></span>
		  <?php }?> 
        <section class="span3" id="sec">
          <ul>
		   <a class="cat-bot" href="<?php echo $base_url?>banners/view/<?php echo $Banner['Banner']['id'] ?>">
			<h6 class="h1">
			<?php echo $this->Text->truncate($Banner['Banner']['title'], 20, array('ending' => ''))?>
			</h6>
            </a>
			
			<!--<li class="postdate">Post Date: 2014-1-24  20:16 </li>-->
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
             
            <li><?php 
			 
			if(strlen($Banner['Banner']['description'])>60){
				echo $this->Text->truncate($Banner['Banner']['description'], 60, array('ending' => '...')).'<br><a href="'.$base_url.'banners/view/'.$Banner['Banner']['id'].'">Try it now click here</a>'; 
			}else{
				echo $Banner['Banner']['description'];
			}
			?></li>
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
         
        </section>
      </div>
	  
	  <script>

			 function openFlagDiv(id){
				$('#div_'+id).toggle();
			 }
			 </script>
       
		<?php }?>       
 