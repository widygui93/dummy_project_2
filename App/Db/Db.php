<?php namespace App\Db;

class Db {

	private $serverName, $userName, $password, $dbName;

	protected function __construct(){
		$this->serverName = "localhost";
		$this->userName = "root";
		$this->password = "";
		$this->dbName = "dummy_project_2";
	}

	private function connect(){
		return mysqli_connect($this->serverName, $this->userName, $this->password, $this->dbName);
	}

	protected function executeQuery($q){
		$conn = $this->connect();
		$result = mysqli_query($conn,$q);
		$totalRows = mysqli_affected_rows($conn);
		$data = [];
		$data[0] = $result;
		$data[1] = $totalRows;
		return $data;
	}

	protected function updateID_TransferFromTableOrder_Menu($items,$idTrf){
		foreach ($items as $item) {
			$query = "UPDATE order_menu SET id_transfer = '$idTrf' WHERE order_id = '".$item["order_id"]."'";
			$resultUpdate = $this->executeQuery($query);
		}
	}

	protected function upload($folder){
		$namaFile = $_FILES['gambar']['name'];
		$ukuranFile = $_FILES['gambar']['size'];
		$error = $_FILES['gambar']['error'];
		$tmpName = $_FILES['gambar']['tmp_name'];

		// cek apakah tidak ada gambar yang diupload
		if( $error === 4 ) {
			echo "<script>
					alert('pilih gambar terlebih dahulu!');
				  </script>";
			return false;
		}

		// cek apakah yang diupload adalah gambar
		$ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
		$ekstensiGambar = explode('.', $namaFile);
		$ekstensiGambar = strtolower(end($ekstensiGambar));
		if( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
			echo "<script>
					alert('yang anda upload bukan gambar!');
				  </script>";
			return false;
		}

		// cek jika ukurannya terlalu besar
		if( $ukuranFile > 1000000 ) {
			echo "<script>
					alert('ukuran gambar terlalu besar!');
				  </script>";
			return false;
		}

		// lolos pengecekan, gambar siap diupload
		// generate nama gambar baru
		$namaFileBaru = uniqid();
		$namaFileBaru .= '.';
		$namaFileBaru .= $ekstensiGambar;

		move_uploaded_file($tmpName, $folder . $namaFileBaru);

		return $namaFileBaru;
	}

	
}




 ?>