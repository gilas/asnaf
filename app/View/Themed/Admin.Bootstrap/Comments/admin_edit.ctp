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
<?php
echo $this->Form->input('name', array('label' => 'نام'));
echo $this->Form->input('email', array('label' => 'پست الکترونیک'));
echo $this->Form->input('website', array('label' => 'وبسایت'));
$this->TinyMCE->editor('simple');
echo $this->Form->input('content', array('label' => 'متن', 'class' => 'tinymce'));
echo $this->Form->end();
?>