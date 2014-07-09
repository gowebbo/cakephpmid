  <div style=" margin-left: -12px;" class="leftdropdown1"><h3>USA</h3><div class="more collapsed">-</div></div>
  <?php $b=0; foreach($allcountry as $country){?>
					<?php if($country['Country']['name']=='Canada'){?>
					<div  style=" margin-left: -12px;"  class="leftdropdown1"><h3><?php echo strtoupper($country['Country']['name']);?></h3><div class="more">-</div></div>   
					<?php }else{?>
						<div class="leftdropdown1"><h3><?php echo strtoupper($country['Country']['name']);?></h3><div class="more">-</div></div>   
					<?php }?>
                     
                    <?php if($b==0){?>
						<ul style=" margin-left: 12px;" class="list-group1 toggle2">
					<?php }else{?>
						<ul style=" margin-left: 12px;" class="list-group1 toggle">
					<?php }
					$b++;
					?>
                    
						<?php foreach($country['State'] as $state){?>  
						  <li  class="list-group-item"><img src="<?php echo $base_url?>img/hypersign.png">
						  <a href="<?php echo $base_url?>homes/index/stateId:<?php echo $state['id']?>">&nbsp;&nbsp;<?php echo strtoupper($state['name']);?></a></li>
						<?php }?>
					</ul>  
					<?php }?>