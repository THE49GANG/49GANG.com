window.addEventListener('load', () => {
    const links = document.querySelectorAll('a');

    links.forEach(link => {
        link.addEventListener('click', (event) => {
            const href = link.getAttribute('href').toLowerCase();
            const newHref = document.querySelector(`a[href="${href}"]`);

            if (newHref) {
                event.preventDefault();
                window.location.href = newHref.href;
            }
        });
    });
});