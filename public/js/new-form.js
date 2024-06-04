// document.addEventListener('DOMContentLoaded', function() {
//     const plusIcon = document.querySelector('.inputFile'); // s'assurer que c'est bien la classe de votre bouton 'plus'

//     plusIcon.addEventListener('click', function() {
//         const container = document.querySelector('.containerCarouselProjetPersonnel'); // ajuster si nécessaire
//         const newFormHtml = `
//             <form class="file">
//                 <section id="containerFileImg">
//                     <div class="fileImg">
//                         <img src="../img/logo-n/trash-n.png" alt="">
//                         <input id="inputTrashProjetPersonnel" name="trash" type="button">
//                     </div>
//                     <div class="fileImg">
//                         <img src="../img/logo-n/modification.png" alt="">
//                         <input id="inputModificationProjetPersonnel" name="modification" type="button">
//                     </div>
//                 </section>
//                 <section id="containerImgInputFile">
//                     <input id="inputNomProjetPersonnel" name="nom" type="text">
//                     <input id="inputImageProjetPersonnel" name="image" type="image" src="" alt="">
//                     <input id="inputUrlProjetPersonnel" name="url" type="button">
//                 </section>
//             </form>
//         `;
//         container.innerHTML += newFormHtml; // Ajoute le nouveau formulaire à la page
//     });
// });

document.addEventListener('DOMContentLoaded', function() {
    const plusIcon = document.querySelector('.inputFile');

    plusIcon.addEventListener('click', function() {
        const popup = document.getElementById('popupForm');
        popup.style.display = 'flex';
    });
});

function closePopup() {
    document.getElementById('popupForm').style.display = 'none';
}

function addProject() {
    const projectName = document.getElementById('projectName').value;
    const projectImage = document.getElementById('projectImage').value;
    const projectUrl = document.getElementById('projectUrl').value;

    const formContainer = document.querySelector('.containerCarouselProjetPersonnel');
    const newFormHtml = `
        <form class="file" action="add-project.php" method="POST">
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
                <input id="inputNomProjetPersonnel" name="nom" type="text" value="${projectName}">
                <input id="inputImageProjetPersonnel" name="image" type="image" src="${projectImage}">
                <input id="inputUrlProjetPersonnel" name="url" type="button" value="${projectUrl}">
            </section>
        </form>
    `;
    formContainer.innerHTML += newFormHtml;
    closePopup();
}
