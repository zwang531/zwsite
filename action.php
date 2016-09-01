<?php

    require_once 'config.inc';

	$action = $_REQUEST['action'];
    $poster = 'img/unknown.png';

    $upload = false;
    $target_dir = 'img/';
    $filename = '';
    $err = '';

    $sql = '';

    if ($action == 'Add' || $action == 'Update'){
        $filename = basename($_FILES["poster"]["name"]);
        if(strlen($filename) > 65){
            $err = "Invalid inputs:<br>Upload File Name is resctircted to maximum 65 charactors!<br>";
            //die($err);
        }
        if($filename != '' && $err == ''){
            $target_file = $target_dir . $filename;
            if (file_exists($target_file))
                $poster = '' . $target_file;
            else if (file_exists($target_file) == false && $_FILES["poster"]["size"] < 500000){
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
	   
	   // SHOULD HAVE VALIDATION HERE!?
        
        if($movie_title != strip_tags($movie_title) || $studio_name != strip_tags($studio_name)){
            //if($err != '') $err .= "<br>";
            $err .= "Text Fields contain HTMP or PHP tags!<br>";
        }
        else{
            if(strlen($movie_title) > 65){
                //if($err != '') $err .= "<br>";
                $err .= "Movie Title is resctircted to maximum 65 charactors!<br>";
            }
            if(strlen($studio_name) > 35){
                //if($err != '') $err .= "<br>";
                $err .= "Studio field is resctircted to maximum 35 charactors!<br>";
            }
        }
        if($year!=0 && ($year<1900 || $year>2020)){
            //if($err != '') $err .= "<br>";
            $err .= "Year should be a integer which is in range ( 1900 - 2100 )!<br>";
        }
        if($dollar_value < 0){
            //if($err != '') $err .= "<br>";
            $err .= "Box Office $ should be positive!<br>";
        }
        /*if($err != '') {
            $err = "Invalid inputs:<br>" . $err;
            //die($err);
        }*/
        if($err == ''){
		if ($upload == true){
            $sql = "INSERT INTO movies (movie_title,studio_name,year,dollar_value,poster) VALUES ('$movie_title' , '$studio_name' , '$year' , '$dollar_value', '$target_file')";
        }
        else{
            $sql = "INSERT INTO movies (movie_title,studio_name,year,dollar_value,poster) VALUES ('$movie_title' , '$studio_name' , '$year' , '$dollar_value', '$poster')";
        }
        
	   $result = mysqli_query($conn, $sql);
       }
		
	} else if ($action == "Update") {
        
        $movie_title = $_REQUEST['movie_title'];
        $studio_name = $_REQUEST['studio_name'];
        $year = $_REQUEST['year'];
        $dollar_value = $_REQUEST['dollar_value'];
        
       $id = $_REQUEST['id'];
        
        if($movie_title != strip_tags($movie_title) || $studio_name != strip_tags($studio_name)){
            //if($err != '') $err .= "<br>";
            $err .= "Text Fields contain HTMP or PHP tags!<br>";
        }
        else{
            if(strlen($movie_title) > 65){
                //if($err != '') $err .= "<br>";
                $err .= "Movie Title is resctircted to maximum 65 charactors!<br>";
            }
            if(strlen($studio_name) > 35){
                //if($err != '') $err .= "<br>";
                $err .= "Studio field is resctircted to maximum 35 charactors!<br>";
            }
        }
        if($year!=0 && ($year<1900 || $year>2020)){
            //if($err != '') $err .= "<br>";
            $err .= "Year should be a integer which is in range ( 1900 - 2100 )!<br>";
        }
        if($dollar_value < 0){
            //if($err != '') $err .= "<br>";
            $err .= "Box Office $ should be positive!<br>";
        }
        /*if($err != '') {
            $err = "Invalid inputs:<br>" . $err;
            die($err);
        }*/
        
        if($err == ''){        
        if ($upload == true){
            $sql = "UPDATE movies SET movie_title='" .$movie_title."' ,studio_name='".$studio_name."' ,year='".$year."' ,dollar_value='".$dollar_value."' ,poster='".$target_file."' WHERE id='".$id."'";
        }
        else{
            $sql = "UPDATE movies SET movie_title='" .$movie_title."' ,studio_name='".$studio_name."' ,year='".$year."' ,dollar_value='".$dollar_value."' WHERE id='".$id."'";
        }
	
       $result = mysqli_query($conn, $sql);
        }
	}  
    else if ($action == "Delete") {
        
        $id = $_POST['id'];
        
        $sql = "SELECT poster FROM movies where id = ".$id;
        $result = mysqli_query($conn, $sql);
		while($row = mysqli_fetch_assoc($result)) {
            $poster = $row['poster'];
	    }
         if ($poster != 'img/unknown.png' && file_exists($poster)){
             unlink($poster);
         }
  		
       $sql = "DELETE FROM movies WHERE id='".$id."'"; 
       $result = mysqli_query($conn, $sql);

		
	}
    
    if($err=='')
	   header('Location: CRUD.php');
	
?>

<!DOCTYPE html>
<html>
<head>
  <title>Alerts!</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    <h3>Alerts!</h3>
    <br><br><hr><br><br>
    <?php 
    echo($err);
        $msg = strtok($err, '<br>');
    
        do{
            $tmp = ''.$msg;
            $msg = strtok('<br>');
            
            if($msg !== false){
                print "<div class='alert alert-danger'>";
                print "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Invalid input:</strong> ".$tmp."</div>";
            }
            else{
                print "<div class='alert alert-danger'>";
                print "<a href='/CRUD' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Invalid input:</strong> ".$tmp."</div>";
                break;
            }
            
        }while ($msg !== false) 
    ?>
  
</div>

</body>
</html>