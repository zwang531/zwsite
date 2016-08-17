<?php session_start();?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>session 2</title>
    <style>
        header {
            background-color: black;
            padding: 1em;
            text-align: center;
            color: white;
        }
    </style>
</head>
<body>
    <header><h1>session 2</h1></header><br>

    <script language="php">
	if (isset($_SESSION['username'])) {
	    
	    print("Hi " . $_SESSION['username'] . " nice to meet you!");
	} else {
	    print("Howdy stranger...tell me your name on page1!\n");
	}
    </script>
    <br>
    <form action="/kill_session.php" method="post"><br>
	<input type = "Submit" Name = "Submit1" value = "Clear Session">
    </form>
    <br>
    <a href="/sessionpage1.php">Go to session 1</a><br>
    <a href="/index.html">Back to home</a>
    
</body>
</html>
