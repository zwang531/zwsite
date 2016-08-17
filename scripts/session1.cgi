#!/usr/bin/perl -wT
use warnings;
use CGI qw(:standard); 

print header('text/html');
print start_html(-title=>'Session 1');
print 'Enter your name: ';
print textfield('name', '', 50, 100);
print '<br>';
print submit('submit','Confirm');

my $val = param('name');
my $cookie = cookie(-name=>'1',
			        -value=>$val);
                    
print header(-cookie=>$cookie);
print end_html;