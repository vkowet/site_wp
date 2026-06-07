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
        toggle.setAttribute('aria-expanded', 'false');
    }

    function openMenu() {
        menu.classList.add('active');
        overlay.classList.add('active');
        document.body.classList.add('fms-menu-open');
        toggle.innerHTML = '✕';
        toggle.setAttribute('aria-expanded', 'true');
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



    toggle.setAttribute('aria-expanded', 'false');
    toggle.setAttribute('aria-controls', 'fms-mobile-menu');
    menu.setAttribute('id', 'fms-mobile-menu');

    menu.querySelectorAll('.menu-item-has-children > a').forEach(function (link) {
        link.setAttribute('aria-expanded', 'false');

        link.addEventListener('click', function (e) {
            if (window.innerWidth > 992) {
                return;
            }

            const parent = link.parentElement;
            const submenu = parent ? parent.querySelector(':scope > .sub-menu') : null;

            if (!submenu) {
                return;
            }

            if (!parent.classList.contains('submenu-open')) {
                e.preventDefault();
                parent.classList.add('submenu-open');
                link.setAttribute('aria-expanded', 'true');
                return;
            }
        });
    });

    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape' && menu.classList.contains('active')) {
            closeMenu();
        }
    });

    overlay.addEventListener('click', closeMenu);

});
