const menu = document.querySelector('#mobile-menu');
const mobileLinks = document.querySelector('.nav-menu')

menu.addEventListener('click', function(){
    menu.classList.toggle('is-active');
    mobileLinks.classList.toggle('active');
})


