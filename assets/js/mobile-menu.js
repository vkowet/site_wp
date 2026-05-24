document.addEventListener('DOMContentLoaded', function () {
    const toggle = document.querySelector('.fms-mobile-toggle');
    const menu = document.querySelector('.fms-mobile-menu');

    if (toggle && menu) {
        toggle.addEventListener('click', function () {
            menu.classList.toggle('active');

            if (menu.classList.contains('active')) {
                toggle.innerHTML = '✕';
            } else {
                toggle.innerHTML = '☰';
            }
        });
    }
});
