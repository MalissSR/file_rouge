<?php
require_once('assets/php/header.php')
?>






      <main>
      <div class="parallax">
        <h1 class="mt-4 mb-4 d-flex justify-content-center">Information de commande</h1>

        <form action="#" method="post" class="formcommande mx-auto w-75 mb-5" id="commandeForm">
            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" class="contactinput ">
            <div class="erreur-message mb-5" id="erreur-nom"></div>

            <label for="prenom">Prénom :</label>
            <input type="text" id="prenom" name="prenom" class="contactinput ">
            <div class="erreur-message mb-5" id="erreur-prenom"></div>

            <label for="telephone">Téléphone :</label>
            <input type="tel" id="telephone" name="telephone" class="contactinput ">
            <div class="erreur-message mb-5" id="erreur-telephone"></div>

            <label for="adresse">Adresse :</label>
            <textarea id="adresse" name="adresse" rows="4" class="contactinput "></textarea>
            <div class="erreur-message mb-5" id="erreur-adresse"></div>

            <input type="submit" value="Envoyer" id="btnsend" class="mb-4">
        </form>
    </div>
    </main>
    







   <?php
   require_once('assets/php/footer.php')
   ?>