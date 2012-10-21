<?php
$this->Validator->addRule('Comment.content');
$this->Validator->validate(); 
echo $this->Form->create('Comment', array(
    'inputDefaults' => array(
        'error' => array(
            'attributes' => array(
                'class' => 'alert-input-error',
                'id' => 'msg'
            )
        ),
    )
));
?>
<div id="toolbar-menu" class="row">
    <div class="title">پاسخ به نظر</div>
    <ul id="toolbar">
        <li>
            <a onclick="$(this).parents('form').submit();" class="btn btn-success" tooltip-place="bottom" data-original-title="ذخیره" rel="tooltip" >
                <i class="icon-ok icon-white"></i><input type="submit" style="display: none;" />
            </a>
        </li>
        <li>
            <a href="<?php echo $this->Html->url(array('action' => 'index')); ?>" class="btn btn-danger" tooltip-place="bottom" data-original-title="انصراف" rel="tooltip" >
                <i class="icon-remove icon-white"></i>
            </a>
        </li>
    </ul>
</div>
<div class="show-comment">
    <h3>مشخصات نظر ارسال شده</h3>
    <div class="comment-item">
        <label>نویسنده :</label> 
        <span><?php echo $comment['Comment']['name']; ?></span>
    </div>
    <div class="comment-item">
        <label>پست الکترونیک :</label> 
        <span><?php echo $comment['Comment']['email']; ?></span>
    </div>
    <div class="comment-item">
        <label>متن :</label> 
        <span><?php echo $comment['Comment']['content']; ?></span>
    </div>
</div>
<?php
$this->TinyMCE->editor('simple');
echo $this->Form->input('content', array('label' => 'متن','id' => 'tinyElm1', 'class' => 'tinymce'));
echo $this->Form->end();
?>