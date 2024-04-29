<?php

require_once 'utils.php';
use function Utils\pprint;

// calculates filesize if file exists
function fsize($filename): void {
    if (file_exists($filename)) echo filesize($filename), ' b<br />';
    else echo 'Not Found<br />';
}

pprint(scandir((__DIR__)));
var_dump(is_dir(scandir(__DIR__)[0]));
echo '<br />';
fsize('index.php');
fsize('undefined.php');
