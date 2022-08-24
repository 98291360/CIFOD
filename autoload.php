<?php 


session_start();
spl_autoload_register('autoload');
require_once './boostrap.php';
function autoload($class_name){
	$array_paths = array(
	  'Database/',
	  'App/Classes/',
	  'Models/',
	  'Controllers/',
	  'functions/'
	);
	

	$parts = explode('\\', $class_name);
	$name = array_pop($parts);

	foreach ($array_paths as $path) {
		$file = sprintf($path.'%s.php', $name);
		if(is_file($file)){
			include_once $file;
		}
	}
} 
