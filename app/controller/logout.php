<!-- doit servir a se deconnecter de la session 
de l'administrateur -->

<?php
session_start();
session_unset();
session_destroy();
echo "Déconnexion réussie. Vous serez redirigé vers la page de connexion.";
header("Location: ../view/login.php");
exit();
?>