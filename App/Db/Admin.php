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

	public function insertTipeMenu(string $namaTipeMenu, int $idTipeMenu):int {
		$query = "INSERT INTO tipe_menu
					VALUES
				  ('', '$idTipeMenu', '$namaTipeMenu')
				";
		$result = $this->executeQuery($query);
		return $result[1];
	}

	







}




?>