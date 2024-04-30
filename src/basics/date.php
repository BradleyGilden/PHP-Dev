<?php
/**
 * Date method special characters
 * Day:
 * `d` - Day of the month, 2 digits with leading zeros (01 to 31)
 * `j` - Day of the month without leading zeros (1 to 31)
 * `D` - A textual representation of a day, three letters (Mon through Sun)
 * `l` - A full textual representation of the day of the week (Sunday through Saturday)

 * Month:
 * `m` - Numeric representation of a month, with leading zeros (01 to 12)
 * `n` - Numeric representation of a month, without leading zeros (1 to 12)
 * `M` - A short textual representation of a month, three letters (Jan through Dec)
 * `F` - A full textual representation of a month, such as January or March

 * Year:
 * `Y` - A full numeric representation of a year, 4 digits (e.g., 2024)
 * `y` - A two-digit representation of a year (e.g., 24)

 * Time:**
 * `H` - 24-hour format of an hour with leading zeros (00 to 23)
 * `h` - 12-hour format of an hour with leading zeros (01 to 12)
 * `i` - Minutes with leading zeros (00 to 59)
 * `s` - Seconds with leading zeros (00 to 59)
 * `a` - Lowercase Ante meridiem and Post meridiem (am or pm)
 * `A` - Uppercase Ante meridiem and Post meridiem (AM or PM)

 * Others:
 * `w` - Numeric representation of the day of the week (0 for Sunday through 6 for Saturday)
 * `z` - The day of the year (0 through 365)
 * `N` - ISO-8601 numeric representation of the day of the week (1 for Monday through 7 for Sunday)
 */

date_default_timezone_set('Africa/Johannesburg');
echo date('Y/m/d H:i:s');

$dt = new DateTime();
echo '<pre>';
print_r($dt);
echo '</pre>';
