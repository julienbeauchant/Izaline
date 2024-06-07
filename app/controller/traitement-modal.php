<?php
session_start();

if (!isset($_SESSION['admin'])) {
    die("Accès refusé");
}

$serverName = "localhost";
$userName = "root";
$password = "";
$dbName = "connexion";

try {
    $bdd = new PDO("mysql:host=$serverName;dbname=$dbName;charset=utf8", $userName, $password);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['inputNameModal'];
        $url = $_POST['inputUrlModal'];

        if (isset($_FILES['inputImgModal']) && $_FILES['inputImgModal']['error'] == 0) {
            $img = file_get_contents($_FILES['inputImgModal']['tmp_name']);
        } else {
            throw new Exception("Erreur lors du téléchargement de l'image");
        }

        $stmt = $bdd->prepare("INSERT INTO projets_personnels (nom, img, url) VALUES (:nom, :img, :url)");
        $stmt->bindParam(':nom', $name);
        $stmt->bindParam(':img', $img, PDO::PARAM_LOB);
        $stmt->bindParam(':url', $url);
        $stmt->execute();

        echo "Projet ajouté avec succès";
    }
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>

