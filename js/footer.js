document.addEventListener('DOMContentLoaded', function() {
    const scrollToTopButton = document.getElementById('scroll-to-top');

    window.addEventListener('scroll', function() {
        if (window.pageYOffset > 100) {
            scrollToTopButton.style.display = 'block';
        } else {
            scrollToTopButton.style.display = 'none';
        }
    });

    scrollToTopButton.addEventListener('click', function() {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
});