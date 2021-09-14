<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
  
// include database and object files
include_once '../config/database.php';
include_once '../objects/movie.php';
  
// instantiate database and movie object
$database = new Database();
$db = $database->getConnection();
  
// initialize object
$movie = new Movie($db);
  
// query movies
$stmt = $movie->read();
$num = $stmt->rowCount();
  
// check if more than 0 record found
if($num>0){
  
    // movies array
    $movies_arr=array();
    $movies_arr["records"]=array();
  
    // retrieve our table contents
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        extract($row);
  
        $movie_item=array(
            "movie_id" => $movie_id,
            "title" => $title,
            "budget" => $budget,
            "release_date" => $release_date,
            "revenue" => $revenue,
            "runtime" => $runtime,
            "vote_average" => $vote_average,
        );
  
        array_push($movies_arr["records"], $movie_item);
    }
  
    // set response code - 200 OK
    http_response_code(200);
  
    // show movies data in json format
    echo json_encode($movies_arr);
}
else{
  
    // set response code - 404 Not found
    http_response_code(404);
  
    // tell the user no movies found
    echo json_encode(
        array("message" => "No movies found.")
    );
}