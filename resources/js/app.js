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

document.addEventListener('DOMContentLoaded', reveal);
document.addEventListener('livewire:navigated', reveal);
