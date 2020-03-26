<?php 
date_default_timezone_set("Asia/Jakarta");

require_once '../init.php';

use App\Menu\Menu as Menu;
use App\Menu\ChineseMainCourse as Chinese;
use App\Menu\WesternMainCourse as Western;
use App\Db\OrderMenu as TabelOrderMenu;
use App\Db\Cart as Cart;


$type = $_POST['tipe'];
$name = $_POST['nama'];
$cost = $_POST['harga'];
$idMenu = $_POST['idMenu'];
$quantity = $_POST['quantity'];

$menu = new Menu($name, $cost, $type, $idMenu, $quantity);

$order = new TabelOrderMenu();



cekOrder($order->createOrder(
	$menu->getTypeMenu(),
	$menu->getIdMenu(),
	$menu->getNamaMenu(),
	$menu->getTglOrder(),
	$menu->getHargaMenu(),
	"user123",
	$menu->getQuantity(),
	$menu->getTotalPrice()
	)
);


function cekOrder($jlhRec){
	if($jlhRec > 0){
		$cart = new Cart();
		echo $cart->getJumlahItems();
	} else {
		echo "orderan gagal masuk ke cart";
	}
}





 ?>