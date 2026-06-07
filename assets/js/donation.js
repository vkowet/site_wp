document.addEventListener('DOMContentLoaded', function () {
    const openButtons = document.querySelectorAll('[data-donation-modal-open]');

    if (!openButtons.length) {
        return;
    }

    let activeModal = null;
    let previousFocus = null;

    const closeModal = () => {
        if (!activeModal) {
            return;
        }

        activeModal.hidden = true;
        activeModal.classList.remove('is-open');
        document.body.classList.remove('donation-modal-open');

        if (previousFocus) {
            previousFocus.focus();
        }

        activeModal = null;
        previousFocus = null;
    };

    const openModal = (modal) => {
        previousFocus = document.activeElement;
        activeModal = modal;
        modal.hidden = false;
        requestAnimationFrame(function () {
            modal.classList.add('is-open');
        });
        document.body.classList.add('donation-modal-open');

        const dialog = modal.querySelector('.donation-check-modal__dialog');
        if (dialog) {
            dialog.focus();
        }
    };

    openButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            const modal = document.getElementById(button.dataset.donationModalOpen);
            if (modal) {
                openModal(modal);
            }
        });
    });

    document.addEventListener('click', function (event) {
        if (event.target.matches('[data-donation-modal-close]')) {
            closeModal();
        }
    });

    document.addEventListener('keydown', function (event) {
        if (event.key === 'Escape') {
            closeModal();
        }
    });
});
