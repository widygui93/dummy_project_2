<?php namespace App\Db;

class Menu extends Db {
	private $tipeMenu, $menu;

	public function __construct(){
		parent::__construct();
		$this->tipeMenu = array();
		$this->menu = array();
	}

	public function getTipeMenu(){
		// $query = "SELECT DISTINCT id_tipe_menu, tipe_menu FROM menu";
		$query = "SELECT * FROM tipe_menu";
		$result = $this->executeQuery($query);
		while ( $row = mysqli_fetch_assoc($result[0]) ) {
	        $this->tipeMenu[] = $row;
	    }
	    return $this->tipeMenu;
	}

	public function getMenu(){
		$query = "SELECT A.nama_menu, A.harga_menu , FORMAT(A.harga_menu,0) AS harga_menu_2, A.id_menu, B.tipe_menu, A.image FROM menu A JOIN tipe_menu B ON A.id_tipe_menu = B.id_tipe_menu";
		$result = $this->executeQuery($query);
		while ( $row = mysqli_fetch_assoc($result[0]) ) {
	        $this->menu[] = $row;
	    }
	    return $this->menu;
	}

	public function getMenuByIdTipeMenu($idTipeMenu){
		// clear array menu then ready to be inserted
		$this->menu = array();

		$query = "SELECT A.nama_menu, A.harga_menu , FORMAT(A.harga_menu,0) AS harga_menu_2, A.id_menu, B.tipe_menu, A.image FROM menu A JOIN tipe_menu B ON A.id_tipe_menu = B.id_tipe_menu WHERE A.id_tipe_menu = $idTipeMenu";
		$result = $this->executeQuery($query);
		while ( $row = mysqli_fetch_assoc($result[0]) ) {
	        $this->menu[] = $row;
	    }
	    return $this->menu;
	}

	public function insertTipeMenu(string $namaTipeMenu, int $idTipeMenu):int {
		$dataNamaTipeMenu = htmlspecialchars($namaTipeMenu);
		$query = "INSERT INTO tipe_menu
					VALUES
				  ('', '$idTipeMenu', '$dataNamaTipeMenu')
				";
		$result = $this->executeQuery($query);
		return $result[1];
	}

	public function editTipeMenu(int $idTipeMenu, string $namaTipeMenu):int {
		$dataNamaTipeMenu = htmlspecialchars($namaTipeMenu);
		$query = "UPDATE tipe_menu SET tipe_menu = '$dataNamaTipeMenu' WHERE id_tipe_menu = '$idTipeMenu' ";
		$result = $this->executeQuery($query);
		return $result[1];
	}

	public function deleteTipeMenu(int $idTipeMenu):int {
		$query = "DELETE FROM tipe_menu WHERE id_tipe_menu = '$idTipeMenu' ";
		$result = $this->executeQuery($query);
		return  $result[1];
	}

	public function isTipeMenuDuplicate(string $namaTipeMenu):bool {
		$lowCaseTipeMenu = strtolower($namaTipeMenu);
		$query = "SELECT * FROM tipe_menu WHERE LOWER(tipe_menu) = '$lowCaseTipeMenu'";
		$result = $this->executeQuery($query);
		if( $result[1] > 0 ){
			return true;
		} else {
			return false;
		}
	}

	public function isTipeMenuContainSpecialCharAndNumber(string $namaTipeMenu):bool {
		if(preg_match_all('/[0-9]|[!@#$%^&*]/', $namaTipeMenu)){
		    return true;
		} else {
			return false;
		}
	}

	public function isTipeMenuInsideTableMenu(int $idTipeMenu):bool{
		$query = "SELECT * FROM menu WHERE id_tipe_menu = $idTipeMenu ";
		$result = $this->executeQuery($query);
		if( $result[1] > 0 ){
			return true;
		} else {
			return false;
		}
	}

	public function isUrlInvalid(array $data):bool{

		if( (isset($data["id"]) && isset($data["tipe"])) && (count($data) === 2) ){
		    $idTipeMenu = $data["id"];
		    $tipeMenu = $data["tipe"];

		    foreach ($this->tipeMenu as $type) {
		      if($idTipeMenu == $type['id_tipe_menu'] && $tipeMenu == $type['tipe_menu']){
		        return false;
		      }
		    }
		}
		return true;
	}

	public function isMenuDuplicate(string $namaMenu):bool{
		$lowCaseNamaMenu = strtolower($namaMenu);
		$query = "SELECT * FROM menu WHERE LOWER(nama_menu) = '$lowCaseNamaMenu'";
		$result = $this->executeQuery($query);
		if( $result[1] > 0 ){
			return true;
		} else {
			return false;
		}
	}

	public function isMenuContainSpecialCharAndNumber(string $namaMenu):bool{
		if(preg_match_all('/[0-9]|[!@#$%^&*]/', $namaMenu)){
		    return true;
		} else {
			return false;
		}
	}

	public function isPriceContainSpecialCharAndAlphabet(string $hargaMenu):bool{
		if(preg_match_all('/[a-z|A-Z]|[!@#$%^&*]/', $hargaMenu)){
		    return true;
		} else {
			return false;
		}
	}

	public function insertMenu(int $idMenu, string $tipeMenu, string $namaMenu, string $hargaMenu):int {
		$dataNamaMenu = htmlspecialchars($namaMenu);
		$dataHargaMenu = htmlspecialchars($hargaMenu);
		$dataHargaMenu = (int)$dataHargaMenu;
		$dataIDTipeMenu = $this->getIDTipeMenuBy($tipeMenu);
		// $dataIDTipeMenu = 617563859;

		$pictureFolder = "../Menu/Images/";
		$gambar = $this->upload($pictureFolder);
		if( !$gambar ){
			return false;
		}

		$query = "INSERT INTO menu
					VALUES
				  ('', '$idMenu', '$dataIDTipeMenu', '$dataNamaMenu', '$dataHargaMenu', '$gambar')
				";
		$result = $this->executeQuery($query);
		return $result[1];

	}

	public function editMenu(int $idMenu, string $namaMenu, int $hargaMenu):int {
		$dataNamaMenu = htmlspecialchars($namaMenu);
		$dataHargaMenu = htmlspecialchars($hargaMenu);
		$query = "UPDATE menu SET nama_menu = '$dataNamaMenu', harga_menu = '$dataHargaMenu' WHERE id_menu = '$idMenu' ";
		$result = $this->executeQuery($query);
		$this->updateDataDiTableOrderMenu($idMenu, $namaMenu, $hargaMenu);
		return $result[1];
	}

	private function getIDTipeMenuBy($tipeMenu){
		$query = "SELECT id_tipe_menu FROM tipe_menu WHERE tipe_menu = '$tipeMenu'";
		$result = $this->executeQuery($query);
		$data = mysqli_fetch_assoc($result[0]);
		return $data['id_tipe_menu'];
	}

	private function updateDataDiTableOrderMenu($idMenu, $namaMenu, $hargaMenu){
		$query = "UPDATE order_menu SET nama_menu = '$namaMenu', harga_menu = '$hargaMenu' WHERE id_menu = '$idMenu' and id_transfer = '' ";
		$result = $this->executeQuery($query);
	}










}


?>