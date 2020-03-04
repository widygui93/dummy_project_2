<?php 

require_once '../init.php';

use App\Menu\ChineseMainCourse as Chinese;
use App\Menu\WesternMainCourse as Western;

use App\Db\OrderMenu as TabelOrderMenu;

// $tipeOrder = $_GET["q"];

// if($tipeOrder == "chinese"){
// 	$order = new OrderChinese("Kwetiau Goreng",35000,"y");
// 	echo $order->order();
// } elseif($tipeOrder == "western") {
// 	$order = new OrderWestern("Hamburger Deluxe",35000,"n");
// 	echo $order->order();
// } else {
// 	echo "tipe menu tidak ditemukan";
// }

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
		($isExtraSeafood == y) ? "seafood" : "",
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
		($isExtraHam == y) ? "ham" : "",
		$menuWestern->getPriceOfExtraHam(),
		$menuWestern->getTotalPrice()
		)
	);
} else {
	echo "tipe menu tidak ditemukan";
}

function cekOrder($jlhRec){
	if($jlhRec > 0){
		echo "
	        <script>
	            alert('data sukses masuk ke cart');
	            document.location.href = '../../index.php';
	        </script>
    	";
	} else {
		echo "
	        <script>
	            alert('data gagal masuk ke cart');
	            document.location.href = '../../index.php';
	        </script>
    	";
	}
}





 ?>