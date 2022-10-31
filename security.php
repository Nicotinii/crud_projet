<?php session_start();
include "config.php"; //ajoute config

$datas = $connexion->query('SELECT * FROM autor');
if (!isset($_SESSION['use'])) //  Si la session n'est pas définie, rediriger vers la page de connexion.
{
    header("Location:Login.php");
}
