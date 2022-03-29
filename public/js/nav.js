let hamburger = document.querySelector('.hamburger');
let navMenu = document.querySelector('.nav__menu');

hamburger.addEventListener('click', e => {
    navMenu.classList.toggle('nav__menu--active');
    document.body.classList.toggle('overflow-hidden');
    hamburger.classList.toggle('hamburger-active');
    console.log('test')
})
