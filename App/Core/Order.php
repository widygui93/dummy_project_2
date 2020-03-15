<?php 

require_once '../init.php';

use App\Menu\ChineseMainCourse as Chinese;
use App\Menu\WesternMainCourse as Western;

use App\Db\OrderMenu as TabelOrderMenu;
use App\Db\Cart as Cart;


$type = $_POST['tipe'];
$name = $_POST['nama'];
$cost = $_POST['harga'];



if($type == "chinese"){
	$isExtraSeafood = $_POST['isExtraSeafood'];
	$menuChinese = new Chinese($name,$cost,$isExtraSeafood,$type);

	$addMenuChinese = new TabelOrderMenu();
	cekOrder($addMenuChinese->createOrder(
		$menuChinese->getTypeMenu(),
		$menuChinese->getNamaMenu(),
		$menuChinese->getHargaMenu(),
		"user123",
		($isExtraSeafood == "y") ? "seafood" : "tanpa extra item",
		$menuChinese->getPriceOfExtraSeafood(),
		$menuChinese->getTotalPrice()
		)
	);
} elseif($type == "western"){
	$isExtraHam = $_POST['isExtraHam'];
	$menuWestern = new Western($name,$cost,$isExtraHam,$type);

	$addMenuWestern = new TabelOrderMenu();
	cekOrder($addMenuWestern->createOrder(
		$menuWestern->getTypeMenu(),
		$menuWestern->getNamaMenu(),
		$menuWestern->getHargaMenu(),
		"user123",
		($isExtraHam == "y") ? "ham" : "tanpa extra item",
		$menuWestern->getPriceOfExtraHam(),
		$menuWestern->getTotalPrice()
		)
	);
} else {
	echo "tipe menu tidak ditemukan";
}

function cekOrder($jlhRec){
	if($jlhRec > 0){
		// echo "orderan sukses masuk ke cart";
		$cart = new Cart();
		echo $cart->getJumlahItems();
	} else {
		echo "orderan gagal masuk ke cart";
	}
}





 ?>