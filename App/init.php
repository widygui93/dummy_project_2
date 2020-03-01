<?php 

// require_once 'Menu/Menu.php';
// require_once 'Db/Db.php';
// require_once 'Menu/ChineseMainCourse.php';
// require_once 'Menu/WesternMainCourse.php';
// require_once 'Db/OrderMenu.php';




// spl_autoload_register(function($class){
// 	// $class = explode('\\', $class);
// 	// $class = end($class);

// 	require_once __DIR__ . '/Db/' .$class. '.php';
// });

// spl_autoload_register(function($class){
// 	// $class = explode('\\', $class);
// 	// $class = end($class);

// 	require_once __DIR__ . '/Menu/' .$class. '.php';
// });

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