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
    }

    fadeItems() {
        const items = document.querySelectorAll(".fade-in");

        let options = {
            root: null,
            rootMargin: '0px',
            threshold: 0.3,
        }

        let observer = new IntersectionObserver(callback, options);
        for (const item of items) {
            observer.observe(item);
            item.addEventListener('load', (event) => {
            })
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

        console.log(scrollUp)

        window.addEventListener("scroll", function(){
            console.log(window.scrollY);
            if(window.scrollY > 300){
                scrollUp.classList.add('active')
            }
            else {
                scrollUp.classList.remove('active')
            }
        }, false);
    }
}

window.ant = new ANT_Controller();
window.addEventListener('load', () => window.ant.run());