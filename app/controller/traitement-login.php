<?php
// démarre une nouvelle session
session_start();

// informations de connexion à la base de données
$serverName = "localhost"; // Nom du serveur
$userName = "root"; // Nom d'utilisateur pour la base de données
$password = ""; // Mot de passe pour la base de données
$dbName = "connexion"; // Nom de la base de données

try {
    // connexion PDO à la base de données
    $bdd = new PDO("mysql:host=$serverName;dbname=$dbName;charset=utf8", $userName, $password);
    // exceptions PDO en cas d'erreur
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // vérifie si le formulaire a été soumis
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // récupère les données du formulaire
        // htmlspecialchars permet d'éviter les attaques XSS
        $email = htmlspecialchars($_POST['email']); 
        $password = htmlspecialchars($_POST['password']); 

        // requête SQL pour sélectionner un utilisateur avec l'email
        $sql = $bdd->prepare("SELECT * FROM admin WHERE email = :email");
        // lie la valeur de l'email à la requête préparée
        $sql->bindParam(':email', $email);
        // exécute la requête
        $sql->execute();

        // vérifie si une ligne a été trouvée, que l'utilisateur existe
        if ($sql->rowCount() == 1) {
            // récupère les données de l'utilisateur sous forme de tableau associatif, accède aux colonnes par clés nommées
            $admin = $sql->fetch(PDO::FETCH_ASSOC);
            // vérifie si le mot de passe fourni correspond au mot de passe hashé dans la bdd
            if (password_verify($password, $admin['password'])) {
                // initialise les variables de session pour l'administrateur connecté
                $_SESSION['id_admin'] = $admin['id_admin'];
                $_SESSION['admin'] = $admin['email'];
                // redirige vers la page d'accueil
                header("Location: ../../public/index.php");
                // fin du script
                exit();
            } else {
                // redirige vers la page de connexion avec une erreur si le mot de passe est incorrect
                header("Location: ../view/login.php?error=1");
                exit();
            }
        } else {
            // redirige vers la page de connexion avec une erreur si l'utilisateur n'existe pas
            header("Location: ../view/login.php?error=1");
            exit();
        }
    }
} catch (PDOException $e) {
    // Affiche un message d'erreur en cas d'exception PDO
    echo "Erreur : " . $e->getMessage();
}
?>





