// // document.getElementById('commandeForm').addEventListener('submit', function (event) {
// //     var isValid = true;

// //     // Fonction de validation des champs
// //     function validateField(fieldId, errorMessageId) {
// //         var field = document.getElementById(fieldId);
// //         var errorMessage = document.getElementById(errorMessageId);

// //         if (!field.value.trim()) {
// //             isValid = false;
// //             errorMessage.innerHTML = 'Ce champ est obligatoire et doit être correctement rempli.';
// //             errorMessage.style.display = 'block'; // Afficher le message d'erreur
// //             errorMessage.style.color = 'red';
        

// //             // Ajouter l'attribut required
// //             field.setAttribute('required', 'required');
// //         } else {
// //             errorMessage.innerHTML = '';
// //             errorMessage.style.display = 'none'; // Masquer le message d'erreur

// //             // Retirer l'attribut required
// //             field.removeAttribute('required');
// //         }


// //     }


// //     const nomPattern = /^[A-Za-zÀ-ÖØ-öø-ÿ\s'-]$/;
// //     const prenomPattern = /^[A-Za-zÀ-ÖØ-öø-ÿ\s'-]$/;
// //     const phonePattern = /^\d{10}$/;
// //     const adressePattern = /.*/;

// //     //Validation des champs individuels
// //     validateField('nom', 'erreur-nom' , nomPattern);
// //     validateField('prenom', 'erreur-prenom',prenomPattern);
// //     validateField('telephone', 'erreur-telephone',phonePattern);
// //     validateField('adresse', 'erreur-adresse',adressePattern);



   
// //     // Soumission du formulaire si tout est valide
// //     if (!isValid) {
// //         event.preventDefault(); // Empêche l'envoi du formulaire si des erreurs existent
// //     }
// // });

// document.getElementById('commandeForm').addEventListener('submit', function (event) {
//     var isValid = true;

//     // Fonction de validation des champs
//     function validateField(fieldId, errorMessageId, pattern) {
//         var field = document.getElementById(fieldId);
//         var errorMessage = document.getElementById(errorMessageId);

//         // Vérifier si le champ est vide
//         if (!field.value.trim()) {
//             isValid = false;
//             errorMessage.innerHTML = 'Ce champ est obligatoire et doit être correctement rempli.';
//             errorMessage.style.display = 'block'; // Afficher le message d'erreur
//             errorMessage.style.color = 'red';

//             // Ajouter l'attribut required
//             field.setAttribute('required', 'required');
//         } else {
//             // Vérifier si le champ respecte le pattern (si défini)
//             if (pattern && !pattern.test(field.value)) {
//                 isValid = false;
//                 errorMessage.innerHTML = 'Merci de ne pas saisir de caractères spéciaux ( * , @ , /  ...).';
//                 errorMessage.style.display = 'block'; // Afficher le message d'erreur
//                 errorMessage.style.color = 'red';

//                 // Ajouter l'attribut required
//                 field.setAttribute('required', 'required');
//             } else {
//                 errorMessage.innerHTML = '';
//                 errorMessage.style.display = 'none'; // Masquer le message d'erreur

//                 // Retirer l'attribut required
//                 field.removeAttribute('required');
//             }
//         }
//     }

//     const nomPattern = /^[A-Za-zÀ-ÖØ-öø-ÿ\s'-]+$/;
//     const prenomPattern = /^[A-Za-zÀ-ÖØ-öø-ÿ\s'-]+$/;
//     const phonePattern = /^\d{10}$/;
//     const adressePattern = /[A-Za-zÀ-ÖØ-öø-ÿ\s'-]+$/;

//     // Validation des champs individuels avec des patterns
//     validateField('nom', 'erreur-nom', nomPattern);
//     validateField('prenom', 'erreur-prenom', prenomPattern);
//     validateField('telephone', 'erreur-telephone', phonePattern);
//     validateField('adresse', 'erreur-adresse', adressePattern);

//     // Soumission du formulaire si tout est valide
//     if (!isValid) {
//         event.preventDefault(); // Empêche l'envoi du formulaire si des erreurs existent
//     }
// });


document.getElementById('commandeForm').addEventListener('submit', function(event) {
    var isValid = true;

    // Fonction de validation des champs
    function validateField(fieldId, errorMessageId, pattern) {
        var field = document.getElementById(fieldId);
        var errorMessage = document.getElementById(errorMessageId);

        // Vérifier si le champ est vide
        if (!field.value.trim()) {
            isValid = false;
            errorMessage.innerHTML = 'Ce champ est obligatoire et doit être correctement rempli.';
            errorMessage.style.display = 'block'; // Afficher le message d'erreur
            errorMessage.style.color = 'red';

            // Ajouter l'attribut required
            field.setAttribute('required', 'required');
        } else {
            // Vérifier si le champ respecte le pattern (si défini)
            if (pattern && !pattern.test(field.value)) {
                isValid = false;
                errorMessage.innerHTML = 'Merci de ne pas saisir de caractères spéciaux ( * , @ , /  ...).';
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
    }

    const nomPattern = /^[A-Za-zÀ-ÖØ-öø-ÿ\s'-]+$/;
    const prenomPattern = /^[A-Za-zÀ-ÖØ-öø-ÿ\s'-]+$/;
    const phonePattern = /^\d{10}$/;
    const adressePattern = /[A-Za-zÀ-ÖØ-öø-ÿ\s'-]+$/;
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    // Validation des champs individuels avec des patterns
    validateField('nom', 'erreur-nom', nomPattern);
    validateField('prenom', 'erreur-prenom', prenomPattern);
    validateField('telephone', 'erreur-telephone', phonePattern);
    validateField('adresse', 'erreur-adresse', adressePattern);
    validateField('email', 'erreur-email', emailPattern);

    // Soumission du formulaire si tout est valide
    if (!isValid) {
        event.preventDefault(); // Empêche l'envoi du formulaire si des erreurs existent
    }
});