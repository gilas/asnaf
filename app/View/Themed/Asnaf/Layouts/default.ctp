<!DOCTYPE HTML>
<!--[if lt IE 7]><html class="no-js ie6 oldie" lang=en><![endif]--> <!--[if IE 7]><html class="no-js ie7 oldie" lang=en><![endif]--> <!--[if IE 8]><html class="no-js ie8 oldie" lang=en><![endif]--> <!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<html>
<head>
    <meta charset="UTF-8" />
   <?php 
    echo $this->fetch('meta');
    echo $this->Html->css('style');
    echo $this->fetch('css');
    echo $this->Html->script(array('modernizr','jquery','jquery-ui',));
    ?>
    <!--[if lt IE 9]><?php echo $this->Html->script(array('IE8','ie'));?><![endif]-->
    <?php
    echo $this->Html->script(array('superfish','general','modal')); 
    echo $this->fetch('script');
    ?>
	<title><?php echo $title_for_layout; ?></title>
</head>
<body class="color-1 pattern-1 h-style-1 text-1">
	<div class="top-holder"></div>
    <div id="wrapper">
        <header class="clearfix">
    		<div class="logo"><a href="<?php echo $this->Html->url('/'); ?>"><?php echo $this->Html->image('logo.png') ?></a></div><!--/ logo-->
    	</header>
    	<div id="content-wrapper">
    		<section id="content">
    			<nav class="navigation" id="navigation"><?php echo $this->element('menu'); ?></nav>
                <div class="content-wrapper">
                	<?php echo $this->element('slider'); ?>
                    <?php echo $this->element('breadcrumb'); ?>
                    <?php echo $this->Session->flash(); ?>
                    <?php echo $this->fetch('content'); ?>
                    <div class="clear"></div>
                </div>
    		</section>
    		<footer><?php echo SettingsController::read('Site.FootNote') ?></footer>
    		<div class="copyright"><a href="mailto:1razzaghi@gmail.com">Powered by Gilas CMS</a></div>
    	</div>
    	<aside id="sidebar"><?php echo $this->element('aside'); ?></aside>
    	<div class="clear"></div>
	</div>
    <div id="back-top"><a href="#top"></a></div>
</body>
</html>
<?php //echo $this->element('sql_dump'); ?>