<?php namespace App\Db;

class Report extends Db {
	private $userReport, $transactionReport, $totalUser, $totalTrans, $totalHalaman, $halamanAktif, $username, $registerDate, $fromTransDate, $toTransDate;

	public function __construct(){
		parent::__construct();
		$this->userReport = array();
		$this->transactionReport = array();
		$this->totalUser = 0;
		$this->totalTrans = 0;
		$this->totalHalaman = 0;
		$this->halamanAktif = 0;
		$this->username = "";
		$this->registerDate = "";
		$this->fromTransDate = "";
		$this->toTransDate = "";
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

	public function getFromTransDate(){
		return $this->fromTransDate;
	}

	public function getToTransDate(){
		return $this->toTransDate;
	}

	private function setFromTransDate($fromTransDate){
		$this->fromTransDate = $fromTransDate;
	}

	private function setToTransDate($toTransDate){
		$this->toTransDate = $toTransDate;

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

	public function isEitherTransDateEmpty(int $fromTransDate, int $toTransDate):bool{
		return ( $fromTransDate == 0 || $toTransDate == 0 ) ?? false;
	}

	public function isFromTransDateBigger(int $fromTransDate, int $toTransDate):bool{
		return ($fromTransDate > $toTransDate) ?? false;
	}

	public function searchTransBy(string $fromTransDate, string $toTransDate):array{
		$this->setFromTransDate($fromTransDate);
		$this->setToTransDate($toTransDate);

		$fromTransDate = $this->getFromTransDate();
		$toTransDate = $this->getToTransDate();

		$jumlahDataPerHalaman = 10;
		$totalData = $this->getTotalTransBy($fromTransDate, $toTransDate);
		$this->totalHalaman = ceil($totalData / $jumlahDataPerHalaman);
		$this->halamanAktif = $_GET["halaman"];
		$awalData = ($jumlahDataPerHalaman * $this->halamanAktif) - $jumlahDataPerHalaman;

		$query = "SELECT id_transfer, user_name, no_rek_tujuan, total_transfer, tgl_transfer, alamat_order FROM transfer WHERE tgl_transfer BETWEEN CAST('$fromTransDate' AS DATE) AND CAST('$toTransDate' AS DATE) LIMIT $awalData, $jumlahDataPerHalaman ";
		$result = $this->executeQuery($query);
		while ( $row = mysqli_fetch_assoc($result[0]) ) {
	        $this->transactionReport[] = $row;
	    }
	    return $this->transactionReport;

	}

	private function getTotalTransBy(string $fromTransDate, string $toTransDate):int {
		$query = "SELECT * FROM transfer WHERE tgl_transfer BETWEEN CAST('$fromTransDate' AS DATE) AND CAST('$toTransDate' AS DATE) ";
		$result = $this->executeQuery($query);
		$this->totalTrans = $result[1];
	    return $this->totalTrans;
	}

	public function getTotalTrans():int {
		return $this->totalTrans;
	}

}


?>