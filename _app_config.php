<?php
/**
 * @package Pizzaria Meveana
 *
 * APPLICATION-WIDE CONFIGURATION SETTINGS
 *
 * This file contains application-wide configuration settings.  The settings
 * here will be the same regardless of the machine on which the app is running.
 *
 * This configuration should be added to version control.
 *
 * No settings should be added to this file that would need to be changed
 * on a per-machine basic (ie local, staging or production).  Any
 * machine-specific settings should be added to _machine_config.php
 */

/**
 * APPLICATION ROOT DIRECTORY
 * If the application doesn't detect this correctly then it can be set explicitly
 */
if (!GlobalConfig::$APP_ROOT) GlobalConfig::$APP_ROOT = realpath("./");

/**
 * check is needed to ensure asp_tags is not enabled
 */
if (ini_get('asp_tags')) 
	die('<h3>Server Configuration Problem: asp_tags is enabled, but is not compatible with Savant.</h3>'
	. '<p>You can disable asp_tags in .htaccess, php.ini or generate your app with another template engine such as Smarty.</p>');

/**
 * INCLUDE PATH
 * Adjust the include path as necessary so PHP can locate required libraries
 */
set_include_path(
		GlobalConfig::$APP_ROOT . '/libs/' . PATH_SEPARATOR .
		GlobalConfig::$APP_ROOT . '/../phreeze/libs' . PATH_SEPARATOR .
		GlobalConfig::$APP_ROOT . '/vendor/phreeze/phreeze/libs/' . PATH_SEPARATOR .
		get_include_path()
);

/**
 * COMPOSER AUTOLOADER
 * Uncomment if Composer is being used to manage dependencies
 */
// $loader = require 'vendor/autoload.php';
// $loader->setUseIncludePath(true);

/**
 * SESSION CLASSES
 * Any classes that will be stored in the session can be added here
 * and will be pre-loaded on every page
 */
require_once "App/ExampleUser.php";

/**
 * RENDER ENGINE
 * You can use any template system that implements
 * IRenderEngine for the view layer.  Phreeze provides pre-built
 * implementations for Smarty, Savant and plain PHP.
 */
require_once 'verysimple/Phreeze/SavantRenderEngine.php';
GlobalConfig::$TEMPLATE_ENGINE = 'SavantRenderEngine';
GlobalConfig::$TEMPLATE_PATH = GlobalConfig::$APP_ROOT . '/templates/';

/**
 * ROUTE MAP
 * The route map connects URLs to Controller+Method and additionally maps the
 * wildcards to a named parameter so that they are accessible inside the
 * Controller without having to parse the URL for parameters such as IDs
 */
GlobalConfig::$ROUTE_MAP = array(

	// default controller when no route specified
	'GET:' => array('route' => 'Default.Home'),
		
	// example authentication routes
	'GET:loginform' => array('route' => 'SecureExample.LoginForm'),
	'POST:login' => array('route' => 'SecureExample.Login'),
	'GET:secureuser' => array('route' => 'SecureExample.UserPage'),
	'GET:secureadmin' => array('route' => 'SecureExample.AdminPage'),
	'GET:logout' => array('route' => 'SecureExample.Logout'),
		
	// Cliente
	'GET:clientes' => array('route' => 'Cliente.ListView'),
	'GET:cliente/(:num)' => array('route' => 'Cliente.SingleView', 'params' => array('id' => 1)),
	'GET:api/clientes' => array('route' => 'Cliente.Query'),
	'POST:api/cliente' => array('route' => 'Cliente.Create'),
	'GET:api/cliente/(:num)' => array('route' => 'Cliente.Read', 'params' => array('id' => 2)),
	'PUT:api/cliente/(:num)' => array('route' => 'Cliente.Update', 'params' => array('id' => 2)),
	'DELETE:api/cliente/(:num)' => array('route' => 'Cliente.Delete', 'params' => array('id' => 2)),
		
	// Empresaterceriza
	'GET:empresatercerizas' => array('route' => 'Empresaterceriza.ListView'),
	'GET:empresaterceriza/(:num)' => array('route' => 'Empresaterceriza.SingleView', 'params' => array('id' => 1)),
	'GET:api/empresatercerizas' => array('route' => 'Empresaterceriza.Query'),
	'POST:api/empresaterceriza' => array('route' => 'Empresaterceriza.Create'),
	'GET:api/empresaterceriza/(:num)' => array('route' => 'Empresaterceriza.Read', 'params' => array('id' => 2)),
	'PUT:api/empresaterceriza/(:num)' => array('route' => 'Empresaterceriza.Update', 'params' => array('id' => 2)),
	'DELETE:api/empresaterceriza/(:num)' => array('route' => 'Empresaterceriza.Delete', 'params' => array('id' => 2)),
		
	// Endereco
	'GET:enderecos' => array('route' => 'Endereco.ListView'),
	'GET:endereco/(:num)' => array('route' => 'Endereco.SingleView', 'params' => array('id' => 1)),
	'GET:api/enderecos' => array('route' => 'Endereco.Query'),
	'POST:api/endereco' => array('route' => 'Endereco.Create'),
	'GET:api/endereco/(:num)' => array('route' => 'Endereco.Read', 'params' => array('id' => 2)),
	'PUT:api/endereco/(:num)' => array('route' => 'Endereco.Update', 'params' => array('id' => 2)),
	'DELETE:api/endereco/(:num)' => array('route' => 'Endereco.Delete', 'params' => array('id' => 2)),
		
	// Entregadores
	'GET:entregadoreses' => array('route' => 'Entregadores.ListView'),
	'GET:entregadores/(:num)' => array('route' => 'Entregadores.SingleView', 'params' => array('id' => 1)),
	'GET:api/entregadoreses' => array('route' => 'Entregadores.Query'),
	'POST:api/entregadores' => array('route' => 'Entregadores.Create'),
	'GET:api/entregadores/(:num)' => array('route' => 'Entregadores.Read', 'params' => array('id' => 2)),
	'PUT:api/entregadores/(:num)' => array('route' => 'Entregadores.Update', 'params' => array('id' => 2)),
	'DELETE:api/entregadores/(:num)' => array('route' => 'Entregadores.Delete', 'params' => array('id' => 2)),
		
	// Itempedido
	'GET:itempedidos' => array('route' => 'Itempedido.ListView'),
	'GET:itempedido/(:num)' => array('route' => 'Itempedido.SingleView', 'params' => array('id' => 1)),
	'GET:api/itempedidos' => array('route' => 'Itempedido.Query'),
	'POST:api/itempedido' => array('route' => 'Itempedido.Create'),
	'GET:api/itempedido/(:num)' => array('route' => 'Itempedido.Read', 'params' => array('id' => 2)),
	'PUT:api/itempedido/(:num)' => array('route' => 'Itempedido.Update', 'params' => array('id' => 2)),
	'DELETE:api/itempedido/(:num)' => array('route' => 'Itempedido.Delete', 'params' => array('id' => 2)),
		
	// Pedido
	'GET:pedidos' => array('route' => 'Pedido.ListView'),
	'GET:pedido/(:num)' => array('route' => 'Pedido.SingleView', 'params' => array('id' => 1)),
	'GET:api/pedidos' => array('route' => 'Pedido.Query'),
	'POST:api/pedido' => array('route' => 'Pedido.Create'),
	'GET:api/pedido/(:num)' => array('route' => 'Pedido.Read', 'params' => array('id' => 2)),
	'PUT:api/pedido/(:num)' => array('route' => 'Pedido.Update', 'params' => array('id' => 2)),
	'DELETE:api/pedido/(:num)' => array('route' => 'Pedido.Delete', 'params' => array('id' => 2)),
		
	// Produto
	'GET:produtos' => array('route' => 'Produto.ListView'),
	'GET:produto/(:num)' => array('route' => 'Produto.SingleView', 'params' => array('id' => 1)),
	'GET:api/produtos' => array('route' => 'Produto.Query'),
	'POST:api/produto' => array('route' => 'Produto.Create'),
	'GET:api/produto/(:num)' => array('route' => 'Produto.Read', 'params' => array('id' => 2)),
	'PUT:api/produto/(:num)' => array('route' => 'Produto.Update', 'params' => array('id' => 2)),
	'DELETE:api/produto/(:num)' => array('route' => 'Produto.Delete', 'params' => array('id' => 2)),
		
	// Usuario
	'GET:usuarios' => array('route' => 'Usuario.ListView'),
	'GET:usuario/(:num)' => array('route' => 'Usuario.SingleView', 'params' => array('id' => 1)),
	'GET:api/usuarios' => array('route' => 'Usuario.Query'),
	'POST:api/usuario' => array('route' => 'Usuario.Create'),
	'GET:api/usuario/(:num)' => array('route' => 'Usuario.Read', 'params' => array('id' => 2)),
	'PUT:api/usuario/(:num)' => array('route' => 'Usuario.Update', 'params' => array('id' => 2)),
	'DELETE:api/usuario/(:num)' => array('route' => 'Usuario.Delete', 'params' => array('id' => 2)),

	// catch any broken API urls
	'GET:api/(:any)' => array('route' => 'Default.ErrorApi404'),
	'PUT:api/(:any)' => array('route' => 'Default.ErrorApi404'),
	'POST:api/(:any)' => array('route' => 'Default.ErrorApi404'),
	'DELETE:api/(:any)' => array('route' => 'Default.ErrorApi404')
);

/**
 * FETCHING STRATEGY
 * You may uncomment any of the lines below to specify always eager fetching.
 * Alternatively, you can copy/paste to a specific page for one-time eager fetching
 * If you paste into a controller method, replace $G_PHREEZER with $this->Phreezer
 */
?>