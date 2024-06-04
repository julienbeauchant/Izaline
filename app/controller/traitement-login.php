<?php
// Démarrer une session
session_start();

// Informations de connexion à la base de données
$serverName = "localhost";
$userName = "root";
$password = "";
$dbName = "connexion";

try {
    // Connexion à la base de données avec PDO
    $bdd = new PDO("mysql:host=$serverName;dbname=$dbName;charset=utf8", $userName, $password);
    // Définir le mode d'erreur PDO sur ERRMODE_EXCEPTION pour faciliter la gestion des erreurs
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Vérifier si le formulaire a été soumis avec la méthode POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Récupérer les valeurs de l'email et du mot de passe depuis le formulaire
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Préparer une requête SQL pour sélectionner l'utilisateur avec l'email fourni
        $stmt = $bdd->prepare("SELECT * FROM admin WHERE email = :email");
        // Binder la valeur de l'email à la requête SQL pour éviter les injections SQL
        $stmt->bindParam(':email', $email);
        // Exécuter la requête SQL
        $stmt->execute();

        // Vérifier si un utilisateur a été trouvé avec l'email fourni
        if ($stmt->rowCount() == 1) {
            // Récupérer les données de l'utilisateur sous forme de tableau associatif
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            // Vérifier si le mot de passe fourni correspond au mot de passe haché stocké dans la base de données
            if (password_verify($password, $user['password'])) {
                // Démarrer une session et enregistrer l'email de l'administrateur connecté
                $_SESSION['admin'] = $user['email'];
                // Rediriger l'utilisateur vers la page d'accueil ou une autre page
                header("Location: ../../public/index.php");
                // Arrêter l'exécution du script
                exit();
            } else {
                // Afficher un message si le mot de passe est incorrect
                echo "Mot de passe incorrect.";
            }
        } else {
            // Afficher un message si aucun utilisateur n'a été trouvé avec l'email fourni
            echo "Aucun utilisateur trouvé avec cet email.";
        }
    }
} catch (PDOException $e) {
    // Attraper les exceptions PDO et afficher le message d'erreur
    echo "Erreur : " . $e->getMessage();
}
?>

