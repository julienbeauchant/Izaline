<?php

session_start();

if (!isset($_SESSION['id_admin'])) {
    echo "Non autorisé. Redirection vers l'index.";
    header('Location: ../../public/index.php');
    exit();
}

// Informations de connexion à la base de données
$serverName = "localhost";
$userName = "root";
$password = "";
$dbName = "connexion";

try {
    // Connexion à la base de données avec PDO
    $bdd = new PDO("mysql:host=$serverName;dbname=$dbName;charset=utf8", $userName, $password);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        echo "Formulaire soumis.<br>"; // Debug

        // Récupérer les valeurs du formulaire
        $nom = htmlspecialchars($_POST['inputNameModal']);
        $img = $_FILES['inputImgModal']['name'];
        $url = htmlspecialchars($_POST['inputUrlModal']);
        $id_projets_personnels = htmlspecialchars($_POST['id_projets_personnels']); // Récupérer l'ID du projet à partir du formulaire
        $id_admin = $_SESSION['id_admin'];

        echo "Nom : $nom<br>"; // Debug
        echo "Image : $img<br>"; // Debug
        echo "URL : $url<br>"; // Debug
        echo "Admin ID : $id_admin<br>"; // Debug
        echo "Projet ID : $id_projets_personnels<br>"; // Debug

        // Vérifier si les champs ne sont pas vides
        if (empty($nom) || empty($img) || empty($url) || empty($id_projets_personnels)) {
            echo "Tous les champs sont requis.<br>";
            exit();
        }

        // Déplacer l'image téléchargée vers le répertoire approprié
        $target_dir = "../../public/img/img-project/";
        $target_file = $target_dir . basename($img);

        if (move_uploaded_file($_FILES["inputImgModal"]["tmp_name"], $target_file)) {
            echo "Image téléchargée avec succès.<br>"; // Debug

            // Mise à jour du projet personnel dans la base de données
            $sql = $bdd->prepare("UPDATE projets_personnels SET nom = :nom, img = :img, url = :url WHERE id_projets_personnels = :id_projets_personnels");
            $sql->bindParam(':nom', $nom);
            $sql->bindParam(':img', $img);
            $sql->bindParam(':url', $url);
            $sql->bindParam(':id_projets_personnels', $id_projets_personnels);
            $sql->bindparam("id_projets_personnels", $_GET["id_projets_personnels"]);

            if ($sql->execute()) {
                echo "Projet mis à jour avec succès.<br>"; // Debug
                // Rediriger vers la page des projets personnels
                header("Location: ../../public/index.php");
                exit();
            } else {
                echo "Échec de la mise à jour du projet dans la base de données.<br>";
            }
        } else {
            echo "Échec du téléchargement de l'image.<br>";
        }
    }
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>