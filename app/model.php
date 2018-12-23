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

	public function select($values, $conditions = NULL , $tables = NULL, $grouping = NULL, $ordering = NULL){
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
		if ($grouping){
			$grouping = implode(",", $grouping);
			$sql = $sql." GROUP BY ".$grouping;
		}
		if ($ordering){
			$ordering = implode(",", $ordering);
			$sql = $sql." ORDER BY ".$ordering;
		}
		
		$result = $this->conn->query($sql);
		if($result){
			return $result;
		}
		else{
			die($this->conn->error);
		}
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
		$result = $this->conn->query($sql);
		if($result){
			return $result;
		}
		else{
			die($this->conn->error);
		}
	}

	public function delete($conditions){
		if(!$conditions){
			return;
		}
		$conditions = implode(" AND ", $conditions);
		$sql = "DELETE FROM ".$this->tablename." WHERE ".$conditions;
		return $this->conn->query($sql);
	}

	public function update($values, $conditions){
		if (!$values){
			return;
		}
		$values = implode(",", $values);
		$conditions = implode(" AND ", $conditions);
		$sql = "UPDATE ".$this->tablename." SET ".$values." WHERE ".$conditions;
		$result = $this->conn->query($sql);
		if($result){
			return $result;
		}
		else{
			die($this->conn->error);
		}
	}

	public function ExcuteQuery($sql){
		if (!$sql){
			return 0;
		}
		$counter =  mysqli_query($this->conn, $sql);
		return mysqli_fetch_object($counter);
	}

	function __destruct(){
		$this->conn->close();
	}
}

?>