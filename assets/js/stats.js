document.addEventListener('DOMContentLoaded', function () {
    const counters = document.querySelectorAll('.fms-stat-number');

    counters.forEach(counter => {
        const target = +counter.getAttribute('data-target');
        let count = 0;
        const increment = Math.ceil(target / 80);

        const updateCounter = () => {
            count += increment;
            if (count >= target) {
                counter.innerText = target;
            } else {
                counter.innerText = count;
                requestAnimationFrame(updateCounter);
            }
        };

        updateCounter();
    });
});
