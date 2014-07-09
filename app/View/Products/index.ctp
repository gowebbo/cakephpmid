 <?php 
  $url = $this->params['url'];

    unset($url['url']);
    if(isset($this->request->data) && !empty($this->request->data)) {
        foreach($this->request->data['Product'] as $key=>$value)
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
<div id="right-container">
 <div id="center">
                    	<div class="matter">
                        	<h1>Products</h1>
                        </div>
                        <div class="products" >
                        	<img src="<?php echo $base_url?>img/products.png" style="float:left;margin-bottom:10px;margin-top:-5px" />
                        	<div style="float:left;margin-bottom:15px;width: 580px;">
								<?php
									$i=1;
									foreach ($products as $product){
									
									if($i%4==0){
										$style= "margin:0px";
										$div= "<div>&nbsp;</div>";
									}else {
										$style= " ";
										$div= " ";
									}
									
									?>
								<?php echo $this->Form->create('Cart', array('controller'=>'carts','action' => 'add','name'=>'form_'. $product['Product']['id'])); ?>
						    	<?php echo $this->Form->input('qnty', array('type'=>'hidden','value' => 1)); ?>
								<?php echo $this->Form->input('product_id', array('type' => 'hidden', 'value' => $product['Product']['id'])); ?>
								<div class="single-product" style="<?php echo $style;?>">
									  <A href="<?php echo $base_url.$product['Product']['slug']?>" style="background: none;">
                                    
                                     <img  width="125" height="137" src="<?php echo $base_url?>files/products/<?php echo $product['Product']['thumbnail_image_filepath']?>" class="floatLeft" />
									  </a>
									 <input class="add-tocart-button" type="submit" value="Buy Now"   />
						
                                    <p>Rs:<?php echo $product['Product']['price']?></p>
                                </div>
								</form>
								<?php echo $div;?>
								<?php $i++;  }?>
                              
                            </div>
                            <div class="pagination">
								<?php if($this->Paginator->numbers(array('separator' => ''))){?>
									<?php echo $this->Paginator->prev(__('<<', true),array('tag'=>'div')); ?>
									&nbsp;<?php echo $this->Paginator->numbers(array('separator' => '','tag'=>'div')); ?>&nbsp;
									<?php echo $this->Paginator->next(__('>>', true),array('tag'=>'','tag'=>'div')); ?>
								<?php }?>
									<!--<p>Page 1 of 3</p>
									<a href="#" class="active">1</a>
									<a href="#">2</a>
									<a href="#">3</a>
									<a href="#">>></a>-->
								</div> 
                        </div>
                    </div>

 <div id="busy-indicator" style="background:#fff;opacity:0.5;filter: alpha(opacity=50);padding-top:20%;position:absolute;top:0;left:0;text-align:center;vertical-align:middle; height:60%;width:100%;display:none;">
<?php echo $this->Html->image("indicator.gif",array('style'=>'opacity:1.0 !important;filter: alpha(opacity=100) !important')); ?>
</div>
<?php    // echo $this->Js->writeBuffer();?>
</div>