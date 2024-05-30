<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/contact.css">
    <link rel="stylesheet" href="../css/global.css">

    <link rel="stylesheet" href="../css/mediaqueries/mediaqueries-contact.css">
    <link rel="stylesheet" href="../css/mediaqueries/mediaqueries-global.css">


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Advent+Pro:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <title>contact</title>
</head>

<body>

<main id="mainContact">

<div id="contact" class="titleSection">
    <div class="positionTitleSection">
        <h3>Me contacter</h3>
        <p>Parlons plus en detail de votre projet</p>
    </div>
</div>

<form id="formContact">

    <div class="identite">
        <input id="contactInputNom" type="text" placeholder="Nom">
        <input id="contactInputPrenom" type="text" placeholder="Prénom">
    </div>

    <input id="contactInputTel" type="tel" placeholder="Téléphone">
    <input id="contactInputEmail" type="email" placeholder="E-mail">

    <select>
        <option value="">choisir la prestation</option>
        <option>prestation 1</option>
        <option>prestation 2</option>
        <option>prestation 3</option>
    </select>

    <textarea id="contactInputMessage" type="text" placeholder="Message"></textarea>
    <input id="contactInputBtn" type="submit" value="Send" placeholder="Send">

</form>

</main>

</body>

</html>