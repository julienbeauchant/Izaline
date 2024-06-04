<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

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
        <input class="formContactInput" id="contactInputNom" type="text" placeholder="Nom">
        <input class="formContactInput" id="contactInputPrenom" type="text" placeholder="Prénom">
    </div>

    <input class="formContactInput" id="contactInputTel" type="tel" placeholder="Téléphone">
    <input class="formContactInput" id="contactInputEmail" type="email" placeholder="E-mail">

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