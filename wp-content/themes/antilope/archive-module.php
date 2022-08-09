<?php get_header(); ?>
<main>
    <section class="modules" aria-labelledby="modules">
        <h2 class="modules__title" id="modules" aria-level="2"><?= __('Nos modules', 'ant'); ?></h2>
        <div class="modules__container slider">
            <?php if (have_posts()): while (have_posts()): the_post();
                ant_include('module');
            endwhile;
            else: ?>
                <p class="modules__empty"><?= __('Il n’y a pas de modules à vous présenter...', 'ant'); ?></p>
            <?php endif;?>
        </div>
    </section>
</main>
<?php get_footer(); ?>