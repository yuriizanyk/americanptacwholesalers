document.addEventListener('DOMContentLoaded', function () {
    const body = document.querySelector('body');
    const header = document.querySelector('.wcl-header');
    if (!header) return;
    const menu = document.querySelector('.menu');
    if (!menu) return;
    const menuBody = menu.querySelector('.menu__body');
    if (!menuBody) return;
    const menuIcon = header.querySelector('.menu-icon');
    if (!menuIcon) return;

    menuIcon.addEventListener('click', function () {
        this.classList.toggle('is-open');
        menuBody.classList.toggle('is-open');
        body.classList.toggle('lock');
    });
});