<aside id="sidebar" class="one-fourth last clearfix">
	<div class="widget widget_search clearfix">
		<h4 class="widget-title">
			جستجو
			<div class="hr"></div>
		</h4>

		<form  action="<?php echo $this->Html->url(array('controller' => 'contents', 'action' => 'search', 'admin' => false)) ?>">
			<input type="text" name="q" value="<?php echo @$this->request->query['q'] ?>"/>
		</form>
	</div>	

	<div class="widget widget_categories clearfix">
		<h4 class="widget-title">
			مجموعه مطالب
			<div class="hr"></div>
		</h4>
        <?php $categories = $this->requestAction(array('controller' => 'ContentCategories', 'action' => 'getList')); ?>
        <?php if($categories): ?>
		<ul class="list two-col icon-forward-circle">
            <?php foreach($categories as $category): ?>
			 <li><?php echo $this->Html->link($category['ContentCategory']['name'],array('controller' => 'contents','action' =>'category',$category['ContentCategory']['id'].'-'.$category['ContentCategory']['name'])) ?></li>
            <?php endforeach; ?>
		</ul>
        <?php endif;unset($categories); ?>
	</div>
<!--
	<div class="widget widget_tag_cloud clearfix">
		<h4 class="widget-title">
			Tags
			<div class="hr"></div>
		</h4>

		<a href="#">android</a>
		<a href="#">apple</a>
		<a href="#">design</a>
		<a href="#">envato</a>
		<a href="#">themeforest</a>
		<a href="#">macbookpro</a>
		<a href="#">photography</a>

	</div>
-->
</aside>