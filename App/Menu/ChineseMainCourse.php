<?php namespace App\Menu;

require '../Core/Functions.php';

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
		// $str = " tanpa extra seafood";

		if($this->isExtraSeafood == 'y'){
			// $str = " dengan extra seafood";

			$this->priceOfExtraSeafood = 10000;
			$this->totalPrice = $this->hargaMenu + $this->priceOfExtraSeafood;

			$jlhRecord = tambahOrderan($this->typeMenu, $this->namaMenu, $this->hargaMenu, "user123", "seafood", $this->priceOfExtraSeafood, $this->totalPrice);

			// exit;
			return $jlhRecord;
		} else {
		// return "user order " . $this->namaMenu . $str . " type " . $this->typeMenu . " ( Rp." . $this->totalPrice . " )";
			$jlhRecord = tambahOrderan($this->typeMenu, $this->namaMenu, $this->hargaMenu, "user123", "seafood", $this->priceOfExtraSeafood, $this->totalPrice);
			return $jlhRecord;
		}
	}
}




 ?>