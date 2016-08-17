#!/usr/bin/perl -wT
use warnings;
use CGI qw(:standard); 

$name = cookie('session1');

print "Content-type: text/html\n\n";
print "<!DOCTYPE html>\n<html>\n<head><title>Session 2</title></head><body>\n";
if($name eq ''){
    print 'Howdy stranger... tell me your name on <a href="/session.html">page1</a>!<br><br>';
}else{
    print "<h1>Hi $name nice to meet you!</h1><br><br>";
}
print button('button','Clear Session');
print "</body>\n</html>";