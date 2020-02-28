<?php 

require_once '../init.php';

use App\Menu\ChineseMainCourse as Chinese;
use App\Menu\WesternMainCourse as Western;

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
	$order = new Chinese($name,$cost,$isExtraSeafood);
	echo $order->order();
} elseif($type == "western"){
	$isExtraHam = $_POST['isExtraHam'];
	$order = new Western($name,$cost,$isExtraHam);
	echo $order->order();
} else {
	echo "tipe menu tidak ditemukan";
}



 ?>