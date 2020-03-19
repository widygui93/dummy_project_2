<?php namespace App\Db;

class OrderMenu extends Db {

	public function __construct(){
		parent::__construct();
	}

	public function createOrder($typeMenu, $namaMenu, $tglOrder, $hargaMenu, $userName, $itemTambahan, $hargaItemTambahan, $totalHarga){
		// query insert data
	    $query = " INSERT INTO order_menu
	                VALUES
	            ('', '' , '$typeMenu', '$namaMenu', '$tglOrder', '$hargaMenu', '$userName', '$itemTambahan', '$hargaItemTambahan', '$totalHarga') 
	    ";

	    $result = $this->executeQuery($query);

		return $result[1];

	}
}

 ?>