<?php
session_start();

$adminSessionActive = isset($_SESSION['admin']);
?>
<?php if ($adminSessionActive) : ?>
    <div class="fixed-header">
        <p>Vous êtes connecté</p>
    </div>
<?php endif; ?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/contact.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/modal.css">
    <link rel="stylesheet" href="css/prestation.css">
    <link rel="stylesheet" href="css/projet-personnel.css">
    <link rel="stylesheet" href="css/retour-haut.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/theme.css">

    <link rel="stylesheet" href="css/mediaqueries/mediaqueries-global.css">
    <link rel="stylesheet" href="css/mediaqueries/mediaqueries-header.css">
    <link rel="stylesheet" href="css/mediaqueries/mediaqueries-prestation.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Advent+Pro:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <title>Izaline Dhalluin</title>
</head>

<body>

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

</body>

</html>