<?php namespace App\Menu;

class ChineseMainCourse extends Menu{
	private $isExtraSeafood;

	public function __construct($namaMenu="Nama Menu",$hargaMenu=0,$isExtraSeafood="n",$type="chinese"){
		parent::__construct($namaMenu, $hargaMenu, $type);

		$this->isExtraSeafood = $isExtraSeafood;
	}

	public function order(){
		$str = " tanpa extra seafood";

		if($this->isExtraSeafood == 'y'){
			$str = " dengan extra seafood";
			$this->hargaMenu += 10000;
		}
		return "user order " . $this->namaMenu . $str . " type " . $this->typeMenu . " ( Rp." . $this->hargaMenu . " )";
	}
}




 ?>