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
echo $this->Html->script('nivo-slider');
echo $this->Html->css('nivo-slider');

?>
<div class="slider-wrapper theme-default">
        <div id="slider" class="nivoSlider">
            <?php 
            foreach($sliderItems as $sliderItem){
             echo $this->Html->link(
                $this->Upload->image($sliderItem, 'SliderItem.image', array(),array(
                    'title' => $this->Html->link($sliderItem['SliderItem']['title'],$sliderItem['SliderItem']['link'])
                                .'<br/>' .$sliderItem['SliderItem']['description'])
                ),
                $sliderItem['SliderItem']['link'],
                array('escape' => false)                                
             );   
            }
             ?>
        </div>
    </div>
<script>
    $(function(){
        $('#slider').nivoSlider();
    })
</script>