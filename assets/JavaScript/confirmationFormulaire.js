
function envoyerFormulaire() {
    // séléctionne mon form dans contact.php avec ma classe .formcontact
    var formulaire = document.querySelector(".formcontact");
    // Collecte toutes les données du formulaire
    var formData = new FormData(formulaire);

    var xhr = new XMLHttpRequest();
    // configure la requete , post pour ouvrir sur un serveur et non url / traitement.php pour la création de fichier avec données / true pour continuer en fond
    //et laisser le code de java script sans freeze
    xhr.open("POST", "traitement.php", true);

    // Si ma fonction onreadystatechange est 4 ( donc terminé ) et à pour status = 200 (requête réussi) alors , affiche mon message de confirmation , reset le form
    // et envoi sur un lien avec un message de validation de mon php via l'écho
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            document.getElementById("messageConfirmation").innerHTML = xhr.responseText;
            formulaire.reset();
        }
    };

    xhr.send(formData);
}