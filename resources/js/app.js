import './bootstrap';

const reveal = () => {
    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.14 });

    document.querySelectorAll('.reveal:not(.is-visible)').forEach((element) => observer.observe(element));
};

const initProjectGallery = () => {
    const gallery = document.querySelector('.imported-project-gallery');
    const lightbox = document.querySelector('[data-gallery-lightbox]');

    if (!gallery || !lightbox || gallery.dataset.lightboxReady) return;
    gallery.dataset.lightboxReady = 'true';

    const items = [...gallery.querySelectorAll('[data-gallery-item]')];
    const image = lightbox.querySelector('.gallery-lightbox__stage img');
    const counter = lightbox.querySelector('[data-gallery-counter]');
    let current = 0;
    let lastFocus = null;

    const render = () => {
        const source = items[current].querySelector('img');
        image.src = source.currentSrc || source.src;
        image.alt = source.alt;
        counter.textContent = `${current + 1} / ${items.length}`;
        const nextSource = items[(current + 1) % items.length]?.querySelector('img');
        if (nextSource) new Image().src = nextSource.currentSrc || nextSource.src;
    };

    const open = (index, trigger) => {
        current = index;
        lastFocus = trigger;
        render();
        lightbox.hidden = false;
        lightbox.setAttribute('aria-hidden', 'false');
        document.body.classList.add('lightbox-open');
        lightbox.querySelector('[data-gallery-close]').focus();
    };

    const close = () => {
        lightbox.hidden = true;
        lightbox.setAttribute('aria-hidden', 'true');
        image.src = '';
        document.body.classList.remove('lightbox-open');
        lastFocus?.focus();
    };

    const move = (step) => {
        current = (current + step + items.length) % items.length;
        render();
    };

    items.forEach((item, index) => {
        item.addEventListener('click', () => open(index, item));
        item.addEventListener('keydown', (event) => {
            if (event.key === 'Enter' || event.key === ' ') {
                event.preventDefault();
                open(index, item);
            }
        });
    });

    lightbox.querySelector('[data-gallery-close]').addEventListener('click', close);
    lightbox.querySelector('[data-gallery-prev]').addEventListener('click', () => move(-1));
    lightbox.querySelector('[data-gallery-next]').addEventListener('click', () => move(1));
    lightbox.addEventListener('click', (event) => { if (event.target === lightbox) close(); });
    document.addEventListener('keydown', (event) => {
        if (lightbox.hidden) return;
        if (event.key === 'Escape') close();
        if (event.key === 'ArrowLeft') move(-1);
        if (event.key === 'ArrowRight') move(1);
    });
};

document.addEventListener('DOMContentLoaded', () => { reveal(); initProjectGallery(); });
document.addEventListener('livewire:navigated', () => { reveal(); initProjectGallery(); });
