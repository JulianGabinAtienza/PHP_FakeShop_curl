const burger = document.querySelector('.burger-btn');
const menu = document.querySelector('.menu');

burger.addEventListener('click', () => {
    menu.style.opacity = menu.style.opacity === '1' ? '0' : '1';
    menu.style.left = menu.style.opacity === '1' ? '20rem' : '-20rem';
});