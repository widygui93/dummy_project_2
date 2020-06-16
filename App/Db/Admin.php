<?php namespace App\Db;

class Admin extends Db {
	private $username, $account;

	public function __construct(){
		parent::__construct();
		$this->username = "";
		$this->account = "";
	}

	public function getRegisterDate($userName){
		$query = "SELECT register_date FROM user WHERE username = '$userName'";
		$result = $this->executeQuery($query);
		$data = mysqli_fetch_assoc($result[0]);
		$this->registerDate = $data['register_date'];
		return $this->registerDate;
	}

	public function getAddress($userName){
		$query = "SELECT address FROM user WHERE username = '$userName'";
		$result = $this->executeQuery($query);
		$data = mysqli_fetch_assoc($result[0]);
		$this->address = $data['address'];
		return $this->address;
	}


	

	


	public function login($data) {
		$username = strtolower(stripslashes($data["username"]));
		$password = $this->escapeStr($data["password"]);

		$query = "SELECT * FROM admin WHERE username = '$username'";
		$result = $this->executeQuery($query);

		// cek username ada di db atau tidak
		if( mysqli_num_rows($result[0]) === 1 ){
			// cek password sama atau tidak
			$row = mysqli_fetch_assoc($result[0]);
			if( password_verify($password, $row["password"]) ){

			    return true;
			} else {
				return false;
			}
		} else {
			return false;
		}
	}

	public function verifyUserAndPassword(string $password, string $userName):bool{
		$query = "SELECT * FROM user WHERE username = '$userName'";
		$result = $this->executeQuery($query);

		// cek username ada di db atau tidak
		if( mysqli_num_rows($result[0]) === 1 ){
			// cek password sama atau tidak
			$row = mysqli_fetch_assoc($result[0]);
			if( password_verify($password, $row["password"]) ){
				return true;
			} else {
				return false;
			}
		} else {
			return false;
		}
	}

	public function purifyStr(string $str):string{
		$str = $this->escapeStr($str);
		return $str;
	}

	
	

	public function validateLengthPassword(string $newPassword):bool{
		// cek password dengan length antara 8 -12 characters
		if(preg_match('/^.{8,12}$/', $newPassword) === 0 ){
		    return false;
		} else {
			return true;
		}
	}







}




?>