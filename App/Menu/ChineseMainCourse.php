<?php namespace App\Menu;

class ChineseMainCourse extends Menu{
	public $isExtraSeafood;

	public function __construct($namaMenu="Nama Menu",$hargaMenu=0,$isExtraSeafood="y"){
		parent::__construct($namaMenu, $hargaMenu);

		$this->isExtraSeafood = $isExtraSeafood;
	}

	public function tes(){
		return "tes saja ini";
	}
}




 ?>