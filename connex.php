<?php
$hote = "localhost";
$bdd = "etude";
$utilisateur = "root";
$mdp = "";

try{
    $connex = new PDO("mysql:host=" .$hote . ";dbname=" . $bdd , $utilisateur ,$mdp);
    $connex-> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
   
} catch (PDOException $e){
    echo"error :". $e ->getMessage();
}