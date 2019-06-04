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

	$student->studentId = isset($_GET['studentId']) ? $_GET['studentId'] : die();

	// set student property values
	$student->studentId = $_POST['studentId'];
	$student->dob = $_POST['dob'];
	$student->gender = $_POST['gender'];
	$student->qualificationCode = $_POST['qualificationCode'];
	$student->initials = $_POST['initials'];
	$student->title = $_POST['title'];
	$student->firstname = $_POST['firstname'];
	$student->surname = $_POST['surname'];
	$student->nationalid = $_POST['nationalid'];
	 
	// get id of product to be edited
	$data = json_decode(file_get_contents("php://input"));
	 
	// set ID property of product to be edited
	$student->studentId = $data->studentId;
	 
	// set product property values
	$student->studentId = $data->studentId;
    $student->dob = $data->dob;
    $student->gender = $data->gender;
    $student->qualificationCode = $data->qualificationCode;
    $student->initials = $data->initials;
    $student->title = $data->title;
    $student->firstname = $data->firstname;
    $student->surname = $data->surname;
    $student->nationalid = $data->nationalid;


	// create the student
	if($student->update()){
		 // set response code - 200 ok
		 http_response_code(200);
		echo json_encode(array("message" => "student was updated."));
	}
	else{
		 // set response code - 503 service unavailable
		 http_response_code(503);
		echo json_encode(array("message" => "Unable to update student."));
	}
?>