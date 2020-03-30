<?php namespace App\Db;

class Cart extends Db {
	private $duplicateItems, $nonDuplicateItems, $totalHargaItems, $jumlahQuantity, $orderID;

	public function __construct(){
		parent::__construct();
		$this->duplicateItems = array(array());
		$this->nonDuplicateItems = array(array());
		$this->orderID = array();
		$this->totalHargaItems = 0;
		$this->jumlahQuantity = 0;
	}

	public function getDuplicateItems(){
		// $query = "SELECT * FROM order_menu WHERE user_name = 'user123' AND id_transfer = ''";
		$query = "SELECT id_menu, COUNT(*) as total FROM order_menu WHERE user_name = 'user123' AND id_transfer = '' GROUP BY id_menu HAVING COUNT(*) > 1";
		$result = $this->executeQuery($query);
		$datas = [];
		while ( $row = mysqli_fetch_assoc($result[0]) ) {
	        $datas[] = $row;
	    }

	    $IDMenus = [];
	    foreach ($datas as $data) {
	    	$IDMenus[] = $data["id_menu"];
	    }


	    $quantity = [];
	    for($i = 0; $i < count($IDMenus); $i++){
	    	$query = "SELECT SUM(quantity) AS quantity FROM order_menu WHERE user_name = 'user123' AND id_transfer = '' AND id_menu = '$IDMenus[$i]' ";
	    	$result = $this->executeQuery($query);
	    	$dataQuantity = mysqli_fetch_assoc($result[0]);
			$quantity[$i] = $dataQuantity['quantity'];
	    }

	    $totalHargaMenu = [];
	    for($i = 0; $i < count($IDMenus); $i++){
	    	$query = "SELECT SUM(total_harga_menu) AS total_harga_menu FROM order_menu WHERE user_name = 'user123' AND id_transfer = '' AND id_menu = '$IDMenus[$i]' ";
	    	$result = $this->executeQuery($query);
	    	$dataTotalHargaMenu = mysqli_fetch_assoc($result[0]);
			$totalHargaMenu[$i] = $dataTotalHargaMenu['total_harga_menu'];
	    }

	    $namaMenu = [];
	    for($i = 0; $i < count($IDMenus); $i++){
	    	$query = "SELECT DISTINCT(nama_menu) AS nama_menu FROM order_menu WHERE user_name = 'user123' AND id_transfer = '' AND id_menu = '$IDMenus[$i]'";
	    	$result = $this->executeQuery($query);
	    	$dataNamaMenu = mysqli_fetch_assoc($result[0]);
	    	$namaMenu[$i] = $dataNamaMenu['nama_menu'];
	    }

	    $price = [];
	    for($i = 0; $i < count($IDMenus); $i++){
	    	$query = "SELECT DISTINCT(harga_menu) AS harga_menu FROM order_menu WHERE user_name = 'user123' AND id_transfer = '' AND id_menu = '$IDMenus[$i]'";
	    	$result = $this->executeQuery($query);
	    	$dataPrice = mysqli_fetch_assoc($result[0]);
	    	$price[$i] = $dataPrice['harga_menu'];
	    }

	    for($i = 0; $i < count($IDMenus); $i++){
	    	$query = "SELECT order_id FROM order_menu WHERE user_name = 'user123' AND id_transfer = '' AND id_menu ='$IDMenus[$i]' ";
	    	$result = $this->executeQuery($query);
	    	while ( $row = mysqli_fetch_assoc($result[0]) ) {
	    		array_push($this->orderID, $row['order_id']);
		        // $this->orderID[] = $row['order_id'];
		    }
	    }

	    // $itemMenuDuplicate = array(array());
	    for($i = 0; $i < count($IDMenus); $i++){
	    	$this->duplicateItems[$i]['id_menu'] = $IDMenus[$i];
	    	$this->duplicateItems[$i]['menu'] = $namaMenu[$i];
		    $this->duplicateItems[$i]['price'] = $price[$i];
		    $this->duplicateItems[$i]['quantity'] = $quantity[$i];
		    $this->duplicateItems[$i]['total_price'] = $totalHargaMenu[$i];
	    }
	    




		return $this->duplicateItems;
    
	    // while ( $row = mysqli_fetch_assoc($result[0]) ) {
	    //     $this->items[] = $row;
	    // }
	    // return $this->items;
	}

	public function getNonDuplicateItems(){
		$query = "SELECT id_menu, COUNT(*) as total FROM order_menu WHERE user_name = 'user123' AND id_transfer = '' GROUP BY id_menu HAVING COUNT(*) = 1";
		$result = $this->executeQuery($query);
		$datas = [];
		while ( $row = mysqli_fetch_assoc($result[0]) ) {
	        $datas[] = $row;
	    }

	    $IDMenus = [];
	    foreach ($datas as $data) {
	    	$IDMenus[] = $data["id_menu"];
	    }


	    $quantity = [];
	    for($i = 0; $i < count($IDMenus); $i++){
	    	$query = "SELECT quantity FROM order_menu WHERE user_name = 'user123' AND id_transfer = '' AND id_menu = '$IDMenus[$i]' ";
	    	$result = $this->executeQuery($query);
	    	$dataQuantity = mysqli_fetch_assoc($result[0]);
			$quantity[$i] = $dataQuantity['quantity'];
	    }

	    $totalHargaMenu = [];
	    for($i = 0; $i < count($IDMenus); $i++){
	    	$query = "SELECT total_harga_menu FROM order_menu WHERE user_name = 'user123' AND id_transfer = '' AND id_menu = '$IDMenus[$i]' ";
	    	$result = $this->executeQuery($query);
	    	$dataTotalHargaMenu = mysqli_fetch_assoc($result[0]);
			$totalHargaMenu[$i] = $dataTotalHargaMenu['total_harga_menu'];
	    }

	    $namaMenu = [];
	    for($i = 0; $i < count($IDMenus); $i++){
	    	$query = "SELECT nama_menu FROM order_menu WHERE user_name = 'user123' AND id_transfer = '' AND id_menu = '$IDMenus[$i]'";
	    	$result = $this->executeQuery($query);
	    	$dataNamaMenu = mysqli_fetch_assoc($result[0]);
	    	$namaMenu[$i] = $dataNamaMenu['nama_menu'];
	    }

	    $price = [];
	    for($i = 0; $i < count($IDMenus); $i++){
	    	$query = "SELECT harga_menu FROM order_menu WHERE user_name = 'user123' AND id_transfer = '' AND id_menu = '$IDMenus[$i]'";
	    	$result = $this->executeQuery($query);
	    	$dataPrice = mysqli_fetch_assoc($result[0]);
	    	$price[$i] = $dataPrice['harga_menu'];
	    }

	    for($i = 0; $i < count($IDMenus); $i++){
	    	$query = "SELECT order_id FROM order_menu WHERE user_name = 'user123' AND id_transfer = '' AND id_menu ='$IDMenus[$i]' ";
	    	$result = $this->executeQuery($query);
	    	while ( $row = mysqli_fetch_assoc($result[0]) ) {
	    		array_push($this->orderID, $row['order_id']);
		        // $this->orderID[] = $row['order_id'];
		    }
	    }

	    // $itemMenuDuplicate = array(array());
	    for($i = 0; $i < count($IDMenus); $i++){
	    	$this->nonDuplicateItems[$i]['id_menu'] = $IDMenus[$i];
	    	$this->nonDuplicateItems[$i]['menu'] = $namaMenu[$i];
		    $this->nonDuplicateItems[$i]['price'] = $price[$i];
		    $this->nonDuplicateItems[$i]['quantity'] = $quantity[$i];
		    $this->nonDuplicateItems[$i]['total_price'] = $totalHargaMenu[$i];
	    }

	    return $this->nonDuplicateItems;
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
			$this->updateID_TransferFromTableOrder_Menu($this->orderID,$idTrf);
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
		$query = "DELETE FROM order_menu WHERE id_menu = '" .$data["id_menu"]. "'" . "AND user_name = 'user123' AND id_transfer = ''";
		$result = $this->executeQuery($query);
		return  $result[1];
	}



}

 ?>