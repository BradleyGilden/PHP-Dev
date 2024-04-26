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

$text = <<<'Text'

Line 1 $xstring
Line 2 $ystring
Line 3 $zstring
Text;

echo nl2br($text);
