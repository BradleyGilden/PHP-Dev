<?php
require '../../vendor/autoload.php';
require_once('../basics/utils.php');
// load environment
use Dotenv\Dotenv;

function printRow(array $row) {
    $size = 9;
    foreach($row as $item) {
        $size = max($size, strlen($item));
    }
    pprint(
    str_pad('ID', $size) . ' | ' .
    str_pad('FNAME', $size) . ' | ' .
    str_pad('SNAME', $size) . ' | ' . 
    str_pad('PAY(HRLY)', $size) . ' | ' .
    str_pad('DATE', $size) . ' | ' .
    str_pad('BOSS_ID', $size)
    );
    pprint(
        str_pad($row[0], $size) . ' | ' .
        str_pad($row[1], $size) . ' | ' .
        str_pad($row[2], $size) . ' | ' . 
        str_pad($row[3], $size) . ' | ' .
        str_pad($row[4], $size) . ' | ' .
        str_pad($row[5], $size)
    );
    pprint(str_repeat('-', 100));
}

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$host = $_ENV['DB_HOST'];
$user = $_ENV['DB_USER'];
$pwd = $_ENV['DB_PWD'];

$conn = new mysqli($host, $user, $pwd, "myDB");

if($conn→connect_errno) {
    printf("Connect failed: %s<br />", $conn→connect_error);
    exit();
}

$query = 'SELECT * FROM employees';

$res = $conn->query($query);

while ($row = $res->fetch_row()) {
    printRow($row);
}

$res->close();

printf('Connected successfully.<br />');
$conn→close();
