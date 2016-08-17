<?php 
    session_start();

    if (isset($_GET['username'])) {
	$_SESSION['username'] = $_GET['username'];
    } 
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>session 1</title>
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
    <header><h1>session 1</h1></header><br>
    <form action="sessionpage1.php" method="get">
        Enter username: <input type="text" name="username" id="username">
        <br><input type="submit" value="save session" name="Submit">
    </form><br>
    <a href="/sessionpage2.php">Go to session 2</a>

</body>
</html>
