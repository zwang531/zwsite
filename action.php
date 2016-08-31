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

    $upload = false;
    $target_dir = "img/";
    $target_file = "" . $poster;

    if ($action == 'Add' || $action == 'Update'){
        if (strpos($poster, 'img/') == false){
            
            $target_file = $target_dir . basename($_FILES["poster"]["name"]);
            if (file_exists($target_file) || $_FILES["poster"]["size"] > 500000){
                if (file_exists($target_file)) $upload = true;
                // TODO: should print error msg somewhere

            }
            else{
                $upload = move_uploaded_file($_FILES["poster"]["tmp_name"], $target_file);
                if ($upload == false) {
                    // TODO: should print error msg somewhere
                    
                } 
            }
        }
    }
	
	if ($action == 'Add') {
        
        $movie_title = $_REQUEST['movie_title'];
        $studio_name = $_REQUEST['studio_name'];
        $year = $_REQUEST['year'];
        $dollar_value = $_REQUEST['dollar_value'];
        $poster = $_REQUEST['poster'];
        if ($poster == "") $poster = "img/unknown.png";
	   
	   // SHOULD HAVE VALIDATION HERE!?
		if ($upload == true){
            $sql = "INSERT INTO movies (movie_title,studio_name,year,dollar_value,poster) VALUES ('$movie_title' , '$studio_name' , '$year' , '$dollar_value', '$target_file')";
        }
        else{
            $sql = "INSERT INTO movies (movie_title,studio_name,year,dollar_value,poster) VALUES ('$movie_title' , '$studio_name' , '$year' , '$dollar_value', '$poster')";
        }
        
	   $result = mysqli_query($conn, $sql);
		
		
	} else if ($action == "Update") {
        
        $movie_title = $_REQUEST['movie_title'];
        $studio_name = $_REQUEST['studio_name'];
        $year = $_REQUEST['year'];
        $dollar_value = $_REQUEST['dollar_value'];
        $poster = $_REQUEST['poster'];
        if ($poster == "") $poster = "img/unknown.png";
        
       $id = $_REQUEST['id'];
        
        if ($upload == true){
            $sql = "UPDATE movies SET movie_title='" .$movie_title."' ,studio_name='".$studio_name."' ,year='".$year."' ,dollar_value='".$dollar_value."' ,poster='".$target_file."' WHERE id='".$id."'";
        }
        else{
            $sql = "UPDATE movies SET movie_title='" .$movie_title."' ,studio_name='".$studio_name."' ,year='".$year."' ,dollar_value='".$dollar_value."' WHERE id='".$id."'";
        }
	
       $result = mysqli_query($conn, $sql);
		
	}  else if ($action == "Delete") {
        
        $sql = "SELECT poster FROM movies where id = ".$_POST['id'];
        $result = mysqli_query($conn, $sql);
		while($row = mysqli_fetch_assoc($result)) {
            $poster = $row['poster'];
	    }
         if ($poster != 'img/unknown.png' && file_exists($poster)){
             unlink($poster);
         }
  		
       $sql = "DELETE FROM movies WHERE id='".$_POST['id']."'"; 
       $result = mysqli_query($conn, $sql);

		
	}

	header('Location: CRUD.php');
	
?>