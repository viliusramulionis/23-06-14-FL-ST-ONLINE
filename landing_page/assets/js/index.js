document.querySelector('.demo').addEventListener('click', e => {
    e.preventDefault(); //Standartinio HTML funkcionalumo sustabdymas
    document.querySelector('.video-modal').style.display = 'block';
});

document.querySelector('.close').addEventListener('click', e => {
    e.preventDefault(); //Standartinio HTML funkcionalumo sustabdymas
    document.querySelector('.video-modal').style.display = 'none';
});

window.addEventListener('scroll', e => {
    if(window.scrollY > 0) {
        document.querySelector('header').classList.add('scrolled');
    } else {
        document.querySelector('header').classList.remove('scrolled');
    }
    // document.querySelector('header').classList.remove()
    // document.querySelector('header').classList.toggle()
});