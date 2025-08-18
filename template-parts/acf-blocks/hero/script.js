document.addEventListener('DOMContentLoaded', () => {
    const container = document.querySelector('.marquee');
    if (!container) return;

    const track = container.querySelector('.marquee__track');
    if (!track) return;

    const slide = track.querySelector('.marquee__container');
    if (!slide) return;

    const targetWidth = container.offsetWidth * 2;

    while (track.offsetWidth < targetWidth) {
        const clone = slide.cloneNode(true);
        track.appendChild(clone);
    }
});