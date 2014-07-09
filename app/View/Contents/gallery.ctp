<?php
	echo $this->Html->css('facebox/facebox.css');
?>
<?php echo $this->Html->script('facebox/facebox'); ?>
<script type="text/javascript">
jQuery(document).ready(function($) {
$('a[rel*=facebox]').facebox({
loadingImage : '<?php echo $base_url?>/img/loading.gif',
closeImage   : '<?php echo $base_url?>/img/closelabel.png'
})
})
</script>
<?php 
/*$this->Paginator->options(array(
	'update' => '#content',
	'evalScripts' => true,
	'before' => $this->Js->get('#busy-indicator')->effect('fadeIn', array('buffer' => false)),
	'complete' => $this->Js->get('#busy-indicator')->effect('fadeOut', array('buffer' => false)),
	'url' => rawurldecode($savecrit)
	));*/
	
	$url = $this->params['url'];

    unset($url['url']);
    if(isset($this->request->data) && !empty($this->request->data)) {
        foreach($this->request->data['Content'] as $key=>$value)
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
	'update' => '#contentMiddle',
	'evalScripts' => true,
	'before' => $this->Js->get('#busy-indicator')->effect('fadeIn', array('buffer' => false)),
	'complete' => $this->Js->get('#busy-indicator')->effect('fadeOut', array('buffer' => false)),
	'url' =>  $args)); 
?>
<div id="contentMiddle">
 <div id="right-container" class="lft">
            	
                <div class="our-products-head">
                	<div class="lft white-icon"></div>
                	<div class="lft">Photo Gallery</div>
                    <div class="clr"></div>
                </div>
                
                <div style="margin:20px;">
                	
                
               <?php foreach ($photos as $photo): ?>
                <div class="photo-layout">
                    <div class="inner-bg">
					<a href="<?php echo $base_url?>/files/products/<?php echo $photo['StudentPhoto']['photo']?>" rel="facebox">
			        <?php echo $this->Html->image('/files/products/189X242=='.$photo['StudentPhoto']['photo'],array('width'=>'189','height'=>'242')); ?>
					</a>
					</div>                       
                    <div class="title-txt"><?php echo $photo['StudentPhoto']['title']?></div>
                </div>
                <?php endforeach; ?>
                
                <style>
				.pagination {margin-top:19px;height:20px;font-size:11px;text-align:center;}
				.pagination .current  {background:#02674E;color:#FFF !important;border:1px solid #676767 !important;}
				 .pagination div a {float:left;padding:0px 5px;border:1px solid #676767;color:#666666;margin-left:4px;text-decoration:none;min-width:8px;}
				.pagination div {float:left;padding:0px 5px;/*border:1px solid #676767;*/color:#333333;}
				</style>
				 <div class="clr"></div>
				<div class="pagination">
				<?php if($this->Paginator->numbers(array('separator' => ''))){?>
					<?php echo $this->Paginator->prev(__('<<', true),array('tag'=>'div')); ?>
					&nbsp;<?php echo $this->Paginator->numbers(array('separator' => '','tag'=>'div')); ?>&nbsp;
					<?php echo $this->Paginator->next(__('>>', true),array('tag'=>'','tag'=>'div')); ?>
				<?php }?>
				</div>	
                    
                </div>
                <div style="padding:20px;"></div>
          </div>
		  <div id="busy-indicator" style="background:#fff;opacity:0.5;filter: alpha(opacity=50);padding-top:20%;position:absolute;top:0;left:0;text-align:center;vertical-align:middle; height:60%;width:100%;display:none;">
<?php echo $this->Html->image("indicator.gif",array('style'=>'opacity:1.0 !important;filter: alpha(opacity=100) !important')); ?>
</div>
<?php    // echo $this->Js->writeBuffer();?>
	</div>