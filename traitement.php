<?php
// Inclusion des fichiers requis
require_once('DAO.php');
require_once('assets/php/header.php');
require_once ('vendor/autoload.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Connexion à la base de données (à adapter selon votre configuration)
try {
    $pdo = new PDO("mysql:host=localhost;dbname=district", "admin", "Afpa1234");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

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
            // Validation supplémentaire des données avec des patterns
            if (preg_match('/^[A-Za-zÀ-ÖØ-öø-ÿ\s-]{2,}$/', $nom) &&
                preg_match('/^[A-Za-zÀ-ÖØ-öø-ÿ\s-]{2,}$/', $prenom) &&
                preg_match('/^[0-9]{10}$/', $telephone) &&
                filter_var($email, FILTER_VALIDATE_EMAIL)) {
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

                // Création de l'objet PHPMailer
                $mail = new PHPMailer(true);

                // Configuration de PHPMailer pour utiliser MailHog
                $mail->isSMTP();
                $mail->Host = 'localhost';
                $mail->Port = 1025;
                $mail->SMTPAuth = false; // Désactivation de l'authentification SMTP
                $mail->setFrom('from@thedistrict.com', 'The District Company');
                $mail->addAddress($email, "$prenom $nom");
                $mail->isHTML(true);

                // Récupérer les informations du plat à commander depuis les paramètres GET
                if (isset($_GET['id'], $_GET['libelle'], $_GET['description'], $_GET['prix'], $_GET['image'])) {
                    $plat_libelle = $_GET['libelle'];
                    $plat_description = $_GET['description'];
                    $plat_prix = $_GET['prix'];
                    $plat_image = $_GET['image'];

                    // Création de la chaîne de caractères avec les informations du plat
                    $plat_info = "Nom du plat: $plat_libelle\nDescription: $plat_description\nPrix: $plat_prix\n";

                    
                    // Envoi de l'e-mail de confirmation
                    $mail->Subject = mb_encode_mimeheader('Commande de plat effectuée', 'UTF-8');
                    $mail->Body = "Bonjour $prenom $nom,<br><br>Votre commande a été enregistrée avec succès ! Voici les détails de votre plat commandé:<br><br>$plat_info<br><br>Merci pour votre commande.";

                    // Nettoyer le sujet du mail
                    $mail->Subject = htmlspecialchars($mail->Subject, ENT_QUOTES, 'UTF-8');
                    $mail->send();
                    echo 'Email envoyé avec succès';
                } else {
                    echo "Erreur: Informations sur le plat manquantes.";
                }
            } else {
                echo "Erreur: Veuillez saisir des informations valides.";
            }
        } else {
            echo "Erreur: Veuillez remplir tous les champs du formulaire.";
        }
    }
} catch (PDOException $e) {
    echo "Erreur lors de la connexion à la base de données : " . $e->getMessage();
} catch (Exception $e) {
    echo "L'envoi de mail a échoué. L'erreur suivante s'est produite : " . $e->getMessage();
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

<form id="commandeForm" method="post" action="traitement.php">
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
require_once('assets/php/footer.php');
?>
