var data;

$(document).ready(function () {
    // Chargement des données depuis le fichier JSON
    $.ajax({
        url: "assets/json/projet.json",
        dataType: "json",
        success: function (reponseData) {
            data = reponseData;
            console.log("Données chargées avec succès:", data);

            // Appel de la fonction pour afficher les catégories
            categoryData(data.categorie);

            // Vérification de la présence d'un ID de catégorie dans l'URL
            const queryString = window.location.search;
            const urlParams = new URLSearchParams(queryString);
            const categoryId = urlParams.get('categorie');

            if (categoryId !== null) {
                console.log("ID de catégorie récupéré depuis l'URL:", categoryId);
                // Si un ID de catégorie est présent dans l'URL, filtrer et afficher les plats correspondants
                platCategorie(categoryId);
            } else {
                console.log("Aucune catégorie sélectionnée. Affichage de tous les plats.");
                // Si aucune catégorie n'est sélectionnée, afficher tous les plats
                afficherPlat(data.plat);
            }
        }
    });

        // Fonction pour afficher les catégories
        function categoryData(categories) {
          console.log("Catégories récupérées depuis le JSON:", categories);
          var categoriesDescribe = $(".card-container");
          $.each(categories, function (index, category) {
              var categoryCard = `
              <div class="card mt-5 mb-5">
                  <a href="plat_categorie.php?categorie=${category.id_categorie}">
                      <img src="${category.image}" alt="${category.libelle}">
                  </a>
                  <h2 class="justify-content-center d-flex fs-4">${category.libelle}</h2>
              </div>
              `;
            //   Ajoute ma var categoryCARD à ma categories describe pour qu'il soit dans ma div class card-container
              categoriesDescribe.append(categoryCard);
          });
      }
  
      // Fonction pour filtrer et afficher les plats en fonction de l'ID de catégorie
      function platCategorie(categoryId) {
          console.log("Filtrage des plats par catégorie. ID de catégorie:", categoryId);
          var platsParCat = data.plat.filter(function (plat) {
              return plat.id_categorie == categoryId;
          });
          console.log("Plats filtrés par catégorie:", platsParCat);
  
          // Appel de la fonction pour afficher les plats filtrés
          afficherPlat(platsParCat);
      }

         // Fonction pour afficher les plats
    function afficherPlat(plats) {
      console.log("Plats à afficher:", plats);
      var platsDescribe = $("#menu");
      platsDescribe.empty(); // Nettoyer le conteneur des plats avant d'afficher les nouveaux

      $.each(plats, function (index, platt) {
          var plattCard = `
          <div class="row">
              <div class="mt-5 row justify-content-center">
                  <div class="card mb-3 dishescard">
                      <div class="row g-0">
                          <div class="col-md-4">
                              <img src="${platt.image}" class="img-fluid rounded-start" alt="${platt.libelle}">
                          </div>
                          <div class="col-md-8">
                              <div class="card-body">
                                  <h5 class="card-title">${platt.libelle}</h5>
                                  <p class="card-text">${platt.description}</p>
                                  <p class="card-text dishesprice">${platt.prix}$</p>
                                  <a href="commande.php"><button class="btn" type="submit">Commander</button></a>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          `;
          platsDescribe.append(plattCard);
      });
  }
});