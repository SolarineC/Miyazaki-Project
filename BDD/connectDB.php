<?php 
include("login.php");

try {
    $connexion = new PDO("mysql:host=".$host.";dbname=".$db_name,$username,$password);
    $connexion->exec("set names utf8");
} catch(PDOException $e) {
    echo $e;
}