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
		
	
	   $sql = "INSERT INTO users (first_name,last_name,login,password) VALUES ('$first_name' , '$last_name' , '$login' , '$password')";
	   $result = mysqli_query($conn, $sql);
		
		
	} else if ($action == "Update") {
		
	   $first_name = $_REQUEST['first_name'];
	   $last_name = $_REQUEST['last_name'];
	   $login = $_REQUEST['login'];
	   $password = $_REQUEST['password'];
	   $user_id = $_REQUEST['user_id'];
	
	   $sql = "UPDATE users SET first_name='" .$first_name."' ,last_name='".$last_name."' ,login='".$login."' ,password='".$password."' WHERE user_id='".$user_id."'";
       $result = mysqli_query($conn, $sql);
		
	}  else if ($action == "Delete") {
		
  		
       $sql = "DELETE FROM users WHERE user_id='".$_POST['user_id']."'"; 
       $result = mysqli_query($conn, $sql);

		
	}

	header('Location: index.php');
	
?>