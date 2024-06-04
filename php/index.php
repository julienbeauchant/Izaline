<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/contact.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/izaline.css">
    <link rel="stylesheet" href="css/prestation.css">
    <link rel="stylesheet" href="css/projet-personnel.css">

    <link rel="stylesheet" href="css/mediaqueries/mediaqueries-admin.css">
    <link rel="stylesheet" href="css/mediaqueries/mediaqueries-contact.css">
    <link rel="stylesheet" href="css/mediaqueries/mediaqueries-footer.css">
    <link rel="stylesheet" href="css/mediaqueries/mediaqueries-global.css">
    <link rel="stylesheet" href="css/mediaqueries/mediaqueries-header.css">
    <link rel="stylesheet" href="css/mediaqueries/mediaqueries-prestation.css">
    <link rel="stylesheet" href="css/mediaqueries/mediaqueries-projet-personnel.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Advent+Pro:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet"> -->

    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/global.css">

    <title>izaline</title>
</head>

<body>

<?php
session_start();
echo "Session admin: " . (isset($_SESSION['admin']) ? 'active' : 'inactive');
?>

<?php
    require 'views/header.php';
?>

<?php
    require 'views/prestation.php';
?>

<?php
    require 'views/projet-personnel.php';
?>

<?php
    require 'views/contact.php';
?>

<?php
    require 'views/footer.php';
?>

<?php
    require 'retour-haut.php';
?>

<div id="popupForm" style="display:none;">
    <div class="test">
        <h2>Ajouter un Nouveau Projet</h2>
        <form id="newProjectForm">
            <input type="text" id="projectName" name="projectName" placeholder="Nom du projet"><br><br>

            <input type="text" id="projectImage" name="projectImage" placeholder="Image du projet (URL"><br><br>

            <input type="text" id="projectUrl" name="projectUrl" placeholder="URL du projet"><br><br>

            <button type="button" onclick="addProject()">Ajouter Projet</button>
            <button type="button" onclick="closePopup()">Fermer</button>
        </form>
    </div>
</div>

<style>
    #popupForm {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,0.5);
    display: flex;
    justify-content: center;
    align-items: center;
}



.test {
    width: clamp(340px, 30%, 700px);
    height: 60%;
    background: white;
    padding: 20px; 
    border-radius: 5px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}

.test h2{
    width: 100%;
    height: 20%;
    display: flex;
    justify-content: center;
    align-items: center;
}

#newProjectForm {
    width: 90%;
    height: 70%;
    display: flex;
    flex-direction: column;
    justify-content: space-around;
    align-items: center;
}

#newProjectForm input,
#newProjectForm button{
    width: 90%;
    height: 10%;
}
</style>

</body>

</html>