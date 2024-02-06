var data;

$(document).ready(function () {      //Affichage écran ( DOM )//

$.ajax({
    url:"assets/json/projet.json",
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
    <a href="dishes_category.php?id=${category.id_categorie}">
    <img src="${category.image}" alt="${category.libelle}">
    </a>
    <h2 class="justify-content-center d-flex fs-4">${category.libelle}</h2>
  </div>
    `;

    categoriesDescribe.append(categoryCard);
});

}


 

function categoryPlat(plats) {
    var platsDescribe = $("#menu")
    $.each(plats, function(index, platt) {
    
    var plattCard = `

 <div class="row">
    <div class="mt-5 row  justify-content-center">

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
            <a href="#"><button class="btn " type="submit">Commander</button></a>
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



const queryString = window.location.search;
const urlParams = new URLSearchParams(queryString);
const categoryId = urlParams.get('id');
console.log(categoryId);
const plats_cat = data.plat.filter(plat => plat.id_categorie == categoryId);



var categoriesDescribe = $(".dishesCat")

plats_cat.forEach(plat=>{



    
    var dishesCat =`
    

    <div class="row">
    <div class="mt-5 row  justify-content-center">

    <div class="card mb-3 dishescard">
      <div class="row g-0">
        <div class="col-md-4">
          <img src="${plat.image}" class="img-fluid rounded-start" alt="${plat.libelle}">
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <h5 class="card-title">${plat.libelle}</h5>
            <p class="card-text">${plat.description}</p>
            <p class="card-text dishesprice">${plat.prix}$</p>
            <a href="#"><button class="btn " type="submit">Commander</button></a>
          </div>
        </div>
      </div>
    </div>
    </div>
    </div>
  

    `;

    categoriesDescribe.append(dishesCat);

})


})



