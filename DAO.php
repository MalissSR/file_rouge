
<?php

// Connexion à la base de données
function connect_to_database() {
    $host = "localhost"; // Adresse du serveur MySQL
    $dbname = "district"; // Nom de la base de données
    $username = "admin"; // Nom d'utilisateur de la base de données
    $password = "Afpa1234"; // Mot de passe de la base de données
    
    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
        // Définit le mode d'erreur de PDO sur Exception
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        die("Erreur de connexion à la base de données: " . $e->getMessage());
    }""
}


// Fonction pour exécuter une requête SQL générique et récupérer les résultats
function execute_query($query) {
    $pdo = connect_to_database();
    
    try {
        $statement = $pdo->prepare($query);
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $results;
     } 

    catch (PDOException $e) {
        die("Erreur lors de l'exécution de la requête: " . $e->getMessage());
    }
}

// Fonction pour récupérer les catégories depuis la base de données
function get_categories() {
    $query = "SELECT * FROM categorie";
    return execute_query($query);
}

// Fonction pour récupérer les plats depuis la base de données
function get_plats() {
    $query = "SELECT * FROM plat";
    return execute_query($query);
}

// Fonction pour récupérer les commandes depuis la base de données
function get_commandes() {
    $query = "SELECT * FROM commande";
    return execute_query($query);
}

// Fonction pour récupérer les utilisateurs depuis la base de données
function get_utilisateurs() {
    $query = "SELECT * FROM utilisateur";
    return execute_query($query);
}




?>