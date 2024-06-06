let facebookDark = document.querySelector('#facebook')
let instagramDark = document.querySelector('#instagram')
let tiktokDark = document.querySelector('#tiktok')
let userDark = document.querySelector('#user')

document.getElementById('toggleDarkMode').addEventListener('click', function() {
    document.body.classList.toggle('dark-mode');
    facebookDark.src = 'img/logo-n/facebook-n.png'
    instagramDark.src = 'img/logo-n/instagram-n.png'
    tiktokDark.src = 'img/logo-n/tiktok-n.png'
    userDark.src = 'img/logo-n/user-n.png'
});