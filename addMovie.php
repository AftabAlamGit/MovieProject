<?php
include('./header.php');

?>


<div class="container">
  <h2>Add Movie</h2>
  <form method="post" action="api/movie/create.php">
    <div class="form-group">
      <label for="title">Title:</label>
      <input type="text" class="form-control" placeholder="Enter title" name="title">
    </div>
    <div class="form-group">
      <label for="budget">Budget:</label>
      <input type="text" class="form-control" placeholder="Enter Budget" name="budget">
    </div>
    <div class="form-group">
      <label for="release_date">Release Date:</label>
      <input type="text" class="form-control" placeholder="Enter Release Date" name="release_date">
    </div>
    <div class="form-group">
      <label for="revenue">Revenue</label>
      <input type="text" class="form-control" placeholder="Enter Revenue" name="revenue">
    </div>
    <div class="form-group">
      <label for="runtime">Runtime:</label>
      <input type="text" class="form-control" placeholder="Enter Runtime" name="runtime">
    </div>
    <div class="form-group">
      <label for="vote_average">IMDB Rating:</label>
      <input type="text" class="form-control" placeholder="Enter Rating" name="vote_average">
    </div>
    <button type="submit" class="btn btn-primary" name="submit-btn">Submit</button>
  </form>
</div>

</body>
</html>