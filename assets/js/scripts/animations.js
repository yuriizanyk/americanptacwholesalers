document.addEventListener('DOMContentLoaded', () => {
    let options = {
        root: null,
        rootMargin: "0px 0px 0px 0px",
        threshold: 0.3,
    };
    
    let callback = (entries, observer) => {
        entries.forEach((entry) => {
            const targetElement = entry.target;
            if (entry.isIntersecting) {
                if (targetElement.classList.contains("anim-left")) {
                    targetElement.classList.add("show-left");
                  } else if (targetElement.classList.contains("anim-right")) {
                    targetElement.classList.add("show-right");
                  } else {
                    targetElement.classList.add("show");
                  }
            }
        });
    }
    
    let observer = new IntersectionObserver(callback, options);
    
    let someElements = document.querySelectorAll("[class*='--anim']");
    if (!someElements.length) return;
    someElements.forEach(someElement => {
        observer.observe(someElement);
    });

    // function animateLogos() {
    //     const logos = document.querySelectorAll('.wcl-single__logo--anim');
    //     if (!logos.length) return;

    //     logos.forEach((logo, index) => {
    //         if (!logo) return;
    //         const delay = index * 0.2;
    //         logo.style.transitionDelay = `${delay}s`;
    //     });
    // }

    // function animateDynamicHeadings() {
    //     const descriptions = document.querySelectorAll('.wcl-single__description');
    //     if (!descriptions.length) return;

    //     descriptions.forEach((description) => {
    //         const headings = description.querySelectorAll('h2, h3');
    //         if (!headings.length) return;

    //         headings.forEach((heading) => {
    //             heading.classList.add('anim-left', 'anim-left--anim');
    //             observer.observe(heading);
    //         });
    //     });
    // }


    // function animateDynamicGallery() {
    //     const gallery = document.querySelector('.wcl-single__gallery-items');
    //     if (!gallery) return;

    //     const galleryItems = gallery.querySelectorAll('.wcl-single__gallery-item');
    //     if (!galleryItems.length) return;
    //     galleryItems.forEach((galleryItem, index) => {
    //         const delay = index * 0.1;
    //         galleryItem.style.transitionDelay = `${delay}s`;
    //         observer.observe(galleryItem);
    //     });
    // }
    
    // animateLogos();
    // animateDynamicGallery();
    // animateDynamicHeadings();
});