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

document.querySelectorAll('.card').forEach(el => {
    const width = el.parentElement.parentElement.offsetWidth;
    //CSS stiliaus reikšmių susigrąžinimas
    const gap = +window.getComputedStyle(el.parentElement).getPropertyValue('gap').replace('px', '');
    el.style.flex = `0 0 ${(width - gap * 2) / 3}px`;
});

document.querySelectorAll('.dots a').forEach((el, index) => {
    el.addEventListener('click', e => {
        e.preventDefault();

        const w = document.querySelector('.quotes').offsetWidth;

        anime({
            targets: '.quotes .row',
            translateX: -((w + 30) * index)
        });

        //document.querySelector('.quotes .row').style.marginLeft = `-${(w + 30) * index}px`;

        document.querySelectorAll('.dots a').forEach(el => {
            el.classList.remove('active');
        });

        e.target.classList.add('active');
    });
});

document.querySelector('.quotes').addEventListener('drag', e => {
    console.log('Tempimas vyksta');
});
