<?php
//$homeLinks = $this->requestAction('/links/getHomeLink',array('return'));
?>
<div class="entry-footer">

	<div class="one_third">
		<h3>لینک های مرتبط</h3>
		<div class="latest_posts">
            <?php //echo $homeLinks; ?>
		</div><!--/ latest_posts-->
	</div><!--/ one_third-->
	
	<div class="one_third_last">
		<h3>تماس با ما</h3>
		<div class="widget_text widget">
			<p>این مطلب یک تست است</p>
			<strong>تلفن: +00 123456789</strong> <br />
			<strong>رایانامه :</strong> <a href="">info@site.com</a>
		</div><!--/ widget_text-->
        <div class="social_widget widget">
			<ul>
				<li data-tooltip="مشترک فید ما باشید">
                    <a class="social_icon3" href="<?php echo $this->Html->url(array('controller' => 'contents', 'action' => 'index', 'ext' => 'rss')); ?>">Rss</a>
                </li>
			</ul>
		</div><!--/ social_widget-->
	</div><!--/ one_third_last-->
	
	<div class="clear"></div>
	
</div><!--/ entry-footer-->

