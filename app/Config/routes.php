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
 * Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
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
	Router::connect('/', array('controller' => 'homes', 'action' => 'index'));
/**
 * ...and connect the rest of 'Pages' controller's urls.
 */
	Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));
	Router::connect('/admin', array('controller' => 'users', 'action' => 'login','admin' => 'true'));
	
	Router::connect('/contact-us', array('controller' => 'contents', 'action' =>'page', 'contact-us'));
	Router::connect('/about-us', array('controller' => 'contents', 'action' => 'page','about-us'));
	Router::connect('/jobs', array('controller' => 'contents', 'action' => 'page','jobs'));
	Router::connect('/disclaimer', array('controller' => 'contents', 'action' => 'page','disclaimer'));
	Router::connect('/privacy-policy', array('controller' => 'contents', 'action' => 'page','privacy-policy'));
	Router::connect('/terms-conditions', array('controller' => 'contents', 'action' => 'page','terms-conditions'));
	/* Paypal IPN plugin */
	/* Paypal IPN plugin */
	Router::connect('/paypal_ipn/process', array('plugin' => 'paypal_ipn', 'controller' => 'instant_payment_notifications', 'action' => 'process'));
/* Optional Route, but nice for administration */
	Router::connect('/paypal_ipn/:action/*', array('admin' => 'true', 'plugin' => 'paypal_ipn', 'controller' => 'instant_payment_notifications', 'action' => 'index'));
/* End Paypal IPN plugin */
  
	
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

