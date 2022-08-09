<?php
/**
 * The template for displaying 404 pages (Not Found)
 */

get_header(); ?>
<main class="error404">
    <section aria-labelledby="error404" class="error404__container">
        <div>
            <h2 class="error404__title" id="error404" aria-level="2">404</h2>
            <h3 class="error404__subtitle"><?= __('Page non trouvée', 'prt') ?></h3>
        </div>
        <p class="error404__content"><?= str_replace(':home', '<a href="' . home_url() . '" class="error404__link">' . __('l’accueil', 'prt') . '</a>', __('Retourner à :home', 'prt')) ?></p>
    </section>
</main>
<?php get_footer(); ?>
