<?php namespace App\Menu;

class ChineseMainCourse extends Menu{
	private $isExtraSeafood,
			$priceOfExtraSeafood,
			$totalPrice;

	public function __construct($namaMenu="Nama Menu",$hargaMenu=0,$isExtraSeafood="n",$type="chinese"){
		parent::__construct($namaMenu, $hargaMenu, $type);

		$this->isExtraSeafood = $isExtraSeafood;
		$this->priceOfExtraSeafood = 0;
		$this->totalPrice = $hargaMenu;
	}

	public function order(){
		$str = " tanpa extra seafood";

		if($this->isExtraSeafood == 'y'){
			$str = " dengan extra seafood";
			
			$this->priceOfExtraSeafood = 10000;
			$this->totalPrice = $this->hargaMenu + $this->priceOfExtraSeafood;
		}
		return "user order " . $this->namaMenu . $str . " type " . $this->typeMenu . " ( Rp." . $this->totalPrice . " )";
	}
}




 ?>