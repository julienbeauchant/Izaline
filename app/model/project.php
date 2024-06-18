<?php
// reprend une session existante
session_start();

$serverName = "localhost";
$userName = "root";
$password = "";
$dbName = "connexion";

try {
    // connexion PDO à la base de données
    $bdd = new PDO("mysql:host=$serverName;dbname=$dbName;charset=utf8", $userName, $password);
     // exceptions PDO en cas d'erreur
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // requête SQL pour sélectionner tous les projets personnels et les trier par ordre décroissant
    $sql = $bdd->prepare("SELECT * FROM projets_personnels ORDER BY id_projets_personnels DESC");
    // exécute la requête préparée
    $sql->execute();
    // récupère tous les données sous forme de tableau associatif
    $project = $sql->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    // affiche un message d'erreur en cas d'exception PDO
    echo "Erreur : " . $e->getMessage();
}
?>