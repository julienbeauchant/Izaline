// ajoute un écouteur d'événements qui se déclenche lorsque le DOM est complètement chargé
document.addEventListener('DOMContentLoaded', function() {
    // sélectionne l'élément avec l'id burger
    const burger = document.getElementById('burger');
    // sélectionne l'élément <ul> à l'intérieur de l'élément avec l'id navBurger
    const navBurgerUl = document.querySelector('#navBurger ul');

    // ajoute un écouteur d'événements au click sur l'élément burger
    burger.addEventListener('click', function(event) {
        // empêche la propagation de l'événement au click pour ne pas masquer le menu immédiatement après l’avoir affiché
        event.stopPropagation();
        // bascule l'affichage de navBurger entre flex et none
        // utilisation d'opérateur ternaire
        navBurgerUl.style.display = (navBurgerUl.style.display === 'flex') ? 'none' : 'flex';
    });

    // ajoute un écouteur d'événements au click sur le document
    document.addEventListener('click', function(event) {
        // si je ne clique pas sur les "enfants" de navBurgerUl et burger alors display none
        if (!navBurgerUl.contains(event.target) && !burger.contains(event.target)) {
            navBurgerUl.style.display = 'none';
        }
    });
});