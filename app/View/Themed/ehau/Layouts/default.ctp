<!DOCTYPE HTML>
<html lang="en-US">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
   <?php 
    echo $this->fetch('meta');
    echo $this->Html->css(array('_style','_mobile','primary-blue'));
    echo $this->fetch('css');
    echo $this->Html->script('jquery-1.7.2.min');
    echo $this->Html->script('custom-main');
    echo $this->Html->script('jquery.cycle.all.min');
    echo $this->Html->script('jquery.easing.1.3');
    ?>
    <!--[if lt IE 9]><?php echo $this->Html->script(array('IE8','ie'));?><![endif]-->
    <?php
    echo $this->fetch('script');
    ?>
	<title><?php echo $title_for_layout; ?></title>
</head>
<body>
    <div id="tt-boxed-layout">
        <aside class="top-aside clearfix"><?php echo $this->element('top-aside'); ?></aside>
        <header><?php echo $this->element('header'); ?></header>
        <?php echo $this->element('breadcrumb'); ?>
        <section id="content-container" class="clearfix">
            <div id="main-wrap" class="clearfix">
                <?php echo $this->Session->flash(); ?>
                <?php echo $this->fetch('content'); ?>
            </div>
        </section>
        <footer><?php echo $this->element('footer'); ?></footer>
    </div>
</body>
</html>
<?php //echo $this->element('sql_dump'); ?>