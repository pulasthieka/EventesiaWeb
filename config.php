

<?php

/* Database credentials. Assuming you are running MySQL

server with default setting (user 'root' with no password) */

define('DB_SERVER', 'localhost');

define('DB_USERNAME', 'root');

define('DB_PASSWORD', '');

define('DB_NAME', 'eventesi_web');



/* Attempt to connect to MySQL database */

$connection = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);



// Check connection

if($connection === false){

    die("ERROR: Could not connect. " . $connection->connect_error);

}

?>

