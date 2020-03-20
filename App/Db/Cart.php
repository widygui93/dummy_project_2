<?php namespace App\Db;

class Cart extends Db {
	private $items, $totalHargaItems, $jumlahItems;

	public function __construct(){
		parent::__construct();
		$this->items = [];
		$this->totalHargaItems = 0;
		$this->jumlahItems = 0;
	}

	public function getItems(){
		$query = "SELECT * FROM order_menu WHERE user_name = 'user123'";
		$result = $this->executeQuery($query);
		// $this->items = [];
    
	    while ( $row = mysqli_fetch_assoc($result[0]) ) {
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

	public function getJumlahItems(){
		$query = "SELECT COUNT(order_id) as total FROM order_menu WHERE user_name = 'user123'";
		$result = $this->executeQuery($query);
		$data = mysqli_fetch_assoc($result[0]);
		$this->jumlahItems = $data['total'];
		return $this->jumlahItems;
	}

	public function doPayment($data){
		$tglTransfer = date("d-M-Y");
		$daftar_order_id = '';
		$query = '';


		foreach ($this->items as $item) {
			$daftar_order_id = $daftar_order_id . $item["order_id"] . ",";
		}

		$gambar = $this->upload();
		if( !$gambar ){
			return false;
		}

		$query = "INSERT INTO transfer
					VALUES
				  ('', '$gambar', 'user123', '20100460461', '$this->totalHargaItems', '$tglTransfer', '$daftar_order_id', 'address street xxx no 12')
				";
		$resultInsert = $this->executeQuery($query);

		$this->updateID_TransferFromTableOrder_Menu($this->items);

		return $resultInsert[1];
	}



}

 ?>