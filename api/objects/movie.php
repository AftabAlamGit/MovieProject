<?php
class Movie{
  
    // database connection and table title
    private $conn;
    private $table_title = "movies";
  
    // object properties
    public $movie_id;
    public $title;
    public $budget;
    public $release_date;
    public $revenue;
    public $runtime;
    public $vote_average;
  
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    // read movies
    function read(){
    
        // select all query
        $query = "SELECT * FROM movies ORDER BY movie_id";
    
        // prepare query statement
        $stmt = $this->conn->prepare($query);
    
        // execute query
        $stmt->execute();
    
        return $stmt;
    }

    // create movie
    function create(){
    
        // query to insert record
        $query = "INSERT INTO
                    " . $this->table_title . "
                SET
                    title=:title, budget=:budget, release_date=:release_date, revenue=:revenue, runtime=:runtime, vote_average=:vote_average";
    
        // prepare query
        $stmt = $this->conn->prepare($query);
    
        // sanitize
        $this->title=htmlspecialchars(strip_tags($this->title));
        $this->budget=htmlspecialchars(strip_tags($this->budget));
        $this->release_date=htmlspecialchars(strip_tags($this->release_date));
        $this->revenue=htmlspecialchars(strip_tags($this->revenue));
        $this->runtime=htmlspecialchars(strip_tags($this->runtime));
        $this->vote_average=htmlspecialchars(strip_tags($this->vote_average));
    
        // bind values
        $stmt->bindParam(":title", $this->title);
        $stmt->bindParam(":budget", $this->budget);
        $stmt->bindParam(":release_date", $this->release_date);
        $stmt->bindParam(":revenue", $this->revenue);
        $stmt->bindParam(":runtime", $this->runtime);
        $stmt->bindParam(":vote_average", $this->vote_average);
    
        // execute query
        if($stmt->execute()){
            return true;
        }
    
        return false;
        
    }
}
?>