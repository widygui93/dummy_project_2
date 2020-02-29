<?php namespace App\Db;

class OrderMenu extends Db {

	public function __construct(){
		parent::__construct();
	}

	public function createOrder($typeMenu, $namaMenu, $hargaMenu, $userName, $itemTambahan, $hargaItemTambahan, $totalHarga){
		$conn = mysqli_connect($this->serverName, $this->userName, $this->password, $this->dbName);

		// query insert data
	    $query = " INSERT INTO order_menu
	                VALUES
	            ('', '$typeMenu', '$namaMenu','$hargaMenu', '$userName', '$itemTambahan', '$hargaItemTambahan', '$totalHarga') 
	    ";

	    mysqli_query($conn,$query);

	    return mysqli_affected_rows($conn);
	}
}

 ?>