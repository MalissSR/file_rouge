<?php

require_once('header.php')

?>



<main>

<div class="parallax">


<h1 class="mt-4 mb-4 d-flex justify-content-center">Contact Us</h1>

<form action="#" method="post" class="formcontact mx-auto w-75  mb-5 ">
    <label for="nom">Name :</label>
    <input type="text" id="nom" name="nom" class="contactinput mb-5" required>

    <label for="prenom">Nickname :</label>
    <input type="text" id="prenom" name="prenom" class="contactinput mb-5" required>

    <label for="email">E-mail :</label>
    <input type="email" id="email" name="email" class=" contactinput mb-5" required>

    <label for="telephone">Phone number :</label>
    <input type="tel" id="telephone" name="telephone" class="contactinput mb-5" required>

    <label for="demande">Question/ask :</label>
    <textarea id="demande" name="demande" rows="4" class=" contactinput mb-5" required></textarea>

    <input type="submit" value="Envoyer" id="btnsend" class="mb-4">
</form>

</div>

</main>






<?php

require_once('footer.php')

?>