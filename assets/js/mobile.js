document.addEventListener('DOMContentLoaded', function () {
    const toggle = document.querySelector('.fms-mobile-toggle');
    const menu = document.querySelector('.fms-mobile-menu');

    if (!toggle || !menu) return;

    const overlay = document.createElement('div');
    overlay.classList.add('fms-mobile-overlay');
    document.body.appendChild(overlay);

    function closeMenu() {
        menu.classList.remove('active');
        overlay.classList.remove('active');
        toggle.innerHTML = '☰';
        document.body.classList.remove('fms-menu-open');
    }

    function openMenu() {
        menu.classList.add('active');
        overlay.classList.add('active');
        toggle.innerHTML = '✕';
        document.body.classList.add('fms-menu-open');
    }

    toggle.addEventListener('click', function () {
        if (menu.classList.contains('active')) {
            closeMenu();
        } else {
            openMenu();
        }
    });

    overlay.addEventListener('click', closeMenu);

    const parents = document.querySelectorAll('.fms-mobile-menu .menu-item-has-children > a');

    parents.forEach(function (link) {
        link.addEventListener('click', function (e) {
            e.preventDefault();
            this.parentElement.classList.toggle('submenu-open');
        });
    });
});
