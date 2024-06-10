<?php
session_start();

// if (!isset($_SESSION['id_admin'])) {
//     echo "Non autorisé. Redirection vers l'index.";
//     header('Location: ../../public/index.php');
//     exit();
// }

// Informations de connexion à la base de données
$serverName = "localhost";
$userName = "root";
$password = "";
$dbName = "connexion";

try {
    // Connexion à la base de données avec PDO
    $bdd = new PDO("mysql:host=$serverName;dbname=$dbName;charset=utf8", $userName, $password);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = $bdd->prepare("SELECT * FROM projets_personnels order by id_projets_personnels desc");
    $sql->execute();
    $project = $sql->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>