const lazyLoadFallback = () => {
  let lazyImages = [].slice.call(document.querySelectorAll('img[loading="lazy"],video[loading="lazy"]'));
  let active = false;

  const lazyLoad = function lazyLoad() {
    if (active === false) {
      active = true;
      setTimeout(function () {
        lazyImages.forEach(function (lazyImage) {
          if (lazyImage.getBoundingClientRect().top <= window.innerHeight && lazyImage.getBoundingClientRect().bottom >= 0 && getComputedStyle(lazyImage).display !== "none") {
            lazyImage.src = lazyImage.dataset.src;
            lazyImage.srcset = lazyImage.dataset.srcset;
            lazyImage.removeAttribute("loading");
            lazyImages = lazyImages.filter(function (image) {
              return image !== lazyImage;
            });

            if (lazyImages.length === 0) {
              document.removeEventListener("scroll", lazyLoad);
              window.removeEventListener("resize", lazyLoad);
              window.removeEventListener("orientationchange", lazyLoad);
            }
          }
        });
        active = false;
      }, 200);
    }
  };

  document.addEventListener("scroll", lazyLoad);
  window.addEventListener("resize", lazyLoad);
  window.addEventListener("orientationchange", lazyLoad);
};

const lazyLoad = () => {
  const lazyImages = [].slice.call(document.querySelectorAll('img[loading="lazy"],video[loading="lazy"]'));

  if ("IntersectionObserver" in window) {
    let lazyImageObserver = new IntersectionObserver(function (entries, observer) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          let lazyImage = entry.target;
          lazyImage.src = lazyImage.dataset.src;
          lazyImage.srcset = lazyImage.dataset.srcset;
          lazyImage.removeAttribute("loading");
          lazyImageObserver.unobserve(lazyImage);

          if (String(entry.target.tagName).toLowerCase() === 'video') {
            entry.target.load();
          }
        }
      });
    });
    lazyImages.forEach(function (lazyImage) {
      lazyImageObserver.observe(lazyImage);
    });
  } else {
    lazyLoadFallback();
  }
};

export default lazyLoad;
