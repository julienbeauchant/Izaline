<?php
$serverName = "localhost";
// serveur local
$userName = "root";
// administrateur par default ( racine )
$password = "";
// ajouter UTF8 ?

try {
    // essayer 
    $bdd = new PDO("mysql: host=$serverName; dbname=connexion", $userName, $password);
    // langague SQL : l'hote = localhost; nom data base = connexion
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // error mode pour nous donner le type d'erreur en cas d'echec a la connexion 
    echo "Connexion réussie à la BDD<br>";

    // Données de l'administrateur, Vérifier si l'administrateur existe déjà
    $email = "julienbeauchant.pro@yahoo.com";
    $hashedPassword = password_hash("1234", PASSWORD_BCRYPT); // Hasher le mot de passe        
    
    $stmt = $bdd->prepare("SELECT * FROM admin WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    // Préparer et exécuter la requête d'insertion
    if ($stmt->rowCount() == 0) {
        // Insérer les données de l'administrateur si elles n'existent pas
        $stmt = $bdd->prepare("INSERT INTO admin (email, password) VALUES (:email, :password)");
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashedPassword);
        $stmt->execute();
        echo "Administrateur créé avec succès.";
    } else {
        echo "L'administrateur existe déjà.";
    }
    
} catch (PDOException $e) {
    // attraper  (donner l'erreur dans la varibale e)
    echo "Echec de la connexion : " . $e->getMessage();
}


// ce fichier permet de se connecter a la BDD et de créer un administrateur avec un email et un password. 
// pour ne pas avoir de soucis au niveau de la BDD et eviter qu'a chaque fois un administrateur soit créer,
// un systeme permet de verifier si l'administrateur ayant cette email et ce password existe deja et si c la cas 
// alors il n'y a pas d'ajout de nouvel administrateur 
// l'utilisation de password_hash permet dans la BDD de hasher le password pour ne pas le reveler ( utiliser le password_verify ? )
// bindParam permet d'eviter les injections SQL ( ne pas oubliere htmlSpecialChart )

