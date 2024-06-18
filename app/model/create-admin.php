<?php
$serverName = "localhost";
$userName = "root";
$password = "";

try {
    // connexion PDO à la base de données
    $bdd = new PDO("mysql: host=$serverName; dbname=connexion; charset=utf8", $userName, $password);
    // exceptions PDO en cas d'erreur
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // adresse email de l'administrateur à ajouter
    $email = "julienbeauchant.pro@yahoo.com";
     // hachage du mot de passe
    $hashedPassword = password_hash("1234", PASSWORD_BCRYPT);     
    
     // requête SQL pour sélectionner un utilisateur avec l'email
    $sql = $bdd->prepare("SELECT * FROM admin WHERE email = :email");
     // lie la valeur de l'email à la requête préparée
    $sql->bindParam(':email', $email);
       // exécute la requête
    $sql->execute();

     // vérifie si une ligne a été trouvée, si l'utilisateur existe déjà
    if ($sql->rowCount() == 0) {
         // si l'utilisateur n'existe pas, requête SQL pour insérer un nouvel administrateur
        $sql = $bdd->prepare("INSERT INTO admin (email, password) VALUES (:email, :password)");
        // lie les valeurs des paramètres à la requête préparée
        $sql->bindParam(':email', $email);
        $sql->bindParam(':password', $hashedPassword);
         // exécute la requête
        $sql->execute();
         // affiche un message si l'administrateur a été ajouté
        echo "Administrateur ajouté";
    } else {
         // si l'utilisateur existe déjà, affiche un message
        echo "L'administrateur existe déjà";
    }
    
} catch (PDOException $e) {
     // Affiche un message d'erreur en cas d'exception PDO
    echo "Echec de la connexion : " . $e->getMessage();
}
?>

