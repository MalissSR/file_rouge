document.getElementById('commandeForm').addEventListener('submit', function (event) {
    var isValid = true;

    // Fonction de validation des champs
    function validateField(fieldId, errorMessageId) {
        var field = document.getElementById(fieldId);
        var errorMessage = document.getElementById(errorMessageId);

        if (!field.value.trim()) {
            isValid = false;
            errorMessage.innerHTML = 'Ce champ est obligatoire et doit être correctement rempli.';
            errorMessage.style.display = 'block'; // Afficher le message d'erreur
            errorMessage.style.color = 'red';
        

            // Ajouter l'attribut required
            field.setAttribute('required', 'required');
        } else {
            errorMessage.innerHTML = '';
            errorMessage.style.display = 'none'; // Masquer le message d'erreur

            // Retirer l'attribut required
            field.removeAttribute('required');
        }
    }

    // Validation des champs individuels
    validateField('nom', 'erreur-nom');
    validateField('prenom', 'erreur-prenom');
    validateField('telephone', 'erreur-telephone');
    validateField('adresse', 'erreur-adresse');

    // Soumission du formulaire si tout est valide
    if (!isValid) {
        event.preventDefault(); // Empêche l'envoi du formulaire si des erreurs existent
    }
});