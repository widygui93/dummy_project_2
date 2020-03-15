<?php namespace App\Db;

class Cart extends Db {
	private $items, $totalHargaItems;

	public function __construct(){
		parent::__construct();
		$this->items = [];
		$this->totalHargaItems = 0;
	}

	public function getItems(){
		$conn = mysqli_connect($this->getServerName(), $this->getUserName(), $this->getPassword(), $this->getDbName());
		$query = "SELECT * FROM order_menu WHERE user_name = 'user123'";
		$result = mysqli_query($conn, $query);
		// $this->items = [];
    
	    while ( $row = mysqli_fetch_assoc($result) ) {
	        $this->items[] = $row;
	    }
	    return $this->items;
	}

	public function getTotalHargaItems(){
		foreach ($this->items as $item) {
			$this->totalHargaItems = $item["total_harga_menu"] + $this->totalHargaItems;
		}

		return $this->totalHargaItems;
	}

}

 ?>