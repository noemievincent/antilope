<?php
$date_string = get_field('date');
$date = DateTime::createFromFormat('Y-m-d', $date_string);
?>

<article class="article" aria-labelledby="<?= get_post_field('post_name'); ?>">
	<div class="article__card">
        <div class="article__container">
            <img src="<?php the_post_thumbnail_url(); ?>" alt="" class="article__img">
            <div class="article__content">
                <h3 class="article__title" id="<?= get_post_field('post_name'); ?>" aria-level="3"><?= get_the_title(); ?></h3>
                <?php if (get_field('date')):?>
                    <time class="article__date" datetime="<?=get_field('date')?>"><?php echo $date->format('d F Y'); ?></time>
                <?php else: ?>
                    <p class="article__date">Pas de date</p>
                <?php endif; ?>
                <p class="article__excerpt"><?= get_the_content() ?></p>
            </div>
        </div>
        <a href="<?= get_field('link') ?>" class="article__link"><?= __('Lire l‘article', 'ant'); ?></a>
	</div>
</article>