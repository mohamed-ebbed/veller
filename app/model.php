<?php

namespace App;
use \mysqli;

class Model{
	function __construct($table_name){
		$this->conn = $this->connect();
		$this->tablename = $table_name;
	}

	private function connect(){
		$hostname = "localhost";
		$username = "root";
		$password = "";
		$dbname = "veller";
		$conn = new mysqli($hostname , $username , $password , $dbname);
		return $conn;
	}

	public function select($values , $all = False){
		if($all){
			$sql = "SELECT * FROM " . $this->tablename;
			return $this->conn->query($sql);
		}
	}

	public function insert($values){

	}

	public function delete($values){

	}

	public function update($values){

	}

	function __destruct(){
		$this->conn->close();
	}


}

?>