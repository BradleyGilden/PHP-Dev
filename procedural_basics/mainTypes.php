<?php
echo '################################ INTEGERS ######################################<br />';
$xint = 200_000;
$yint = (int)'200_000_000';  // only numbers before the first non-integer are accounted for
$zint = (int)'200000000';

echo $xint, ' ', is_int($xint);
echo '<br />';
echo $yint, ' ', is_int($yint);
echo '<br />';
echo $zint, ' ', is_int($zint);
echo '<br />';

echo '################################# FLOATS #######################################<br />';

$xfloat = 200_000.5;
$yfloat = 2.12e+5;
$zfloat = (float)'2.12e+5';
$inf = 2 * PHP_FLOAT_MAX;

echo $xfloat, ' ', is_float($xfloat);
echo '<br />';
echo $yfloat, ' ', is_float($yfloat);
echo '<br />';
echo $zfloat, ' ', is_float($zfloat);
echo '<br />';
echo $inf, ' ', is_infinite($inf);
echo '<br />';

echo '################################# STRINGS ######################################<br />';

$xstring = "hey";
$ystring = "$xstring there";  // interpolation
$zstring = $ystring . ' buddy';  // concatenation

echo $zstring;
echo '<br />';


// heredoc - equivalent to multi-line double quote

$text = <<<Text
Line 1 $xstring
Line 2 $ystring
Line 3 $zstring
Text;

echo nl2br($text);

// heredoc - equivalent to multi-line single quote

// n.b string methods start with str, array methods start with array

$text = <<<'Text'

Line 1 $xstring
Line 2 $ystring
Line 3 $zstring

Text;

echo nl2br($text);

echo '<pre>';
print_r(str_split("hey"));
echo '</pre>';

echo '################################## ARRAYS ######################################<br />';

$arr = [1, 2, 'hey', 'bye', 3.5];

echo '<pre>';
print_r($arr);
echo '</pre>';

// maps

echo '<pre>';
print_r(array_map(function($item) { return is_string($item) ? 'string' : 'not string'; }, $arr));
echo '</pre>';

$arrobj = [
    1,
    2,
    3,
    'domains' => [
        'top' => ['.com', '.net', '.tech', '.uk', '.co.za', '.xyz', '.me', '.tv'],
        'sub' => ['www', 'mail', 'blog', 'help']
    ],
    'versions' => [
        ['version' => 3.9, 'releaseDate' => new DateTime('2024-04-27')],
        ['version' => 1.4, 'releaseDate' => new DateTime('2021-11-03')]
    ]
];

unset($arrobj[2]);



echo '<pre>';
print_r($arrobj);
echo '</pre>';
