<?php namespace App\Db;

class Profile extends Db {
	private $username, $registerDate, $address, $email, $phoneNo;

	public function __construct(){
		parent::__construct();
		$this->username = "";
		$this->registerDate = "";
		$this->address = "";
		$this->email = "";
		$this->phoneNo = "";
	}

	public function getUserName(){
		$query = "SELECT username FROM user WHERE username = 'user123'";
		$result = $this->executeQuery($query);
		$data = mysqli_fetch_assoc($result[0]);
		$this->username = $data['username'];
		return $this->username;
	}







}




?>