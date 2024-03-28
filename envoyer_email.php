<?php
// Vos autres codes de traitement de commande ici...

// Récupérer les données du formulaire
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$telephone = $_POST['telephone'];
$adresse = $_POST['adresse'];
$email = $_POST['email'];

// Créer le contenu de l'email à partir du modèle
$email_modele = file_get_contents('modele_email.txt');

// Remplacer les placeholders par les valeurs réelles
$email_modele = str_replace('{{nom}}', $nom, $email_modele);
$email_modele = str_replace('{{prenom}}', $prenom, $email_modele);
$email_modele = str_replace('{{telephone}}', $telephone, $email_modele);
$email_modele = str_replace('{{adresse}}', $adresse, $email_modele);
$email_modele = str_replace('{{email}}', $email, $email_modele);

// Nom du fichier pour sauvegarder l'email
$fichier_email = 'confirmation_commande_' . date('Y-m-d_H-i-s') . '.txt';

// Enregistrer le contenu de l'email dans un fichier
file_put_contents($fichier_email, $email_modele);

echo "Votre commande a été enregistrée avec succès ! Un email de confirmation a été enregistré dans le fichier $fichier_email.";
?>