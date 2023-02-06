<?php

try
{
	// define the site path
	$site_path = realpath(dirname(__FILE__));
	define ('__SITE_PATH', $site_path);
	
	// the application directory path 
	define ('__APP_PATH', __SITE_PATH);
	// add the application to the include path
	set_include_path( __APP_PATH );
	set_include_path( __SITE_PATH );

	// set the public web root path
	$path = str_replace($_SERVER['DOCUMENT_ROOT'], '', __SITE_PATH);
	define('__PUBLIC_PATH', $path);
	
	spl_autoload_register(null);

	spl_autoload_extensions('.php, .class.php, .lang.php');

	// autoload libs
	function libLoader( $class )
	{
		$filename = strtolower( $class ) . '.class.php';
		// hack to remove namespace 
		$file = __APP_PATH . '/lib/' . $filename;
		if (file_exists($file) == false)
		{
			return false;
		}
		include_once $file;
	}

	function classLoader( $class )
	{
		$filename = strtolower( $class ) . '.class.php';
		// hack to remove namespace 
		$file = __APP_PATH . '/classes/' . $filename;
		if (file_exists($file) == false)
		{
			return false;
		}
//		logger::auditLog("classLoader:".$file, 1, __FILE__, __LINE__ );
		include_once $file;
	}
	
	spl_autoload_register('libLoader');
	spl_autoload_register('classLoader');
	
	$config = config::getInstance();
	$lang = $config->config_values['application']['language'];
	$filename = strtolower($lang) . '.lang.php';
	$file = __APP_PATH . '/lang/' . $filename;
	include $file;
	
}
catch(Exception $e )
{
	echo $e->getMessage();
}
	
?>