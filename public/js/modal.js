let containerModal = document.querySelector('#containerModal');
let cercleBtnAddProject = document.querySelector('.cercleBtnAddProject');
let closeModal = document.querySelector('#closeModal');

cercleBtnAddProject.addEventListener('click', () => {
    containerModal.style.display = 'flex';
});

closeModal.addEventListener('click', () => {
    containerModal.style.display = 'none';
});