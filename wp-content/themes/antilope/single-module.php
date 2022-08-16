<?php get_header(); ?>
<?php if (have_posts()): while (have_posts()): the_post(); ?>
    <main class="singleModule">
        <section aria-labelledby="singleModule">
            <div class="singleModule__header fade-in">
                <h2 class="singleModule__title" id="singleModule" aria-level="2"><?= get_the_title(); ?></h2>
                <a href="<?= get_post_type_archive_link('module') ?>"
                   class="singleModule__return secondary--btn arrow"><?= __('Retour aux modules', 'ant') ?></a>
            </div>
            <div class="singleModule__presentation pres fade-in">
                <div class="pres__left">
                    <p class="pres__content">
                        <?= get_the_content(); ?>
                    </p>
                    <a href="<?= get_the_permalink(ant_get_template_page('template-contact')); ?>"
                       class="pres__contact btn"><?= __('Nous contacter', 'ant') ?></a>
                </div>
                <figure class="pres__fig">
                    <img src="<?= get_field('main_picture'); ?>" alt="" class="pres__image">
                </figure>
            </div>
            <hr>
            <div class="singleModule__about fade-in">
                <div class="singleModule__cards">
                    <div class="singleModule__card singleModule__features features">
                        <h3 class="features__title"><?= __('Caractéristiques', 'ant') ?></h3>
                        <?= get_field('features'); ?>
                    </div>
                    <div class="singleModule__card singleModule__pollutants pollutants">
                        <div class="pollutants__content">
                            <h3 class="pollutants__title"><?= __('Polluants mesurés', 'ant') ?></h3>
                            <?= get_field('mesured_pollutants'); ?>
                        </div>
                        <a href="https://www.wallonair.be/fr/"
                           class="pollutants__link btn" target="_blank"><?= __('Voir les résultats en direct', 'ant') ?></a>
                    </div>
                </div>
                <div class="singleModule__gallery">
                    <figure class="singleModule__figure">
                        <img src="<?= get_field('picture_1'); ?>" alt="" class="singleModule__img">
                    </figure>
                    <figure class="singleModule__figure">
                        <img src="<?= get_field('picture_2'); ?>" alt="" class="singleModule__img">
                    </figure>
                    <figure class="singleModule__figure">
                        <img src="<?= get_field('picture_3'); ?>" alt="" class="singleModule__img">
                    </figure>
                </div>
                <a href="<?= get_the_permalink(ant_get_template_page('template-contact')); ?>"
                   class="singleModule__contact btn"><?= __('Contactez-nous', 'ant') ?></a>
            </div>
            <div class="singleModule__nav fade-in">
                <?php ant_previous_post_link('module'); ?>
                <?php ant_next__post_link('module'); ?>
            </div>
        </section>
    </main>
<?php endwhile; endif; ?>
<?php get_footer(); ?>