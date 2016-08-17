<!DOCTYPE html>
<html>
    <head>
	<meta charset="utf-8">
	<title>echo</title>
    </head>

    <script language="php">
	$color=$_REQUEST['color'];
	$first=$_REQUEST['firstName'];
	$last=$_REQUEST['lastName'];

	print("<body bgcolor='$color'>\n");
	$date = date('Y/m/d H:i:s');
	print("<h1>Hello " . $first . " " . $last . " from a Web app written in PHP on " . $date);
	print("</h1></body>\n");
    </script>
</html>
