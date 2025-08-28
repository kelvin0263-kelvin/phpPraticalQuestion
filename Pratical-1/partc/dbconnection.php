<?php
//Name: Tan Chun Keat
//Student ID : 2314612
$servername = "localhost";
$username = "root";
$password = "";
$db = "collegedb";

try {
    $pdo = new PDO("mysql:host=$servername;dbname=collegedb", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      echo "Connected successfully";


}catch(PDOException $e) {
    die('Databse connection failed'. $e->getMessage());
}


?>