'use strict';

const menu = document.getElementById('mobile-menu');
const hamburgerIcon = document.getElementById('hamburger');
const hamburgerXIcon = document.getElementById('X-icon');


hamburgerIcon.addEventListener('click', () => {
    menu.classList.remove('hidden');
    setTimeout(() => {
        hamburgerXIcon.style.opacity = 1;
        hamburgerXIcon.style.transform = 'rotate(0deg)';
        hamburgerXIcon.style.transitionDuration = '0.5s';
        hamburgerIcon.classList.add('hidden');
        hamburgerXIcon.classList.remove('hidden');
    }, 200)
    hamburgerIcon.style.transform = 'rotate(180deg)';
    hamburgerIcon.style.transitionDuration = '0.3s';
    hamburgerIcon.style.opacity = 0.3;
    
})


hamburgerXIcon.addEventListener('click', () => {
    menu.classList.add('hidden');
    setTimeout(() => {
        hamburgerIcon.style.opacity = 1;
        hamburgerIcon.style.transform = 'rotate(0deg)';
        hamburgerIcon.style.transitionDuration = '0.5s';
        hamburgerXIcon.classList.add('hidden');
        hamburgerIcon.classList.remove('hidden');
    }, 200);
    hamburgerXIcon.style.transform = 'rotate(180deg)';
    hamburgerXIcon.style.transitionDuration = '0.3s';
    hamburgerXIcon.style.opacity = 0.3;
})


window.addEventListener('click', function (e) {
    if((e.target != menu)){
        if(hamburgerIcon.classList.contains('hidden')){
            hamburgerIcon.style.opacity = 1;
            hamburgerIcon.style.transform = 'rotate(0deg)';
            hamburgerIcon.style.transitionDuration = '0.5s';
            menu.classList.add('hidden');
            setTimeout(() => {
                hamburgerXIcon.classList.add('hidden');
                hamburgerIcon.classList.remove('hidden');
            }, 200);
            hamburgerXIcon.style.transform = 'rotate(180deg)';
            hamburgerXIcon.style.transitionDuration = '0.3s';
            hamburgerXIcon.style.opacity = 0.3;
        }
    }
})