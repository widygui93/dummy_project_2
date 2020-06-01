<?php namespace App\Db;

class Profile extends Db {
	private $registerDate, $address, $email, $phoneNo, $profilePic;

	public function __construct(){
		parent::__construct();
		// $this->username = "";
		$this->registerDate = "";
		$this->address = "";
		$this->email = "";
		$this->phoneNo = "";
		$this->profilePic = "";
	}

	// public function getUserName(){
	// 	$query = "SELECT username FROM user WHERE username = 'user123'";
	// 	$result = $this->executeQuery($query);
	// 	$data = mysqli_fetch_assoc($result[0]);
	// 	$this->username = $data['username'];
	// 	return $this->username;
	// }

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

	public function getPhoneNo($userName){
		$query = "SELECT phone_no FROM user WHERE username = '$userName'";
		$result = $this->executeQuery($query);
		$data = mysqli_fetch_assoc($result[0]);
		$this->phoneNo = $data['phone_no'];
		return $this->phoneNo;
	}

	public function getEmail($userName){
		$query = "SELECT email FROM user WHERE username = '$userName'";
		$result = $this->executeQuery($query);
		$data = mysqli_fetch_assoc($result[0]);
		$this->email = $data['email'];
		return $this->email;
	}

	public function getProfilePic($userName){
		$query = "SELECT profile_picture FROM user WHERE username = '$userName'";
		$result = $this->executeQuery($query);
		$data = mysqli_fetch_assoc($result[0]);
		$this->profilePic = $data['profile_picture'];
		return $this->profilePic;
	}

	public function editProfileData($data, $userName){
		$dataAddress = htmlspecialchars($data["address"]);
		$dataPhoneNo = htmlspecialchars($data["phoneno"]);
		$dataEmail = htmlspecialchars($data["email"]);

		$query = "UPDATE user SET address = '$dataAddress', email = '$dataEmail', phone_no = '$dataPhoneNo' WHERE username = '$userName' ";
		$result = $this->executeQuery($query);
		return $result[1];
	}

	public function editProfilePic($userName){
		$pictureFolder = "profile-picture/";
		$gambar = $this->upload($pictureFolder);
		if( !$gambar ){
			return false;
		}

		$query = "UPDATE user SET profile_picture = '$gambar' WHERE username = '$userName'";
		$result = $this->executeQuery($query);
		return $result[1];
	}

	public function editPassword(string $newPassword, string $userName):int {

		// enkripsi password
		$newPassword = password_hash($newPassword, PASSWORD_DEFAULT);

		$query = "UPDATE user SET password = '$newPassword' WHERE username = '$userName'";
		$result = $this->executeQuery($query);
		return $result[1];
	}

	public function register($data){

		$username = strtolower(stripslashes($data["username"]));
		$email = strtolower(stripslashes($data["email"]));
		$address = strtolower(stripslashes($data["address"]));
		$phone = stripslashes($data["phone"]);
		$password = $this->escapeStr($data["password"]);
		$passwordConfirm = $this->escapeStr($data["password-confirm"]);
		$tglDaftar=date("Y-m-d",strtotime(date("Y-M-d")));

		// cek username sudah ada atau belum
		$query = "SELECT username FROM user WHERE username = '$username'";
		$result = $this->executeQuery($query);

		if( mysqli_fetch_assoc($result[0]) ){
			echo "
			    <script>swal('Failed!', 'Username already existed', 'error');</script>
			";
		    return -1;
		}

		// cek username hanya alphanumeric
		// jika terdapat character selain a-z dan A-Z dan 0-9
		// maka return 1
		if (preg_match('/[^a-z0-9]/', $username) === 1  ) {
	        echo "
	    		<script>swal('Failed!', 'Username must be alphanumeric only', 'error');</script>
	        ";
	        return -1;
		}

		// cek panjang karakter username diantara 6 s/d 12
		if(preg_match('/^[a-z0-9]{6,12}$/', $username) === 0 ){
		    echo "
				<script>swal('Failed!', 'Range length of username is 6 - 12', 'error');</script>
		    ";
		    return -1;
		} 

		// cek username mesti harus ada alphabet dan numeric
		if(preg_match('/^(?=.*[0-9])(?=.*[a-zA-Z])([a-zA-Z0-9]+)$/', $username) === 0 ){
		    echo "
				<script>swal('Failed!', 'Username must contain both alphanumeric', 'error');</script>
		    ";
		    return -1;
		}

		// cek email dengan format yourname@domain.com(.id)
		if(preg_match('/^([a-z\d\.-]+)@([a-z\d-]+)\.([a-z]{2,8})(\.[a-z]{2,8})?$/', $email) === 0){
		    echo "
				<script>swal('Failed!', 'Email must follow this format: yourname@domain.com(.id)', 'error');</script>
		    ";
		    return -1;
		}

		// cek phone no dengan length antara 10 - 12 digit
		if(preg_match('/^\d{10,12}$/', $phone) === 0){
		    echo "
				<script>swal('Failed!', 'Phone no length 10 - 12 digit', 'error');</script>
		    ";
		    return -1;
		}

		// cek password dengan length antara 8 -12 characters
		if(preg_match('/^.{8,12}$/', $password) === 0 ){
		    echo "
				<script>swal('Failed!', 'Password length 8 - 12 characters', 'error');</script>
		    ";
		    return -1;
		}

		// cek konfirmasi password
		if ( $password !== $passwordConfirm ) {
			echo "
				<script>swal('Failed!', 'Password does not match with Confirm Password', 'error');</script>
			";
		    return -1;
		}

		// enkripsi password
		$password = password_hash($password, PASSWORD_DEFAULT);

		// tambahkan user baru ke database
		$query = "INSERT INTO user
					VALUES
				  ('', '$username', '$password', '$address', 'user-photo.png', '$email', '$phone', '$tglDaftar')
				";
		$result = $this->executeQuery($query);
		return $result[1];


	}

	public function login($data) {
		$username = strtolower(stripslashes($data["username"]));
		$password = $this->escapeStr($data["password"]);

		$query = "SELECT * FROM user WHERE username = '$username'";
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

	public function isUnduplicatePassword(string $oldPassword, string $newPassword):bool{
		if( $oldPassword === $newPassword){
			return false;
		} else {
			return true;
		}
	}

	public function isDuplicatePassword(string $newPassword, string $confirmPassword):bool{
		// cek konfirmasi password
		if ( $newPassword === $confirmPassword ) {
		    return true;
		} else {
			return false;
		}
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