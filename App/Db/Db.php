<?php namespace App\Db;

class Db {

	private $serverName, $userName, $password, $dbName;

	protected function __construct(){
		$this->serverName = "localhost";
		$this->userName = "root";
		$this->password = "";
		$this->dbName = "dummy_project_2";
	}

	protected function getServerName(){
		return $this->serverName;
	}

	protected function getUserName(){
		return $this->userName;
	}

	protected function getPassword(){
		return $this->password;
	}

	protected function getDbName(){
		return $this->dbName;
	}



}




 ?>