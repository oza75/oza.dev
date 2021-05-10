import {isMobile, fadeInAnimation, lazyLoadImages} from "./common";

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
    const el = document.querySelector('.hero-image-wrapper');
    if (!isMobile() || !el) return;
    import('css-paint-polyfill').then(mod => {
        CSS.paintWorklet.addModule('https://unpkg.com/bytemare@0.1.0/bytemare.js');
    })
}

document.addEventListener('DOMContentLoaded', function () {
    projetSlider();
    heroBg();
    lazyLoadImages();
    fadeInAnimation();
    import('quicklink').then(mod => {
        mod.listen();
    })
})
