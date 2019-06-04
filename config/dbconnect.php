<?php
/** Database credentials*/
class dbconnect{
	private $host="localhost";
	private $db="db_tsi01081";
	private $user="root";
	private $pass="";
	public $conn;
	
	/**Database connection ..*/
	public function connect(){
		$this->conn = null;
		try{
			$this->conn = new PDO("mysql:host=".$this->host .";dbname=".$this->db, $this->user, $this->pass);
			$this->conn->exec("set names utf8");
		}catch(PDOException $exception){
			echo "connection error : " .$exception->getMessage();
			
		}
		
		return $this->conn;
		
	}//end of function connect
	
	
	
	
}//end of class


?>
