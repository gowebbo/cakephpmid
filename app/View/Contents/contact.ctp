<div id="center">
                    	 
<div class="matter">
<h1>Contact</h1>
</div>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td class="cart-border"><table width="100%" border="0" cellspacing="0" cellpadding="10">
                          <tr>
                            <td class="cart-border-left cart-border-right">
							<?php echo $this->Form->create(NULL,array('controllers'=>'contents','action'=>'contact')); ?>
							<div class="checkout-content">
<p align="center" style="line-height: 150%"><font face="Tahoma"><b>
<font size="12"><font color="#F53D5B">Richa Enterprises<br>

</font></b><font size="2">622A Lakkar Bazar Ludhiana Punjab India<br>
Phone:- +91-161-4670611 Mobile:- +91-9888880500<br>
Email:- <a href="mailto:sales@florascent.in">sales@florascent.in</a> </font>
</font></p>
<br />
<br />
<br />
							<?php echo $this->Session->flash(); ?>
							<?php
							if(isset($msgs)) { ?>
							<div id="error">
								<p>Error: Please correct the below errors.</p>
								
									 <?php echo $this->Utility->showArr($msgs); ?>
								
							</div>
							<?php }?>
						      <table width="100%" border="0" cellspacing="4" cellpadding="5">
                              	
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
								  <?php echo $this->Form->input('email', array('error'=>false,'label' =>false, 'class' => 'tbox', 'div' => false)); ?>
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
                                  <td  style="font-weight:normal; text-transform:none; text-align:right;">Message : </td>
                                  <td>
								    <?php echo $this->Form->input('message', array('rows'=>'10','cols'=>'20','label' => false,'div' => false, 'class' => 'tbox')); ?>
								
								  </td>
                                </tr>
                                <tr>
                                  <td style="font-weight:normal; text-transform:none; text-align:right;">&nbsp;</td>
                                  <td>
								  <input type="submit" value="Submit" title="Submit" alt="Submit" class="send">
								
								 </tr>
                              </table>
                            </form></td>
                          </tr>
                        </table>
						
						
						</td>
                      </tr>
                  </table>
 </div>
