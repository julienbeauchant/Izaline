<body>

    <section id="containerModal">
        <div class="modal">
            <h2>Ajouter un Nouveau Projet</h2>
            <form id="createNewProject" method="POST" action="../app/controller/traitement-modal.php" enctype="multipart/form-data">
                <input type="text" id="inputNameModal" name="inputNameModal" placeholder="Entrer le nom du projet" required>
                <input type="file" id="inputImgModal" name="inputImgModal" accept="image/*" required>
                <input type="url" id="inputUrlModal" name="inputUrlModal" placeholder="Entrer l'URL du projet" required>
                <input type="submit" id="submitModal" name="submitBtn" value="add project">
                <input type="button" id="closeModal" value="close">
            </form>
        </div>
    </section>

    <script src="js/modal.js"></script>
</body>

</html>