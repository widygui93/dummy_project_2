<?php 
session_start();

if ( !isset($_SESSION["login"]) ) {
    // arahkan user balik ke login
    header('Location: login.php');
    exit;
}

$user = $_SESSION["username"];

date_default_timezone_set("Asia/Jakarta");

require_once '../init.php';

use App\Menu\Menu as Menu;
use App\Db\OrderMenu as TabelOrderMenu;


$type = $_POST['tipe'];
$name = $_POST['nama'];
$cost = $_POST['harga'];
$idMenu = $_POST['idMenu'];
$quantity = $_POST['quantity'];


$menu = new Menu($name, $cost, $type, $idMenu, $quantity);

$order = new TabelOrderMenu();


cekOrder(
	$order->createOrder(
			$menu->getTypeMenu(),
			$menu->getIdMenu(),
			$menu->getNamaMenu(),
			$menu->getTglOrder(),
			$menu->getHargaMenu(),
			$user,
			$menu->getQuantity(),
			$menu->getTotalPrice()
	)
);


function cekOrder($jlhRec){
	if($jlhRec > 0){
		$result = array("title"=>"Success!", "text"=>"orderan berhasil masuk ke cart", "icon"=>"success");

		$resultJSON = json_encode($result);

		echo $resultJSON;
	} else {
		$result = array("title"=>"Failed!", "text"=>"orderan gagal masuk ke cart", "icon"=>"error");

		$resultJSON = json_encode($result);

		echo $resultJSON;
	}
}





 ?>