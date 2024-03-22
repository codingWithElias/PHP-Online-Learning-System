<?php  

class Database {
	private $host = "localhost";
	private $dbName = "EduPulseDB";
	private $uName = "root";
	private $pass = "";
	private $conn;

	public function connect(){
       $this->conn = null;
       try {
       	$this->conn = new PDO('mysql:host='.$this->host. ';dbname='.$this->dbName, $this->uName, $this->pass );
       	
       	$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

       }catch(PDOException $e){
          echo "Connection error: ".$e->getMessage();
       }
       return $this->conn;
	}
}