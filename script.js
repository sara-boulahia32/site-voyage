const menuButton = document.getElementById('menu-button');
const menu = document.getElementById('menu');

menuButton.addEventListener('click', () => {
    if (menu.classList.contains('hidden')) {
        menu.classList.remove('hidden');
        setTimeout(() => {
            menu.classList.remove('-translate-x-full');
            menu.classList.add('translate-x-0');
        }, 50); 
    } else {
        menu.classList.remove('translate-x-0');
        menu.classList.add('-translate-x-full');
        setTimeout(() => {
            menu.classList.add('hidden');
        }, 500); 
    }
});