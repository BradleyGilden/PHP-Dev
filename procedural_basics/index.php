<?php
// php echo     | nl2br inserts line breaks for \n
echo nl2br("Hello World\n");

// you can't concat print
// print "Hello World";

// defining vars

$y = 1;
$x = $y; // assign by reference
$z = &$y; // assign by refence

$y = 2;

echo "\$x $x, \$y $y \$z $z";
