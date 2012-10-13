<?php

/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different urls to chosen controllers and their actions (functions).
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */
Router::connect('/', array('controller' => 'pages', 'action' => 'display', 'home'));

// dynamic routing , but it has one error, it cann't read plugin
$prefix = SettingsController::read('Site.AdminAddress');
Router::connect("/{$prefix}", array('controller' => 'dashboards', 'action' => 'index', 'admin' => TRUE));
Router::connect("/{$prefix}/:controller", array('action' => 'index', 'admin' => TRUE));
Router::connect("/{$prefix}/:controller/:action", array('admin' => TRUE));
unset($prefix);
// end of dynamic routing

Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));

Router::connect('/contents/view/:id-:slug', 
    array('controller' => 'contents', 'action' => 'view'),
    array(
        'pass' => array('id'),
        'id' => '[0-9]+'
    )
);

Router::connect('/contents/category/:id-:slug', 
    array('controller' => 'contents', 'action' => 'category'),
    array(
        'pass' => array('id'),
        'id' => '[0-9]+'
    )
);
Router::parseExtensions('rss');
/**
 * Load all plugin routes.  See the CakePlugin documentation on 
 * how to customize the loading of plugin routes.
 */
CakePlugin::routes();

/**
 * Load the CakePHP default routes. Remove this if you do not want to use
 * the built-in default routes.
 */
require CAKE . 'Config' . DS . 'routes.php';
