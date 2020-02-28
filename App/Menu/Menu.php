<?php namespace App\Menu;

abstract class Menu {

	protected $namaMenu,$hargaMenu,$typeMenu;

	public function __construct($namaMenu,$hargaMenu,$type){
		$this->namaMenu = $namaMenu;
		$this->hargaMenu = $hargaMenu;
		$this->typeMenu = $type;
	}

	abstract public function order();

}




 ?>