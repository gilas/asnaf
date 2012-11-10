<?php

//debug($contents);
if(empty($contents)){
    echo 'هیچ مطلبی یافت نشد';
    return;
}
foreach($contents as $content):
?>
<div class="clearfix">
    <div class="title-with-icon clearfix">
        <a href="<?php echo $this->Html->url(array('action' => 'view',$content['Content']['id'].'-'.$content['Content']['slug'])) ?>"><h5><?php echo $content['Content']['title']; ?></h5></a>
    </div>
    <span class="article-meta"><?php echo Jalali::niceShort($content['Content']['created']); ?></span>
    <p><?php echo $content['Content']['intro']; ?></p>
    <?php if(!empty($content['Content']['content'])): ?>
    <div class="alignleft">
        <a class="button green small" href="<?php echo  $this->Html->url(array('action' => 'view',$content['Content']['id'].'-'.$content['Content']['slug'])) ?>">ادامه مطلب</a>
    </div>
    <?php endif;?>
</div>
<?php endforeach;?>
<div class="content-divider"></div>