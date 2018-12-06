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

	public function select($values, $conditions = NULL , $tables = NULL ){
		$sql = "SELECT ";
		if($values != "*"){
			$values = implode("," , $values);
		}
		$sql = $sql . $values . " FROM ".$this->tablename;

		if($tables){
			$tables = implode("," , $tables);
			$sql = $sql . "," . $tables;
		}

		if($conditions){
			$conditions = implode(" and " , $conditions);
			$sql = $sql . " WHERE " .$conditions;
		}

		return $this->conn->query($sql);
	}

	public function insert($values){
		$columns = array();
		$toInsert = array();
		foreach($values as $column => $value){
			array_push($columns , $column);
			array_push($toInsert , $value);
		}
		$columns = implode("," , $columns);
		$toInsert = implode("," , $toInsert);
		$sql = "INSERT INTO ".$this->tablename. " (". $columns . " ) VALUES ( ". $toInsert . " )";
		return $this->conn->query($sql);
	}

	public function delete($conditions){

	}

	public function update($values, $conditions){
	}


	function __destruct(){
		$this->conn->close();
	}


}

?>