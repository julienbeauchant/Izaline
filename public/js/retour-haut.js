// ajoute un écouteur d'événements qui se déclenche lorsque le DOM est complètement chargé
document.addEventListener('DOMContentLoaded', () => {
    // sélectionne l'élément avec l'id retourHaut
    const boutonRetourHaut = document.getElementById('retourHaut');

    // fonction pour vérifier le défilement et afficher ou masquer le bouton
    const verifierDefilement = () => {
        // si la hauteur de la fenêtre et le défilement vertical atteignent ou dépassent la hauteur totale du document
        // alors affiche le bouton, sinon masque le bouton
        boutonRetourHaut.style.display = (window.innerHeight + window.scrollY >= document.documentElement.scrollHeight) ? 'flex' : 'none';
    };

    // ajoute un écouteur d'événements scroll pour le défilement de la fenêtre
    window.addEventListener('scroll', verifierDefilement);
    // ajoute un écouteur d'événements load pour le chargement de la fenêtre
    // permet de vérifier si le bouton doit etre affiché ou pas
    window.addEventListener('load', verifierDefilement);

    // ajoute un écouteur d'événements au click sur le bouton retourHaut
    boutonRetourHaut.addEventListener('click', () => {
        // fait défiler la fenêtre jusqu'en haut avec un comportement smooth
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });
});