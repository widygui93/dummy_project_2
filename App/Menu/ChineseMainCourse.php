<?php namespace App\Menu;


class ChineseMainCourse extends Menu{
	private $isExtraSeafood,
			$priceOfExtraSeafood;

	public function __construct($namaMenu="Nama Menu",$hargaMenu=0,$isExtraSeafood="n",$type="chinese"){
		parent::__construct($namaMenu, $hargaMenu, $type);

		$this->isExtraSeafood = $isExtraSeafood;

		$this->priceOfExtraSeafood = $this->cekUseAdditionalItem($this->isExtraSeafood);

		
	}


	public function getPriceOfExtraSeafood(){
		return $this->priceOfExtraSeafood;
	}

}




 ?>