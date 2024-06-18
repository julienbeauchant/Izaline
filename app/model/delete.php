<?php
// reprend une session existante
session_start();

$serverName = "localhost";
$userName = "root";
$password = "";

// vérifie si l'administrateur est connecté avec la variable de session 'id_admin'
if (!isset($_SESSION['id_admin'])) {
    // affiche un message si l'utilisateur n'est pas un administrateur
    echo "Non administrateur";
    // redirige l'utilisateur vers la page d'accueil
    header('Location: ../../public/index.php');
    // fin du script
    exit();
}

try {
     // connexion PDO à la base de données
    $bdd = new PDO("mysql:host=$serverName;dbname=connexion;charset=utf8", $userName, $password);
     // exceptions PDO en cas d'erreur
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

     // requête SQL pour sélectionner l'image du projet personnel avec l'identifiant
    $sql = $bdd->prepare("SELECT img FROM projets_personnels WHERE id_projets_personnels = :id_projets_personnels");
    // lie la valeur de l'identifiant du projet à la requête préparée
    $sql->bindParam(':id_projets_personnels', $_GET["id_projets_personnels"]);
     // exécute la requête
    $sql->execute();
    // récupère les données du projet sous forme de tableau associatif
    $project = $sql->fetch(PDO::FETCH_ASSOC);

     // vérifie si le projet a été trouvé
    if ($project) {
         // définie le répertoire de destination pour l'image
        $target_dir = "../../public/img/img-project/";
         // chemin complet de l'ancienne image
        $oldImage = $target_dir . $project["img"];
        // vérifie si l'image existe et la supprime
        if (file_exists($oldImage)) {
            unlink($oldImage);
        }

         // requête SQL pour supprimer le projet personnel avec l'identifiant
        $sql = $bdd->prepare("DELETE FROM projets_personnels WHERE id_projets_personnels = :id_projets_personnels");
         // lie la valeur de l'identifiant du projet à la requête préparée
        $sql->bindParam(':id_projets_personnels', $_GET["id_projets_personnels"]);
         // exécute la requête préparée
        $sql->execute();

        // redirige l'utilisateur vers la page d'accueil
        header("Location: ../../public/index.php");
        // fin du script
        exit();

    } else {
        // affiche un message d'erreur si le projet n'a pas été trouvé
        echo "Projet non trouvé";
        // redirige l'utilisateur vers la page d'accueil
        header("location: ../../public/index.php");
    }

} catch (PDOException $e) {
    // affiche un message d'erreur en cas d'exception PDO
    echo "Erreur : " . $e->getMessage();
}
?>