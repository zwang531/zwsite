#!/usr/bin/perl -wT
use warnings;
use CGI qw(:standard); 

print header('text/html');
print start_html(-title=>'Session 1');
print 'Enter your name: ';
print textfield('username', '', 50, 100);

my $cookie = cookie(-name=>'1',
			        -value=>param('username'));
                    
print header(-cookie=>$cookie);
print end_html;