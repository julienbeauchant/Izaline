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
        <form id="createNewProject" method="POST" action="../app/controller/traitement-modal.php" enctype="multipart/form-data">
            <input type="text" id="inputNameModal" name="inputNameModal" placeholder="Entrer le nom du projet" required><br><br>

            <input type="file" id="inputImgModal" name="inputImgModal" accept="image/*" required><br><br>

            <input type="url" id="inputUrlModal" name="inputUrlModal" placeholder="Entrer l'URL du projet" required><br><br>

            <input type="submit" name="submit" value="add project">
            <input type="button" id="closeModal" value="close">
        </form>
    </div>
</section>

<script>
document.getElementById('createNewProject').addEventListener('submit', function(event) {
            event.preventDefault(); // Empêche le rechargement de la page

            var formData = new FormData(this);

            var xhr = new XMLHttpRequest();
            xhr.open('POST', '../app/controller/traitement-modal.php', true);
            xhr.onload = function () {
                if (xhr.status === 200) {
                    // Affiche un message de succès ou effectue une autre action
                    alert('Projet ajouté avec succès');
                    // Ferme le modal
                    document.getElementById('containerModal').style.display = 'none';
                    // Réinitialise le formulaire
                    document.getElementById('createNewProject').reset();
                } else {
                    alert('Erreur lors de l\'ajout du projet');
                }
            };
            xhr.send(formData);
        });

        document.getElementById('closeModal').addEventListener('click', function() {
            // Ferme le modal
            document.getElementById('containerModal').style.display = 'none';
            // Réinitialise le formulaire
            document.getElementById('createNewProject').reset();
        });
    </script>
<script src="js/modal.js"></script>
</body>

</html>