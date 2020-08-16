<?php namespace App\Db;

class Admin extends Db {

	public function __construct(){
		parent::__construct();
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
}




?>