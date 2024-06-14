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
        echo "Formulaire soumis";

        $id_projets_personnels = htmlspecialchars($_POST['id_projets_personnels']);
        if (empty($id_projets_personnels)) {
            exit();
        }

        $sql = $bdd->prepare("SELECT * FROM projets_personnels WHERE id_projets_personnels = :id_projets_personnels");
        $sql->bindParam(':id_projets_personnels', $id_projets_personnels);
        $sql->execute();
        $project = $sql->fetch(PDO::FETCH_ASSOC);
        
        if (!$project) {
            echo "Projet non trouvé";
            exit();
        }
        
        $nom = htmlspecialchars($_POST['inputNameModal']);
        $nom = empty($nom) ? $project["nom"] : $nom;
        $img = $_FILES['inputImgModal']['name'];
        $url = htmlspecialchars($_POST['inputUrlModal']);
        $url = empty($url) ? $project["url"] : $url;
        $id_admin = $_SESSION['id_admin'];

        if (!empty($img)) {
            $target_dir = "../../public/img/img-project/";
            $img = uniqid() . basename($img);
            $target_file = $target_dir . $img;
            $uploaded = move_uploaded_file($_FILES["inputImgModal"]["tmp_name"], $target_file);

            $oldImage = $target_dir . $project["img"];
            if (file_exists($oldImage)) {
                unlink($oldImage);
            }
        } else {
            $uploaded = true;
            $img = $project["img"];
        }

        if ($uploaded) {
            echo "Image téléchargée avec succès";

            $sql = $bdd->prepare("UPDATE projets_personnels SET nom = :nom, img = :img, url = :url WHERE id_projets_personnels = :id_projets_personnels");
            $sql->bindParam(':nom', $nom);
            $sql->bindParam(':img', $img);
            $sql->bindParam(':url', $url);
            $sql->bindParam(':id_projets_personnels', $id_projets_personnels);
            if ($sql->execute()) {
                echo "Projet mis à jour";
                header("Location: ../../public/index.php");
                exit();
            } else {
                echo "Échec de la mise à jour du projet dans la base de données";
            }
        } else {
            echo "Échec du téléchargement de l'image";
        }
    }
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>