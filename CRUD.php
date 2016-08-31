<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>CRUD</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    
</head>
<body>

<div class="container">
	
<h1>Box Office</h1>
        
<?php
    
    define('DB_USER','root');
    define('DB_PASSWORD','1234');
    define('DB_HOST','127.0.0.1');
    define('DB_NAME','userDB');

	// CONNECT TO DB
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }
    
    // FORM AND EXECUTE SOME QUERY
    $sql = "SELECT id, poster, movie_title, studio_name, year, dollar_value FROM movies ORDER BY id ASC";
    $result = mysqli_query($conn, $sql);
    
    // USE THE QUERY RESULT
    print "<table class='table'>";
    print "<tr><th>Poster</th><th>Movie Title</th><th>Studio</th><th>Year</th><th>Box Office $</th><th></th></tr>";   
    
    if (mysqli_num_rows($result) > 0) {
    
    
      while($row = mysqli_fetch_assoc($result)) {
	    print "<tr>";
	    print "<td><img src=\"". $row['poster'] . "\" alt=\"Poster\" width=60, height=90></td>" ;
	    print "<td>". $row['movie_title'] . "</td>" ;
	    print "<td>". $row['studio_name'] . "</td>" ;
	    print "<td>". $row['year'] . "</td>" ;
        print "<td>". $row['dollar_value'] . "</td>" ;
	   
	    print "<td><div class='row'>";
	    	    
	    print "<div class='col-sm-6'><form action='/edit' method='POST' class='form-horizontal'><input type='hidden' name='id' value='".$row['id']."'>
	    <div class='form-group'><button type='submit' name='action' value='Update' class='btn btn-default'>
  <span class='glyphicon glyphicon-pencil'></span></button></div></form></div>";
	    
	    print "<div class='col-sm-6'><button type='button' class='btn btn-default' data-toggle='modal' data-target='#confirmDelete'>
  <span class='glyphicon glyphicon-trash'></span></button></div>";

  	    print "</div></td></tr>\n";

      }
    } else {
	    print "<tr><td colspan='5'>No Data</td></tr>";
    }
    
   print "</table>"
?>

<form action="/edit" method="POST">
	<input type="submit" name="action" value="Add" class="btn btn-lg btn-primary">
</form>	

<br><br>
<hr>
<br><br>

<!-- Modal -->
<div class="modal fade" id="confirmDelete" role="dialog">
  <div class="modal-dialog">
      
    <div class="modal-content">
        
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Confirm Delete?</h4>
        </div>
        <div class="modal-footer">
            <form action="/action" method="POST" class='form-horizontal'><input type='hidden' name='id' value="<?= $row['id'] ?>">
              <input type="submit" name="action" value="Delete" class="btn btn-primary">
            </form>
        </div>
        
    </div>
      
  </div>
</div>

<div class="alert alert-danger" role="alert">
	<h2>Things Missing</h2>
	
	<ol>
		<li>Validation and more validation</li>
		<li>Paging</li>
		<li>Sorting</li>
		<li>JavaScript (Required or Optional?)</li>
		<li>As good as reasonable separation of code and template</li>
		<li>Little code improvements</li>
	</ol>
</div>

</div>

</body>
</html>