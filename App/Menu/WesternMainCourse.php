<?php namespace App\Menu;

class WesternMainCourse extends Menu{
	private $isExtraHam,
			$priceOfExtraHam,
			$totalPrice;

	public function __construct($namaMenu="Nama Menu",$hargaMenu=0,$isExtraHam="n",$type="western"){
		parent::__construct($namaMenu, $hargaMenu, $type);

		$this->isExtraHam = $isExtraHam;

		$this->cekUseAdditionalItem();
		
	}

	protected function cekUseAdditionalItem(){
		if($this->isExtraHam == 'y'){
			$this->priceOfExtraHam = 10000;
			$this->totalPrice = $this->hargaMenu + $this->priceOfExtraHam;
		} else {
			$this->priceOfExtraHam = 0;
			$this->totalPrice = $this->hargaMenu;
		}
	}

	public function getPriceOfExtraHam(){
		return $this->priceOfExtraHam;
	}

	public function getTotalPrice(){
		return $this->totalPrice;
	}


	
}





 ?>