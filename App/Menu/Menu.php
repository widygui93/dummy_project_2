<?php namespace App\Menu;

abstract class Menu {

	protected $namaMenu,$hargaMenu;

	public function __construct($namaMenu,$hargaMenu){
		$this->namaMenu = $namaMenu;
		$this->hargaMenu = $hargaMenu;
	}

	abstract public function tes();

}




 ?>