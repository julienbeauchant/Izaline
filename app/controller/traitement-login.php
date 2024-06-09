<?php
session_start();

// Informations de connexion à la base de données
$serverName = "localhost";
$userName = "root";
$password = "";
$dbName = "connexion";

try {
    // Connexion à la base de données avec PDO
    $bdd = new PDO("mysql:host=$serverName;dbname=$dbName;charset=utf8", $userName, $password);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Vérifier si le formulaire a été soumis avec la méthode POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Récupérer les valeurs de l'email et du mot de passe depuis le formulaire et les désinfecter
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);

        // Préparer une requête SQL pour sélectionner l'utilisateur avec l'email fourni
        $stmt = $bdd->prepare("SELECT * FROM admin WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        // Vérifier si un utilisateur a été trouvé avec l'email fourni
        if ($stmt->rowCount() == 1) {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            if (password_verify($password, $user['password'])) {
                // Enregistrer l'ID de l'administrateur connecté dans la session
                $_SESSION['id_admin'] = $user['id_admin'];
                $_SESSION['admin'] = $user['email'];
                header("Location: ../../public/index.php");
                exit();
            } else {
                // Rediriger vers la page de connexion avec un paramètre d'erreur
                header("Location: ../view/login.php?error=1");
                exit();
            }
        } else {
            // Rediriger vers la page de connexion avec un paramètre d'erreur
            header("Location: ../view/login.php?error=1");
            exit();
        }
    }
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>





