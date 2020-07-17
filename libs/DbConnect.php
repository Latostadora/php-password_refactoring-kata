<?php
$host     = "127.0.0.1";
$db_name  = "coan_secure";
$username = "root";
$password = "root";

try {
    $con = new PDO("mysql:host={$host};dbname={$db_name}", $username, $password);
} //to handle connection error
catch (PDOException $exception) {
    echo "Connection error: " . $exception->getMessage();
}
?>
