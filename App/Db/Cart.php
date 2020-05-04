<?php namespace App\Db;

class Cart extends Db {
	private $items, $totalHargaItems, $jumlahQuantity, $jumlahQuantityByIdMenu;

	public function __construct(){
		parent::__construct();
		$this->items = array();
		$this->totalHargaItems = 0;
		$this->jumlahQuantity = 0;
		$this->jumlahQuantityByIdMenu = 0;
	}

	public function getItems(){
		$query = "SELECT order_id, nama_menu, harga_menu, quantity, FORMAT(total_harga_menu,0) AS total_harga_menu, FORMAT(harga_menu,0) AS harga_menu_2 FROM order_menu WHERE user_name = 'user123' AND id_transfer = ''";
		$result = $this->executeQuery($query);
		while ( $row = mysqli_fetch_assoc($result[0]) ) {
	        $this->items[] = $row;
	    }
	    return $this->items;
	}

	public function getTotalHargaItems(){
		$query = "SELECT SUM(total_harga_menu) as total FROM order_menu WHERE user_name = 'user123' AND id_transfer = ''";
		$result = $this->executeQuery($query);
		$data = mysqli_fetch_assoc($result[0]);
		$this->totalHargaItems = $data['total'];
		// foreach ($this->items as $item) {
		// 	$this->totalHargaItems = $item["total_harga_menu"] + $this->totalHargaItems;
		// }

		return $this->totalHargaItems;
	}

	public function getJumlahQuantity(){
		$query = "SELECT SUM(quantity) as total FROM order_menu WHERE user_name = 'user123'AND id_transfer = ''";
		$result = $this->executeQuery($query);
		$data = mysqli_fetch_assoc($result[0]);
		$this->jumlahQuantity = $data['total'];

		if(is_null($this->jumlahQuantity)){
			$this->jumlahQuantity = 0;
		}
		return $this->jumlahQuantity;
	}

	public function getJumlahQuantityByIdMenu($idMenu){
		$query = "SELECT quantity FROM order_menu WHERE user_name = 'user123'AND id_transfer = '' and id_menu = '$idMenu'";
		$result = $this->executeQuery($query);
		$data = mysqli_fetch_assoc($result[0]);
		$this->jumlahQuantityByIdMenu = $data['quantity'];

		if(is_null($this->jumlahQuantityByIdMenu)){
			$this->jumlahQuantityByIdMenu = 0;
		}
		return $this->jumlahQuantityByIdMenu;
	}

	public function doPayment($data){
		$tglTransfer = date("Y-M-d");
		$tglTransfer=date("Y-m-d",strtotime($tglTransfer));
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
	    while ( $row = mysqli_fetch_row($result[0]) ) {
	        $idTrfs = $row;
	    }

	    for($i = 0; $i < count($idTrfs); $i++){
	    	if($randomString == $idTrfs[$i]){
	    		$this->generateRandomIDTransfer();
	    	}
	    }
	    return $randomString;
	}

	public function removeItem($data){
		$query = "DELETE FROM order_menu WHERE order_id = '" .$data["order_id"]. "'";
		$result = $this->executeQuery($query);
		return  $result[1];
	}

	public function editQuantity($data){
		$query = "UPDATE order_menu SET quantity = '" .$data["quantity"]. "' WHERE order_id = '" .$data["order_id"]. "'";
		$result = $this->executeQuery($query);
		return  $result[1];
	}

	public function editTotalHargaMenu($data){
		$newTotalHargamenu = $data["quantity"] * $data["harga_menu"];
		$query = "UPDATE order_menu SET total_harga_menu = '$newTotalHargamenu' WHERE order_id = '" .$data["order_id"]. "'";
		$result = $this->executeQuery($query);
		return  $result[1];
	}



}

 ?>