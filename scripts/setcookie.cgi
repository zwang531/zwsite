#!/usr/bin/perl -wT
use warnings;
use CGI qw(:standard); 

my $val = param('name');
my $cookie = cookie(-name=>'session1', -value=>$val);

print header(-cookie=>$cookie);
print start_html(-title=>'Session 1');
print '<a href="/session1.html">Go Back</a>';
print end_html;