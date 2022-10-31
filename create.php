<?php
include "security.php";

if (isset($_POST['submit'])) { //si tout est declarer dans le post(form) c'est bon

    $titre = $_POST['Titre']; // def : var : input[name]

    $auteur = $_POST['auteur'];

    $date = $_POST['Date'];

    $ajout = $_SESSION['use'];

    $sql = "INSERT INTO `manga`(`Titre`, `autor_id`, `Date`, `Ajout`) VALUES ('$titre','$auteur','$date','$ajout')"; //def : var : sql command "INSERE DANS 'table'('row') VALEUR ('$row')

    $result = $connexion->query($sql); //def : var : Exécute une requête sur la base de données(* manga)

    if ($result == TRUE) { //si la connexion est faite, sa marche !

        $winorloose = "Ajout fait !";
    } else { //sa marche pas !

        $winorloose = "Error:" . $sql . "<br>" . $connexion->error;
    }

    $connexion->close();
}

?>

<!DOCTYPE html>

<html>

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
                    <a class="nav-link" href="create.php">Ajouter un livre / auteur<span class="sr-only">(t'es la)</span></a>
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



    <h1 class="text-center">Ajout des manga</h1>

    <form style="margin-top : 3%; display: inline-block;" action="" method="POST">
        <!-- form de méthode POST pour envoie des données -->

        <fieldset>
            <!-- ça fait une jolie bordure -->

            <legend>Manga</legend><!-- ça fait un titre au niveau de la bordure -->


            Titre:<br>

            <input type="text" name="Titre"> <!-- name trés important pour pour le input[name]-->

            <br>

            Auteur:<br>

            <select name="auteur">

                <option value="choix"> choisi</option>
                <?php

                foreach ($datas as $data) {
                    echo '<option value="' . $data['id'] . '">' . $data['name'] . '</option>';
                }
                ?>

            </select>

            <br>

            Date:<br>

            <input type="date" name="Date">

            <br><br>

            <input class="btn btn-primary mb-2" type="submit" name="submit" value="Ajout"><!-- input de type bouton -->

            <h1><?php echo $winorloose ?></h1>
            <br><br>


        </fieldset>

    </form>


</body>


</html>
<?php include "create_autor.php"; //ajoute config