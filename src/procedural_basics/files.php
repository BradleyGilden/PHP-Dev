<?php

require_once 'utils.php';
use function Utils\pprint;

// calculates filesize if file exists
function fsize($filename): void {
    if (file_exists($filename)) echo filesize($filename), ' b<br />';
    else echo 'Not Found<br />';
}

function readPrint($filename): void {
    // Open the file for reading
    $file = fopen($filename, "r");

    // Loop through each line until the end of the file
    while (!feof($file)) {
        // Read the current line
        $line = fgets($file);
        
        // Process the line (e.g., echo it)
        echo $line;
    }
    // Close the file
    fclose($file);
}

pprint(scandir((__DIR__)));
var_dump(is_dir(scandir(__DIR__)[0]));
echo '<br />';
fsize('index.php');
fsize('undefined.php');

file_put_contents('file.txt', 'hello world');
readPrint('file.txt');
