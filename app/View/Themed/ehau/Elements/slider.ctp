<?php
// Show slider only in home page
if($this->request->here(false) != '/'){
    return;
}
$sliderItems = $this->requestAction('/SliderItems/getSlides');
if(empty($sliderItems)){
    return;
    
}
App::uses('UploadHelper','UploadPack.View/Helper');
$this->Upload = new UploadHelper($this);
echo $this->Html->script('slides.min.jquery');
?>
<section class="banner-slider">
    <div class="center-wrap">
        <div id="slides">
            <div class="slides_container">
                <?php foreach($sliderItems as $sliderItem): ?>
                <div class="clearfix home-slider-post">
                <div class="one_half">
                    <h2><?php echo $sliderItem['SliderItem']['title']; ?></h2>
                    <p><?php echo $sliderItem['SliderItem']['description']; ?></p>
                    <p><a href="<?php echo $this->Html->url($sliderItem['SliderItem']['link']) ?>" class="small green button" target="_self"> ادامه &larr;</a></p>
                </div>
                <div class="one_half">
                    <p><?php echo  $this->Upload->image($sliderItem, 'SliderItem.image')?></p>
                </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <div class="shadow top"></div>
    <div class="shadow bottom"></div>
    <div class="tt-overlay"></div>
</section>
<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery('#slides').slides({
        	  preload: false,
        	  //preloadImage: 'preloader url here',
        	  autoHeight: true,
        	  effect: 'slide',
        	  slideSpeed: 500,
        	  play: 0,
        	  randomize: false,
        	  hoverPause: false,
          });
    });
</script>