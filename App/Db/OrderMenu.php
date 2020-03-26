<?php namespace App\Db;

class OrderMenu extends Db {

	public function __construct(){
		parent::__construct();
	}

	public function createOrder($typeMenu, $idMenu, $namaMenu, $tglOrder, $hargaMenu, $userName, $quantity, $totalHarga){
		// query insert data
	    $query = " INSERT INTO order_menu
	                VALUES
	            ('', '' , '$typeMenu', '$idMenu', '$namaMenu', '$tglOrder', '$hargaMenu', '$userName', '$quantity', '$totalHarga') 
	    ";

	    $result = $this->executeQuery($query);

		return $result[1];

	}
}

 ?>