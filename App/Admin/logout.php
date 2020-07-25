<?php 
session_start();

// hapus session admin saja
unset($_SESSION["admin"]);



header('Location: login.php');
exit;



?>