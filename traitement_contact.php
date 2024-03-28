
<?php
require_once('assets/php/header.php')
?>

<?php

// Initialiser la variable pour stocker le message de succès
$messageConfirmation = '';

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $nom = $_POST['nom'] ?? '';
    $prenom = $_POST['prenom'] ?? '';
    $email = $_POST['email'] ?? '';
    $telephone = $_POST['telephone'] ?? '';
    $demande = $_POST['demande'] ?? '';

    // Créer une chaîne de texte avec les informations saisies
    $contenu = "Nom : $nom\nPrénom : $prenom\nE-mail : $email\nTéléphone : $telephone\nDemande : $demande\n";

    // Chemin vers le fichier de sauvegarde (assurez-vous que le dossier est accessible en écriture)
    $fichier = 'contact_' . date('Y-m-d_H-i-s') . '.txt';

    // Enregistrer les données dans un fichier texte
    file_put_contents($fichier, $contenu);

    // Mettre à jour le message de succès
    $messageConfirmation = 'Les informations ont été envoyées avec succès.';
}

?>

<!-- Afficher le formulaire -->
<main>

    <div class="parallax">


        <h1 class="mt-4 mb-4 d-flex justify-content-center">Contactez-nous</h1>

            <form action="traitement_contact.php" method="post" class="formcontact mx-auto w-75  mb-5 ">
                <label for="nom">Nom :</label>
                <input type="text" id="nom" name="nom" class="contactinput mb-5" required>

                <label for="prenom">Prénom :</label>
                <input type="text" id="prenom" name="prenom" class="contactinput mb-5" required>

                <label for="email">E-mail :</label>
                <input type="email" id="email" name="email" class=" contactinput mb-5" required>

                <label for="telephone">Téléphone :</label>
                <input type="tel" id="telephone" name="telephone" class="contactinput mb-5" required>

                <label for="demande">Demande :</label>
                <textarea id="demande" name="demande" rows="4" class=" contactinput mb-5" required></textarea>

                <button type="submit">Envoyer</button>
            </form>

            <div id="messageConfirmation" class="mx-auto w-75 mb-5"><?php echo $messageConfirmation; ?></div>

    </div>

</main>


<?php
require_once('assets/php/footer.php')
?>


