<?php namespace App\Menu;

class WesternMainCourse extends Menu{
	private $isExtraHam,
			$priceOfExtraHam;

	public function __construct($namaMenu="Nama Menu",$hargaMenu=0,$isExtraHam="n",$type="western"){
		parent::__construct($namaMenu, $hargaMenu, $type);

		$this->isExtraHam = $isExtraHam;

		$this->priceOfExtraHam = $this->cekUseAdditionalItem($this->isExtraHam);
		
	}

	public function getPriceOfExtraHam(){
		return $this->priceOfExtraHam;
	}



	
}





 ?>