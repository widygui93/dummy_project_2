<?php 

spl_autoload_register(function ($class) { 
	$class = explode('\\', $class);
	$class = end($class);
	
    $pathDB = __DIR__ . '/Db/' . $class . '.php';

    require_once $pathDB;

});

spl_autoload_register(function ($class) { 
    $class = explode('\\', $class);
    $class = end($class);
    
    $pathMenu = __DIR__ . '/Menu/' . $class . '.php';

    require_once $pathMenu;

});

 ?>