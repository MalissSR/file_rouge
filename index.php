<?php
require_once('DAO.php');
?>







<?php
require_once('assets/php/header.php')
?>

<div class="parallax">



<!-- AFFICHAGE DES PLATS LES PLUS POPULAIRES -->


    <?php
// Fonction pour récupérer les catégories les plus populaires basées sur les plats achetés
function get_popular_categories($limit = null) {
  $pdo = connect_to_database();
  
  try {
      $query = "SELECT c.image,c.libelle, COUNT(p.id) AS total_plats
                FROM categorie c
                INNER JOIN plat p ON c.id = p.id_categorie
                INNER JOIN commande cp ON p.id = cp.id_plat
                GROUP BY c.id
                ORDER BY total_plats DESC";

if ($limit !== null) {
  $query .= " LIMIT :limit";
}

$statement = $pdo->prepare($query);

if ($limit !== null) {
  $statement->bindValue(':limit', $limit, PDO::PARAM_INT);
}

$statement->execute();
$results = $statement->fetchAll(PDO::FETCH_ASSOC);
return $results;
} catch (PDOException $e) {
die("Erreur lors de la récupération des catégories populaires: " . $e->getMessage());
}
}

// Appeler la fonction get_popular_categories() pour récupérer toutes les catégories populaires
$popular_categories = get_popular_categories();

// Limiter le nombre de catégories à afficher à 6
$categories_populaires = array_slice($popular_categories, 0, 6);

// Structure HTML pour afficher les cartes des catégories populaires
echo "<h2 class='mt-5 mb-2 d-flex justify-content-center' id='popular-h2'>Catégories les plus populaires :</h2>";
echo "<div class='card-container'>"; // Conteneur pour les cartes

// Parcourir les résultats et afficher une carte pour chaque catégorie populaire
foreach ($categories_populaires as $categorie) {


    

    echo "<div class='card'>";

    echo "<img src='" . $categorie['image'] . "' alt='" . $categorie['libelle'] . "' class='card-image'>"; // Afficher l'image
    echo "<div class='card-body'>";
    echo "<h3 class='card-title d-flex justify-content-center' id='popular-title'>" . $categorie['libelle'] . "</h3>";
    echo "</div>";
    echo "</div>";
}

echo "</div>"; // Fin du conteneur pour les cartes

?>


<!-- AFFICHAGE DES PLATS LES PLUS VENDUS -->
<?php
// Fonction pour récupérer les plats les plus vendus
function get_popular_plats($limit = 3) {
    $pdo = connect_to_database();
  
    try {
        $query = "SELECT p.*, SUM(cp.quantite) AS total_plats_vendus
                    FROM plat p
                    INNER JOIN commande cp ON p.id = cp.id_plat
                    WHERE cp.etat != 'Annulée'
                    GROUP BY p.id
                    ORDER BY total_plats_vendus DESC
                    LIMIT :limit";
        
        $statement = $pdo->prepare($query);
        $statement->bindValue(':limit', $limit, PDO::PARAM_INT);
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    } catch (PDOException $e) {
        die("Erreur lors de la récupération des plats les plus vendus: " . $e->getMessage());
    }
}


// Appeler la fonction get_popular_plats() pour récupérer les plats les plus vendus
$popular_plats = get_popular_plats();

// Structure HTML pour afficher les cartes des plats les plus vendus
echo "<h2 class='mt-5 mb-2 d-flex justify-content-center' id='popular-h2'>BEST SELLER :</h2>";
echo "<div class='card-container'>"; // Conteneur pour les cartes

// Parcourir les résultats et afficher une carte pour chaque plat le plus vendu
foreach ($popular_plats as $plat) {

    echo "<div class='card'>";
    echo "<img src='" . $plat['image'] . "' alt='" . $plat['libelle'] . "' class='card-image'>"; // Afficher l'image du plat
    echo "<div class='card-body'>";
    echo "<h3 class='card-title d-flex justify-content-center' id='popular-title'>" . $plat['libelle'] . "</h3>";
    echo "</div>";
    echo '<a href="commande.php?id=' . $plat["id"] . '&libelle=' . urlencode($plat["libelle"]) . '&description=' . urlencode($plat["description"]) . '&prix=' . $plat["prix"] . '&image=' . urlencode($plat["image"]) . '" class="btn btn-primary">Passer une commande</a>';
    echo "</div>";
}

echo "</div>"; // Fin du conteneur pour les cartes

?>


</div>

<?php
require_once('assets/php/footer.php')
?>

