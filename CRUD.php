<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>CRUD</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
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


    //pagination
    $page = $_GET["page"];
    $entry = $_GET["entry"];

    if($entry == "" || $entry == "5")
    {
	$e = 5;
	$entry = "5";
    }
    elseif($entry == "10")
	$e = 10;
    elseif($entry == "20")
	$e = 20;
    elseif($entry == "all" || $entry == "-1")
	$e = -1;

    if($page == "" || $page == "1")
    {
	$p = 0;
	$page = "1";
    }
    else
    {	
	$p = ($page * $e) - $e;
    }

    // FORM AND EXECUTE SOME QUERY

    if($e != -1)
	$sql = "SELECT id, poster, movie_title, studio_name, year, dollar_value FROM movies ORDER BY id ASC LIMIT $p,$e";
    else
	$sql = "SELECT id, poster, movie_title, studio_name, year, dollar_value FROM movies ORDER BY id ASC";
    
    // FORM AND EXECUTE SOME QUERY
    $result = mysqli_query($conn, $sql);
    
    // USE THE QUERY RESULT
    print "<table class='table'>";
    print "<tr><th>Poster</th><th>Movie Title</th><th>Studio</th><th>Year</th><th>Box Office $</th><th></th></tr>";   
    
    $curr_id = '';
    $curr_poster = '';
    $curr_movie_title = '';
    $curr_studio_name = '';
    $curr_year = '';
    $curr_dollar_value = '';
    
    $count = mysqli_num_rows($result);
    if ($count > 0) {
    
      while($row = mysqli_fetch_assoc($result)) {
          
        $curr_id = $row['id'];
        $curr_poster = $row['poster'];
        $curr_movie_title = $row['movie_title'];
        $curr_studio_name = $row['studio_name'];
        $curr_year = $row['year'];
        $curr_dollar_value = $row['dollar_value'];
    
	    print "<tr>";
	    print "<td><img src=\"". $curr_poster . "\" alt=\"Poster\" width=60, height=90></td>" ;
	    print "<td>". $curr_movie_title . "</td>" ;
	    print "<td>". $curr_studio_name . "</td>" ;
	    print "<td>". $curr_year . "</td>" ;
        print "<td>". $curr_dollar_value . "</td>" ;
	   
	    print "<td><div class='row'>";
	    	    
	    print "<div class='col-sm-6'><form action='/edit' method='POST' class='form-horizontal'><input type='hidden' name='id' value='".$curr_id."'>
	    <div class='form-group'><button type='submit' name='action' value='Update' class='btn btn-default'>
  <span class='glyphicon glyphicon-pencil'></span></button></div></form></div>";
	    
	    print "<div class='col-sm-6'><div class='form-group'><button type='submit' class='btn btn-default' name='action' value=delete' data-toggle='modal' data-target='#deleteModal'>
  <span class='glyphicon glyphicon-trash'></span></button></div></div>";

  	    print "</div></td></tr>\n";

      }
    } else {
	    print "<tr><td colspan='5'>No Data</td></tr>";
    }
    
    print "</table>"

    $sql = "SELECT id, poster, movie_title, studio_name, year, dollar_value FROM movies ORDER BY id ASC";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);
    if($e != -1)
	$max_page = ceil($count/$e);
    else
	$max_page = 1;
?>

    <!-- pagination markup -->
    <nav aria-label="Page navigation">
      <ul class="pagination pagination-lg">
        <li>
          <a href="CRUD.php?page=<?php

	    if($page == "1" || $page == "")
		print "1";
	    else
		print strval(intval($page)-1);

	    print "&entry=$e";

	  ?>" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
          </a>
        </li>
	<?php
	    for($i=1;$i<=$max_page;$i++)
	
	    {
		print "<li><a href=\"CRUD.php?page=$i&entry=$e\">$i</a></li>\n";
		
	    }
	?>
        <li>
          <a href="CRUD.php?page=<?php 
	    
	    if($page == "1" || $page == "")
	    {	
		$page = "1";
		$page_temp = intval($page)+1; 
		if($page_temp > $max_page)
		    print $max_page;
		else
		    print strval($page_temp);

		print "&entry=$e";
	    }
	    else
	    {
		$page_temp = intval($page)+1; 
		if($page_temp > $max_page)
		    print $max_page;
		else
		    print strval($page_temp);

		print "&entry=$e";
	    }
	  
	  ?>" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
          </a>
        </li>
      </ul>
    </nav>


    <div class="dropdown">
	<button class="btn btn-default dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">entries per page<span class="caret"></span></button>
	<ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
	    <li role="presentation"><a role="menuitem" tabindex="-1" href="CRUD.php?entry=5">5</a></li>
	    <li role="presentation"><a role="menuitem" tabindex="-1" href="CRUD.php?entry=10">10</a></li>
	    <li role="presentation"><a role="menuitem" tabindex="-1" href="CRUD.php?entry=20">20</a></li>
	    <li role="presentation"><a role="menuitem" tabindex="-1" href="CRUD.php?entry=all">All</a></li>
	</ul>
    </div>

    <br>

<form action="/edit" method="POST">
	<input type="submit" name="action" value="Add" class="btn btn-lg btn-primary">
</form>	

<br><br>
<hr>
<br><br>
    
<!-- Modal -->
  <div class="modal fade" id="deleteModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Warning!</h4>
        </div>
        <div class="modal-body">
          <p>Do you really want to delete it permanently?</p>
        </div>
        <div class="modal-footer">
          <form action="/action" method="POST">

	       <input type="hidden" name="id" value="<?= $curr_id ?>">

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
