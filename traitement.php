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

        // Validation des données (vous pouvez ajouter vos propres règles de validation ici)

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
          $mail->addAddress("client1@exemple.com", "Mr Client1");
          $mail->addAddress("client2@exemple.com");
          $mail->addReplyTo("reply@thedistrict.com","Reply");
          $mail->addCC("cc@exemple.com");
          $mail->addBCC("bcc@exemple.com");
          $mail->isHTML(true);
        //   $mail->addAttachment('/path/to/file.pdf');

        // Récupérer les informations du plat à commander depuis les paramètres GET
if (isset($_GET['id'], $_GET['libelle'], $_GET['description'], $_GET['prix'], $_GET['image'])) {
    $plat_libelle = $_GET['libelle'];
    $plat_description = $_GET['description'];
    $plat_prix = $_GET['prix'];
    $plat_image = $_GET['image'];

    // Création de la chaîne de caractères avec les informations du plat
    $plat_info = "Nom du plat: $plat_libelle\nDescription: $plat_description\nPrix: $plat_prix\n";
}

// Ensuite, dans la section où vous configurez le corps de l'e-mail...
$mail->Subject = 'Commande de plat effectuée';
$mail->Body = "Bonjour,\n\nVotre commande a été enregistrée avec succès ! Voici les détails de votre plat commandé:\n\n$plat_info\n\nMerci pour votre commande.";
  
          // Envoi de l'e-mail
          $mail->send();
          echo 'Email envoyé avec succès';
      }
  } catch (PDOException $e) {
      echo "Erreur lors de la connexion à la base de données : " . $e->getMessage();
  } catch (Exception $e) {
      echo "L'envoi de mail a échoué. L'erreur suivante s'est produite : " . $e->getMessage();
  }
            

    ?>

<div class="parallax">
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
