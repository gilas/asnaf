<?php
$this->Html->script('modal', false);
$this->Html->css('modal', null, array('inline' => false));
?>
<div class="grid-wrapper">
    <ul class="gallery">
<?php foreach($images as $image): ?>
        <li><?php 
            echo $this->Upload->image(
                $image, 
                'GalleryItem.image',array('style' => 'thumb'),
                array('id' => $image['GalleryItem']['id'], 'cat_id' => $image['GalleryCategory']['id'])
            ); 
        ?></li>
<?php endforeach; ?>
    </ul>
</div>
<script>
    $(function(){
        $('ul.gallery img').click(function(){
            id = $(this).attr('id')
            cat_id = $(this).attr('cat_id')
            $.get('<?php echo $this->Html->url(array('action' => 'view')) ?>/'+cat_id+'/'+id, function(data){
                $.modal(data,{overlayClose:true});
                
            })
        })
    })
</script>