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

	public function getItems($userName){
		$query = "SELECT order_id, nama_menu, harga_menu, quantity, FORMAT(harga_menu,0) AS harga_menu_2 FROM order_menu WHERE user_name = '$userName' AND id_transfer = ''";
		$result = $this->executeQuery($query);
		while ( $row = mysqli_fetch_assoc($result[0]) ) {
	        $this->items[] = $row;
	    }
	    return $this->items;
	}

	public function getTotalHargaItems($userName){
		$query = "SELECT harga_menu, quantity FROM order_menu WHERE user_name = '$userName' and id_transfer = ''";
		$result = $this->executeQuery($query);
		while ( $row = mysqli_fetch_assoc($result[0]) ) {
	        $records[] = $row;
	    }
	    foreach($records as $record){
	    	$this->totalHargaItems = ($record["harga_menu"] * $record["quantity"]) + $this->totalHargaItems;
	    }
	    return $this->totalHargaItems;
	}

	public function getJumlahQuantity($userName){
		$query = "SELECT SUM(quantity) as total FROM order_menu WHERE user_name = '$userName'AND id_transfer = ''";
		$result = $this->executeQuery($query);
		$data = mysqli_fetch_assoc($result[0]);
		$this->jumlahQuantity = $data['total'];

		if(is_null($this->jumlahQuantity)){
			$this->jumlahQuantity = 0;
		}
		return $this->jumlahQuantity;
	}

	public function getJumlahQuantityByIdMenu($idMenu, $userName){
		$query = "SELECT quantity FROM order_menu WHERE user_name = '$userName'AND id_transfer = '' and id_menu = '$idMenu'";
		$result = $this->executeQuery($query);
		$data = mysqli_fetch_assoc($result[0]);
		$this->jumlahQuantityByIdMenu = $data['quantity'];

		if(is_null($this->jumlahQuantityByIdMenu)){
			$this->jumlahQuantityByIdMenu = 0;
		}
		return $this->jumlahQuantityByIdMenu;
	}

	public function doPayment($data, $userName){
		$tglTransfer = date("Y-M-d");
		$tglTransfer=date("Y-m-d",strtotime($tglTransfer));
		$query = '';
		$idTrf = '';
		$address = $data["address"];

		$pictureFolder = "img-transfer/";
		$gambar = $this->upload($pictureFolder);
		if( !$gambar ){
			return false;
		}

		$idTrf = $this->generateRandomIDTransfer();

		$query = "INSERT INTO transfer
					VALUES
				  ('$idTrf', '$gambar', '$userName', '20100460461', '$this->totalHargaItems', '$tglTransfer', '$address')
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

	// public function editTotalHargaMenu($data){
	// 	$newTotalHargamenu = $data["quantity"] * $data["harga_menu"];
	// 	$query = "UPDATE order_menu SET total_harga_menu = '$newTotalHargamenu' WHERE order_id = '" .$data["order_id"]. "'";
	// 	$result = $this->executeQuery($query);
	// 	return  $result[1];
	// }



}

 ?>