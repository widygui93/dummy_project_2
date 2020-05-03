<?php namespace App\Menu;

class Menu {

	private $namaMenu,$hargaMenu,$typeMenu,$totalPrice,$idMenu,$quantity;

	public function __construct($namaMenu,$hargaMenu,$type,$idMenu,$quantity){
		$this->namaMenu = $namaMenu;
		$this->hargaMenu = $hargaMenu;
		$this->typeMenu = $type;
		$this->idMenu = $idMenu;
		$this->quantity = $quantity;
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
		$this->totalPrice = $this->hargaMenu * $this->quantity;
		return $this->totalPrice;
	}

	public function getIdMenu(){
		return $this->idMenu;
	}

	public function getQuantity(){
		return $this->quantity;
	}

	public function getTglOrder(){
		$tglOrder = date("Y-M-d");
		$tglOrder=date("Y-m-d",strtotime($tglOrder));
		return $tglOrder;
	}


}




 ?>