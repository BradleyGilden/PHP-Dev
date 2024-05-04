<?php
// $host = 'localhost';
// $user = 'root';
// $pwd = 'Nanospartan-117';
// $mysqli = new mysqli($host, $user, $pwd);

// if($mysqli→connect_errno ) {
//     printf("Connect failed: %s<br />", $mysqli→connect_error);
//     exit();
// }
// printf('Connected successfully.<br />');
// $mysqli→close();

if (class_exists('mysqli')) {
    echo "mysqli is installed";
} else {
    echo "Enable Mysqli support in your PHP installation "; 
}
