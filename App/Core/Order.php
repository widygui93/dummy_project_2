<?php 

require_once '../init.php';

use App\Menu\ChineseMainCourse as OrderChinese;
use App\Menu\WesternMainCourse as OrderWestern;

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
	$order = new OrderChinese($name,$cost,$isExtraSeafood);
	echo $order->order();
} elseif($type == "western"){
	$isExtraHam = $_POST['isExtraHam'];
	$order = new OrderWestern($name,$cost,$isExtraHam);
	echo $order->order();
} else {
	echo "tipe menu tidak ditemukan";
}



 ?>