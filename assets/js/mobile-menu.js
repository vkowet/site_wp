document.addEventListener('DOMContentLoaded', function () {
    const toggle = document.querySelector('.fms-mobile-toggle');
    const menu = document.querySelector('.fms-mobile-menu');

    if (toggle && menu) {
        toggle.addEventListener('click', function () {
            menu.classList.toggle('active');
            toggle.innerHTML = menu.classList.contains('active') ? '✕' : '☰';
        });
    }

    const parents = document.querySelectorAll('.fms-mobile-menu .menu-item-has-children > a');

    parents.forEach(function (link) {
        link.addEventListener('click', function (e) {
            e.preventDefault();

            const parent = this.parentElement;
            parent.classList.toggle('submenu-open');
        });
    });
});
