<?php
// Add
$this->AdminForm->addToolbarItem($this->Html->tag('i','',array('class' => 'icon-plus icon-white')),array('action' => 'add','content_category_id' => @$this->request->named['content_category_id'],'normalLink' => true ),array('class' => 'btn btn-success','escape' => false, 'rel' => 'tooltip','data-original-title' => 'افزودن','tooltip-place' => 'bottom'));
// Delete
$this->AdminForm->addToolbarItem($this->Html->tag('i','',array('class' => 'icon-trash icon-white')),array('action' => 'delete','confirm' => 'آیا مطمئن هستید ؟'),array('class' => 'btn btn-danger','escape' => false, 'rel' => 'tooltip','data-original-title' => 'حذف','tooltip-place' => 'bottom'));
// Edit
$this->AdminForm->addToolbarItem($this->Html->tag('i','',array('class' => 'icon-pencil icon-white')),array('action' => 'edit','method' => 'get','firstChild' => true),array('class' => 'btn btn-info','escape' => false, 'rel' => 'tooltip','data-original-title' => 'ویرایش','tooltip-place' => 'bottom'));
// Reply
$this->AdminForm->addToolbarItem($this->Html->tag('i','',array('class' => 'icon-share-alt icon-white')),array('action' => 'reply','method' => 'get','firstChild' => true),array('class' => 'btn btn-info','escape' => false, 'rel' => 'tooltip','data-original-title' => 'پاسخ','tooltip-place' => 'bottom'));
// Publish
$this->AdminForm->addToolbarItem($this->Html->tag('i','',array('class' => 'icon-ok icon-white')),array('action' => 'changeStatus', 'value' => 1),array('class' => 'btn btn-info','escape' => false, 'rel' => 'tooltip','data-original-title' => 'انتشار','tooltip-place' => 'bottom'));
// unPublish
$this->AdminForm->addToolbarItem($this->Html->tag('i','',array('class' => 'icon-remove icon-white')),array('action' => 'changeStatus', 'value' => 2),array('class' => 'btn btn-info','escape' => false, 'rel' => 'tooltip','data-original-title' => 'عدم انتشار','tooltip-place' => 'bottom'));
//Show toolbar
$this->AdminForm->showToolbar('مشاهده نظرات');

//Filtering
// we use action in options for rewriting action attr without querystring
echo $this->Filter->create('Comment',array('action' => 'index'));
echo $this->Filter->input('content',array('label' => 'متن', 'type' => 'text'));
echo $this->Filter->input('published',array(
    'label' => 'وضعیت',
    'options' => array('' => '','0' => 'بررسی نشده','1' => 'منتشر شده', '2' => 'منتشر نشده'))
);
echo $this->Filter->end();

if (!empty($comments)) {
    // start form tag
    echo $this->AdminForm->startFormTag();
    ?>
    <table class="table table-bordered table-striped">

        <tr>
            <th><?php echo $this->AdminForm->selectAll(); ?></th>
            <th>ردیف</th>
            <th><?php echo $this->Paginator->sort('Comment.name','نویسنده') ?></th>
            <th><?php echo $this->Paginator->sort('Comment.content','متن') ?></th>
            <th><?php echo $this->Paginator->sort('Content.title','مطلب مربوطه') ?></th>
            <th><?php echo $this->Paginator->sort('Comment.published','منتشر شده') ?></th>
            <th><?php echo $this->Paginator->sort('Comment.created','تاریخ ارسال') ?></th>
            <th>در پاسخ به</th>
            <th>پاسخ</th>
        </tr>
        <?php
        //current index
        $index = $this->Filter->paginParams['limit'] * ($this->Filter->paginParams['page'] - 1);
        
        foreach ($comments as $comment):
            ?>
            <tr>
                <td id="grid-align"><?php echo $this->AdminForm->checkbox($comment['Comment']['id']) ?></td>
                <td><?php echo ++$index; ?></td>
                <td><?php echo $comment['Comment']['name']; ?></td>
                <td><p><?php echo $this->Html->link($comment['Comment']['content'],array('action' => 'edit', $comment['Comment']['id'])); ?></p></td>
                <td id="grid-align"><?php 
                    echo $this->Html->link(
                        $comment['Content']['title'],
                        array('controller' => 'Contents', 'action' => 'view','admin' => false ,$comment['Content']['id'].'-'.$comment['Content']['slug']),
                        array('target' => '_blank')); 
                ?></td>
                <td id="grid-align">
                <select class="status" style="width: 108px;" onchange="$.adminForm.chooseCb(this);$.adminForm({'action':'changeStatus','extraField':{'value':$(this).val()}});">
                    <option bgcolor="#D9EDF7" color="#3A87AD" value="0" <?php if($comment['Comment']['published'] == 0) echo 'selected=""' ?>>بررسی نشده</option>
                    <option bgcolor="#DFF0D8" color="#468847" value="1" <?php if($comment['Comment']['published'] == 1) echo 'selected=""' ?>>منتشر شده</option>
                    <option bgcolor="#F2DEDE" color="#B94A48" value="2" <?php if($comment['Comment']['published'] == 2) echo 'selected=""' ?>>منتشر نشده</option>
                </select>
                <script>
                    $(function(){
                        $('.status option').each(function(){
                            $(this).css('background-color', $(this).attr('bgcolor'))
                                    .css('color', $(this).attr('color'));
                        })
                        $('.status').each(function(){
                            $(this).css('background-color',$(this).find('option:selected').attr('bgcolor'))
                                    .css('color',$(this).find('option:selected').attr('color'))
                                    .css('border-color', $(this).find('option:selected').attr('color'))
                        })
                    })
                </script>
                </td>
                <td id="grid-align"><?php echo Jalali::niceShort($comment['Comment']['created']); ?></td>
                <td id="grid-align"><?php 
                    if(!empty($comment['Comment']['parent_id'])){
                        echo $this->Html->link(
                                $comment['Comment']['parent_name'],
                                array('controller' => 'contents', 'action' => 'view','admin' => false ,$comment['Content']['id'].'-'.$comment['Content']['slug'],'#' => 'comment-'.$comment['Comment']['parent_id']),
                                array('target' => '_blank')
                            );
                    }
                 ?></td>
                <td id="grid-align"><?php 
                    // Reply
                    echo $this->AdminForm->item(
                        $this->Html->tag('i','',array('class' => 'icon-share-alt icon-white')),
                        array('action' => 'reply','method' => 'get','firstChild' => true),
                        array('class' => 'btn btn-info','escape' => false, 'rel' => 'tooltip','data-original-title' => 'پاسخ','tooltip-place' => 'bottom')
                    );
                ?></td>
            </tr>
            <?php
        endforeach;
        ?>
    </table>
    <?php
    echo $this->AdminForm->endFormTag();// end form tag
}
?>
<?php echo $this->Filter->limitAndPaginate(); ?>