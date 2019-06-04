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

 
$data = json_decode(file_get_contents("php://input"));
 
// make sure data is not empty
if(
    !empty($data->studentId) &&
    !empty($data->dob) &&
    !empty($data->gender) &&
    !empty($data->qualificationCode) &&
    !empty($data->initials) &&
    !empty($data->title) &&
    !empty($data->firstname) &&
    !empty($data->surname) &&
    !empty($data->nationalid) 
){
    // set student property values
    $student->studentId = $data->studentId;
    $student->dob = $data->dob;
    $student->gender = $data->gender;
    $student->qualificationCode = $data->qualificationCode;
    $student->initials = $data->initials;
    $student->title = $data->title;
    $student->firstname = $data->firstname;
    $student->surname = $data->surname;
    $student->nationalid = $data->nationalid;
    // create the product
    if($student->create()){
 
        // set response code - 201 created
        http_response_code(201);
 
        // tell the user
        echo json_encode(array("message" => "student was created."));
    }
 
    // if unable to create the product, tell the user
    else{
 
        // set response code - 503 service unavailable
        http_response_code(503);
 
        // tell the user
        echo json_encode(array("message" => "Unable to create student/student exists."));
    }
}
 
// tell the user data is incomplete
else{
 
    // set response code - 400 bad request
    http_response_code(400);
 
    // tell the user
    echo json_encode(array("message" => "Unable to create student. Data is incomplete."));
}
?>