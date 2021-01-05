import {fadeInAnimation, lazyLoadImages} from "./common";

document.addEventListener('DOMContentLoaded', function () {
    lazyLoadImages();
    fadeInAnimation();
    import('quicklink').then(mod => {
        console.log(mod);

        mod.listen();
    });
});
