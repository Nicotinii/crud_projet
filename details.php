<?php
session_start();
include "config.php"; //ajoute config


if (isset($_GET['id'])) { //si l'id est déclaré c'est bon

    $user_id = $_GET['id']; // def : var : input[id]

    $sql = "SELECT manga.*, autor.name FROM manga JOIN autor ON autor.id=manga.autor_id WHERE manga.id =  '$user_id'"; //def : var : sql command "SUPPR DANS 'table' OÙ '$id'

    $result = $connexion->query($sql); //def : var : Exécute une requête sur la base de données(* users)

    if ($result == TRUE) { //si la connexion est faite, sa marche !

        $youpi = "Voici les détails";
    } else { //sa marche pas !

        $youpi = "Error:" . $sql . "<br>" . $connexion->error;
    }
}
?>
<html>

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
                <a class="nav-link" href="<?php echo $lien;  ?>"><?php echo $co;  ?></a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#"> <?php echo $laoupas  ?> </a>
            </li>
        </ul>
    </div>
</nav>
<br><br>
<h4 class=text-center> <?php echo $youpi ?> </h4>
<br><br>
<div>
    <?php foreach ($result as $all) { ?>

        <h1 class=text-center>
            <?= "{$all['Titre']} - {$all['name']} - {$all['Date']} - {$all['Ajout']}"; ?>
        </h1>

    <?php } ?>
</div>

</html>