// Sélectionner le formulaire d'ajout de projet
let form = document.querySelector('.admin-only');

// Masquer le formulaire pour les utilisateurs non administrateurs
if (!isAdmin) {
    form.style.display = 'none';
}

