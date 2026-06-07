document.addEventListener('DOMContentLoaded', function () {
    const counters = document.querySelectorAll('.fms-stat-number');

    if (!counters.length) {
        return;
    }

    const parseTarget = (rawValue) => {
        const value = String(rawValue || '').trim();
        const match = value.match(/^(\d+(?:[.,]\d+)?)(.*)$/);

        if (!match) {
            return null;
        }

        return {
            number: Number(match[1].replace(',', '.')),
            suffix: match[2] || '',
            decimals: match[1].includes(',') || match[1].includes('.') ? 1 : 0,
        };
    };

    const formatNumber = (value, decimals) => {
        return decimals > 0
            ? value.toFixed(decimals).replace('.', ',')
            : Math.round(value).toString();
    };

    const animateCounter = (counter) => {
        if (counter.dataset.animated === '1') {
            return;
        }

        const parsed = parseTarget(counter.getAttribute('data-target'));

        if (!parsed || Number.isNaN(parsed.number)) {
            counter.textContent = counter.getAttribute('data-target') || '';
            counter.dataset.animated = '1';
            return;
        }

        counter.dataset.animated = '1';

        const target = parsed.number;
        const duration = 1400;
        const startTime = performance.now();
        const start = target >= 1 ? 1 : 0;

        const tick = (now) => {
            const progress = Math.min((now - startTime) / duration, 1);
            const eased = 1 - Math.pow(1 - progress, 3);
            const current = start + (target - start) * eased;

            counter.textContent = formatNumber(current, parsed.decimals) + parsed.suffix;

            if (progress < 1) {
                requestAnimationFrame(tick);
            } else {
                counter.textContent = formatNumber(target, parsed.decimals) + parsed.suffix;
            }
        };

        counter.textContent = formatNumber(start, parsed.decimals) + parsed.suffix;
        requestAnimationFrame(tick);
    };

    if ('IntersectionObserver' in window) {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    animateCounter(entry.target);
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.35 });

        counters.forEach((counter) => observer.observe(counter));
        return;
    }

    counters.forEach(animateCounter);
});
