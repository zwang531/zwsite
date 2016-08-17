#!/usr/bin/perl -wT
use warnings;
use CGI qw(:standard); 

$cookie = cookie(-name=>'session1', -value=>[param('username')]);

print header(-cookie=>$cookie);
print start_html(-title=>'Session 1');
print '<a href="/session.html">Go Back</a>';
print end_html;