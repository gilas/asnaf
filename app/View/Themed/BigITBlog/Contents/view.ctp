<?php
foreach ($categories as $category) {
    $this->Html->addCrumb($category['ContentCategory']['name'], array(
        'controller' => 'contents',
        'action' => 'category',
        $category['ContentCategory']['id'] . '-' . $category['ContentCategory']['name'],
    ));
}
$this->Html->addCrumb($content['Content']['title']);
$this->set('title_for_layout',$content['Content']['title']);
?>
<article class="entry clearfix">
    <h2 class="entry-title"><a href="<?php echo $this->Html->url(array('action' => 'view',$content['Content']['id'].'-'.$content['Content']['slug'])) ?>"><?php echo $content['Content']['title']; ?></a></h2>
    <div class="entry-meta">
		<span class="calender"><?php echo Jalali::niceShort($content['Content']['created']); ?></span>
		<span class="comments"><a href="#"><?php echo count($content['Comment']); ?> نظر</a></span>
		<span class="user"><a href="#"><?php echo $content['User']['name']; ?></a></span>
	</div>
    <div class="entry-body">
        <p><?php echo $content['Content']['intro'].$content['Content']['content']; ?></p>
	</div>
</article>
<?php if (!empty($comments)): ?>
<h5 class="caption">نظرات</h5>
    <div id="comments">
        <?php foreach ($comments as $comment): ?>
            <blockquote>
                <?php echo $comment['Comment']['content'] ?>
            </blockquote>
        <?php endforeach; ?>
    </div>
<?php endif; ?>


<?php if ($content['Content']['allow_comment']): ?>
<section class="clearfix" id="comment-reply">
	<h4 class="title">ارسال نظر</h4>
    <?php echo $this->Form->create('Comment',array('id' => 'comment-form', 'class' => 'form')); ?>
		<p class="input-block">
			<label for="name"><strong>نام</strong> (required)</label>
            <?php echo $this->Form->input('name', array('label' => false, 'div' => false)); ?>
		</p>
		<p class="input-block">
			<label for="email"><strong>پست الکترونیک</strong> (required)</label>
            <?php echo $this->Form->input('email', array('label' => false, 'div' => false)); ?>
		</p>
		<p class="input-block">
			<label for="website"><strong>وبسایت</strong> </label>
            <?php echo $this->Form->input('website', array('label' => false, 'div' => false)); ?>
		</p>
		<p class="textarea-block">
			<label for="content"><strong>متن</strong> (required)</label>
            <?php echo $this->Form->input('content', array('label' => false, 'div' => false)); ?>
		</p>
        <?php echo $this->Form->end('ارسال'); ?>
</section>
<?php endif; ?>