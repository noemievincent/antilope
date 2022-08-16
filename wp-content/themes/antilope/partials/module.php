<article class="module__card fade-in" aria-labelledby="<?= get_post_field('post_name'); ?>">
    <div class="module__container">
        <div class="module__content">
            <h3 class="module__title" id="<?= get_post_field('post_name'); ?>" aria-level="3"><?= get_the_title(); ?></h3>
            <p class="module__excerpt"><?= get_field('excerpt'); ?></p>
        </div>
        <a href="<?= get_the_permalink(); ?>" class="module__link btn"><?= __('Voir le module', 'ant') ?></a>
    </div>
    <div class="module__img">
        <img src="<?php the_post_thumbnail_url(); ?>" alt="<?= str_replace(':title', get_the_title(), __('Voir le module :title', 'ant')); ?>" class="module__svg style-svg">
    </div>
</article>