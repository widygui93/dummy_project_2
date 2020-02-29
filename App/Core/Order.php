<?php 

require_once '../init.php';

use App\Menu\ChineseMainCourse as Chinese;
// use App\Menu\WesternMainCourse as Western;

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
	// $order = new Chinese($name,$cost,$isExtraSeafood,$type);
	// cekOrder( $order->order() );
	$menuChinese = new Chinese($name,$cost,$isExtraSeafood,$type);
	// $menuChinese->order();

	$addMenuChinese = new TabelOrderMenu();
	cekOrder($addMenuChinese->createOrder(
		$menuChinese->getTypeMenu(),
		$menuChinese->getNamaMenu(),
		$menuChinese->getHargaMenu(),
		"user123",
		"seafood",
		$menuChinese->priceOfExtraSeafood,
		$menuChinese->totalPrice
		)
	);
} elseif($type == "western"){
	$isExtraHam = $_POST['isExtraHam'];
	// $order = new Western($name,$cost,$isExtraHam,$type);
	// cekOrder( $order->order() );
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