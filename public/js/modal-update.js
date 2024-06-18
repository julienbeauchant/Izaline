// ajoute un écouteur d'événements qui se déclenche lorsque le DOM est complètement chargé
document.addEventListener('DOMContentLoaded', function () {
    // sélectionne l'élément avec toutes les class projectIconModification
    let btnModalUpdate = document.querySelectorAll('.projectIconModification');
    // sélectionne l'élément avec l'id containerModalUpdate
    let modal = document.querySelector('#containerModalUpdate');
    // sélectionne l'élément avec l'id closeModal
    let closeModalBtn = modal.querySelector('#closeModal');
    // sélectionne l'élément avec l'id hidden
    let hidden = modal.querySelector('#hidden');


    // ajoute un écouteur d'événements au click pour chaque élément de btnModalUpdate
    btnModalUpdate.forEach(element => {
        element.addEventListener('click', function () {
            // lorsque l'élément est cliqué, met à jour la valeur de hidden avec l'ID du dataset
            hidden.value = element.dataset.id
            // affiche le modal en style display flex
            modal.style.display = 'flex';
        });
    });

    // ajoute un écouteur d'événements au click pour le bouton de fermeture du modal
    closeModalBtn.addEventListener('click', function () {
        console.log('Close modal button clicked');
        // masque le modal en style display none
        modal.style.display = 'none';
    });
});