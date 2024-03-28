<?php
require_once('DAO.php');
?>

<?php
require_once('assets/php/header.php')
?>



<main>

    <div class="parallax">


    <div class="container">
        <h1>Liste des plats</h1>
        <div class="row">
            <?php
            // Récupère les plats
            $plats = get_plats();
            
            // Parcourt les plats et affiche-les
            foreach ($plats as $plat) {
                echo '<div class="col-md-4 mb-5">';
                echo '<div class="card h-100">';
                echo "<img src='" . $plat['image'] . "' alt='" . $plat['libelle'] . "' class='card-image'>"; // Afficher l'image du plat
                echo '<div class="card-body">';
                echo '<h5 class="card-title">' . $plat["libelle"] . '</h5>';
                echo '<p class="card-text">' . $plat["description"] . '</p>';
                echo '<p class="card-text">Prix : ' . $plat["prix"] . '</p>';
                echo '</div>';
                echo '<a href="commande.php?id=' . $plat["id"] . '&libelle=' . urlencode($plat["libelle"]) . '&description=' . urlencode($plat["description"]) . '&prix=' . $plat["prix"] . '&image=' . urlencode($plat["image"]) . '" class="btn btn-primary">Passer une commande</a>';
                echo '</div>';
                echo '</div>';
            }
            ?>
        </div>
    </div>


    </div>

</main>





<?php
require_once('assets/php/footer.php')
?>