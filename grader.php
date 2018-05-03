<?php

$host = '127.0.0.1';
$db   = 'freecharity';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$opt = [
   PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
   PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
   PDO::ATTR_EMULATE_PREPARES   => false,
];

$conn = new PDO('mysql:host='.$host.';dbname='.$db,$user,$pass);
try {

    $stmt = $conn->prepare('SELECT * FROM answers WHERE correctans = 1');
    $stmt->execute();

    $result = $stmt->fetchAll();

    if ( count($result) ) {
		
    foreach($result as $row) { 

    echo 'Ok you';
    // Do Something Else

    }} else {

    echo 'hi';
	exit;
}}
    catch(PDOException $e) {

    echo 'ERROR: '. $e->getMessage();

    }
	

?>
