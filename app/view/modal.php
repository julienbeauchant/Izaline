    <section id="containerModal">
        <div class="modal">
            <h2>Ajout d'un Nouveau Projet</h2>
            <form id="createNewProject" method="POST" action="../app/controller/traitement-modal.php" enctype="multipart/form-data"> <!-- enctype="multipart/form-data" permet d'envoyer correctement le fichier au serveur -->
                <input type="text" id="inputNameModal" name="inputNameModal" placeholder="Nom du projet" required>
                <input type="file" id="inputImgModal" name="inputImgModal" accept="image/*" required>
                <input type="url" id="inputUrlModal" name="inputUrlModal" placeholder="URL du projet" required>
                <input type="submit" id="submitModal" name="submitBtn" value="Ajouter le projet">
                <input type="button" id="closeModal" value="Fermer">
            </form>
        </div>
    </section>

    <script src="js/modal.js"></script>