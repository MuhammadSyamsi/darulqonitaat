// main.js

// 1. Alpine.js
// Gunakan CDN di HTML atau import di JS
document.addEventListener('alpine:init', () => {
    // Data global untuk toggle mobile menu
    Alpine.data('menu', () => ({
        open: false,
        toggle() { this.open = !this.open }
    }));
});

// 2. AOS (Animate On Scroll)
// Inisialisasi AOS untuk animasi scroll
document.addEventListener('DOMContentLoaded', () => {
    if (typeof AOS !== 'undefined') {
        AOS.init({
            duration: 800, // durasi animasi
            easing: 'ease-out',
            once: true,    // animasi hanya sekali
        });
    }
});
