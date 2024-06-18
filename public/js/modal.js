// ajoute un écouteur d'événements qui se déclenche lorsque le DOM est complètement chargé
document.addEventListener('DOMContentLoaded', function () {

    // sélectionne l'élément avec l'id containerBtnAddProject
    let containerBtnAddProject = document.querySelector('#containerBtnAddProject');
    // sélectionne l'élément avec l'id containerModal
    let containerModal = document.querySelector('#containerModal');
    // sélectionne l'élément avec l'id closeModal
    let closeModal = document.querySelector('#closeModal');

    // ajoute un écouteur d'événements au click à l'élément containerBtnAddProject
    containerBtnAddProject.addEventListener('click', function () {
        // Affiche un message dans la console quand containerBtnAddProject est cliqué
        console.log('containerBtnAddProject cliqué');
        // Affiche le modal en changeant son style display flex
        containerModal.style.display = 'flex';
    });

    // ajoute un écouteur d'événements au click à l'élément closeModal
    closeModal.addEventListener('click', function () {
        // Affiche un message dans la console quand closeModal est cliqué
        console.log('closeModal cliqué');
        // masque le modal en changeant son style display none
        containerModal.style.display = 'none';
    });
    
});