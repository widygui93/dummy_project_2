<?php 

spl_autoload_register(function ($class) { 
	$class = explode('\\', $class);
	$class = end($class);
	
    $pathDB = __DIR__ . '/Db/' . $class . '.php';
    $pathMenu = __DIR__ . '/Menu/' . $class . '.php';

    if (file_exists($pathDB)) {
        require_once $pathDB;
    } elseif (file_exists($pathMenu)) {
        require_once $pathMenu;
    }

});

 ?>