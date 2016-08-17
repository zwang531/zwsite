<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Hello World</title>
</head>
<body>
<?php
    $ran=mt_rand(1,3);

    $color='red';
    if($ran==1)
        $color='red';
    elseif($ran==2)
        $color='blue';
    else
        $color='white';

    echo "<body bgcolor='$color'>\n";
    $date = date('Y/m/d H:i:s');
    echo "Hello Web World from PHP on $date\n";
?>
</body>
</html>