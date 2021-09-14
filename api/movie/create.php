<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
  
// get database connection
include_once '../config/database.php';
  
// instantiate movie object
include_once '../objects/movie.php';
  
$database = new Database();
$db = $database->getConnection();
  
$movie = new Movie($db);

$data = null;

if(isset($_POST["submit-btn"])){
    // make sure data is not empty
if(
    !empty($_POST['title']) &&
    !empty($_POST['budget']) &&
    !empty($_POST['release_date']) &&
    !empty($_POST['revenue']) &&
    !empty($_POST['runtime']) &&
    !empty($_POST['vote_average'])
){
  
    // set movie property values
    $movie->title = $_POST['title'];
    $movie->budget = $_POST['budget'];
    $movie->release_date = $_POST['release_date'];
    $movie->revenue = $_POST['revenue'];
    $movie->runtime = $_POST['runtime'];
    $movie->vote_average = $_POST['vote_average'];
  
    // create the movie
    if($movie->create()){
  
       header('Location: ../../index.php');
       exit;
    }
  
    // if unable to create the movie, tell the user
    else{
  
        // set response code - 503 service unavailable
        http_response_code(503);
  
        // tell the user
        echo json_encode(array("message" => "Unable to create movie."));
    }
}
  
// tell the user data is incomplete
else{
  
    // set response code - 400 bad request
    http_response_code(400);
  
    // tell the user
    echo json_encode(array("message" => "Unable to create movie. Data is incomplete."));
}
}
  

   
?>