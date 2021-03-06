<?php

 require_once 'config.inc';

 $action = $_POST['action'];

 $poster = '';
 $movie_title = '';
 $studio_name = '';
 $year = '';
 $dollar_value = '';
 $id = '';
 
 if ($action == "Update") {
   
    $id = $_POST['id'];
     
    $sql = "SELECT movie_title, studio_name, year, dollar_value, poster FROM movies where id = ".$id;
    $result = mysqli_query($conn, $sql);

    while($row = mysqli_fetch_assoc($result)) {
     $poster = $row['poster'];
     $movie_title = $row['movie_title'];
     $studio_name = $row['studio_name'];
     $year = $row['year'];
     $dollar_value = $row['dollar_value'];
	}
     
 }
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title><?= $action ?> Record</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
</head>
<body>

<div class="container">
	
<h1><?= $action ?> Record</h1>

<form action="/action" method="POST" class="form" enctype="multipart/form-data">
	<div class="form-group">
	 <label for="movie_title">Movie Title</label>
	 <input type="text" name="movie_title" value="<?= $movie_title ?>"  class="form-control">
	</div>

	<div class="form-group">
	<label for="studio_name">Studio</label>
	<input type="text" name="studio_name" value="<?= $studio_name ?>"  class="form-control">
	</div>

	<div class="form-group">
	<label for="year">Year</label>
	<input type="text" name="year" value="<?= $year ?>"  class="form-control">
	</div>
    
    <div class="form-group">
	<label for="dollar_value">Box Office $</label>
	<input type="text" name="dollar_value" value="<?= $dollar_value ?>"  class="form-control">
	</div>

	<div class="form-group">
	<label>Poster</label>
	<input type="file" name="poster" id="poster" value="<?= $poster ?>" accept="image/*" class="form-control">
	</div>

	<input type="hidden" name="id" value="<?= $id ?>">
    
	<div class="form-group">
	<input type="submit" value="<?= $action ?>" name="action" class="btn btn-primary">
	<input type="submit" value="Cancel" name="action"  class="btn btn-default">	
	</div>
	
</form>

</div>

</body>
</html>