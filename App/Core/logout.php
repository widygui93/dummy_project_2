<?php 
session_start();

// memastikan hilang session ny
session_unset();
$_SESSION = [];

// destroy session nya
session_destroy();


header('Location: ../../index.php');
exit;



?>