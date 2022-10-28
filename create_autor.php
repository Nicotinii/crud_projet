<?php
if (isset($_POST['submit2'])) { //si tout est declarer dans le post(form) c'est bon


    $auteurr = $_POST['Auteur2'];

    $sqll = "INSERT INTO `autor`(`name`) VALUES ('$auteurr')"; //def : var : sql command "INSERE DANS 'table'('row') VALEUR ('$row')

    $resultt = $connexion->query($sqll); //def : var : Exécute une requête sur la base de données(* manga)

    if ($resultt == TRUE) { //si la connexionn est faite, sa marche !

        $winorloosee = "Ajout fait !";
    } else { //sa marche pas !

        $winorloosee = "Error:" . $sqll . "<br>" . $connexion->error;
    }

    $connexion->close();
}

?>


<html>

<body style="text-align: center;">

    <h1 class="text-center">Ajout des Auteurs</h1>

    <form style="margin-top : 2%; display: inline-block;" action="" method="POST">
        <!-- form de méthode POST pour envoie des données -->

        <fieldset>
            <!-- ça fait une jolie bordure -->

            <legend>Auteur</legend><!-- ça fait un titre au niveau de la bordure -->


            Auteur:<br>

            <input type="text" name="Auteur2"><!-- input pour rentré une valeur -->

            <br><br>

            <input class="btn btn-primary mb-2" type="submit" name="submit2" value="Ajout"><!-- input de type bouton -->

            <h1><?php echo $winorloosee ?></h1>


        </fieldset>

    </form>

</body>

</html>