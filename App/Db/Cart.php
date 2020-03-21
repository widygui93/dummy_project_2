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
		$query = '';
		$idTrf = '';


		$gambar = $this->upload();
		if( !$gambar ){
			return false;
		}

		$idTrf = $this->generateRandomIDTransfer();

		$query = "INSERT INTO transfer
					VALUES
				  ('$idTrf', '$gambar', 'user123', '20100460461', '$this->totalHargaItems', '$tglTransfer', 'address street xxx no 12')
				";
		$resultInsert = $this->executeQuery($query);

		if($resultInsert[0]){
			$this->updateID_TransferFromTableOrder_Menu($this->items,$idTrf);
		}
		
		return $resultInsert[1];
	}

	private function generateRandomIDTransfer() {
	    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < 20; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }

	    $query = "SELECT id_transfer FROM transfer";
	    $result = $this->executeQuery($query);
	    $idTrfs = [];
	    while ( $row = mysqli_fetch_assoc($result[0]) ) {
	        $idTrfs = $row;
	    }
	    
	    for($i = 0; $i < count($idTrfs); $i++){
	    	if($randomString == $idTrfs[$i]){
	    		$this->generateRandomIDTransfer();
	    	}
	    }
	    return $randomString;
	}



}

 ?>