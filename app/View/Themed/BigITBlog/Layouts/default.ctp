<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="UTF-8" />
       <?php 
        echo $this->fetch('meta');
        echo $this->Html->css(array('font','grid','styles','plugins','shortcodes'));
        echo $this->fetch('css');
        ?>
        <!--[if lt IE 9]><?php echo $this->Html->script('html5');?><![endif]-->
        <?php
        echo $this->Html->script(array('jquery','jquery.superfish','jquery.mobilemenu', 'user','custom',)); 
        echo $this->fetch('script');
        ?>
    	<title><?php echo $title_for_layout; ?></title>
    </head>
    <body>
        <header id="header" class="container clearfix">
        	<div class="head-logo"><a href="<?php echo $this->Html->url('/'); ?>" class="logo"></a></div>
            <?php echo $this->element('menu'); ?>
        </header>
        
        <header id="page-header" class="clearfix">
        	<h1 class="page-title">Big IT Blog</h1>
        	<h3 class="sub-title">تراوشات ذهنی یه جوجه دانشجوی IT</h3>
        </header>
        <section style="min-height: 249px;" id="main" class="container clearfix">
            <section id="blog" class="three-fourths clearfix">
                <?php echo $this->Session->flash(); ?>
                <?php echo $this->fetch('content'); ?>
            </section>
            <?php echo $this->element('aside'); ?>
        </section>
        <footer id="footer" class="clearfix"><?php echo $this->element('footer'); ?></footer>
        <a style="display: none;" href="#" id="toTop"><span id="toTopHover"></span>To Top</a>
    </body>
</html>
<?php //echo $this->element('sql_dump'); ?>