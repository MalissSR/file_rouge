<?php
require_once('DAO.php');
require_once('assets/php/header.php');

// Vérifier si l'id de la catégorie est passé dans le lien depuis la page categorie.php
$id_categorie = isset($_GET['id_categorie']) ? $_GET['id_categorie'] : null;

// Vérifier si l'id de la catégorie est valide
if ($id_categorie === null) {
    // Rediriger vers la page des catégories si l'id de la catégorie est manquant
    header('Location: categories.php');
    exit();
}

// Fonction pour récupérer les plats d'une catégorie spécifique depuis la base de données
function get_plats_by_categorie($id_categorie) {
    // Connexion à la base de données
    $connexion = new PDO('mysql:host=localhost;dbname=district', 'admin', 'Afpa1234');

    // Préparation de la requête
    $query = $connexion->prepare("SELECT * FROM plat WHERE id_categorie = :id_categorie AND active = 'yes'");

    // Liaison des paramètres
    $query->bindParam(':id_categorie', $id_categorie, PDO::PARAM_INT);

    // Exécution de la requête
    $query->execute();

    // Récupération des résultats
    return $query->fetchAll(PDO::FETCH_ASSOC);
}



// Récupérer les plats de la catégorie spécifique
$plats = get_plats_by_categorie($id_categorie);
?>

<article>
    <div class="parallax">
    <div class="container mt-4">
        <h1 class="mb-5 d-flex justify-content-center ">Plats de la catégorie</h1>
        <div class="row">
            <?php
            // Afficher les plats de la catégorie
            foreach ($plats as $plat) {
                echo '<div class="col-md-4 mb-5">';
                echo '<div class="card h-100">';
                echo "<img src='" . $plat['image'] . "' alt='" . $plat['libelle'] . "' class='card-image'>"; // Afficher l'image
                echo '<div class="card-body">';
                echo '<h5 class="card-title">' . $plat["libelle"] . '</h5>';
                echo '<p class="card-text">' . $plat["description"] . '</p>';
                echo '<p class="card-text">Prix: ' . $plat["prix"] . '€</p>';
                echo '</div>';
                echo '<a href="commande.php?id=' . $plat["id"] . '&libelle=' . urlencode($plat["libelle"]) . '&description=' . urlencode($plat["description"]) . '&prix=' . $plat["prix"] . '&image=' . urlencode($plat["image"]) . '" class="btn btn-primary">Passer une commande</a>';
                echo '</div>';
                echo '</div>';
            }
            ?>
        </div>
    </div>
        </div>
</article>

<?php
require_once('assets/php/footer.php');
?>