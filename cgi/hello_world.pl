#!/usr/bin/perl -wT

my ($sec, $min, $hour, $mday, $mon, $year, $wday, $yday, $isdst) = localtime(time);
my @months = qw(Jan Feb Mar Apr May Jun Jul Aug Sep Oct Nov Dec);
my @days = qw(Sunday Monday Tuesday Wednesday Thursday Friday Saturday);

my $yr = $year + 1900;
my $range = 3;
my $val = int(rand($range));
my $color = "yellow";

if($val == 0){
    $color = "red";
}elsif($val == 1){
    $color = "white";
}elsif($val == 2){
    $color = "blue";
}

print "Content-type: text/html\n\n";
print "<html><head><title>Hello World</title>";
print "</head><body bgcolor='$color'>\n";
print "<h1>($val) Hello Web World from Language Perl on $days[$wday], $months[$mon] $mday, $yr</h1>\n";
print "</body>\n</html>";