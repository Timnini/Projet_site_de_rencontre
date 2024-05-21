<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="acceuil.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap">
    <style>
    .clickableTable {
        width: 200px;
        table-layout: fixed;
        margin: 10px;
        text-align: center;
    }
    .clickableTable td {
        border: 3px solid black;
        width: 100%;
        height: 100px;
        vertical-align: middle;
    }
    .clickableTable img {
        width: 100px;
        height: 100px;
    }
</style>
    <title>Accueil</title>
</head>

<body>

<div class="banner">
    <h1><a href="acceuil.php">SportMeet</a></h1>
    <p><em>Slogan</em></p>
    <div class="button-bandeau">
        <?php
        session_start(); // Assurez-vous de démarrer la session avant d'utiliser $_SESSION

        if(isset($_SESSION['connexion_pseudo']) && $_SESSION['connexion_pseudo'] === true) {
            echo '<button id=buttonprofil onclick="window.location.href=\'profil.php\'">Profil</button>';
            echo '<button onclick="deconnexion()">Deconnexion</button>'; // Bouton de déconnexion
        } else {
            echo '<button onclick="window.location.href=\'connexion.html\'">Connexion</button>';
        }
        ?>

        <script>
            function deconnexion() {
                // Effectuez une requête AJAX ou redirigez simplement l'utilisateur vers une page de déconnexion
                window.location.href = 'deconnexion.php';
            }
        </script>
    </div>
</div>

<?php
// Fonction pour récupérer les informations d'un profil à partir du fichier de données
function recupererProfil($handle) {
    $profil = array();
    $profil['id'] = trim(fgets($handle));
    for($j=0;$j<8;$j++){
        $rien = trim(fgets($handle));
    }
    // Lire les autres informations nécessaires pour le profil
    $profil['sport_pratique'] = trim(fgets($handle));
    for($j=0;$j<2;$j++){
        $rien = trim(fgets($handle));
    }
    $profil['image'] = trim(fgets($handle));
    for($j=0;$j<3;$j++){
    $rien = trim(fgets($handle));
}
    return $profil;
}

// Ouvrir le fichier de données
$fichier = "donnees.txt";
$handle = fopen($fichier, "r");


// Fonction pour afficher les informations d'un profil
function afficherProfil($profil) {
    echo '<br>';
    echo '<table border="3" class="clickableTable">';
    echo '<tr>';
    echo '<td><img src="' . $profil['image'] . '" width="100" height="100"></td>';
    echo '</tr>';
    echo '<tr><td>id : ' . $profil['id'] . '</td></tr>';
    echo '<tr><td>Sport(s) pratiqué(s) : ' . $profil['sport_pratique'] . '</td></tr>';
    echo '</table>';
}

// Récupérer et afficher le premier profil
$profil1 = recupererProfil($handle);
afficherProfil($profil1);

// Récupérer et afficher le deuxième profil
$profil2 = recupererProfil($handle);
afficherProfil($profil2);

if(isset($_SESSION['connexion_pseudo']) && $_SESSION['connexion_pseudo'] === true){
    $profil3 = recupererProfil($handle);
    afficherProfil($profil3);
    $profil4 = recupererProfil($handle);
    afficherProfil($profil4);
}else{
    echo "<br><br>";
    echo '<button onclick="window.location.href=\'connexion.html\'">Voir plus</button>';
}
// Fermer le fichier de données
fclose($handle);

?>

<script>
    // Ajouter un gestionnaire d'événements pour rediriger vers le profil lors du clic sur la table
    var tables = document.querySelectorAll('.clickableTable');
    tables.forEach(function(table) {
        table.addEventListener('click', function() {
            var id = this.querySelector('tr:nth-child(2) td').innerText.split(':')[1].trim();
            window.location.href = "profil2.php?id=" + id;
        });
    });
</script>

</body>
</html>

