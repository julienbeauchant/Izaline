<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="../css/contact.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/global.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/izaline.css">
    <link rel="stylesheet" href="../css/prestation.css">
    <link rel="stylesheet" href="../css/projet-personnel.css">

    <link rel="stylesheet" href="../css/mediaqueries/mediaqueries-admin.css">
    <link rel="stylesheet" href="../css/mediaqueries/mediaqueries-contact.css">
    <link rel="stylesheet" href="../css/mediaqueries/mediaqueries-footer.css">
    <link rel="stylesheet" href="../css/mediaqueries/mediaqueries-global.css">
    <link rel="stylesheet" href="../css/mediaqueries/mediaqueries-header.css">
    <link rel="stylesheet" href="../css/mediaqueries/mediaqueries-prestation.css">
    <link rel="stylesheet" href="../css/mediaqueries/mediaqueries-projet-personnel.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Advent+Pro:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet"> -->

    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/global.css">

    <title>izaline</title>
</head>

<body>

<?php
session_start();
echo "Session admin: " . (isset($_SESSION['admin']) ? 'active' : 'inactive');
?>

<?php
    require '../views/header.php';
?>

<?php
    require '../views/prestation.php';
?>

<?php
    require '../views/projet-personnel.php';
?>

<?php
    require '../views/contact.php';
?>

<?php
    require '../views/footer.php';
?>

<?php
    require 'retour-haut.php';
?>

</body>

</html>