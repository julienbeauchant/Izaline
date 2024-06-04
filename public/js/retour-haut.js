        // Fonction pour vérifier si on est en bas de la page
        function checkScroll() {
            let scrollToTopBtn = document.getElementById('retourHaut');
            let scrollTop = window.scrollY || document.documentElement.scrollTop;
            let windowHeight = window.innerHeight;
            let docHeight = document.documentElement.scrollHeight;

            // Vérifiez si l'utilisateur est en bas de la page
            if (windowHeight + scrollTop >= docHeight) {
                scrollToTopBtn.style.display = 'flex';
            } else {
                scrollToTopBtn.style.display = 'none';
            }
        }

        // Ajouter un écouteur d'événements pour le défilement
        window.addEventListener('scroll', checkScroll);

        // Ajouter un écouteur d'événements pour le clic sur le bouton
        document.getElementById('retourHaut').addEventListener('click', function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });

        // Vérifiez la position de défilement lors du chargement de la page
        window.addEventListener('load', checkScroll);