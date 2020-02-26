<?php 

require_once '../init.php';

use App\Menu\ChineseMainCourse as OrderChinese;

$tipeOrder = $_GET["q"];

if($tipeOrder == "chinese"){
	$order = new OrderChinese("Kwetiau Goreng",35000,"y");
	echo $order->order();
}



 ?>