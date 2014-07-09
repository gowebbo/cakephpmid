<div class="grid_3 rightsidebar" style="z-index:999;" id="rightsidebar">
				<div class="meta-box">
				 	<div class="widget">
						<h3 class="col-title"> USA </h3><span class="liner"></span>
						<div id="webwidget_vertical_menu1" class="webwidget_vertical_menu">
							<ul>
								<?php $b=0;$c=0; foreach($allcountry as $country){?>
								<?php if($country['Country']['name']!='Canada'){?>
								<li><a href="#1"> <?php echo $country['Country']['name'];?></a>
									<ul>
										 <?php foreach($country['State'] as $state){?> 
										<li>
										<a  href="<?php echo $base_url?>homes/index/stateId:<?php echo $state['id']?>"><?php echo $state['name'];?></a>
										</li>
										<?php }?> 
									</ul>
								</li>
								 <?php }?>
								<?php }?> 
								 
							</ul>
							<div style="clear: both"></div>
						</div>
										
										 
					</div><!-- widget list -->
					<div id="sidebar1" class="nav-collapse collapse widget">
						<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
						  
			 
						<!-- BEGIN SIDEBAR MENU -->
						<?php $b=0;$c=0; foreach($allcountry as $country){?>
						<?php if($country['Country']['name']!='Canada'){?>
						<ul class="sidebar-menu">
							 
							<li class="has-sub">
								<a href="javascript:;" class="">
									  <?php echo $country['Country']['name'];?>
									<span class="arrow"></span>
								</a>
								<ul class="sub">
								<?php foreach($country['State'] as $state){?> 
									<li><a href="<?php echo $base_url?>homes/index/stateId:<?php echo $state['id']?>"><?php echo $state['name'];?></a>
									 </li> 
								<?php }?>	  
								</ul>
							</li>
							  
						</ul>
							<?php }?>
	<?php }?>
						<!-- END SIDEBAR MENU -->
					</div>
					<div class="widget">
						  <?php $b=0;$c=0; foreach($allcountry as $country){?>
							<?php if($country['Country']['name']=='Canada'){?>
								<h3 class="col-title"> <?php echo strtoupper($country['Country']['name']);?> </h3><span class="liner"></span>
								<ul class="list">
									<?php foreach($country['State'] as $state){?>  
									<li><a style="color:#A8353D;display: block;font-size: 14px;font-weight: bold;line-height: 30px;" href="<?php echo $base_url?>homes/index/stateId:<?php echo $state['id']?>"><i class="icon-caret-right"></i>  <?php echo strtoupper($state['name']);?> </a></li>
									<?php }?> 
								 
								</ul><!-- end list -->
								<?php }?>
								<?php }?>
					</div><!-- widget list -->
</div>
				</div>