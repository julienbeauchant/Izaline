document.addEventListener('DOMContentLoaded', function() {
    const burger = document.getElementById('burger');
    const navMenu = document.querySelector('#navBurger ul');

    burger.addEventListener('click', function(event) {
        event.stopPropagation();
        if (navMenu.style.display === 'flex') {
            navMenu.style.display = 'none';
        } else {
            navMenu.style.display = 'flex';
        }
    });

    document.addEventListener('click', function(event) {
        if (!navMenu.contains(event.target) && !burger.contains(event.target)) {
            navMenu.style.display = 'none';
        }
    });
});