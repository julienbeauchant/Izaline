<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/contact.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/prestation.css">
    <link rel="stylesheet" href="css/projet-personnel.css">
    <link rel="stylesheet" href="css/retour-haut.css">
    <link rel="stylesheet" href="css/theme.css">
    <link rel="stylesheet" href="css/modal.css">

    <link rel="stylesheet" href="css/mediaqueries/mediaqueries-contact.css">
    <link rel="stylesheet" href="css/mediaqueries/mediaqueries-footer.css">
    <link rel="stylesheet" href="css/mediaqueries/mediaqueries-global.css">
    <link rel="stylesheet" href="css/mediaqueries/mediaqueries-header.css">
    <link rel="stylesheet" href="css/mediaqueries/mediaqueries-prestation.css">
    <link rel="stylesheet" href="css/mediaqueries/mediaqueries-projet-personnel.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Advent+Pro:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <title>izaline</title>
</head>

<body>

<?php
session_start();
$adminSessionActive = isset($_SESSION['admin']);
?>

<?php if ($adminSessionActive): ?>
        <div class="fixed-header">
            <p>Vous êtes connecté</p>
        </div>
        <!-- endif, balise alternative pour mettre fin au if -->
    <?php endif; ?>

<style>
        .fixed-header {
            position: fixed;
            top: 0;
            width: 100%;
            height: 30px;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #22C8DD;
            color: white;
            text-align: center;
            z-index: 1000; /* Assurez-vous qu'il soit toujours au-dessus des autres éléments */
        }
    </style>


<?php
    require '../app/view/header.php';
?>

<?php
    require '../app/view/prestation.php';
?>

<?php
    require '../app/view/projet-personnel.php';
?>

<?php
    require '../app/view/contact.php';
?>

<?php
    require '../app/view/footer.php';
?>

<?php
    require '../app/view/retour-haut.php';
?>

<!-- <div id="popupForm" style="display:none;">
    <div class="test">
        <h2>Ajouter un Nouveau Projet</h2>
        <form id="newProjectForm">
            <input type="text" id="projectName" name="projectName" placeholder="Nom du projet"><br><br>

            <input type="file" id="projectImage" name="projectImage" placeholder="Image du projet (URL)"><br><br>

            <input type="url" id="projectUrl" name="projectUrl" placeholder="URL du projet"><br><br>

            <button type="button" onclick="addProject()">Ajouter Projet</button>
            <button type="button" onclick="closePopup()">Fermer</button>
        </form>
    </div>
</div> -->

</body>

</html>