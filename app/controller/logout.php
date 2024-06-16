<?php
// reprend la session existante
session_start();
// assure que les variables de sessions sont détruites immédiatement avant la déconnexion
session_unset();
// détruit la session
session_destroy();
echo "Vous êtes deconnecté";
// redirige l'utilisateur vers le panneau d'administration
header("Location: ../view/login.php");
// fin du script et s'assure que la redirection se fait correctement
exit();
?>