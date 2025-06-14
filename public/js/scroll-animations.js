// Scroll Animations using Intersection Observer

(function() {
    // Options for the observer
    const options = {
        root: null, // viewport
        rootMargin: '0px',
        threshold: 0.1 // 10% visible
    };

    // Callback function executed when entries change
    function callback(entries, observer) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
                observer.unobserve(entry.target);
            }
        });
    }

    // Initialize observer
    const observer = new IntersectionObserver(callback, options);

    // Add observer to elements with .fade-in-on-scroll class
    document.addEventListener('DOMContentLoaded', function() {
        const elements = document.querySelectorAll('.fade-in-on-scroll');
        elements.forEach(el => {
            observer.observe(el);
        });
    });
})();