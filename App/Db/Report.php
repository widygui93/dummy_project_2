<?php namespace App\Db;

class Report extends Db {
	private $userReport, $transactionReport, $totalUser, $totalHalaman, $halamanAktif, $username, $registerDate;

	public function __construct(){
		parent::__construct();
		$this->userReport = array();
		$this->transactionReport = array();
		$this->totalUser = 0;
		$this->totalHalaman = 0;
		$this->halamanAktif = 0;
		$this->username = "";
		$this->registerDate = "";
	}

	public function getUsername(){
		return $this->username;
	}

	public function getRegisterDate(){
		return $this->registerDate;
	}

	private function setUsername($username){
		$this->username = $username;
	}

	private function setRegisterDate($registerDate){
		$this->registerDate = $registerDate;
	}

	public function searchBy(string $username, string $registerDate):array {
		$this->setUsername(strtolower(stripslashes($username)));
		$this->setRegisterDate($registerDate);

		$username = $this->getUsername();
		$registerDate = $this->getRegisterDate();

		$jumlahDataPerHalaman = 10;
		$totalData = $this->getTotalUserBy($username, $registerDate);
		$this->totalHalaman = ceil($totalData / $jumlahDataPerHalaman);
		$this->halamanAktif = $_GET["halaman"];
		$awalData = ($jumlahDataPerHalaman * $this->halamanAktif) - $jumlahDataPerHalaman;

		$query = "SELECT * FROM user WHERE username LIKE '%$username%' AND register_date LIKE '%$registerDate%' LIMIT $awalData, $jumlahDataPerHalaman ";
		$result = $this->executeQuery($query);
		while ( $row = mysqli_fetch_assoc($result[0]) ) {
	        $this->userReport[] = $row;
	    }
	    return $this->userReport;
	}

	public function getTotalUserBy(string $username, string $registerDate):int {
		$query = "SELECT * FROM user WHERE username LIKE '%$username%' AND register_date LIKE '%$registerDate%' ";
		$result = $this->executeQuery($query);
		$this->totalUser = $result[1];
	    return $this->totalUser;
	}

	public function getTotalHalaman():int{
		return $this->totalHalaman;
	}

	public function getHalamanAktif():int{
		return $this->halamanAktif;
	}

	public function getTotalUser():int {
		return $this->totalUser;
	}

}


?>