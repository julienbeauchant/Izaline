let facebook = document.querySelector('#facebook')
let instagram = document.querySelector('#instagram')
let tiktok = document.querySelector('#tiktok')
let user = document.querySelector('#user')
let burger = document.querySelector('#burger')
let plus = document.querySelector('#plus')
let deconnexion = document.querySelector('#deconnexion')

document.getElementById('toggleDarkMode').addEventListener('click', function() {
    const darkMode = document.body.classList.toggle('dark-mode');
    if ( darkMode ){
        facebook.src = 'img/logo-n/facebook-n.png'
        instagram.src = 'img/logo-n/instagram-n.png'
        tiktok.src = 'img/logo-n/tiktok-n.png'
        if(user) user.src = 'img/logo-n/user-n.png'
        if(deconnexion) deconnexion.src = 'img/logo-n/deconnexion-n.png'
        burger.src = 'img/logo-b/menu-b.png'
        plus.src = 'img/logo-b/plus-b.png'
    } else {
        facebook.src = 'img/logo-b/facebook-b.png'
        instagram.src = 'img/logo-b/instagram-b.png'
        tiktok.src = 'img/logo-b/tiktok-b.png'
        if(user) user.src = 'img/logo-b/utilisateur-b.png'
        if(deconnexion) deconnexion.src = 'img/logo-b/deconnexion-b.png'
        burger.src = 'img/logo-n/menu-n.png'
        plus.src = 'img/logo-n/plus-n.png'
    }
});