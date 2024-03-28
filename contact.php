

<?php

require_once('assets/php/header.php')

?>



<main>

    <div class="parallax">


        <h1 class="mt-4 mb-4 d-flex justify-content-center">Contactez-nous</h1>

            <form action="traitement_contact.php" method="post" class="formcontact mx-auto w-75  mb-5 ">
                <label for="nom">Nom :</label>
                <input type="text" id="nom" name="nom" class="contactinput mb-5" required>

                <label for="prenom">Prénom :</label>
                <input type="text" id="prenom" name="prenom" class="contactinput mb-5" required>

                <label for="email">E-mail :</label>
                <input type="email" id="email" name="email" class=" contactinput mb-5" required>

                <label for="telephone">Téléphone :</label>
                <input type="tel" id="telephone" name="telephone" class="contactinput mb-5" required>

                <label for="demande">Demande :</label>
                <textarea id="demande" name="demande" rows="4" class=" contactinput mb-5" required></textarea>

                <button type="submit">Envoyer</button>
            </form>

            <div id="messageConfirmation"></div>

    </div>

</main>




<?php

require_once('assets/php/footer.php')

?>