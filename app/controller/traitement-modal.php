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
        $id_admin = $_SESSION['id_admin'];

        // Vérifier si les champs ne sont pas vides
        if (empty($nom) || empty($img) || empty($url)) {
            echo "Tous les champs sont requis.<br>";
            exit();
        }

        // Déplacer l'image téléchargée vers le répertoire approprié
        $target_dir = "../../public/img/img-project/";
        $target_file = $target_dir . basename($img);

        if (move_uploaded_file($_FILES["inputImgModal"]["tmp_name"], $target_file)) {
            echo "Image téléchargée avec succès.<br>"; // Debug

            // Insérer le projet personnel dans la base de données
            $stmt = $bdd->prepare("INSERT INTO projets_personnels (nom, img, url, id_admin) VALUES (:nom, :img, :url, :id_admin)");
            $stmt->bindParam(':nom', $nom);
            $stmt->bindParam(':img', $img);
            $stmt->bindParam(':url', $url);
            $stmt->bindParam(':id_admin', $id_admin);

            if ($stmt->execute()) {
                echo "Projet ajouté avec succès.<br>"; // Debug
                // Rediriger vers la page des projets personnels
                header("Location: ../../public/index.php");
                exit();
            } else {
                echo "Échec de l'insertion du projet dans la base de données.<br>";
            }
        } else {
            echo "Échec du téléchargement de l'image.<br>";
        }
    }
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>