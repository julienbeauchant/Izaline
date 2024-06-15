document.addEventListener('DOMContentLoaded', function() {
    const burger = document.getElementById('burger');
    const navBurger = document.querySelector('#navBurger ul');

    burger.addEventListener('click', function(event) {
        event.stopPropagation();
        // si le menu burger est affiché, alors quand je clique sur l’icon menu burger il disparaît et inversement
        navBurger.style.display = (navBurger.style.display === 'flex') ? 'none' : 'flex';
    });

    document.addEventListener('click', function(event) {
        // si je ne clique pas sur les descendants de navBurger et burger alors display none
        if (!navBurger.contains(event.target) && !burger.contains(event.target)) {
            navBurger.style.display = 'none';
        }
    });
});