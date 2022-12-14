<?php
$date_string = get_field('date');
$date = DateTime::createFromFormat('Y-m-d', $date_string);
?>

<article class="article fade-in" aria-labelledby="<?= get_post_field('post_name'); ?>">
    <div class="article__card">
        <div class="article__container box-shadow box-shadow--hover">
            <div class="article__header">
                <img src="<?php the_post_thumbnail_url(); ?>" alt="" class="article__img">
            </div>
            <div class="article__content">
                <h3 class="article__title" id="<?= get_post_field('post_name'); ?>"><?= get_the_title(); ?></h3>
				<?php if (get_field('date')):?>
                    <time class="article__date" datetime="<?=get_field('date')?>"><?php echo $date->format('d F Y'); ?></time>
				<?php else: ?>
                    <p class="article__date"><?= __('Pas de date', 'ant'); ?></p>
				<?php endif; ?>
                <p class="article__excerpt"><?= get_the_content() ?></p>
            </div>
        </div>
        <a href="<?= get_field('link') ?>" class="article__link article__cta btn" target="_blank"><?= __('Lire l‘article', 'ant'); ?></a>
    </div>
</article>