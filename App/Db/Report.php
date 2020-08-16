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

	public function getUserBy(string $username, string $registerDate):array {
		$this->username = strtolower(stripslashes($username));
		$this->registerDate = $registerDate;

		$jumlahDataPerHalaman = 10;
		$totalData = $this->getTotalUserBy($username, $registerDate);
		$this->totalHalaman = ceil($totalData / $jumlahDataPerHalaman);
		// $this->halamanAktif = ( isset($_GET["halaman"]) ) ? $_GET["halaman"] : 1;
		$this->halamanAktif = 1;
		$awalData = ($jumlahDataPerHalaman * $this->halamanAktif) - $jumlahDataPerHalaman;

		$query = "SELECT * FROM user WHERE username LIKE '%$this->username%' AND register_date LIKE '%$this->registerDate%' LIMIT $awalData, $jumlahDataPerHalaman ";
		$result = $this->executeQuery($query);
		while ( $row = mysqli_fetch_assoc($result[0]) ) {
	        $this->userReport[] = $row;
	    }
	    return $this->userReport;
	}

	public function getTotalUserBy(string $username, string $registerDate):int {
		// $username = strtolower(stripslashes($username));
		$query = "SELECT * FROM user WHERE username LIKE '%$this->username%' AND register_date LIKE '%$this->registerDate%' ";
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

	public function getUserByPage(int $halaman):array{
		$jumlahDataPerHalaman = 10;
		$totalData = $this->getTotalUserBy($this->username, $this->registerDate);
		$this->totalHalaman = ceil($totalData / $jumlahDataPerHalaman);
		$this->halamanAktif =   $halaman;
		$awalData = ($jumlahDataPerHalaman * $this->halamanAktif) - $jumlahDataPerHalaman;

		$query = "SELECT * FROM user WHERE username LIKE '%$this->username%' AND register_date LIKE '%$this->registerDate%' LIMIT $awalData, $jumlahDataPerHalaman ";
		$result = $this->executeQuery($query);
		while ( $row = mysqli_fetch_assoc($result[0]) ) {
	        $this->userReport[] = $row;
	    }
	    return $this->userReport;
	}
}


?>