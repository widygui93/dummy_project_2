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

	public function getRegisterDate(){
		$query = "SELECT register_date FROM user WHERE username = 'user123'";
		$result = $this->executeQuery($query);
		$data = mysqli_fetch_assoc($result[0]);
		$this->registerDate = $data['register_date'];
		return $this->registerDate;
	}

	public function getAddress(){
		$query = "SELECT address FROM user WHERE username = 'user123'";
		$result = $this->executeQuery($query);
		$data = mysqli_fetch_assoc($result[0]);
		$this->address = $data['address'];
		return $this->address;
	}

	public function getPhoneNo(){
		$query = "SELECT phone_no FROM user WHERE username = 'user123'";
		$result = $this->executeQuery($query);
		$data = mysqli_fetch_assoc($result[0]);
		$this->phoneNo = $data['phone_no'];
		return $this->phoneNo;
	}

	public function getEmail(){
		$query = "SELECT email FROM user WHERE username = 'user123'";
		$result = $this->executeQuery($query);
		$data = mysqli_fetch_assoc($result[0]);
		$this->email = $data['email'];
		return $this->email;
	}







}




?>