<div id="gallery_item" class="theme-default">
<?php
echo $this->Upload->image($image, 'GalleryItem.image');
?>
<div class="descr-wrapper">
    <div class="buttons" style="float:right">
    <?php if(! empty($next_id)): ?>
        <a class="next" title="Next" onclick="$.get('<?php echo $this->Html->url(array('action' => 'view',$cat_id, $next_id)) ?>', function(data){$('#gallery_item').parent().html(data);$.modal.setPosition();})">Next</a>
    <?php endif; ?>
    </div><!--/ buttons-->
    
    <div class="any-text">
        <h4><?php echo $image['GalleryItem']['description']; ?></h4>    
    </div>
    
    <div class="buttons" style="float:left">
    <?php if(! empty($prev_id)): ?>
        <a class="prev" title="Previous" onclick="$.get('<?php echo $this->Html->url(array('action' => 'view',$cat_id, $prev_id)) ?>', function(data){$('#gallery_item').parent().html(data);$.modal.setPosition();})">Previous</a>
    <?php endif; ?>
    </div><!--/ buttons-->
</div>
<style>
    .descr-wrapper{
        margin: -21px;
        padding: 0;
        width: 100%;
        margin-bottom: 0;
    }
    .descr-wrapper .buttons a{
        display: inline-table;
    }
    .descr-wrapper .buttons a.next{
        float: right;
        margin-right: 5px;
        margin-left: 0;
    }
    .descr-wrapper .buttons a.prev{
        float: left;
    }
</style>
</div>