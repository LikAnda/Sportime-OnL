<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <script src="scripts/stopwatch.js"></script>
    <?php include 'database.php' ?>

    <title>Sportime OnL</title>
</head>
<body>
    <h1>Sportime OnL</h1>

    <div id="chrono">
        <h2 id="chrono-display"><span id="minutes">00</span>:<span id="secondes">00</span>.<span id="millisecondes">00</span></h2>

        <button id="start-button">Start</button>
        <button id="stop-button">Stop</button>
        <button id="reset-button">Reset</button>
    </div>
    <br><br>
    <div id="tableau-participants">
        <table>
            <caption>Participants</caption>

            <tr>
                <th>Identifiant</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Age</th>
                <th>Temps</th>
            </tr>
            <?php
            $requete = 'SELECT `id`, `nom`, `prenom`, `age` FROM `participants`';
            $response = $bdd -> query($requete);
            while ($donnees = $response->fetch()) {
                echo '<tr><td>'.$donnees['id'].'</td><td>'.$donnees['nom'].'</td><td>'.$donnees['prenom'].'</td><td>'.$donnees['age'].'</td><td><a href="entrant.php?identifiant='.$donnees['id'].'">Voir Temps</a></td></tr>';
            }
            ?>
        </table>
    </div>

    <br>

    <div id="ajouter-participant">
        <form action="index.php" method="post">
            <label for="nom">NOM : </label>
                <input name="nom" id="nom" type="text">
            <label for="prenom">Prénom : </label>
                <input name="prenom" id="prenom" type="text">
            <label for="age">Age : </label>
                <select name="age" id="age">
                    <?php
                    for($i=1;$i<100;$i++) {
                        echo '<option value='.$i.'>'.$i.'</option>';
                    }
                    ?>
                </select>
            <button type="submit">Envoyer</button>
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] == "POST") { // vérifier si le formulaire avec la method post a été soumis
            if ((isset($_POST['nom']) && (isset($_POST['prenom']) && (isset($_POST['age']))))) { // vérifier si les données du formulaire existe
                $nom = strtoupper($_POST['nom']); // mettre le nom en majuscules
                $prenom = $_POST['prenom'];
                $age = $_POST['age'];

                if ((!empty($nom)) && (!empty($prenom))) { // vérifier si les champs du prénom et du nom ne sont pas vides
                    $new_id = rand(10000, 999999); // générer une id pour la primary key de 'id' de la bdd
                    $requete_check_id = $bdd->prepare('SELECT * FROM `participants` WHERE `id` = '.$new_id); // vérifier si la pk n'existe pas déjà
                    $requete_check_id->execute();
                    $nb_user_with_id = $requete_check_id->rowCount();
                    if ($nb_user_with_id>0) {
                        // A FINIR ET REVOIR / créer la fonction create_id
                    }
                }
            }
        }
        ?>
    </div>

</body>
</html>
