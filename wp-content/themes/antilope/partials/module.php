<article class="module" aria-labelledby="<?= get_post_field('post_name'); ?>">
	<div class="module__card">
        <div class="module__content">
            <h3 class="module__title" id="<?= get_post_field('post_name'); ?>" aria-level="3"><?= get_the_title(); ?></h3>
            <p class="module__excerpt"><?= get_field('excerpt'); ?></p>
            <a href="<?= get_the_permalink(); ?>" class="module__link btn"><?= __('Voir le module', 'ant') ?></a>
        </div>
        <img src="<?php the_post_thumbnail_url(); ?>" alt="<?= str_replace(':title', get_the_title(), __('Voir le module :title', 'ant')); ?>" class="module__svg style-svg">
	</div>
</article>