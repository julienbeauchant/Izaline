document.addEventListener('DOMContentLoaded', function () {

    let containerBtnAddProject = document.querySelector('#containerBtnAddProject');
    let containerModal = document.querySelector('#containerModal');
    let closeModal = document.querySelector('#closeModal');

    containerBtnAddProject.addEventListener('click', function () {
        console.log('containerBtnAddProject cliqué');
        containerModal.style.display = 'flex';
    });

    closeModal.addEventListener('click', function () {
        console.log('closeModal cliqué');
        containerModal.style.display = 'none';
    });
    
});