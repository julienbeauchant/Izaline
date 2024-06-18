<section id="containerModalUpdate">
        <div class="modal">
            <h2>Modification du projet</h2>
            <form id="createNewProject" method="POST" action="../app/controller/update.php" enctype="multipart/form-data"> <!-- enctype="multipart/form-data" permet d'envoyer correctement le fichier au serveur -->
                <input type="text" id="inputNameModal" name="inputNameModal" placeholder="Nom du projet">
                <input type="file" id="inputImgModal" name="inputImgModal" accept="image/*">
                <input type="url" id="inputUrlModal" name="inputUrlModal" placeholder="URL du projet">
                <input type="submit" id="submitModal" name="submitBtn" value="Modifier le projet">
                <input type="button" id="closeModal" value="Fermer">
                <!-- Champ caché pour l'identifiant du projet personnel -->
                <input type="hidden" id="hidden" name="id_projets_personnels" value="">
            </form>
        </div>
</section>

<script src="js/modal-update.js"></script>