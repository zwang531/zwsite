#!/usr/bin/perl -wT
use strict;
use CGI qw(:standard); 

print header;

my $fName = param('firstName');
my $lName = param('lastName');
my $color = param('color');

if ($ENV{'REQUEST_METHOD'} eq 'POST'){

}else{

}