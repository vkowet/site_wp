document.addEventListener('DOMContentLoaded', function () {

    const toggle = document.querySelector('.fms-mobile-toggle');
    const menu = document.querySelector('.fms-mobile-menu');

    if (!toggle || !menu) {
        return;
    }

    if (window.fmsMobileInitialized) {
        return;
    }

    window.fmsMobileInitialized = true;

    let overlay = document.querySelector('.fms-mobile-overlay');

    if (!overlay) {
        overlay = document.createElement('div');
        overlay.classList.add('fms-mobile-overlay');
        document.body.appendChild(overlay);
    }

    function closeMenu() {
        menu.classList.remove('active');
        overlay.classList.remove('active');
        document.body.classList.remove('fms-menu-open');
        toggle.innerHTML = '☰';
    }

    function openMenu() {
        menu.classList.add('active');
        overlay.classList.add('active');
        document.body.classList.add('fms-menu-open');
        toggle.innerHTML = '✕';
    }

    toggle.addEventListener('click', function (e) {
        e.preventDefault();
        e.stopPropagation();

        if (menu.classList.contains('active')) {
            closeMenu();
        } else {
            openMenu();
        }
    });

    overlay.addEventListener('click', closeMenu);

});
