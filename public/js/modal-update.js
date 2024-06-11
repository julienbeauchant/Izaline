document.addEventListener('DOMContentLoaded', function () {
    // Sélectionner le bouton d'ajout de projet
    let btnModalUpdate = document.querySelectorAll('.projectIconModification');
    let modal = document.querySelector('#containerModalUpdate');
    let closeModalBtn = modal.querySelector('#closeModal');
    let hidden = modal.querySelector('#hidden');


    btnModalUpdate.forEach(element => {
        // Afficher le modal au clic sur le bouton d'ajout de projet
        element.addEventListener('click', function () {
            hidden.value = element.dataset.id
            modal.style.display = 'flex';
        });
    });

    // Masquer le modal au clic sur le bouton de fermeture
    closeModalBtn.addEventListener('click', function () {
        console.log('Close modal button clicked');
        modal.style.display = 'none';
    });
});