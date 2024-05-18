<?php

session_start();

if (!isset($_SESSION['pseudo'])) {
    header("Location: connexion.php"); // Redirige vers la page de connexion si l'utilisateur n'est pas connecté
    exit();
}

$pseudo = $_SESSION['pseudo'];
$password = $_SESSION['password'];

$fichier = "donnees.txt";
$handle = fopen($fichier, "r");

if ($handle) {
    while (!feof($handle)) {
        $id = trim(fgets($handle));
        $mdp = trim(fgets($handle));
        if ($pseudo == $id && $password == $mdp) {
            // Identifiant et mot de passe trouvés, extrayez les informations associées
            $nom = trim(fgets($handle));
            $sexe = trim(fgets($handle));
            $date_naissance = trim(fgets($handle));
            $city = trim(fgets($handle));
            $poids = trim(fgets($handle));
            $taille = trim(fgets($handle));
            $sport = trim(fgets($handle));
            $sports_pratiques = trim(fgets($handle));
            $description = trim(fgets($handle));
            $adresse = trim(fgets($handle));
            $image = trim(fgets($handle));
            $date_inscription = trim(fgets($handle));
            $pseudo_visite = trim(fgets($handle));
            break; // Sortir de la boucle une fois que les informations sont trouvées
        } else {
            // Passer à l'entrée utilisateur suivante
            for ($i = 0; $i < 14; $i++) {
                fgets($handle);
            }
        }
    }
    fclose($handle);
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="profil.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap">
    <title>Profil</title>
</head>
<body>      
   
<div class="banner">
    <h1><a href="acceuil.php">SportMeet </a></h1>
    <p><em> Slogan </em></p>
    <button onclick="window.location.href='abonnements.html'">Abonnements</button>
</div>

<div id="page">
    <h1><b><u>Profil</u></b></h1>
    <h2><em>Informations personnelles :</em></h2>

    
    <img style="float:left" src="<?php echo $image; ?>" alt="pas" width="130" height="130"/>
    
    <?php
    if (isset($_SESSION['abonnement']) && $_SESSION['abonnement'] === true) {
        echo "<p> Abonné </p>";
    }
    ?>

    <p id="nom"> Nom : <?php echo $nom; ?> </p>
    <p id="pseudo"> Pseudo : <?php echo $pseudo; ?></p> <div style="clear: both"></div>
    <p> Mot de passe : <?php echo $password; ?>
    <button onclick="window.location.href = 'changementmdp.html';"> Changement de mot de passe </button>
    <p>Date d'inscription : <?php echo $date_inscription; ?></p>
    <p>Sexe : <?php echo $sexe; ?></p>
    <p>Date de naissance : <?php echo $date_naissance; ?></p>
    <p>Lieu de résidence : <?php echo $city; ?></p>
    <p>Poids : <?php echo $poids; ?> kg</p>
    <p>Taille : <?php echo $taille; ?> cm</p>
    <p>Fréquence sport : <?php echo $sport; ?></p>
    <p>Sport(s) pratiqué(s) : <?php echo $sports_pratiques; ?></p>
    <p>Description : <?php echo $description; ?></p>

    <?php
    if (isset($_SESSION['abonnement']) && $_SESSION['abonnement'] === true) {
    echo "<div>personnes ayant visité votre profil : $pseudo_visite </div>";}
    ?>
    <form action="modificationprofil.php" enctype="multipart/form-data" method="post" style="float:right"> 
        <br>
        <button type="submit"> Modifier </button>
    </form>

    <form action="mesmessages.php" enctype="multipart/form-data" method="post" style="float:left"> 
        <br>
        <button type="submit"> Mes messages </button>
    </form>

</div>


</body>
</html>
