document.addEventListener('DOMContentLoaded', function () {
    let btnModalUpdate = document.querySelectorAll('.projectIconModification');
    let modal = document.querySelector('#containerModalUpdate');
    let closeModalBtn = modal.querySelector('#closeModal');
    let hidden = modal.querySelector('#hidden');


    btnModalUpdate.forEach(element => {
        element.addEventListener('click', function () {
            hidden.value = element.dataset.id
            modal.style.display = 'flex';
        });
    });

    closeModalBtn.addEventListener('click', function () {
        console.log('Close modal button clicked');
        modal.style.display = 'none';
    });
});