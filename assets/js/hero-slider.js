document.addEventListener('DOMContentLoaded', function () {
    const slider = document.querySelector('.fms-hero-slider');

    if (!slider) {
        return;
    }

    const slides = Array.from(slider.querySelectorAll('.fms-slide'));
    const prevButton = slider.querySelector('.fms-slider-prev');
    const nextButton = slider.querySelector('.fms-slider-next');
    const dots = Array.from(slider.querySelectorAll('.fms-slider-dots button'));

    if (!slides.length) {
        return;
    }

    let current = slides.findIndex((slide) => slide.classList.contains('active'));
    let timer = null;

    if (current < 0) {
        current = 0;
    }

    const showSlide = (index) => {
        slides[current].classList.remove('active');
        dots[current]?.classList.remove('active');

        current = (index + slides.length) % slides.length;

        slides[current].classList.add('active');
        dots[current]?.classList.add('active');
    };

    const restart = () => {
        window.clearInterval(timer);
        timer = window.setInterval(() => showSlide(current + 1), 6000);
    };

    prevButton?.addEventListener('click', function () {
        showSlide(current - 1);
        restart();
    });

    nextButton?.addEventListener('click', function () {
        showSlide(current + 1);
        restart();
    });

    dots.forEach((dot, index) => {
        dot.addEventListener('click', function () {
            showSlide(index);
            restart();
        });
    });

    dots[current]?.classList.add('active');
    restart();
});
