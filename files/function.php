<?php
/**
* to satisfy only
* 
*/
if (function_exists('log_message') === false) {
	function log_message() {}
}

/**
* Required.
* If you wanted to use default remove_invisible_characters() function,
* you can load system/core/Common.php
* 
* example: require BASEPATH . 'core/Common.php';
* 
* @see system/database/DB_driver.php - CI_DB_driver:_escape_str()
* 
*/
if (function_exists('remove_invisible_characters') === false) {
	function remove_invisible_characters($str) { return $str; }
}

/**
* Important Required.
* 
* To load fake CI3 classes
* 
* @see ../class/
* 
*/
if (function_exists('load_class')) {
	throw new Exception('I am sorry. But this package require load_class() function.');
} else {
	function &load_class($class) {
		static $instances = array();

		$instance = '\\anovsiradj\\CI3DB\\' . $class;

		if (isset($instances[$instance]) === false) {

			// basically, this is to trigger php to run autoloader to load/register class if it not exist
			class_exists($instance, true);

			$instances[$instance] = &$instance::init();
		}

		return $instances[$instance];
	}
}
