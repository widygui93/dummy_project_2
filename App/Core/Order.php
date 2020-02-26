<?php 

require_once '../init.php';

use App\Menu\ChineseMainCourse as OrderChinese;
use App\Menu\WesternMainCourse as OrderWestern;

$tipeOrder = $_GET["q"];

if($tipeOrder == "chinese"){
	$order = new OrderChinese("Kwetiau Goreng",35000,"y");
	echo $order->order();
} elseif($tipeOrder == "western") {
	$order = new OrderWestern("Hamburger Deluxe",35000,"n");
	echo $order->order();
} else {
	echo "tipe menu tidak ditemukan";
}



 ?>