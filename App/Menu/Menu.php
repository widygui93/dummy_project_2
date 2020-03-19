<?php namespace App\Menu;

class Menu {

	private $namaMenu,$hargaMenu,$typeMenu,$totalPrice;

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

	public function getTotalPrice(){
		return $this->totalPrice;
	}

	public function getTglOrder(){
		$tglOrder = date("d-M-Y");
		return $tglOrder;
	}

	

	protected function cekUseAdditionalItem($isAdditionalItem){
		if($isAdditionalItem == 'y'){
			$priceAddtionalItem = 10000;
			$this->totalPrice = $this->hargaMenu + $priceAddtionalItem;
			return $priceAddtionalItem;
		} else {
			$priceAddtionalItem = 0;
			$this->totalPrice = $this->hargaMenu;
			return $priceAddtionalItem;
		}
	}

}




 ?>