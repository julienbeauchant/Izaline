<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>modal</title>
</head>

<body>

<section id="containerModal">
    <div class="modal">
        <h2>Ajouter un Nouveau Projet</h2>
        <form id="createNewProject">
            <input type="text" id="inputNameModal" name="inputNameModal" placeholder="Entrer le nom du projet" required><br><br>

            <input type="file" id="inputImgModal" name="inputImgModal" required><br><br>

            <input type="url" id="inputUrlModal" name="inputUrlModal" placeholder="Entrer l'URL du projet" required><br><br>

            <input type="button" value="add project"></input>
            <input type="button" id="closeModal" value="close"></input>
        </form>
    </div>
</section>
<script src="js/modal.js"></script>
</body>

</html>