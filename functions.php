<?php
function my_autoloader($class) {
	include 'lib/' . $class . '.php';
}

spl_autoload_register('my_autoloader');
?>