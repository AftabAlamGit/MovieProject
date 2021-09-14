<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
        tr:nth-child(even) {
            background-color: rgb(180, 180, 180);
        }
        .heading{
            display: flex;
            justify-content: center;
        }
        
        
    </style>

    <title>Movie List</title>
</head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Movies</a>
    </div>
    <ul class="nav navbar-nav navbar-right" style="flex-direction: row">
      <li style="margin-right: 10px; font-size: larger;"><a href="index.php"> Home</a></li>
      <li style="margin-right: 10px; font-size: larger; color: black;"><a href="addMovie.php">Add Movie</a></li>
    </ul>
  </div>
</nav>