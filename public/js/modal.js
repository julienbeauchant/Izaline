document.addEventListener('DOMContentLoaded', function () {
    console.log('DOM fully loaded and parsed');
    // Sélectionner le bouton d'ajout de projet
    let btnAddProject = document.querySelector('#containerBtnAddProject');
    let modal = document.querySelector('#containerModal');
    let closeModalBtn = document.querySelector('#closeModal');
    let form = document.getElementById('createNewProject');

    // Afficher le modal au clic sur le bouton d'ajout de projet
    btnAddProject.addEventListener('click', function () {
        console.log('Add project button clicked');
        modal.style.display = 'flex';
    });

    // Masquer le modal au clic sur le bouton de fermeture
    closeModalBtn.addEventListener('click', function () {
        console.log('Close modal button clicked');
        modal.style.display = 'none';
    });
});