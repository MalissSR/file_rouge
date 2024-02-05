var data;

$(document).ready(function () {      //Affichage écran ( DOM )//

$.ajax({
    url:"ASSETS/projet.json",
    dataType:"json",
    success: function (reponseData){
        data = reponseData;
        console.log("Données chargées avec succès:", data);

        categoryFood(data.categorie);
        categoryPlat(data.plat);


    }


})

function categoryFood(categories) {
    var categoriesDescribe = $(".card-container")
    $.each(categories, function(index, category) {
    
    var categoryCard = `
    <div class="card mt-5 mb-5 ">
    <img src="${category.image}" alt="${category.libelle}">
    <h2 class="justify-content-center d-flex fs-4">${category.libelle}</h2>
  </div>
    `;

    categoriesDescribe.append(categoryCard);
});

}

function categoryPlat(plats) {
    var platsDescribe = $("menu")
    $.each(plats, function(index, platt) {
    
    var plattCard = `
    <div class="card mt-5 mb-5 ">
    <img src="${platt.image}" alt="${platt.libelle}">
    <h2 class="justify-content-center d-flex fs-4">${platt.libelle}</h2>
  </div>
    `;

    platsDescribe.append(plattCard);
});

}





})

