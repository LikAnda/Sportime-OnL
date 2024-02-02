<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <?php include 'database.php' ?>

    <?php
        if (isset($_GET['identifiant'])) {
            // récupérer en paramètre l'identifiant du participant ainsi que ses données
            $requete = 'SELECT `id`, `nom`, `prenom`, `age` FROM `participants`';
            $response = $bdd -> query($requete);
        } else {
            $to_display = "Erreur : pas d'identifiant entré"; // au cas ou aucun indentifiant de participant n'est renseigné
        }
    ?>

    <title>Participant</title>
</head>
<body>

    <div id="entrant-infos">
        <?php // afficher quelques informations concernant le participant avec l'identifiant correspondant
            if (isset($to_display)) {
                echo $to_display;
            } else {
                while ($donnees = $response->fetch()) {
                    echo '<h3>Participant : '.$donnees['nom'].' '.$donnees['prenom'].'<br>Age : '.$donnees['age'].'</h3>';
                    $entrant_id = $donnees['id'];
                }
            }
        ?>
    </div>

    <div id="entrant-times">
        <table>
            <tr>
                <th>Identifiant</th>
                <th>Temps</th>
                <th>Date</th>
            </tr>
            <?php // afficher les temps du coureur avec l'identifiant correspondant
                $requete = 'SELECT `id`, `minutes`, `secondes`, `millisecondes`, `date` FROM `temps` WHERE `coureur_id` = '.$entrant_id;
                $response = $bdd -> query($requete);
                while ($donnees = $response->fetch()) {
                    echo '<tr><td>'.$donnees['id'].'</td><td>'.$donnees['minutes'].':'.$donnees['secondes'].':'.$donnees['millisecondes'].'</td><td>'.$donnees['date'].'</td></tr>';
                }
            ?>
        </table>
    </div>

</body>
</html>
