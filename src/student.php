<?php
class student{
	
	// database connection and table name
	private $conn;
	private $dbtable = "student";

    // object properties
    public $studentId;
    public $dob;
    public $gender;
    public $qualificationCode;
    public $initials;
    public $title;	
	public $firstname;
	public $surname;	
	public $nationalid;
	
	// constructor with $db as database connection
	public function __construct($db){
		$this->conn=$db;
	} // end of function
	
	// read all students
	function read_student(){
		// select all query:get all students
		$query = "SELECT * FROM student WHERE studentId = ?";
		// prepare query statement
		$stmt = $this->conn->prepare($query);
		//bind studentId of the student we are fetching
		$stmt->bindParam(1, $this->studentId);
		//executequery
		$stmt->execute();
		return $stmt;
	}// end of function read
	
	// read all students 
	function read(){
		// select all query:get all students
		$query = " SELECT * FROM student";
		// prepare query statement
		$stmt = $this->conn->prepare($query);
		//executequery
		$stmt->execute();
		return $stmt;
	}
	
	function create(){
		// query to insert record
		$query = "INSERT INTO student SET studentId=:studentId, dob=:dob, gender=:gender, qualificationCode=:qualificationCode, 
		initials=:initials,title=:title, firstname=:firstname, surname=:surname, nationalid=:nationalid";
	 
		// prepare query
		$stmt = $this->conn->prepare($query);
		
		// sanitize
		$this->studentId=htmlspecialchars(strip_tags($this->studentId));
		$this->dob=htmlspecialchars(strip_tags($this->dob));
		$this->gender=htmlspecialchars(strip_tags($this->gender));
		$this->qualificationCode=htmlspecialchars(strip_tags($this->qualificationCode));
		$this->initials=htmlspecialchars(strip_tags($this->initials));
		$this->title=htmlspecialchars(strip_tags($this->title));	
		$this->firstname=htmlspecialchars(strip_tags($this->firstname));
		$this->surname=htmlspecialchars(strip_tags($this->surname));	
		$this->nationalid=htmlspecialchars(strip_tags($this->nationalid));
	 
		// bind values
		$stmt->bindParam(":studentId", $this->studentId);
		$stmt->bindParam(":dob", $this->dob);
		$stmt->bindParam(":gender", $this->gender);
		$stmt->bindParam(":qualificationCode", $this->qualificationCode);
		$stmt->bindParam(":initials", $this->initials);
		$stmt->bindParam(":title", $this->title);	
		$stmt->bindParam(":firstname", $this->firstname);
		$stmt->bindParam(":surname", $this->surname);	
		$stmt->bindParam(":nationalid", $this->nationalid);
	 
		// execute query
		if($stmt->execute()){
			return true;
		}
		return false;
	}
	
	function update(){
		// query to insert record
		$query = "UPDATE student SET dob=:dob,title=:title, gender=:gender, qualificationCode=:qualificationCode, initials=:initials, firstname=:firstname, surname=:surname, nationalid=:nationalid WHERE studentId = studentId";
	 
		// prepare query
		$stmt = $this->conn->prepare($query);
		
		// sanitize
		
		$this->dob=htmlspecialchars(strip_tags($this->dob));
		$this->gender=htmlspecialchars(strip_tags($this->gender));
		$this->qualificationCode=htmlspecialchars(strip_tags($this->qualificationCode));
		$this->initials=htmlspecialchars(strip_tags($this->initials));
		$this->title=htmlspecialchars(strip_tags($this->title));	
		$this->firstname=htmlspecialchars(strip_tags($this->firstname));
		$this->surname=htmlspecialchars(strip_tags($this->surname));	
		$this->nationalid=htmlspecialchars(strip_tags($this->nationalid));
		$this->studentId=htmlspecialchars(strip_tags($this->studentId));
	 
		// bind values
		$stmt->bindParam(":dob", $this->dob);
		$stmt->bindParam(":gender", $this->gender);
		$stmt->bindParam(":qualificationCode", $this->qualificationCode);
		$stmt->bindParam(":initials", $this->initials);
		$stmt->bindParam(":title", $this->title);	
		$stmt->bindParam(":firstname", $this->firstname);
		$stmt->bindParam(":surname", $this->surname);	
		$stmt->bindParam(":nationalid", $this->nationalid);
		$stmt->bindParam(":studentId", $this->studentId);
		
		// execute query
		if($stmt->execute()){
			return true;
		}
		return false;
	}


// delete the product
function delete(){
 
    // delete query
    $query = "DELETE FROM student WHERE studentId = ?";
 
    // prepare query
    $stmt = $this->conn->prepare($query);
 
    // sanitize
    $this->studentId=htmlspecialchars(strip_tags($this->studentId));
 
    // bind id of record to delete
    $stmt->bindParam(1, $this->studentId);
 
    // execute query
    if($stmt->execute()){
        return true;
    }
 
    return false;
     
   }
}
?>
