<?php 
session_start();

// hapus session login dan username saja
unset($_SESSION["login"]);
unset($_SESSION["username"]);



header('Location: ../../index.php');
exit;



?>