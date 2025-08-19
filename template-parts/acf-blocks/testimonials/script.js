document.addEventListener("DOMContentLoaded", function () {

    const testimonialsSlider = document.querySelector("#testimonials-slider");

    if (testimonialsSlider) {

        let swiper = new Swiper(testimonialsSlider, {
            loop: true,
            navigation: false,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            slidesPerView: 2,
            speed: 1500,
            autoplay: {
                delay: 7000,
                disableOnInteraction: false,
            },
            breakpoints: {
                769: {
                    slidesPerView: 2,
                },
                320: {
                    slidesPerView: 1,
                }
            }
        });
    }

    const ratings = document.querySelectorAll('[data-rating]')
    if (ratings) {
        ratings.forEach(rating => {
            const currentValue = +rating.dataset.rating;
            currentValue ? starRatingSet(rating, currentValue) : null;
        });
    }

    function starRatingSet(rating, value) {
        const ratingItems = rating.querySelectorAll('.rating__item');
        if (!ratingItems) {
            return;
        }
        const resultFullItems = parseInt(value);
        const resultPartItem = value - resultFullItems;

        ratingItems.forEach((ratingItem, index) => {
            ratingItem.classList.remove('active');
            ratingItem.querySelector('span') ? ratingItems[index].querySelector('span').remove() : null;

            if (index <= (resultFullItems - 1)) {
                ratingItem.classList.add('active');
            }
            if (index === resultFullItems && resultPartItem) {
                ratingItem.insertAdjacentHTML("beforeend", `<span style="width:${resultPartItem * 100}%"></span>`)
            }
        });
    }
});