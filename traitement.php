<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $informations_formulaire = $_POST;

    // Générer le nom de fichier avec le format AAAA-MM-JJ-HH-MM-SS.txt
    $nom_fichier = date("Y-m-d-H-i-s") . ".txt";

    // Ouvrir le fichier en mode écriture
    $fichier = fopen($nom_fichier, 'w');

    // Écrire les informations du formulaire dans le fichier
    foreach ($informations_formulaire as $cle => $valeur) {
        fwrite($fichier, "$cle: $valeur\n");
    }

    // Fermer le fichier
    fclose($fichier);

    echo "Formulaire soumis avec succès !";
} else {
    echo "Erreur lors de la soumission du formulaire.";
}

?>