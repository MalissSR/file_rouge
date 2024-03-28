<?php
require_once('DAO.php');
?>


<?php
require_once('assets/php/header.php')

?>



    <article>



        <div class="parallax">

        <?php
        
        // Fonction pour récupérer les catégories actives depuis la base de données
    function get_active_categories() {
    $query = "SELECT * FROM categorie WHERE active = 'yes'";
    return execute_query($query);
    }

        
        ?>

<div class="container mt-4">
        <h1 class="mb-5 d-flex justify-content-center ">Liste des catégories</h1>
        <div class="row">
            <?php
            // Récupère les catégories actives
            $categories = get_active_categories();
            
            // Parcourt les catégories et affiche-les sous forme de cartes
            foreach ($categories as $categorie) {
                echo '<div class="col-md-4 mb-5">';
                echo '<div class="card">';
                echo "<img src='" . $categorie['image'] . "' alt='" . $categorie['libelle'] . "' class='card-image'>"; // Afficher l'image
                echo '<div class="card-body">';
                echo '<h5 class="card-title title-categorie">' . $categorie["libelle"] . '</h5>';
                echo '</div>';
                echo '<a href="plats_par_categorie.php?id_categorie=' . $categorie['id'] . '" class="btn btn-primary btncategorie mb-2">Découvrir</a>';
                echo '</div>';
                echo '</div>';
            }
            ?>
        </div>
    </div>
            
            </div>

       
        </div>


    </article>

    

    <?php
    require_once('assets/php/footer.php')
    
    
    ?>



























