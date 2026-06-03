import './bootstrap';
// import Alpine from 'alpinejs';

// window.Alpine = Alpine;

// Theme toggle (persisted)
const root = document.documentElement;
const saved = localStorage.getItem('theme');
if (saved === 'dark' || (!saved && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
    root.classList.add('dark');
}

window.toggleTheme = () => {
    root.classList.toggle('dark');
    localStorage.setItem('theme', root.classList.contains('dark') ? 'dark' : 'light');
};

// Reveal on scroll
const io = new IntersectionObserver((entries) => {
    entries.forEach((e) => {
        if (e.isIntersecting) {
            e.target.classList.add('is-visible');
            io.unobserve(e.target);
        }
    });
}, { threshold: 0.1 });
// document.addEventListener('DOMContentLoaded', () => {
//     document.querySelectorAll('[data-reveal]').forEach((el) => io.observe(el));
// });
// document.addEventListener('livewire:navigated', () => {
//     document.querySelectorAll('[data-reveal]').forEach((el) => io.observe(el));
// });

// Alpine.start();
const observeReveal = () => {
    document.querySelectorAll('[data-reveal]:not(.is-visible)').forEach((el) => io.observe(el));
};

document.addEventListener('DOMContentLoaded', observeReveal);
document.addEventListener('livewire:navigated', observeReveal);
