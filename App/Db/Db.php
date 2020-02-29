<?php namespace App\Db;

class Db {

	protected $serverName, $userName, $password, $dbName;

	protected function __construct(){
		$this->serverName = "localhost";
		$this->userName = "root";
		$this->password = "";
		$this->dbName = "dummy_project_2";
	}

	// protected function createOrder();

}




 ?>