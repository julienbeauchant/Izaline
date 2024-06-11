<section id="containerModalUpdate">
    <div class="modal">
        <h2>Ajouter un Nouveau Projet</h2>
        <form id="createNewProject" method="POST" action="../app/controller/update.php" enctype="multipart/form-data">
            <input type="text" id="inputNameModal" name="inputNameModal" placeholder="Entrer le nom du projet"><br><br>
            <input type="file" id="inputImgModal" name="inputImgModal" accept="image/*"><br><br>
            <input type="url" id="inputUrlModal" name="inputUrlModal" placeholder="Entrer l'URL du projet"><br><br>
            <input type="submit" name="submitBtn" value="add project">
            <input type="button" id="closeModal" value="close">
            <input type="hidden" id="hidden" name="id_projets_personnels" value="">
        </form>
    </div>
</section>

<script src="js/modal-update.js"></script>