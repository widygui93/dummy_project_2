<?php namespace App\Db;

class History extends Db {
	private $items;

	public function __construct(){
		parent::__construct();
		$this->items = array();
	}

	public function getHistory(){
		$query = "SELECT tgl_transfer, no_rek_tujuan, total_transfer, alamat_order, id_transfer FROM transfer WHERE user_name = 'user123'";
		$result = $this->executeQuery($query);
		while ( $row = mysqli_fetch_assoc($result[0]) ) {
			$this->items[] = $row;
		}
		return $this->items;
	}

}






?>