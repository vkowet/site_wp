document.addEventListener('DOMContentLoaded', function () {
    const mainNav = document.querySelector('.fms-main-nav');

    if (!mainNav) {
        return;
    }

    const placeholder = document.createElement('div');
    placeholder.className = 'fms-main-nav-placeholder';
    mainNav.parentNode.insertBefore(placeholder, mainNav.nextSibling);

    let navTop = 0;

    const adminOffset = () => {
        const adminBar = document.getElementById('wpadminbar');
        return adminBar && window.getComputedStyle(adminBar).position === 'fixed'
            ? adminBar.offsetHeight
            : 0;
    };

    const measure = () => {
        mainNav.classList.remove('is-fixed');
        placeholder.classList.remove('is-active');
        placeholder.style.height = '0px';
        navTop = mainNav.getBoundingClientRect().top + window.scrollY - adminOffset();
    };

    const update = () => {
        const shouldFix = window.scrollY >= navTop;
        mainNav.classList.toggle('is-fixed', shouldFix);
        placeholder.classList.toggle('is-active', shouldFix);
        placeholder.style.height = shouldFix ? `${mainNav.offsetHeight}px` : '0px';
    };

    measure();
    update();

    window.addEventListener('scroll', update, { passive: true });
    window.addEventListener('resize', function () {
        measure();
        update();
    });
});

document.addEventListener('DOMContentLoaded', function () {
    const backToTop = document.querySelector('.fms-back-to-top');

    if (!backToTop) {
        return;
    }

    const toggleBackToTop = () => {
        backToTop.classList.toggle('is-visible', window.scrollY > 500);
    };

    backToTop.addEventListener('click', function () {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });

    toggleBackToTop();
    window.addEventListener('scroll', toggleBackToTop, { passive: true });
});
