<?php
	
	define('DB_USER','root');
	define('DB_PASSWORD','1234');
	define('DB_HOST','127.0.0.1');
	define('DB_NAME','userDB');

    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    
	if (!$conn) {
	  die("Connection failed: " . mysqli_connect_error());
    }
    
	$action = $_REQUEST['action'];

    $poster = $_REQUEST['poster'];
    if ($poster == "") $poster = "img/unknown.png";
    $movie_title = $_REQUEST['movie_title'];
    $studio_name = $_REQUEST['studio_name'];
    $year = $_REQUEST['year'];
    $dollar_value = $_REQUEST['dollar_value'];
	
	if ($action == 'Add') {
	   
	   // SHOULD HAVE VALIDATION HERE!?
		
	
	   $sql = "INSERT INTO movies (movie_title,studio_name,year,dollar_value,poster) VALUES ('$movie_title' , '$studio_name' , '$year' , '$dollar_value', '$poster')";
	   $result = mysqli_query($conn, $sql);
		
		
	} else if ($action == "Update") {
        
       $id = $_REQUEST['id'];
	
	   $sql = "UPDATE movies SET movie_title='" .$movie_title."' ,studio_name='".$studio_name."' ,year='".$year."' ,dollar_value='".$dollar_value."' WHERE id='".$id."'";
       $result = mysqli_query($conn, $sql);
		
	}  else if ($action == "Delete") {
		
  		
       $sql = "DELETE FROM movies WHERE id='".$_POST['id']."'"; 
       $result = mysqli_query($conn, $sql);

		
	}

	header('Location: CRUD.php');
	
?>