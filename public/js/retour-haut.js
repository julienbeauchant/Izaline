document.addEventListener('DOMContentLoaded', () => {
    const boutonRetourHaut = document.getElementById('retourHaut');

    const verifierDefilement = () => {
        boutonRetourHaut.style.display = (window.innerHeight + window.scrollY >= document.documentElement.scrollHeight) ? 'flex' : 'none';
    };

    window.addEventListener('scroll', verifierDefilement);
    window.addEventListener('load', verifierDefilement);

    boutonRetourHaut.addEventListener('click', () => {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });
});