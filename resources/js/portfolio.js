window.isMobile = function () {
    return (screen.width <= 769) || (window.matchMedia && window.matchMedia('only screen and (max-width: 769px)').matches);
};

const projetSlider = () => {
    const element = document.querySelector('#projects-slider');
    if (!element || isMobile()) return;

    import('glider-js').then(mod => {
        const glider = mod.default;
        new glider(element, {
            slidesToShow: 3.4,
            slidesToScroll: 3,
            draggable: true,
            dots: '#projects-sliders-dots',
            responsive: [
                {
                    breakpoint: 0,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                    }
                }, {
                    breakpoint: 769,
                    settings: {
                        slidesToShow: "auto",
                        slidesToScroll: "auto",
                        itemWidth: 300,
                    }
                }, {
                    breakpoint: 1040,
                    settings: {
                        slidesToShow: 3.4,
                        slidesToScroll: 3,
                    }
                }
            ]
        });
    });
};
const heroBg = () => {
    if (!isMobile()) return;
    import('css-paint-polyfill').then(mod => {
        CSS.paintWorklet.addModule('https://unpkg.com/bytemare@0.1.0/bytemare.js');
    })
}
const lazyLoadImages = () => {
    if ('loading' in HTMLImageElement.prototype) {
        const images = document.querySelectorAll('img[loading="lazy"]');
        images.forEach(img => {
            img.src = img.dataset.src;
        });
    } else {
        import('./lazy-load').then(mod => {
            mod.default();
        })
    }
};
const fadeInAnimation = () => {
    let items;
    if (isMobile()) {
        items = Array.from(document.querySelectorAll('.fade:not(.mobile-no-fade)'));
    } else {
        items = Array.from(document.querySelectorAll('.fade'));
    }

    if (!("IntersectionObserver" in window)) {
        items.forEach(item => item.classList.remove('fade'));
        return;
    }

    const observer = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const delay = entry.target.dataset.delay;
                entry.target.style.transitionDelay = delay * 0.1 + 's';
                entry.target.classList.add('in');
                observer.unobserve(entry.target);
            }
        })
    }, {threshold: 0.1});

    items.forEach(item => observer.observe(item));
}
document.addEventListener('DOMContentLoaded', function () {
    projetSlider();
    heroBg();
    lazyLoadImages();
    fadeInAnimation();
})
