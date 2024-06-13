document.addEventListener('DOMContentLoaded', function () {

    let btnAddProject = document.querySelector('#containerBtnAddProject');
    let modal = document.querySelector('#containerModal');
    let closeModalBtn = document.querySelector('#closeModal');
    let form = document.getElementById('createNewProject');

    btnAddProject.addEventListener('click', function () {
        console.log('Add project button clicked');
        modal.style.display = 'flex';
    });

    closeModalBtn.addEventListener('click', function () {
        console.log('Close modal button clicked');
        modal.style.display = 'none';
    });
    
});