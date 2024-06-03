document.addEventListener('DOMContentLoaded', function() {

    // Sélectionner le formulaire et ajouter un écouteur d'événement
    document.getElementById('addProjectForm').addEventListener('click', function() {
        // Créer le nouveau formulaire
        const newForm = document.createElement('form');
        newForm.classList.add('file');
        
        // Ajouter le contenu HTML au nouveau formulaire
        newForm.innerHTML = `
            <section id="containerFileImg">
                <div class="fileImg">
                    <img src="../img/logo-n/trash-n.png" alt="">
                    <input id="inputTrashProjetPersonnel" name="trash" type="button">
                </div>
                <div class="fileImg">
                    <img src="../img/logo-n/modification.png" alt="">
                    <input id="inputModificationProjetPersonnel" name="modification" type="button">
                </div>
            </section>
            <section id="containerImgInputFile">
                <input id="inputNomProjetPersonnel" name="nom" type="text">
                <input id="inputImageProjetPersonnel" name="image" type="button">
                <input id="inputUrlProjetPersonnel" name="url" type="button">
            </section>
        `;

        // Ajouter le nouveau formulaire à la section contenant les projets personnels
        document.querySelector('.containerCarouselProjetPersonnel').appendChild(newForm);
        newForm.addEventListener('submit', function(event) {
            event.preventDefault();
            const formData = new FormData(newForm);
            fetch('../controllers/traitement-projet-personnel.php', {
                method: 'POST',
                body: formData
            }).then(response => response.text()).then(data => {
                console.log(data);
                // Optionnel: Rafraîchir la page ou mettre à jour l'affichage des projets
            }).catch(error => console.error('Error:', error));
        });
    });
});