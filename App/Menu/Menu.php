<?php namespace App\Menu;

class Menu {

	protected $namaMenu,$hargaMenu,$typeMenu;

	public function __construct($namaMenu,$hargaMenu,$type){
		$this->namaMenu = $namaMenu;
		$this->hargaMenu = $hargaMenu;
		$this->typeMenu = $type;
	}

	public function getNamaMenu(){
		return $this->namaMenu;
	}

	public function getHargaMenu(){
		return $this->hargaMenu;
	}

	public function getTypeMenu(){
		return $this->typeMenu;
	}

	// abstract public function order();

}




 ?>