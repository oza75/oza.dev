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

class DisableButtonOnFormSubmit {
  /**
   * @param {HTMLElement|null} element
   */
  constructor(element = null) {
    this.elements = this.forms(element);
    this.handle = this.handle.bind(this);
    this.elements.forEach(element => {
      element.addEventListener('submit', this.handle);
    });
  }
  /**
   * @param {Event} event
   */


  handle(event) {
    if (event.target.checkValidity()) {
      event.submitter.setAttribute('disabled', 'disabled');
    }
  }

  disconnect() {
    this.elements.forEach(element => {
      element.removeEventListener('submit', this.handle);
    });
  }
  /**
   * @param {HTMLElement|null} element
   * @return {HTMLElement[]}
   */


  forms(element = null) {
    if (element) {
      return Array.from([element]);
    }

    return Array.from(document.querySelectorAll('form'));
  }

}

const projetSlider = () => {
  const element = document.querySelector('#projects-slider');
  if (!element || isMobile()) return;
  import('./glider-223bffa0.js').then(function (n) { return n.g; }).then(mod => {
    const glider = mod.default;
    new glider(element, {
      slidesToShow: 3.4,
      slidesToScroll: 3,
      draggable: true,
      dots: '#projects-sliders-dots',
      responsive: [{
        breakpoint: 0,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }, {
        breakpoint: 769,
        settings: {
          slidesToShow: "auto",
          slidesToScroll: "auto",
          itemWidth: 300
        }
      }, {
        breakpoint: 1040,
        settings: {
          slidesToShow: 3.4,
          slidesToScroll: 3
        }
      }]
    });
  });
};

const heroBg = () => {
  const el = document.querySelector('.hero-image-wrapper');
  if (!isMobile() || !el) return;
  import('./css-paint-polyfill-3105864d.js').then(mod => {
    CSS.paintWorklet.addModule('https://unpkg.com/bytemare@0.1.0/bytemare.js');
  });
};

document.addEventListener('DOMContentLoaded', function () {
  projetSlider();
  heroBg();
  lazyLoadImages();
  fadeInAnimation();
  import('./quicklink-20e00a35.js').then(mod => {
    mod.listen();
  });
  new DisableButtonOnFormSubmit();
});
