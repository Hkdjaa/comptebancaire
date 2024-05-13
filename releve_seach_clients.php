<?php
require_once 'connexion.php'; // Inclure le fichier de connexion à la base de données

// Vérifier si le texte de recherche est passé en paramètre
if (isset($_GET['search'])) {
    $searchText = $_GET['search'];

    // Requête SQL pour rechercher les clients correspondants
    $sql = "SELECT * FROM Client WHERE Nom_client LIKE :search OR Prenom_client LIKE :search";
    $stmt = $connect->prepare($sql);
    $searchText = "%$searchText%"; // Ajouter des wildcards pour rechercher partiellement
    $stmt->bindParam(':search', $searchText);
    $stmt->execute();
    $clients = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Renvoyer les résultats au format JSON
    echo json_encode($clients);
} else {
    echo "Texte de recherche non spécifié.";
}
?>
