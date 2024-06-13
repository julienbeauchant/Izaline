<?php

session_start();

if (!isset($_SESSION['id_admin'])) {
    echo "Non autorisé. Redirection vers l'index";
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
        echo "Formulaire soumis<br>"; // Debug

        // Récupérer les valeurs du formulaire
        $id_projets_personnels = htmlspecialchars($_POST['id_projets_personnels']);
        if (empty($id_projets_personnels)) {
            echo "Tous les champs sont requis<br>";
            exit();
        }

        // Récupérer le projet actuel
        $sql = $bdd->prepare("SELECT * FROM projets_personnels WHERE id_projets_personnels = :id_projets_personnels");
        $sql->bindParam(':id_projets_personnels', $id_projets_personnels);
        $sql->execute();
        $project = $sql->fetch(PDO::FETCH_ASSOC);
        
        if (!$project) {
            echo "Projet non trouvé.<br>";
            exit();
        }
        
        // Traitement des entrées du formulaire
        $nom = htmlspecialchars($_POST['inputNameModal']);
        $nom = empty($nom) ? $project["nom"] : $nom;
        $img = $_FILES['inputImgModal']['name'];
        $url = htmlspecialchars($_POST['inputUrlModal']);
        $url = empty($url) ? $project["url"] : $url;
        $id_admin = $_SESSION['id_admin'];

        // Gestion de l'image
        if (!empty($img)) {
            // Déplacer l'image téléchargée vers le répertoire approprié
            $target_dir = "../../public/img/img-project/";
            $img = uniqid() . basename($img);
            $target_file = $target_dir . $img;
            $uploaded = move_uploaded_file($_FILES["inputImgModal"]["tmp_name"], $target_file);

            // Supprimer l'ancienne image si elle existe
            $oldImage = $target_dir . $project["img"];
            if (file_exists($oldImage)) {
                unlink($oldImage);
            }
        } else {
            $uploaded = true;
            $img = $project["img"];
        }

        if ($uploaded) {
            echo "Image téléchargée avec succès.<br>"; // Debug

            // Mise à jour du projet personnel dans la base de données
            $sql = $bdd->prepare("UPDATE projets_personnels SET nom = :nom, img = :img, url = :url WHERE id_projets_personnels = :id_projets_personnels");
            $sql->bindParam(':nom', $nom);
            $sql->bindParam(':img', $img);
            $sql->bindParam(':url', $url);
            $sql->bindParam(':id_projets_personnels', $id_projets_personnels);
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



<!-- <?php

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
        $id_projets_personnels = htmlspecialchars($_POST['id_projets_personnels']); // Récupérer l'ID du projet à partir du formulaire
        if (empty($id_projets_personnels)) {
            echo "Tous les champs sont requis.<br>";
            exit();
        }

        $sql = $bdd->prepare("SELECT * FROM projets_personnels WHERE id_projets_personnels = :id_projets_personnels");
        $sql->bindParam(':id_projets_personnels', $id_projets_personnels);
        $sql->execute();
        $project = $sql->fetch(PDO::FETCH_ASSOC);
        
        if (!$project) {
            echo "error";
            exit();
        }
        
        $nom = htmlspecialchars($_POST['inputNameModal']);
        $nom = empty($nom)?$project["nom"]:$nom;
        $img = $_FILES['inputImgModal']['name'];
        $url = htmlspecialchars($_POST['inputUrlModal']);
        $url = empty($url)?$project["url"]:$url;
        $id_admin = $_SESSION['id_admin'];

        if(!empty($img))
        {
            // Déplacer l'image téléchargée vers le répertoire approprié
            $target_dir = "../../public/img/img-project/";
            $img = uniqid() .basename($img);
            $target_file = $target_dir . $img;
            $uploaded = move_uploaded_file($_FILES["inputImgModal"]["tmp_name"], $target_file);

            $oldImage = $target_dir . $projec["img"];
            if(file_exists($oldImage))
            {
                var_dump(unlink($oldImage));
                exit;
            }
        }else{
            $uploaded = true;
        }

        if ($uploaded) {
            echo "Image téléchargée avec succès.<br>"; // Debug
            $img = empty($img)?$project["img"]:$img;


            // Mise à jour du projet personnel dans la base de données
            $sql = $bdd->prepare("UPDATE projets_personnels SET nom = :nom, img = :img, url = :url WHERE id_projets_personnels = :id_projets_personnels");
            $sql->bindParam(':nom', $nom);
            $sql->bindParam(':img', $img);
            $sql->bindParam(':url', $url);
            $sql->bindParam(':id_projets_personnels', $id_projets_personnels);
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
?> -->