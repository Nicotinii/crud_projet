<?php
include "config.php"; //ajoute config
session_start();   // La session démarre à l'aide de cette fonction


if (isset($_SESSION['use']))   // Vérifier si la session est déjà là ou non  
// si true alors l'en-tête le redirige directement vers la page index
{
    header("Location:index.php");
}

if (isset($_POST['login']))   // il vérifie si l'utilisateur a cliqué sur le bouton de connexion ou non 
{
    $user = $_POST['user'];

    if ($user == $user)  // le nom d'utilisateur est défini sur ce qui est rentré dans le input
    {

        $_SESSION['use'] = $user;


        echo '<script type="text/javascript"> window.open("index.php","_self");</script>';            //  En cas de connexion réussie, redirige vers index.php

    } else {
        echo "invalid UserName";
    }
}
?>
<html>

<head>

    <title> Login Page </title>

</head>

<body style="text-align: center;">

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="index.php">Projet PHP</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Liste des livres</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="create.php">Ajouter un livre / auteur</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php"><?php echo $co;  ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"> <?php echo $laoupas  ?> </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php"><?php echo $deco  ?></a>
                </li>
            </ul>
        </div>
    </nav>

    <h1 class="text-center">LOGIN</h1>

    <form style="margin-top : 10%; display: inline-block;" action="" method="post">


        <label class="mx-auto" for="inlineFormInputGroupUsername2"></label>
        <div class="input-group mb-2 mr-sm-2 ">
            <div class="input-group-prepend">
                <div class="input-group-text">@</div>
            </div>
            <input id="inlineFormInputGroupUsername2" type="text" name="user" placeholder="Username" required="required">
        </div>

        <input class="btn btn-primary mb-2" type="submit" name="login" value="LOGIN"></td>

    </form>

</body>

</html>