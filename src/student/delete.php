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
// get product id
//$data = json_decode(file_get_contents("php://input"));
 
// set product id to be deleted
//$student->studentId = $data->studentId;
 
// delete the product
if($student->delete()){
 
    // set response code - 200 ok
    http_response_code(200);
 
    // tell the user
    echo json_encode(array("message" => "student was deleted."));
}
 
// if unable to delete the product
else{
 
    // set response code - 503 service unavailable
    http_response_code(503);
 
    // tell the user
    echo json_encode(array("message" => "Unable to delete student."));
}


?>
