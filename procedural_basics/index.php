<?php

declare(strict_types=1);


// php echo     | nl2br inserts line breaks for \n or just use echo "<br/>"
echo nl2br("Hello World\n");

// you can't concat print
// print "Hello World";

// defining vars
$y = 1;
$x = $y; // assign by reference
$z = &$y; // assign by refence

$y = 2;

echo nl2br("\$x $x, \$y $y \$z $z\n");

// Constants defined at run time
define('MYCONSTANT', 'nochange');

// Constants defined at compile time (cant be defined in controll structures like if statements)
const MYCONSTANT2 = 'nochange';
// to check if a constant exists use defined()

echo MYCONSTANT, " ", MYCONSTANT;
echo "<br/>";
// string concatenation with .
echo "php version: " . PHP_VERSION . '<br />';

############################## Type Casting ####################################

echo '<br />';

// bool
$completed = true;
// int
$count = 5;
// float
$change = 5.50;
// string
$name = 'Henry';
// array
$companies = [1, 3, 53, "hello", 2.0, NULL];


var_dump($completed);
echo '<br />';
var_dump($count);
echo '<br />';
var_dump($change);
echo '<br />';
var_dump($name);
echo '<br />';
var_dump($companies);
echo '<br />';
echo "arr size: ", sizeof($companies);

########################### Operators ######################################

// same as js with including: <=> (checks equality \w comparison) and <> (equiv to !=)
