<?php
//require headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include_once '../../config/dbconnect.php';
include_once '../student.php';

// instantiate database
$database = new dbconnect();
$db = $database->connect();

// instantiate student object
$student = new student($db);

// query students
$stmt = $student->read();
$num = $stmt->rowCount();

// check if more than o record is found
if($num>0){
	//student array
	$students=array();
	$students["records"]=array();
	
	while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
		
		// extract row. this will make $['name'] token_get_all
		// just $name only
		extract($row);
		$student=array(
			"studentId"=>$studentId,
			"dob"=>$dob,
			"gender"=>$gender,
			"qualificationCode"=>$qualificationCode,
			"initials"=>$initials,
			"title"=>$title,
			"firstname"=>$firstname,
			"surname"=>$surname,
			"nationalid"=>$nationalid
		);
		array_push($students["records"], $student);
		
	}// end of while
	// set response code - 200 OK
	 //http_response_code(200);
	// show students data in json format
	echo json_encode($students);
	
}//end of if


?>
