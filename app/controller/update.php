<?php
// reprend une session existante
session_start();

// vérifie si l'administrateur est connecté avec la variable de session 'id_admin'
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

        // récupère l'identifiant du projet personnel à mettre à jour
        // htmlspecialchars permet d'éviter les attaques XSS
        $id_projets_personnels = htmlspecialchars($_POST['id_projets_personnels']);
        // Vérifie si l'identifiant du projet est fourni
        // empty pour vérifier si une variable est vide
        if (empty($id_projets_personnels)) {
            // fin du script si l'identifiant est vide
            exit();
        }

        // requête SQL pour sélectionner le projet personnel avec l'identifiant
        $sql = $bdd->prepare("SELECT * FROM projets_personnels WHERE id_projets_personnels = :id_projets_personnels");
        // lie la valeur de l'identifiant à la requête préparée
        $sql->bindParam(':id_projets_personnels', $id_projets_personnels);
        // exécute la requête
        $sql->execute();
        // récupère les données du projet sous forme de tableau associatif
        $project = $sql->fetch(PDO::FETCH_ASSOC);
        
        // vérifie si le projet a été trouvé
        if (!$project) {
            // affiche un message d'erreur si le projet n'a pas été trouvé
            echo "Projet non trouvé";
            // fin du script
            exit();
        }
        
         // Récupère les données du formulaire
        $nom = htmlspecialchars($_POST['inputNameModal']);
        // utilise le nom existant si le champ nom est vide
        $nom = empty($nom) ? $project["nom"] : $nom;
        $img = $_FILES['inputImgModal']['name'];
        $url = htmlspecialchars($_POST['inputUrlModal']);
        // utilise l'URL existante si le champ URL est vide
        $url = empty($url) ? $project["url"] : $url;
        $id_admin = $_SESSION['id_admin'];

        // vérifie si une nouvelle image a été téléchargée
        if (!empty($img)) {
            // définie le répertoire de destination pour l'image téléchargée
            $target_dir = "../../public/img/img-project/";
             // génère un identifiant unique pour l'image + son nom
            $img = uniqid() . basename($img);
            // définie le chemin complet du fichier
            $target_file = $target_dir . $img;
            // déplace le fichier téléchargé vers le répertoire
            $uploaded = move_uploaded_file($_FILES["inputImgModal"]["tmp_name"], $target_file);

             // supprime l'ancienne image si elle existe
            $oldImage = $target_dir . $project["img"];
            if (file_exists($oldImage)) {
                unlink($oldImage);
            }
        } else {
            // si aucune nouvelle image n'a été téléchargée, utilise l'image existante
            $uploaded = true;
            $img = $project["img"];
        }

        // vérifie si l'image a été téléchargée
        if ($uploaded) {
             // affiche un message indiquant que l'image a été téléchargée
            echo "Image téléchargée avec succès";

            // requête SQL pour mettre à jour le projet personnel avec les nouvelles données
            $sql = $bdd->prepare("UPDATE projets_personnels SET nom = :nom, img = :img, url = :url WHERE id_projets_personnels = :id_projets_personnels");
               // lie les valeurs des paramètres à la requête préparée
            $sql->bindParam(':nom', $nom);
            $sql->bindParam(':img', $img);
            $sql->bindParam(':url', $url);
            $sql->bindParam(':id_projets_personnels', $id_projets_personnels);
             // exécute la requête
            if ($sql->execute()) {
                // affiche un message sile projet a été mis à jour
                echo "Projet mis à jour";
                 // redirige l'utilisateur vers la page d'accueil
                header("Location: ../../public/index.php");
                // fin du script
                exit();
            } else {
                 // affiche un message d'erreur si la mise à jour du projet échoue
                echo "Échec de la mise à jour du projet dans la base de données";
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