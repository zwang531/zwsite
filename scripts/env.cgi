#!/usr/bin/perl -wT
use strict;

print "Content-type: text/html\n\n";
print <<END;
<!DOCTYPE html>
<html>
<head><title>Environment Variables Echo</title>
<style>
        header {
            background-color: black;
            padding: 1em;
            text-align: center;
            color: white;
        }
</style></head>
<body><header><h1>Environment Variables</h1></header><br>
END

foreach my $val (sort keys %ENV){
    printf "%s = \"%s\"<br>", $val, $ENV{$var};
}
print <<END;
<hr><p style="font-style: italic;"><a href="/index.html">Back to home</a></p>
</body>
</html>
END