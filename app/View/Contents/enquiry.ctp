 <div id="right-container" class="lft">
            	
                <div class="our-products-head">
                	<div class="lft white-icon"></div>
                	<div class="lft">Enquiry</div>
                    <div class="clr"></div>
                </div>
                
                <div style="margin:20px; color:#FFF;">
                	<table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td class="cart-border"><table width="100%" border="0" cellspacing="0" cellpadding="10">
                          <tr>
                            <td class="cart-border-left cart-border-right">
							<?php echo $this->Form->create(NULL,array('controllers'=>'contents','action'=>'enquiry')); ?>
							<div class="checkout-content">
							<?php echo $this->Session->flash(); ?>
							<?php
							if(isset($msgs)) { ?>
							<div id="error">
								<p>Error: Please correct the below errors.</p>
								
									 <?php echo $this->Utility->showArr($msgs); ?>
								
							</div>
							<?php }?>
						      <table width="100%" border="0" cellspacing="0" cellpadding="5">
                               
                                <tr>
                                  <td colspan="2" bgcolor="#3F3F3F" style="padding:10px 0;"><strong>Personal Information</strong></td>
                                </tr>
                                <tr>
                                  <td style="font-weight:normal; text-transform:none; text-align:right;">&nbsp;</td>
                                  <td>&nbsp;</td>
                                </tr>
								
                                <tr>
                                  <td style="font-weight:normal; text-transform:none; text-align:right;">First Name : </td>
                                  <td>
								  	<?php echo $this->Form->input('billing_firstname', array('label' => '','div' => false, 'class' => 'tbox','style'=>'color:black')); ?>
													
								  </td>
                                </tr>
                                <tr>
                                  <td style="font-weight:normal; text-transform:none; text-align:right;">Last Name : </td>
                                  <td>
								  	<?php echo $this->Form->input('billing_lastname', array('label' => '','div' => false, 'class' => 'tbox')); ?>				
								  </td>
                                </tr>
								<tr>
                                  <td style="font-weight:normal; text-transform:none; text-align:right;">Email :</td>
                                  <td>
								  <?php echo $this->Form->input('email', array('error'=>false,'label' =>false, 'class' => '', 'div' => false)); ?>
								  </td>
                                </tr>
                                <tr>
                                  <td style="font-weight:normal; text-transform:none; text-align:right;">Address 1: </td>
                                  <td>	<?php echo $this->Form->input('billing_address', array('label' => '','div' => false, 'class' => 'tbox')); ?>				
								  </td>
                                </tr>
                               
                                <tr>
                                  <td style="font-weight:normal; text-transform:none; text-align:right;">City :</td>
                                  <td>	
								  <?php echo $this->Form->input('billing_city', array('label' => '','div' => false, 'class' => 'tbox')); ?>
								  </td>
                                </tr>
                                <tr>
                                  <td style="font-weight:normal; text-transform:none; text-align:right;">State : </td>
                                  <td>
								    <?php echo $this->Form->input('billing_state', array('label' => '','div' => false, 'class' => 'tbox')); ?>
								  </td>
                                </tr>
                                <tr>
                                  <td style="font-weight:normal; text-transform:none; text-align:right;">Postal Code :</td>
                                  <td>
								  <?php echo $this->Form->input('billing_zipcode', array('label' => '','div' => false, 'class' => 'tbox')); ?>
								  
								  </td>
                                </tr>
                                <tr>
                                  <td style="font-weight:normal; text-transform:none; text-align:right;">Phone : </td>
                                  <td>
								    <?php echo $this->Form->input('billing_phone', array('label' => '','div' => false, 'class' => 'tbox')); ?>
								
								  </td>
                                </tr>
								 <tr>
                                  <td style="font-weight:normal; text-transform:none; text-align:right;">Message : </td>
                                  <td align="center" style="padding-left:120px;">
								    <?php echo $this->Form->input('message', array('rows'=>'10','cols'=>'20','label' => false,'div' => false, 'class' => 'textarea')); ?>
								
								  </td>
                                </tr>
                                <tr>
                                  <td style="font-weight:normal; text-transform:none; text-align:right;">&nbsp;</td>
                                  <td>
								  <?php
											 $options = array(
											 'type'=>'image',
									'src' => $base_url.'img/send-but.png',
									'style' => 'width:120px; height:auto; border:none; background:none;',
								);
									echo $this->Form->end($options); ?>
								 </tr>
                              </table>
                            </form></td>
                          </tr>
                        </table></td>
                      </tr>
                  </table>

                </div>
        
        
        
              <div style="padding:20px;"></div>

                
          </div>