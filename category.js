var data;

$(document).ready(function () {

$.ajax({
    url:"ASSETS/projet.json",
    dataType:"json",
    success: function (reponseData){
        data = reponseData;
        console.log("Données chargées avec succès:", data);

        categoryFood(data.categorie);

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

})