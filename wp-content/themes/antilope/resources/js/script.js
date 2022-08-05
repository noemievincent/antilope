class ANT_Controller {
    constructor() {
        // Ici, le DOM n'est pas encore prêt
        // Pour le moment, rien à faire
    }

    run() {
        // Ici, le DOM est prêt
    }
}

window.ant = new ANT_Controller();
window.addEventListener('load', () => window.ant.run());