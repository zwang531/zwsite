#!/usr/bin/perl -wT
use warnings;
use CGI qw(:standard); 

my ($sec, $min, $hour, $mday, $mon, $year, $wday, $yday, $isdst) = localtime(time);
my @months = qw(Jan Feb Mar Apr May Jun Jul Aug Sep Oct Nov Dec);
my @days = qw(Sunday Monday Tuesday Wednesday Thursday Friday Saturday);

if(param()){
   my $fname = param('firstName');
   my $lname = param('lastName');
   my $color = param('color');
}

print header('text/html'),
      start_html('Welcome'),
      body(-BGCOLOR=>"$color"),
      h1("Hello $fname $lname from a Web app written in Perl on $days[$wday], $months[$mon] $mday, $yr"),
      end_html;