<?php
session_start();

if (!isset($_SESSION['id_admin'])) {
    echo "Non administrateur";
    header('Location: ../../public/index.php');
    exit();
}

$serverName = "localhost";
$userName = "root";
$password = "";
$dbName = "connexion";

try {
    $bdd = new PDO("mysql:host=$serverName;dbname=$dbName;charset=utf8", $userName, $password);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        echo "Le formualire a été soumis";

        $nom = htmlspecialchars($_POST['inputNameModal']);
        $img = $_FILES['inputImgModal']['name'];
        $url = htmlspecialchars($_POST['inputUrlModal']);
        $id_admin = $_SESSION['id_admin'];

        if (empty($nom) || empty($img) || empty($url)) {
            echo "Tous les champs sont requis";
            exit();
        }

        $target_dir = "../../public/img/img-project/";
        $img = uniqid() . basename($img);
        $target_file = $target_dir . $img;

        if (move_uploaded_file($_FILES["inputImgModal"]["tmp_name"], $target_file)) {
            echo "Image téléchargée avec succès";

            $stmt = $bdd->prepare("INSERT INTO projets_personnels (nom, img, url, id_admin) VALUES (:nom, :img, :url, :id_admin)");
            $stmt->bindParam(':nom', $nom);
            $stmt->bindParam(':img', $img);
            $stmt->bindParam(':url', $url);
            $stmt->bindParam(':id_admin', $id_admin);

            if ($stmt->execute()) {
                echo "Projet ajouté avec succès";
                header("Location: ../../public/index.php");
                exit();
            } else {
                echo "Échec de l'insertion du projet dans la bdd";
            }
        } else {
            echo "Échec du téléchargement de l'image";
        }
    }
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>