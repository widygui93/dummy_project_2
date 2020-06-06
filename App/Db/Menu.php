<?php namespace App\Db;

class Menu extends Db {
	private $tipeMenu, $menu;

	public function __construct(){
		parent::__construct();
		$this->tipeMenu = array();
		$this->menu = array();
	}

	public function getTipeMenu(){
		$query = "SELECT DISTINCT id_tipe_menu, tipe_menu FROM menu";
		$result = $this->executeQuery($query);
		while ( $row = mysqli_fetch_assoc($result[0]) ) {
	        $this->tipeMenu[] = $row;
	    }
	    return $this->tipeMenu;
	}

	public function getMenuByIdTipeMenu($idTipeMenu){
		// clear array menu then ready to be inserted
		$this->menu = array();

		$query = "SELECT nama_menu, harga_menu , FORMAT(harga_menu,0) AS harga_menu_2, id_menu, tipe_menu FROM menu WHERE id_tipe_menu = $idTipeMenu";
		$result = $this->executeQuery($query);
		while ( $row = mysqli_fetch_assoc($result[0]) ) {
	        $this->menu[] = $row;
	    }
	    return $this->menu;
	}











}


?>