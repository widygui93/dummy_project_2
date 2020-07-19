<?php 

spl_autoload_register(function ($class) { 
	$class = explode('\\', $class);
	$class = end($class);
	
    $pathDB = __DIR__ . '/Db/' . $class . '.php';

    if (file_exists($pathDB)) {
        require $pathDB;

        return true;
    }

    return false;

});

spl_autoload_register(function ($class) { 
    $class = explode('\\', $class);
    $class = end($class);
    
    $pathMenu = __DIR__ . '/Menu/' . $class . '.php';

    if (file_exists($pathMenu)) {
        require $pathMenu;

        return true;
    }

    return false;

});

 ?>