<?php

session_start();

$serverName = "localhost";
$userName = "root";
$password = "";

if (!isset($_SESSION['id_admin'])) {
    echo "Non autorisé. Redirection vers l'index.";
    header('Location: ../../public/index.php');
    exit();
}

try {
    $bdd = new PDO("mysql: host=$serverName; dbname=connexion; charset=utf8", $userName, $password);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // ERRMODE pour nous donner le type d'erreur en cas d'echec a la connexion 

    $sql = $bdd->prepare("DELETE FROM projets_personnels WHERE id_projets_personnels = :id_projets_personnels");
    $sql->bindparam("id_projets_personnels", $_GET["id_projets_personnels"]);
    $sql->execute();
    header("location: ../../public/index.php");

} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>    