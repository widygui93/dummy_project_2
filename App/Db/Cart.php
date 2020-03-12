<?php namespace App\Db;

class Cart extends Db {
	// private $jlhItem, $items, $hargaItem, $totalHarga;

	public function __construct(){
		parent::__construct();
	}

	// public function __construct($jlhItem=0,$items="items",$hargaItem=0,$totalHarga=0){
	// 	$this->jlhItem    = $jlhItem;
	// 	$this->items      = $items;
	// 	$this->hargaItem  = $hargaItem;
	// 	$this->totalHarga = $totalHarga;
	// }

	public function getItems(){
		$conn = mysqli_connect($this->getServerName(), $this->getUserName(), $this->getPassword(), $this->getDbName());
		$query = "SELECT * FROM order_menu WHERE user_name = 'user123'";
		$result = mysqli_query($conn, $query);
		$rows = [];
    
	    while ( $row = mysqli_fetch_assoc($result) ) {
	        $rows[] = $row;
	    }
	    return $rows;
	}

}

 ?>