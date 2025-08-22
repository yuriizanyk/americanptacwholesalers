document.addEventListener('DOMContentLoaded', () => {
    const sliders = document.querySelectorAll(".wcl-state__product-slider");

    sliders.forEach((slider, index) => {
        new Swiper(slider, {
            loop: true,
            navigation: {
                nextEl: slider.querySelector('.swiper-button-next'),
                prevEl: slider.querySelector('.swiper-button-prev'),
            },
            pagination: {
                el: slider.querySelector('.swiper-pagination'),
                clickable: true,
            },
            slidesPerView: 1,
        });
    });
});