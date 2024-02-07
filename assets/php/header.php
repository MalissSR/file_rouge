<!doctype html>
<html lang="fr">


<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Bootstrap demo</title>

      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
      <link rel="stylesheet" href="assets/index.css">
      <link rel="stylesheet" href="assets/categorie.css">
      <link rel="stylesheet" href="assets/plats.css">
      <link rel="stylesheet" href="assets/contact.css">

 </head>


<body>

  <nav class="navbar navbar-expand-lg col-12">

    <div class="container-fluid">

      <img src="images_the_district/logo_district/logo_transparent.png" alt="logo" class="col-1 d-none d-lg-flex">
      <img src="images_the_district/logo_district/logo_transparent.png" alt="logo" class="col-3  d-sm-flex d-md-none d-lg-none">
      <img src="images_the_district/logo_district/logo_transparent.png" alt="logo" class="col-3   d-none d-md-flex d-lg-none">

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>


          <div class="collapse navbar-collapse navbar-custom " id="navbarSupportedContent">

            <ul class="navbar-nav mb-2 mb-lg-0 col-7 d-flex justify-content-center ">

              <li class="nav-item d-flex justify-content-center mx-auto active">
                <a class="nav-link fs-5" aria-current="page" href="index.php">Accueil</a>
              </li>

              <li class="nav-item d-flex justify-content-center mx-auto ">
                <a class="nav-link fs-5" href="categorie.php">Catégorie</a>
              </li>

              <li class="nav-item d-flex justify-content-center mx-auto ">
                <a class="nav-link fs-5 " href="plat.php">Plat</a>
              </li>

              <li class="nav-item d-flex justify-content-center mx-auto ">
                <a class="nav-link fs-5 " href="contact.php">Contact</a>
              </li>

            </ul>

          </div>
          

            <form class="d-flex ms-auto col-3 d-none d-lg-flex" role="search">

              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn " type="submit">Rechercher...</button>

            </form>
        
    </div>

  </nav>