// Récupère le chemin de la page actuelle
var path = window.location.pathname;
// Récupère le nom de la page à partir du chemin
var page = path.split("/").pop();

// Sélectionne tous les liens de navigation
var navLinks = document.querySelectorAll('.navbar-nav .nav-item .nav-link');

// Parcours tous les liens de navigation
navLinks.forEach(function(navLink) {
    // Supprime la classe "active" de tous les liens de navigation
    navLink.classList.remove('active');
    // Vérifie si l'attribut href de l'élément de navigation correspond à la page actuelle
    if (navLink.getAttribute('href') === page) {
        // Ajoute la classe "active" à l'élément de navigation correspondant
        navLink.classList.add('active');
    }
});
