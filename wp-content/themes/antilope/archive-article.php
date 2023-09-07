<?php get_header(); ?>
<main>
    <section class="articles" aria-labelledby="articles">
        <h2 class="articles__title" id="articles" aria-level="2"><?= __('Publications', 'ant'); ?></h2>
        <div class="articles__container">
            <?php if (have_posts()): while (have_posts()): the_post();
                ant_include('article');
            endwhile;
            else: ?>
                <p class="articles__empty"><?= __('Il n’y a pas de publications à vous présenter...', 'ant'); ?></p>
            <?php endif;?>
        </div>
    </section>
</main>
<?php get_footer(); ?>