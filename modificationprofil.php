<?php

session_start();

if (!isset($_SESSION['pseudo'])) {
    header("Location: connexion.php"); // Redirige vers la page de connexion si l'utilisateur n'est pas connecté
    exit();
}

$pseudo = $_SESSION['pseudo'];

$fichier = "donnees.txt";
$handle = fopen($fichier, "r");

if ($handle) {
    while (!feof($handle)) {
        $donnee = fgets($handle);
        $tab = explode("_", $donnee);
        $id = $tab[0];
        if ($pseudo == $id) {
            // Identifiant et mot de passe trouvés, extrayez les informations associées
            $mdp = $tab[1];
            $nom = $tab[2];
            $sexe = $tab[3];
            $date_naissance = $tab[4];
            $city = $tab[5];
            $poids = $tab[6];
            $taille = $tab[7];
            $sport = $tab[8];
            $sports_pratiques = $tab[9];
            $description = $tab[10];
            $adresse = $tab[11];
            $image = $tab[12];
            $date_inscription = $tab[13];
            $abonnement = $tab[14];

            break; // Sortir de la boucle une fois que les informations sont trouvées
        } else {
            // Passer à l'entrée utilisateur suivante
                fgets($handle);
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
    <link rel="stylesheet" href="modificationprofil.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap">
    <title>Profil</title>
</head>
<body>      
   
    <div class="banner">
<h1><a href="acceuil.php">SportMeet </a></h1>
    <p><em>Rencontrez l'âme sœur sur la piste de votre passion !</em></p>
    <button onclick="window.location.href='abonnements.html'">Abonnements</button>
</div>
    <h1><u>Profil</u></h1>
    <h2>Informations personnelles :</h2>

    <form action="traitementmodif.php" method="post" enctype="multipart/form-data">

    <img src="<?php echo $image; ?>" alt="pas" width="100" height="100"/><br>
    <button onclick="window.location.href = 'changementphoto.html';"> Changement de photo de profil </button><br><br>
    
    <input type="text" id="photo" name="photo" value="<?php echo $image; ?>">

    <label> Nom :  </label>
    <input type="text" id="nom" name="nom" required value="<?php echo $nom; ?>"><br>



   <p> Pseudo : <?php echo $pseudo; ?> </p>

        <input type="text" id="pseudo" name="id" value="<?php echo $pseudo; ?>" style="display: none;">

    <p> Mot de passe :
    <input type="text" id="password" name="mdp" value="<?php echo $password; ?>">
</p>

<label for="adresse">Adresse complète :</label>
    <input type="text" id="adresse" name="adresse" required value="<?php echo $adresse; ?>"><br>

    <label>Sexe :</label>
<input type="radio" name="sexe" value="homme" <?php if ($sexe === "homme") echo "checked"; ?> required> Homme
<input type="radio" name="sexe" value="femme" <?php if ($sexe === "femme") echo "checked"; ?>> Femme
<input type="radio" name="sexe" value="autre" <?php if ($sexe === "autre") echo "checked"; ?>> Autre<br>

    
    <label for="">Date de naissance : </label>
        <input type="date" id="date_naissance" name="date_naissance" value="<?php echo $date_naissance; ?>" readonly><br>

        <label>Lieu de résidence :</label>
    <select name="city" id="city">
        <option value="France">France</option>
        <option value="Autre">Autre</option>
    </select><br>

    <label for="poids">Poids : </label>
        <input type="number" id="poids" name="poids" value="<?php echo $poids; ?>" readonly><br>
   
   
    <label for="poids">Taille : </label>
        <input type="number" id="taille" name="taille" value="<?php echo $taille; ?>" readonly><br>
   

        <label>Sport : </label>
    <select name="sport">
        <option value="pratique occasionnelle">Pratique occasionnelle</option>
        <option value="souvent">Souvent</option>
        <option value="Tous les jours">Tous les jours</option>
        <option value="Acrro au sport">Accro au sport</option>
    </select><br>

    <label>Sport(s) pratiqué(s) :</label>
    <input type="text" name="sports_pratiques" required value="<?php echo $sports_pratiques;?>"><br>

    <label for="description">Description :</label><br>
<textarea id="description" name="description" rows="4" cols="50"><?php echo $description; ?></textarea><br><br>
<input type="submit" value="Soumettre">

 <input type="hidden" name="date_inscription" value ="<?php echo $date_inscription ?>">
 
 <input type="hidden" name="abonnement" value ="<?php echo $abonnement?>">
</form>
</body>
</html>
