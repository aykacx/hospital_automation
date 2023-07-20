<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital_automation";
$port = 3306;

$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_EMULATE_PREPARES => false
];
$dsn = "mysql:host=$servername;dbname=$dbname;port=$port;charset=utf8";

try {
    $conn = new PDO($dsn, $username, $password, $options);
} catch (PDOException $e) {
    die('Connection failed: ' . $e->getMessage() . ' ' . 'Code: ' . $e->getCode());
}



?>