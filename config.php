<?php

$servername = "localhost"; //def : var : adresse server

$username = "root"; //def : var : user server

$password = ""; //def : var : mdp server

$dbname = "the library factory"; //def : var : nom de la bdd utilisé

$connexion = new mysqli($servername, $username, $password, $dbname); //def : var : de la connexion à mysql 

if ($connexion->connect_error) { //si erreur

    die("Connection failed: " . $connexion->connect_error); //arrete et affiche l'erreur
}

if (!isset($_SESSION['use'])) {
    $laoupas = 'Tu n\'est pas connecté ;(';
    $co = 'Connexion';
    $lien = 'login.php';
} else {
    $laoupas = $_SESSION['use'];
    $co = 'Déconnexion';
    $lien = 'logout.php';
}
?>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>