
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

    // Définir les patterns de validation
    $nomPattern = '/^[A-Za-zÀ-ÖØ-öø-ÿ\s-]{2,}$/';
    $emailPattern = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
    $telephonePattern = '/^\d{10}$/'; // 10 chiffres seulement

    // Valider les données avec les patterns
    if (!preg_match($nomPattern, $nom)) {
        $messageConfirmation = 'Erreur : Veuillez saisir un nom valide.';
    } elseif (!preg_match($nomPattern, $prenom)) {
        $messageConfirmation = 'Erreur : Veuillez saisir un prénom valide.';
    } elseif (!preg_match($emailPattern, $email)) {
        $messageConfirmation = 'Erreur : Veuillez saisir une adresse e-mail valide.';
    } elseif (!preg_match($telephonePattern, $telephone)) {
        $messageConfirmation = 'Erreur : Veuillez saisir un numéro de téléphone valide (10 chiffres uniquement).';
    } else {
        // Créer une chaîne de texte avec les informations saisies
        $contenu = "Nom : $nom\nPrénom : $prenom\nE-mail : $email\nTéléphone : $telephone\nDemande : $demande\n";

        // Chemin vers le fichier de sauvegarde (assurez-vous que le dossier est accessible en écriture)
        $fichier = 'contact_' . date('Y-m-d_H-i-s') . '.txt';

        // Enregistrer les données dans un fichier texte
        file_put_contents($fichier, $contenu);

        // Mettre à jour le message de succès
        $messageConfirmation = 'Les informations ont été envoyées avec succès.';
    }
}

?>

<!-- Afficher le formulaire -->
<main>
    <div class="parallax">
        <h1 class="mt-4 mb-4 d-flex justify-content-center">Contactez-nous</h1>
        <form action="traitement_contact.php" method="post" class="formcontact mx-auto w-75  mb-5 ">
            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" class="contactinput mb-5" pattern="[A-Za-zÀ-ÖØ-öø-ÿ\s-]{2,}" title="Veuillez saisir un nom valide" required>

            <label for="prenom">Prénom :</label>
            <input type="text" id="prenom" name="prenom" class="contactinput mb-5" pattern="[A-Za-zÀ-ÖØ-öø-ÿ\s-]{2,}" title="Veuillez saisir un prénom valide" required>

            <label for="email">E-mail :</label>
            <input type="email" id="email" name="email" class=" contactinput mb-5" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}" title="Veuillez saisir une adresse e-mail valide" required>

            <label for="telephone">Téléphone :</label>
            <input type="tel" id="telephone" name="telephone" class="contactinput mb-5" pattern="\d{10}" title="Veuillez saisir un numéro de téléphone valide (10 chiffres uniquement)" required>

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


