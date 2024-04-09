<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $pseudo = $_POST["pseudo"];
    $password = $_POST["password"];

    $fichier = "donnees.txt";
    $handle = fopen($fichier, "r");

    if ($handle) {
        while (!feof($handle)) { 
            $id = trim(fgets($handle)); 
            $mdp = trim(fgets($handle)); 
            if ($pseudo == $id && $password == $mdp) {
                fclose($handle);
                echo "Bonjour " . $id;
                exit;
            }
        }
        fclose($handle);
        echo "Mot de passe ou identifiant incorrect";
    } else {
        echo "Erreur lors de l'ouverture du fichier";
    }
}
?>
