<?php namespace App\Db;

class Report extends Db {
	private $userReport, $transactionReport, $totalUser;

	public function __construct(){
		parent::__construct();
		$this->userReport = array();
		$this->transactionReport = array();
		$this->totalUser = 0;
	}

	public function getUserBy(string $username, string $registerDate):array {
		$query = "SELECT * FROM user WHERE username LIKE '%$username%' AND register_date LIKE '%$registerDate%' ";
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
}


?>