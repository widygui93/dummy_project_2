<?php namespace App\Menu;

class WesternMainCourse extends Menu{
	public $isExtraHam;

	public function __construct($namaMenu="Nama Menu",$hargaMenu=0,$isExtraHam="n",$type){
		parent::__construct($namaMenu, $hargaMenu, $type);

		$this->isExtraHam = $isExtraHam;
	}

	public function order(){
		$str = " tanpa extra ham";

		if($this->isExtraHam == 'y'){
			$str = " dengan extra ham";
			$this->hargaMenu += 10000;
		}
		return "user order " . $this->namaMenu . $str . " type " . $this->typeMenu . " ( Rp." . $this->hargaMenu . " )";
	}
}




 ?>