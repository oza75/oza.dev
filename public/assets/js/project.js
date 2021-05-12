const isMobile = function isMobile() {
  return screen.width <= 769 || window.matchMedia && window.matchMedia('only screen and (max-width: 769px)').matches;
};
const lazyLoadImages = () => {
  if ('loading' in HTMLImageElement.prototype) {
    const images = document.querySelectorAll('img[loading="lazy"],video[loading="lazy"]');
    images.forEach(img => {
      img.src = img.dataset.src;

      if (String(img.tagName).toLowerCase() === 'video') {
        img.load();
      }
    });
  } else {
    import('./lazy-load-f5d03df3.js').then(mod => {
      mod.default();
    });
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
    });
  }, {
    threshold: 0.1
  });
  items.forEach(item => observer.observe(item));
};

document.addEventListener('DOMContentLoaded', function () {
  lazyLoadImages();
  fadeInAnimation();
  import('./quicklink-20e00a35.js').then(mod => {
    console.log(mod);
    mod.listen();
  });
});
