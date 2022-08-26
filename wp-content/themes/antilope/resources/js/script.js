class ANT_Controller {
    constructor() {
        // Ici, le DOM n'est pas encore prêt
        // Pour le moment, rien à faire
    }

    run() {
        // Ici, le DOM est prêt
        document.documentElement.classList.remove('js-disabled');
        document.documentElement.classList.add('js-enabled');

        this.fadeItems();
        this.appearScrollUp();
        this.removeScrollDown();
    }

    fadeItems() {
        const items = document.querySelectorAll(".fade-in");

        let options = {
            root: null,
            rootMargin: '0px',
            threshold: 0.3,
        };

        let observer = new IntersectionObserver(callback, options);
        for (const item of items) {
            observer.observe(item);
            item.addEventListener('load', (event) => {
            });
        }
        console.log(items);

        function callback(entries, observer) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('active');
                }
            });
        }
    }

    appearScrollUp() {
        const scrollUp = document.querySelector(".scrollup");

        window.addEventListener("scroll", function () {
            console.log(window.scrollY);
            if (window.scrollY > 300) {
                scrollUp.classList.add('active');
            } else {
                scrollUp.classList.remove('active');
            }
        }, false);
    }

    removeScrollDown() {
        const scrollDown = document.querySelector(".scroll-down");

        window.addEventListener("scroll", function () {
            console.log(window.scrollY);
            if (window.scrollY > 100) {
                scrollDown.classList.add('hide');
            } else {
                scrollDown.classList.remove('hide');
            }
        }, false);
    }
}

window.ant = new ANT_Controller();
window.addEventListener('load', () => window.ant.run());