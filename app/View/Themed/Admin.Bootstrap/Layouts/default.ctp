<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php echo $this->Html->charset(); ?>
        <title>
            <?php
            echo SettingsController::read('Site.Name');
            echo ' - ';
            echo $title_for_layout;
            ?>
        </title>
        <?php
        echo $this->Html->meta('icon');
        echo $this->Html->meta('description', SettingsController::read('Site.Description'));
        echo $this->Html->meta('keywords', SettingsController::read('Site.Keywords'));

        echo $this->Html->css('bootstrap-rtl.min');
        echo $this->Html->css('bootstrap-responsive-rtl.min');
        echo $this->Html->css('template');
        echo $this->Html->css('box');
        echo $this->Html->script('jquery');
        echo $this->Html->script('bootstrap');
        echo $this->Html->script('init');
        echo $this->Html->script('box');
        
        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->fetch('script');
        ?>
    </head>
    <body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <?php echo $this->Html->link($this->Html->image('logo-small.png'), array('controller' => 'dashboards','plugin' => false, 'action' => 'index', 'admin' => TRUE), array('class' => 'brand', 'escape' => false)); ?>
                    <div class="nav-collapse">
                        <ul class="nav">
                            <li><?php //echo $this->Html->link('تنظیمات', array('controller' => 'settings', 'action' => 'index', 'admin' => TRUE)); ?></li>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">مطالب
                                    <b class="caret"></b>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><?php echo $this->Html->link('مدیریت مطالب', array('controller' => 'contents','plugin' => false, 'action' => 'index', 'admin' => TRUE)); ?></li>
                                    <li><?php echo $this->Html->link('مدیریت مجموعه مطالب', array('controller' => 'content_categories','plugin' => false, 'action' => 'index', 'admin' => TRUE), array('class' => 'active')); ?></li>
                                </ul>
                            </li>
                            <li><?php echo $this->Html->link('نظرات', array('controller' => 'comments','plugin' => false, 'action' => 'index', 'admin' => TRUE)); ?></li>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">وب لینک ها
                                    <b class="caret"></b>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><?php echo $this->Html->link('مدیریت وب لینک ها', array('controller' => 'weblinks','plugin' => false, 'action' => 'index', 'admin' => TRUE)); ?></li>
                                    <li><?php echo $this->Html->link('مدیریت مجموعه وب لینک', array('controller' => 'weblink_categories','plugin' => false, 'action' => 'index', 'admin' => TRUE), array('class' => 'active')); ?></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">گالری تصاویر
                                    <b class="caret"></b>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><?php echo $this->Html->link('مدیریت تصاویر', array('controller' => 'gallery_items','plugin' => false, 'action' => 'index', 'admin' => TRUE)); ?></li>
                                    <li><?php echo $this->Html->link('مدیریت مجموعه گالری تصاویر', array('controller' => 'gallery_categories','plugin' => false, 'action' => 'index', 'admin' => TRUE), array('class' => 'active')); ?></li>
                                </ul>
                            </li>
                            <li><?php echo $this->Html->link('تماس ها', array('controller' => 'contact_details','plugin' => false, 'action' => 'index', 'admin' => TRUE)); ?></li>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">منو
                                    <b class="caret"></b>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><?php echo $this->Html->link('مدیریت نوع منو', array('controller' => 'menuTypes', 'action' => 'index', 'admin' => TRUE,'plugin' => false)); ?></li>
                                    
                                    <?php
                                    $menus = $this->requestAction(array('controller' => 'menuTypes','action' => 'getTypes','admin' => TRUE,'plugin' => false));
                                    if($menus){
                                        echo $this->Html->tag('li','',array('class' => 'divider'));
                                        foreach($menus as $menuId => $menu){
                                            echo '<li>';
                                            echo $this->Html->link($menu, array('controller' => 'menus','plugin' => false, 'action' => 'index', 'admin' => TRUE,'menu_type_id' => $menuId));
                                            echo '</li>';
                                        }
                                    }
                                    ?>
                                    <li class="divider"></li>
                                    <li><?php echo $this->Html->link('مدیریت منو', array('controller' => 'menus','plugin' => false, 'action' => 'index', 'admin' => TRUE)); ?></li>
                                </ul>
                            </li>
                            <li><?php echo $this->Html->link('اسلایدر', array('controller' => 'SliderItems','plugin' => false, 'action' => 'index', 'admin' => TRUE)); ?></li>
                        </ul>
                    </div><!--/.nav-collapse -->
                    <div class="user-info">
                        <?php echo $onlineUsersCount; ?>  حاضرین در سایت
                        <?php echo $this->Html->link('نمایش سایت', '/',array('target' => '_blank')); ?>
                        <span>سلام</span>
                        <?php echo AuthComponent::user('name'); ?>
                        <?php echo $this->Html->link('خروج', array('controller' => 'users', 'action' => 'logout', 'admin' => TRUE)); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div id="top">
                <div id="flash_message"><?php echo $this->Session->flash('auth'); ?></div>
                <div id="flash_message"><?php echo $this->Session->flash('flash', array('element' => 'message')); ?></div>
            </div>
            <div id="content"><?php echo $this->fetch('content'); ?></div>
           <!-- <div id="footer"><pre><?php echo $this->element('sql_dump'); ?></pre></div> -->
        </div>
    </body>
</html>