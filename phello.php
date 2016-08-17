<!DOCTYPE html>
<html>
    <head>
	<meta charset="utf-8">
	<title>hello world</title>
    </head>

    <script language="php">
	$ran=mt_rand(1,3);

	$color='red';
	if($ran==1)
	    $color='red';
	elseif($ran==2)
	    $color='blue';
	else
	    $color='white';

	print("<body bgcolor='$color'>\n");
	$date = date('Y/m/d H:i:s');
	print("<h1>Hello Web World from PHP on " . $date);
	print("</h1></body>\n");
    </script>
</html>
