#!/usr/bin/perl -wT
use warnings;
use CGI qw(:standard); 

my ($sec, $min, $hour, $mday, $mon, $year, $wday, $yday, $isdst) = localtime(time);
my @months = qw(Jan Feb Mar Apr May Jun Jul Aug Sep Oct Nov Dec);
my @days = qw(Sunday Monday Tuesday Wednesday Thursday Friday Saturday);

if(param()){
   $fname = param('firstName');
   $lname = param('lastName');
   $color = param('color');
}

print "Content-type: text/html\n\n";
print "<!DOCTYPE html>\n<html>\n<head><title>Echo</title>";
print "</head><body bgcolor='$color'>\n";
print "<h1>Hello dear $fname $lname,<br>greeting from a Web app written in Perl on $days[$wday], $months[$mon] $mday, $yr</h1>\n";
print "</body>\n</html>";