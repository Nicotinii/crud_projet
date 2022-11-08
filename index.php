<?php
session_start();

include "config.php"; //ajoute config
include "delete.php"; //ajoute delete


$sql = 'SELECT manga.*, autor.name FROM manga JOIN autor ON autor.id=manga.autor_id'; //def : var : selection toute la table users
$result = $connexion->query($sql); //def : var : Exécute une requête sur la base de données(* users)
?>

<!DOCTYPE html>

<html>

<head>
    <title>Liste des livres Page</title>
</head>


<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="index.php">Projet PHP</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Liste des livres <span class="sr-only">(t'es la)</span></a>
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





    <div class="container">

        <h1 class="text-center">Liste des livres</h1>

        <table class="table">
            <!-- table version html -->

            <thead>
                <!-- table header -->

                <tr>
                    <!-- ligne -->

                    <th>ID</th><!-- header du table-->

                    <th>Titre</th>

                    <th>Auteur</th>

                    <th>Date</th>

                    <th>Ajout par</th>

                </tr>

            </thead>

            <tbody>
                <!--  permet de regrouper un ou plusieurs éléments <tr> afin de former le corps d'un tableau HTML-->

                <html>
                <form method="POST" action="">
                    Rechercher un mot : <input type="text" name="recherche">
                    <input type="SUBMIT" value="Search!">
                </form>

                </html>

                <?php
                // Récupère la recherche
                $recherche = isset($_POST['recherche']) ? $_POST['recherche'] : '';

                // la requete mysql
                $q = $connexion->query(
                    "SELECT manga.*, autor.name FROM manga JOIN autor ON autor.id=manga.autor_id
      WHERE title LIKE '%$recherche%'
      OR autor_id LIKE '%$recherche%'
      LIMIT 100"
                );

                // affichage du résultat
                while ($r = mysqli_fetch_array($q)) {
                    echo 'Résultat de la recherche: ' . $r['title'] . ', ' . $r['autor_id'] . ' <br />';
                }
                ?>

                <?php

                if ($result->num_rows > 0) { //si - mysqli_num_rows — Gets the number of rows in the result set

                    while ($row = $result->fetch_assoc()) { //tant que - Récupère les donnés des rows

                ?>




                        <tr>

                            <td><?php echo $row['id']; ?></td> <!--  cellule dans un tableau + show var row(id)-->

                            <td><?php echo $row['Titre']; ?></td>

                            <td><?php echo $row['name']; ?></td>

                            <td><?php echo $row['Date']; ?></td>

                            <td><?php echo $row['Ajout']; ?></td>

                            <td> <a class="btn btn-success" href="details.php?id=<?php echo $row['id']; ?>">détails</a>&nbsp;
                                <a class="btn btn-warning" href="update.php?id=<?php echo $row['id']; ?>">modifier</a>&nbsp;
                                <!-- href="update.php?id= "id de la ligne" -->
                                <a class="btn btn-danger" href="index.php?id=<?php echo $row['id']; ?>">Supprimer</a> <!-- href="delete.php?id= "id de la ligne" -->
                            </td>

                        </tr>

                <?php       }
                }

                ?>

            </tbody>

        </table>

    </div>
    <div style="text-align: center;">
        <a class="btn btn-primary" href="create.php">Ajouter un livre / auteur</a>

        <h1 class="text-center"><?php echo $suprime ?></h1>
    </div>

</body>

</html>