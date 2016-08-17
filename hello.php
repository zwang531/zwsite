<!DOCTYPE html>
<html>
   <head>
    <meta charset="utf-8">
    <title>hello.php</title>
   </head>

   <script language="php">
    $ranx=rand(1,3);

    $color='red';
    if($ranx==1)
        $color='red';
    elseif($ranx==2)
        $color='blue';
    else
        $color='white';

    print("<body bgcolor='$color'>\n");
    $date = date('Y/m/d H:i:s');
    print("Hello Web World from PHP on " . $date);
    print("</body>\n");
   </script>
</html>