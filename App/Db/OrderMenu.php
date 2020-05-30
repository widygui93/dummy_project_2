<?php namespace App\Db;

class OrderMenu extends Db {

	public function __construct(){
		parent::__construct();
	}

	public function createOrder($typeMenu, $idMenu, $namaMenu, $tglOrder, $hargaMenu, $userName, $quantity, $totalHarga){

		if($this->isMenuAlreadyExist($idMenu, $userName)){
			$query = "UPDATE order_menu SET quantity = '$quantity' WHERE user_name = '$userName' AND id_transfer = '' AND id_menu = '$idMenu'";
			$result = $this->executeQuery($query);

			$newTotalHargaMenu = $quantity * $hargaMenu;
			$query = "UPDATE order_menu SET total_harga_menu = '$newTotalHargaMenu' WHERE user_name = '$userName' AND id_transfer = '' AND id_menu = '$idMenu'";
			$result = $this->executeQuery($query);

			return $result[1];
		} else {
			// query insert data
		    $query = " INSERT INTO order_menu
		                VALUES
		            ('', '' , '$typeMenu', '$idMenu', '$namaMenu', '$tglOrder', '$hargaMenu', '$userName', '$quantity', '$totalHarga') 
		    ";

		    $result = $this->executeQuery($query);

			return $result[1];
		}

	}

	private function isMenuAlreadyExist($idMenu, $userName){
		$query = "SELECT order_id FROM order_menu WHERE user_name = '$userName' AND id_transfer = '' AND id_menu = '$idMenu'";
		$result = $this->executeQuery($query);
		$data = mysqli_fetch_assoc($result[0]);

		if(is_null($data['order_id'])){
			return false;
		}
		return true;
	}
}

 ?>