<?php namespace App\Db;

class Cart extends Db {
	private $items, $totalHargaItems, $jumlahItems;

	public function __construct(){
		parent::__construct();
		$this->items = [];
		$this->totalHargaItems = 0;
		$this->jumlahItems = 0;
	}

	public function getItems(){
		$query = "SELECT * FROM order_menu WHERE user_name = 'user123'";
		$result = $this->executeQuery($query);
		// $this->items = [];
    
	    while ( $row = mysqli_fetch_assoc($result[0]) ) {
	        $this->items[] = $row;
	    }
	    return $this->items;
	}

	public function getTotalHargaItems(){
		foreach ($this->items as $item) {
			$this->totalHargaItems = $item["total_harga_menu"] + $this->totalHargaItems;
		}

		return $this->totalHargaItems;
	}

	public function getJumlahItems(){
		$query = "SELECT COUNT(order_id) as total FROM order_menu WHERE user_name = 'user123'";
		$result = $this->executeQuery($query);
		$data = mysqli_fetch_assoc($result[0]);
		$this->jumlahItems = $data['total'];
		return $this->jumlahItems;
	}

	public function doPayment($data){
		$tglTransfer = date("d-M-Y");
		$daftar_order_id = '';

		foreach ($this->items as $item) {
			$daftar_order_id = $daftar_order_id . $item["order_id"] . ",";
		}

		$gambar = $this->upload();
		if( !$gambar ){
			return false;
		}

		$query = "INSERT INTO transfer
					VALUES
				  ('', '$gambar', 'user123', '20100460461', '$this->totalHargaItems', '$tglTransfer', '$daftar_order_id', 'address street xxx no 12')
				";
		$result = $this->executeQuery($query);

		return $result[1];
	}

	private function upload(){
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

		move_uploaded_file($tmpName, 'img-transfer/' . $namaFileBaru);

		return $namaFileBaru;

	}

}

 ?>