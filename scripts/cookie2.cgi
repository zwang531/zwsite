#!/usr/bin/perl -wT
use warnings;
use CGI qw(:standard); 

$name = cookie('session1');

print "Content-type: text/html\n\n";
print "<!DOCTYPE html>\n<html>\n<head><title>Session 2</title></head><body>\n";
if($name eq ''){
    print 'Howdy stranger... tell me your name on page1!<br><br>';
}else{
    print "<h1>Hi $name nice to meet you!</h1>";
}
print button('delete','Clear Session');
print '<hr><p style="font-style: italic;"><a href="/session.html">Go Back</a></p>';
print "</body>\n</html>";