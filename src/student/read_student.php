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

// set AUTHOR property of record to read
$student->studentId = isset($_GET['studentId']) ? $_GET['studentId'] : die();

// query studentIdIds
$stmt = $student->read_student();

// check if more than o record is found
if($student->studentId != null){
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
	}	
	//// end of while
	// set response code - 200 OK
	//http_response_code(200);
	// show students data in json format
	echo json_encode($students);
	
}//end of if
else{
    // set response code - 404 Not found
   // http_response_code(404);
 
    // tell the user product does not exist
    echo json_encode(array("message" => "student does not exist."));
}
?>

