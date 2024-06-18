<?php
// reprend une session existante
session_start();

// vérifie si l'administrateur est connecté avec la variable de session id_admin
if (!isset($_SESSION['id_admin'])) {
    // affiche un message si l'utilisateur n'est pas un administrateur
    echo "Non administrateur";
    // redirige l'utilisateur vers la page d'accueil
    header('Location: ../../public/index.php');
    // fin du script
    exit();
}

$serverName = "localhost";
$userName = "root";
$password = "";
$dbName = "connexion";

try {
    // connexion PDO à la base de données
    $bdd = new PDO("mysql:host=$serverName;dbname=$dbName;charset=utf8", $userName, $password);
    // exceptions PDO en cas d'erreur
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // vérifie si le formulaire a été soumis
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // affiche un message si le formulaire a été soumis
        echo "Formulaire soumis";

        // récupère les données du formulaire
        // htmlspecialchars permet d'éviter les attaques XSS
        $nom = htmlspecialchars($_POST['inputNameModal']);
        $img = $_FILES['inputImgModal']['name']; // récupère le nom du fichier téléchargé
        $url = htmlspecialchars($_POST['inputUrlModal']);
        $id_admin = $_SESSION['id_admin'];

        // vérifie si tous les champs requis sont remplis
        // empty pour vérifier si une variable est vide
        if (empty($nom) || empty($img) || empty($url)) {
            // Affiche un message d'erreur si un champ est vide
            echo "Tous les champs sont requis";
            // Arrête l'exécution du script
            exit();
        }

        // définie le répertoire de destination pour l'image téléchargée
        $target_dir = "../../public/img/img-project/";
        // génère un identifiant unique pour l'image + son nom
        $img = uniqid() . basename($img);
        // définie le chemin complet du fichier en concaténant le répertoire et le nom de l'image
        $target_file = $target_dir . $img;

        // déplace le fichier téléchargé vers le répertoire
        if (move_uploaded_file($_FILES["inputImgModal"]["tmp_name"], $target_file)) {
            // affiche un message indiquant que l'image a été téléchargée
            echo "Image téléchargée avec succès";

            // requête SQL pour insérer un nouveau projet dans la base de données
            $sql = $bdd->prepare("INSERT INTO projets_personnels (nom, img, url, id_admin) VALUES (:nom, :img, :url, :id_admin)");
            // lie les valeurs des paramètres à la requête préparée
            $sql->bindParam(':nom', $nom);
            $sql->bindParam(':img', $img);
            $sql->bindParam(':url', $url);
            $sql->bindParam(':id_admin', $id_admin);

            // exécute la requête
            if ($sql->execute()) {
                // affiche un message si le projet a été ajouté avec succès
                echo "Projet ajouté avec succès";
                // redirige l'utilisateur vers la page d'accueil
                header("Location: ../../public/index.php");
                // fin du script
                exit();
            } else {
                // affiche un message d'erreur si le projet n'a pas été inséré dans la base de données
                echo "Échec de l'insertion du projet dans la bdd";
            }
        } else {
            // affiche un message d'erreur si le téléchargement de l'image échoue
            echo "Échec du téléchargement de l'image";
        }
    }
} catch (PDOException $e) {
    // Affiche un message d'erreur en cas d'exception PDO
    echo "Erreur : " . $e->getMessage();
}
?>