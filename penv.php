<!DOCTYPE html>
<html>
    <head>
	<meta charset="utf-8">
	<title>environment variables echo</title>
    </head>

    <body>
	<script language="php">
	    foreach($_SERVER as $key_name=>$key_value){
            print $key_name . " = " . $key_value . "<br>";
        }
	</script>
    </body>
</html>
