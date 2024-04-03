<?php
require_once('DAO.php');
?>


<?php
require_once('assets/php/header.php')
?>




<?php
// Connexion à la base de données (à adapter selon votre configuration)
try {
    $pdo = new PDO("mysql:host=localhost;dbname=district", "admin", "Afpa1234");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Vérifier si la table 'commandes' existe
    $stmt = $pdo->query("SHOW TABLES LIKE 'commandes'");
    $tableExists = $stmt->rowCount() > 0;

    // Si la table 'commandes' n'existe pas, la créer
    if (!$tableExists) {
        $pdo->exec("CREATE TABLE commandes (
            id INT AUTO_INCREMENT PRIMARY KEY,
            nom VARCHAR(255) NOT NULL,
            prenom VARCHAR(255) NOT NULL,
            telephone VARCHAR(20) NOT NULL,
            adresse TEXT NOT NULL,
            email VARCHAR(255) NOT NULL,
            date_commande TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )");
        echo "La table 'commandes' a été créée avec succès !<br>";
    }

    // Vérifier si le formulaire a été soumis
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Récupérer les données du formulaire
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $telephone = $_POST['telephone'];
        $adresse = $_POST['adresse'];
        $email = $_POST['email'];

        // Validation des données
        if (!empty($nom) && !empty($prenom) && !empty($telephone) && !empty($adresse) && !empty($email)) {
            // Validation supplémentaire du numéro de téléphone et de l'email
            if (preg_match('/^[A-Za-zÀ-ÖØ-öø-ÿ\s-]{2,}$/', $nom) && preg_match('/^[A-Za-zÀ-ÖØ-öø-ÿ\s-]{2,}$/', $prenom) && preg_match('/^[0-9]{10}$/', $telephone) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
                // Préparation de la requête d'insertion
                $stmt = $pdo->prepare("INSERT INTO commandes (nom, prenom, telephone, adresse, email) VALUES (:nom, :prenom, :telephone, :adresse, :email)");

                // Liaison des paramètres
                $stmt->bindParam(':nom', $nom);
                $stmt->bindParam(':prenom', $prenom);
                $stmt->bindParam(':telephone', $telephone);
                $stmt->bindParam(':adresse', $adresse);
                $stmt->bindParam(':email', $email);

                // Exécution de la requête
                $stmt->execute();

                echo "Votre commande a été enregistrée avec succès !";
            } else {
                echo "Veuillez saisir des informations valides.";
            }
        } else {
            echo "Veuillez remplir tous les champs du formulaire.";
        }
    }
} catch (PDOException $e) {
    echo "Erreur lors de la connexion à la base de données : " . $e->getMessage();
}

if (isset($_GET['id'], $_GET['libelle'], $_GET['description'], $_GET['prix'], $_GET['image'])) {
    // Récupérer les informations du plat à commander depuis les paramètres GET
    $plat_id = $_GET['id'];
    $plat_libelle = $_GET['libelle'];
    $plat_description = $_GET['description'];
    $plat_prix = $_GET['prix'];
    $plat_image = $_GET['image'];
}
?>

<div class="parallax">

<div class="container">
        <div class="card mb-3">
            <img src="<?php echo $plat_image; ?>" class="card-img-top" alt="<?php echo $plat_libelle; ?>">
            <div class="card-body">
                <h5 class="card-title"><?php echo $plat_libelle; ?></h5>
                <p class="card-text"><?php echo $plat_description; ?></p>
                <p class="card-text">Prix : <?php echo $plat_prix; ?></p>
                </div>
</div>

        <h2>Formulaire de Commande</h2>
        <form id="commandeForm" method="post" action="traitement.php?id=<?php echo $plat_id; ?>&libelle=<?php echo $plat_libelle; ?>&description=<?php echo $plat_description; ?>&prix=<?php echo $plat_prix; ?>&image=<?php echo $plat_image; ?>">
            <label for="nom">Nom :</label><br>
            <input type="text" id="nom" name="nom" required><br>
            <span id="erreur-nom"></span><br>

            <label for="prenom">Prénom :</label><br>
            <input type="text" id="prenom" name="prenom" required><br>
            <span id="erreur-prenom"></span><br>

            <label for="telephone">Téléphone :</label><br>
            <input type="text" id="telephone" name="telephone" required><br>
            <span id="erreur-telephone"></span><br>

            <label for="adresse">Adresse :</label><br>
            <textarea id="adresse" name="adresse" rows="4" required></textarea><br>
            <span id="erreur-adresse"></span><br>

            <label for="email">Adresse e-mail :</label><br>
            <input type="email" id="email" name="email" required><br>
            <span id="erreur-email"></span><br>

            <input type="submit" value="Valider la commande">
        </form>
</div>
   <?php
   require_once('assets/php/footer.php')
   ?>