<?php 

require_once '../init.php';

use App\Menu\ChineseMainCourse as OrderChinese;


$order = new OrderChinese("Kwetiau Goreng",35000,"y");
echo $order->order();




// echo "ini order";


 ?>