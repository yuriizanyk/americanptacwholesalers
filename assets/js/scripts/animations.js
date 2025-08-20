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

    function animateBlocks() {
        const blocks = document.querySelectorAll('.anim-content');
        if (!blocks.length) return;

        blocks.forEach(block => {
            const blockItems = block.querySelectorAll('.anim-item');
            if (!blockItems.length) return;

            blockItems.forEach((blockItem, index) => {
                const delay = index * 0.1;
                blockItem.style.transitionDelay = `${delay}s`;
                observer.observe(blockItem);
            });
        });
    }

    animateBlocks();
});