<?php

echo '############################## SWITCH ###################################<br />';
// loose comparison
// has no return val

$val = '1';

switch($val) {
    case 1:
        echo '1<br />';
        break;
    case 2:
        echo '2<br />';
    default:
        echo 'default<br />';
}

echo '############################### MATCH ###################################<br />';
// strict comparison
// has a return val

echo match($val) {
    1 => '1<br />',
    2 => '2<br />',
    default => 'default<br />'
};
