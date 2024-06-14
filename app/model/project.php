<?php
session_start();

$serverName = "localhost";
$userName = "root";
$password = "";
$dbName = "connexion";

try {
    $bdd = new PDO("mysql:host=$serverName;dbname=$dbName;charset=utf8", $userName, $password);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = $bdd->prepare("SELECT * FROM projets_personnels order by id_projets_personnels desc");
    $sql->execute();
    $project = $sql->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>