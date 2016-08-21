<?php
echo "<!DOCTYPE html>\n"; 
echo "<html>\n"; 
echo "<head>\n"; 
echo "    <meta charset=\"utf-8\">\n"; 
echo "    <title>Form Collection</title>\n"; 
echo "    <style>\n"; 
echo "        header {\n"; 
echo "            background-color: black;\n"; 
echo "            padding: 1em;\n"; 
echo "            text-align: center;\n"; 
echo "            color: white;\n"; 
echo "        }\n"; 
echo "    </style>\n"; 
echo "</head>\n"; 
echo "<body>\n"; 
echo "    <header><h1>Form Collection</h1></header><br>\n"; 
echo "    <form action=\"/pecho\" id=\"myForm\">\n"; 
echo "        First Name:<br><input type=\"text\" name=\"firstName\" id=\"firstName\"><br><br>\n"; 
echo "        Last Name:<br><input type=\"text\" name=\"lastName\" id=\"lastName\"><br><br>\n"; 
echo "        Favorite Color: \n"; 
echo "        <select name=\"color\">\n"; 
echo "            <option value=\"red\">Red</option>\n"; 
echo "            <option value=\"white\">White</option>\n"; 
echo "            <option value=\"blue\">Blue</option>\n"; 
echo "        </select><br><br>\n"; 
echo "        Method: <select id=\"mySelect\" onchange=\"selectMethod()\">\n"; 
echo "            <option value=\"GET\">GET\n"; 
echo "            <option value=\"POST\">POST\n"; 
echo "        </select><br><br>\n"; 
echo "        <input type=\"submit\" value=\"Submit\" style=\"float: left\">\n"; 
echo "    </form>\n"; 
echo "\n"; 
echo "    <script>\n"; 
echo "        function selectMethod(){\n"; 
echo "            var selAct = document.getElementById(\"mySelect\").value;\n"; 
echo "            document.getElementById(\"myForm\").setAttribute(\"method\", selAct.toLowerCase());\n"; 
echo "        }\n"; 
echo "    </script>\n"; 
echo "</body>\n"; 
echo "</html>\n"; 
echo "\n";
?>
