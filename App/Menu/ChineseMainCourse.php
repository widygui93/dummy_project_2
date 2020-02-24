<?php namespace App\Menu;

class ChineseMainCourse extends Menu{
	public $isExtraSeafood;

	public function __construct($namaMenu="Nama Menu",$hargaMenu=0,$isExtraSeafood="n"){
		parent::__construct($namaMenu, $hargaMenu);

		$this->isExtraSeafood = $isExtraSeafood;
	}

	public function order(){
		$str = " tanpa extra seafood";

		if($this->isExtraSeafood == 'y'){
			$str = " dengan extra seafood";
			$this->hargaMenu += 10000;
		}
		return "user order " . $this->namaMenu . $str . " ( Rp." . $this->hargaMenu . " )";
	}
}




 ?>