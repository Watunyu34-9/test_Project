<?php

$server = "mysql:host=localhost;dbname=db";
$username = "root";
$password = "";

try{
    $conn = new PDO($server,$username,$password);

}catch(PDOException $e){
    $e->getMessage();
}

require_once "controller.php";
$controller = new Controller($conn);
?>