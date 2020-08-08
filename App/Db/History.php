<?php namespace App\Db;

class History extends Db {
	private $items, $details;

	public function __construct(){
		parent::__construct();
		$this->items = array();
		$this->details = array();
	}

	public function getHistory($userName){
		$query = "SELECT tgl_transfer, no_rek_tujuan, FORMAT(total_transfer,0) AS total_transfer, alamat_order, id_transfer FROM transfer WHERE user_name = '$userName' ORDER BY tgl_transfer DESC";
		$result = $this->executeQuery($query);
		while ( $row = mysqli_fetch_assoc($result[0]) ) {
			$this->items[] = $row;
		}
		return $this->items;
	}

	public function getDetailHistory($id){
		$query = "SELECT nama_menu, tipe_menu, harga_menu, quantity FROM order_menu WHERE id_transfer = '$id' ";
		$result = $this->executeQuery($query);
		while ( $row = mysqli_fetch_assoc($result[0]) ) {
			$this->details[] = $row;
		}
		return $this->details;
	}

}






?>