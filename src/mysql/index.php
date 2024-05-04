<?php
require '../../vendor/autoload.php';
// load environment
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$host = $_ENV['DB_HOST'];
$user = $_ENV['DB_USER'];
$pwd = $_ENV['DB_PWD'];
$mysqli = new mysqli($host, $user, $pwd);

if($mysqli→connect_errno ) {
    printf("Connect failed: %s<br />", $mysqli→connect_error);
    exit();
}
printf('Connected successfully.<br />');
$mysqli→close();

// if (class_exists('mysqli')) {
//     echo "mysqli is installed";
// } else {
//     echo "Enable Mysqli support in your PHP installation "; 
// }
