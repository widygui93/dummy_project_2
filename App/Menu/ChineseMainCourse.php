<?php namespace App\Menu;

// require '../Core/Functions.php';

class ChineseMainCourse extends Menu{
	private $isExtraSeafood,
			$priceOfExtraSeafood,
			$totalPrice;

	public function __construct($namaMenu="Nama Menu",$hargaMenu=0,$isExtraSeafood="n",$type="chinese"){
		parent::__construct($namaMenu, $hargaMenu, $type);

		$this->isExtraSeafood = $isExtraSeafood;

		$this->cekUseAdditionalItem();

		
	}

	private function cekUseAdditionalItem(){
		if($this->isExtraSeafood == 'y'){
			$this->priceOfExtraSeafood = 10000;
			$this->totalPrice = $this->hargaMenu + $this->priceOfExtraSeafood;
		} else {
			$this->priceOfExtraSeafood = 0;
			$this->totalPrice = $this->hargaMenu;
		}
	}

	public function getPriceOfExtraSeafood(){
		return $this->priceOfExtraSeafood;
	}

	public function getTotalPrice(){
		return $this->totalPrice;
	}

	// public function order(){

		// if($this->isExtraSeafood == 'y'){

			// $this->priceOfExtraSeafood = 10000;
			// $this->totalPrice = $this->hargaMenu + $this->priceOfExtraSeafood;

			// $jlhRecord = tambahOrderan($this->typeMenu, $this->namaMenu, $this->hargaMenu, "user123", "seafood", $this->priceOfExtraSeafood, $this->totalPrice);

			// return $jlhRecord;
		// } else {
			// $jlhRecord = tambahOrderan($this->typeMenu, $this->namaMenu, $this->hargaMenu, "user123", "seafood", $this->priceOfExtraSeafood, $this->totalPrice);
			// return $jlhRecord;
		
	// }
}




 ?>