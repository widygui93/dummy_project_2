<?php namespace App\Menu;

abstract class Menu {

	protected $namaMenu,$hargaMenu,$typeMenu;

	protected function __construct($namaMenu,$hargaMenu,$type){
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

	abstract protected function cekUseAdditionalItem();

}




 ?>