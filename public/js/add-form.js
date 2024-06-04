// document.addEventListener('DOMContentLoaded', () => {
//     const carouselInner = document.querySelector('.positionCarouselProjetPersonnel');
//     const items = Array.from(carouselInner.children);
//     const cloneCount = Math.ceil(window.innerWidth / (items[0].offsetWidth + 30)) + 1;

//     for (let i = 0; i < cloneCount; i++) {
//         items.forEach(item => {
//             const clone = item.cloneNode(true);
//             carouselInner.appendChild(clone);
//         });
//     }
// });


// Sélectionner le formulaire d'ajout de projet
let form = document.querySelector('.admin-only');

// Masquer le formulaire pour les utilisateurs non administrateurs
if (!isAdmin) {
    form.style.display = 'none';
}

