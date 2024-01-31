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

</body>
</html>
