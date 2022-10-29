<?php
session_start();
include "config.php"; //ajoute config


if (isset($_GET['id'])) { //si l'id est déclaré c'est bon

    $user_id = $_GET['id']; // def : var : input[id]

    $sql = "DELETE FROM `manga` WHERE `id`='$user_id'"; //def : var : sql command "SUPPR DANS 'table' OÙ '$id'

    $result = $connexion->query($sql); //def : var : Exécute une requête sur la base de données(* users)

    if ($result == TRUE) { //si la connexion est faite, sa marche !

        $suprime = "Pouf disparu !";
    } else { //sa marche pas !

        $suprime = "Error:" . $sql . "<br>" . $connexion->error;
    }
}
