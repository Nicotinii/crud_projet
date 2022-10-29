<?php
session_start();
include "config.php"; //ajoute config


if (isset($_POST['update'])) { //si tout est declarer dans le post(form) c'est bon

    $Titre = $_POST['Titre']; // def : var : input[name]

    $user_id = $_POST['user_id'];

    $Auteur = $_POST['auteur'];

    $Date = $_POST['Date'];

    $Ajout = $_POST['Ajout'];


    $sql = "UPDATE `manga` 
            SET `Titre`='$Titre',`autor_id`='$Auteur',`Date`='$Date',`Ajout`='$Ajout' 
            WHERE `id`='$user_id'"; //def : var : sql command "MAJ DANS 'table' LIE 'name'='$row', ... OÙ '$id'

    $result = $connexion->query($sql); //def : var : Exécute une requête sur la base de données(* manga)

    if ($result == TRUE) { //si la connexion est faite, sa marche !

        $maj = "Maj fait ! <br> <a class='btn btn-danger' href='index.php'>Liste des livres</a> ";
    } else { //sa marche pas !

        $maj = "Error:" . $sql . "<br>" . $connexion->error;
    }
}

if (isset($_GET['id'])) { //si l'id est déclaré c'est bon

    $user_id = $_GET['id']; // def : var : input[id]

    $sql = "SELECT manga.*, autor.name FROM manga JOIN autor ON autor.id=manga.autor_id WHERE manga.id =  '$user_id'"; //def : var : sql command "SUPPR DANS 'table' OÙ '$id'

    $result = $connexion->query($sql); //def : var : Exécute une requête sur la base de données(* manga)

    if ($result->num_rows > 0) { //si - mysqli_num_rows — Gets the number of rows in the result set

        while ($row = $result->fetch_assoc()) { //tant que - Récupère les donnés des rows

            $titre = $row['Titre']; //def : var : input[name]

            $auteur = $row['auteur'];

            $date = $row['Date'];

            $ajout  = $row['Ajout'];

            $id = $row['id'];
        }

?>

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
                            <a class="nav-link" href="<?php echo $lien;  ?>"><?php echo $co;  ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" href="#"> <?php echo $laoupas  ?> </a>
                        </li>
                    </ul>
                </div>
            </nav>
            <br><br>
            <h1 class=text-center>MODIFIER UN LIVRE</h1>

            <form style="margin-top : 3%; display: inline-block;" action="" method="post">
                <!-- form de méthode POST pour envoie des données -->

                <fieldset>
                    <!-- ça fait une jolie bordure -->


                    Titre:<br>

                    <input type="text" name="Titre" value="<?php echo $titre; ?>"><!-- value dans le input pour pas oublier ce qui était marqué -->


                    <input type="hidden" name="user_id" value="<?php echo $id; ?>"><!-- chut il est caché-->

                    <br>

                    Auteur:<br>

                    <select name="auteur">

                        <option value="choix"> choisi</option>
                        <?php
                        $datas = $connexion->query('SELECT * FROM autor');
                        $testt = $connexion->query('SELECT * from manga where id = ' . $_GET['id']);
                        $test = $testt->fetch_assoc();
                        foreach ($datas as $data) {
                            echo '<option value="' . $data['id'] . '"';
                            if ($data['id'] === $test['autor_id']) {
                                echo 'selected';
                            }
                            echo '>' . $data['name'] . '</option>';
                        }
                        ?>

                    </select>
                    <br>
                    Date:<br>

                    <input type="Date" name="Date" value="<?php echo $date; ?>">

                    <br>

                    Ajout:<br>

                    <input type="Ajout" name="Ajout" value="<?php echo $ajout; ?>">

                    <br><br>

                    <input class="btn btn-primary" type="submit" value="Update" name="update">

                    <h1 class=text-center><?php echo $maj ?></h1>

                </fieldset>

            </form>

        </body>

        </html>

<?php

    } else {

        header('Location: index.php'); //renvoie à index
    }
}

?>