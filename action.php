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
	
	if ($action == 'Add') {
        
       $poster = $_REQUEST['poster'];
       $movie_title = $_REQUEST['movie_title'];
       $studio_name = $_REQUEST['studio_name'];
       $year = $_REQUEST['year'];
       $dollar_value = $_REQUEST['dollar_value'];
	   
	   // SHOULD HAVE VALIDATION HERE!?
		
	
	   $sql = "INSERT INTO users (movie_title,studio_name,year,dollar_value,poster) VALUES ('$movie_title' , '$studio_name' , '$year' , '$dollar_value', '$poster')";
	   $result = mysqli_query($conn, $sql);
		
		
	} else if ($action == "Update") {
		
	   $poster = $_REQUEST['poster'];
       $movie_title = $_REQUEST['movie_title'];
       $studio_name = $_REQUEST['studio_name'];
       $year = $_REQUEST['year'];
       $dollar_value = $_REQUEST['dollar_value'];
       $id = $_REQUEST['id'];
	
	   $sql = "UPDATE users SET movie_title='" .$movie_title."' ,studio_name='".$studio_name."' ,year='".$year."' ,dollar_value='".$dollar_value."' WHERE id='".$id."'";
       $result = mysqli_query($conn, $sql);
		
	}  else if ($action == "Delete") {
		
  		
       $sql = "DELETE FROM users WHERE id='".$_POST['id']."'"; 
       $result = mysqli_query($conn, $sql);

		
	}

	header('Location: CRUD.php');
	
?>