<?php get_header(); ?>
<section class="hero" aria-labelledby="hero">
    <div class="hero__container">
        <h2 class="hero__title" id="hero"><?= __('Vers un système bon marché de mesure des polluants atmosphériques', 'ant') ?></h2>
        <a href="#presentation"
           class="hero__link btn"><?= __('Découvrir Antilope', 'ant') ?></a>
    </div>
    <div class="scroll-down">
        <p class="scrolldown--text"><strong>Faites défiler la page</strong> <br> pour en savoir plus</p>
        <svg version="1.1" class="scrolldown-desktop" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
             viewBox="0 0 16 30.1" xml:space="preserve">
            <path class="desktop" d="M8,22.7c-2.1,0-4.2-0.9-5.7-2.5c-1.5-1.6-2.3-3.8-2.3-6V8.5c0-3,1.5-5.9,4-7.4c2.5-1.5,5.5-1.5,8,0
            c2.5,1.5,4,4.3,4,7.4v5.7c0,2.3-0.8,4.4-2.3,6C12.2,21.8,10.1,22.7,8,22.7z M8,1.4c-1.8,0-3.5,0.7-4.7,2.1s-2,3.1-2,5v5.7
            c0,2.5,1.3,4.9,3.3,6.2c2.1,1.3,4.6,1.3,6.7,0c2.1-1.3,3.3-3.6,3.3-6.2V8.5c0-1.9-0.7-3.7-2-5S9.8,1.4,8,1.4L8,1.4z"/>
            <path class="desktop" d="M8,30.1l-3.8-4c-0.2-0.3-0.2-0.7,0-1c0.2-0.3,0.6-0.3,0.9,0l2.8,3l2.8-3c0.3-0.2,0.7-0.2,0.9,0
            c0.2,0.3,0.3,0.7,0,1L8,30.1z"/>
            <path class="desktop" d="M8,9.2c-0.4,0-0.7-0.3-0.7-0.7V4.3c0-0.4,0.3-0.7,0.7-0.7c0.4,0,0.7,0.3,0.7,0.7v4.3c0,0.2-0.1,0.4-0.2,0.5
            C8.3,9.2,8.2,9.2,8,9.2L8,9.2z"/>
        </svg>
        <svg version="1.1" class="scrolldown-mobile" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
             viewBox="0 0 33.9 24.7" xml:space="preserve">
            <path class="mobile" d="M31.9,11.4L17,22l-15-10.3c-0.6-0.4-1.3-0.2-1.7,0.4c-0.4,0.6-0.2,1.3,0.4,1.7l15.8,10.8h0.1c0,0,0.1,0,0.1,0.1
            c0.1,0.1,0.2,0.1,0.5,0.1c0.1,0,0.4,0,0.5-0.1c0,0,0.1,0,0.1-0.1h0.1l15.7-11.1c0.5-0.4,0.6-1.1,0.2-1.7
            C33.2,11.1,32.5,10.9,31.9,11.4L31.9,11.4z"/>
            <path class="mobile" d="M31.9,0.2L17,10.8L1.9,0.4C1.3,0.1,0.6,0.2,0.2,0.8C-0.2,1.4,0,2.1,0.6,2.5l15.8,10.8h0.1c0,0,0.1,0,0.1,0.1
            c0.1,0.1,0.2,0.1,0.5,0.1c0.1,0,0.4,0,0.5-0.1c0,0,0.1,0,0.1-0.1h0.1L33.5,2.2c0.5-0.4,0.6-1.1,0.2-1.7C33.4,0,32.5-0.2,31.9,0.2
            L31.9,0.2z"/>
        </svg>
    </div>
</section>
<main>
    <section class="presentation" aria-labelledby="presentation">
        <h2 class="presentation__title hidden" id="presentation"><?= __('Présentation', 'ant') ?></h2>
        <div class="presentation__content">
            <p class="presentation__meta">
              L’air joue un rôle primordial pour la vie telle que nous la connaissons sur terre. Une mauvaise qualité de l’air a une incidence négative sur la santé humaine et sur l’environnement au sens large. Ses conséquences sont non seulement de nature sanitaire, écologique et économique mais aussi du point de vue humain: disposer d’un air de qualité et sain doit être un droit fondamental.
            </p>
            <a href="<?= get_the_permalink(ant_get_template_page('template-about')); ?>" class="presentation__link btn"><?= __('En savoir plus', 'ant') ?></a>
        </div>
        <img src="<?= get_template_directory_uri() ?>/img/air.jpg" alt="" class="presentation__img">
    </section>
    <section class="modules" aria-labelledby="modules">
        <h2 class="modules__title" id="modules"><?= __('Modules', 'ant') ?></h2>
        <div class="modules__cards">
	        <?php
	        if(($modules = ant_get_modules(3))->have_posts()): while($modules->have_posts()): $modules->the_post()?>
                <article class="module" aria-labelledby="<?= get_post_field('post_name'); ?>">
                    <div class="module__card">
                        <div class="module__content">
                            <h3 class="module__title" id="<?= get_post_field('post_name'); ?>" aria-level="3"><?= get_the_title(); ?></h3>
                            <img src="<?php the_post_thumbnail_url(); ?>" alt="<?= str_replace(':title', get_the_title(), __('Voir le module :title', 'ant')); ?>" class="module__svg style-svg">
                        </div>
                        <a href="<?= get_the_permalink(); ?>" class="module__link btn"><?= __('Voir le module', 'ant') ?></a>
                    </div>
                </article>
	        <?php endwhile; else: ?>
                <p class="modules__empty"><?= __('Il n’y a pas de modules à vous présenter...', 'ant'); ?></p>
	        <?php endif; ?>
        </div>
        <a href="<?= get_post_type_archive_link('module'); ?>"
           class="modules__link secondary--btn"> <?= __('Voir tous les modules', 'ant') ?></a>
    </section>
    <hr>
    <iframe width="560" height="315" allowfullscreen
            src="https://www.youtube.com/embed/hOlzReqeewQ"
            class="video">
    </iframe>
    <section class="contact" aria-labelledby="contact">
        <h3 class="contact__title hidden" id="contact"><?= __('Contactez-nous', 'ant'); ?></h3>
        <div class="contact__card">
            <div class="contact__content">
                <p>Pour toutes questions ou demandes au sujet du projet ou d’un module, n’hésitez pas nous contacter.</p>
                <a href="<?= get_the_permalink(ant_get_template_page('template-contact')); ?>"
                   class="contact__link btn"><?= __('Contactez-nous', 'ant') ?></a>
            </div>
            <div class="contact__coords coord">
				<?php if (($partners = ant_get_partners())->have_posts()):while ($partners->have_posts()): $partners->the_post(); ?>
					<?php $address = get_field('address');?>
                    <div class="coord__content">
                        <h4 class="coord__title"><?= get_the_title(); ?></h4>
                        <div class="address" itemscope itemtype="https://schema.org/PostalAddress">
                            <p class="address__meta" itemprop="name"><?= $address['name'] ?></p>
                            <p class="address__meta" itemprop="streetAddress"><?= $address['street'] ?></p>
                            <p class="address__meta" itemprop="postalCode"><?= $address['city'] ?></p>
                        </div>
                        <p class="coord__mail"><?=get_field('mail') ?></p>
                        <a href="<?=get_field('website') ?>" class="coord__link"><?= str_replace(':name', get_the_title(), __('Visiter le site de l‘:name', 'ant')); ?></a>
                    </div>
				<?php endwhile; endif; ?>
            </div>
        </div>
    </section>
    <section class="articles" aria-labelledby="articles">
        <h2 class="articles__title" id="articles"><?= __('Publications', 'ant') ?></h2>
        <div class="articles__cards">
	        <?php
	        if(($articles = ant_get_articles(3))->have_posts()): while($articles->have_posts()): $articles->the_post();
            ant_include('article');
            endwhile; else: ?>
                <p class="articles__empty"><?= __('Il n’y a pas d‘articles à vous présenter...', 'ant'); ?></p>
	        <?php endif; ?>
        </div>
        <a href="<?= get_post_type_archive_link('module'); ?>"
           class="articles__link secondary--btn"> <?= __('Voir tous les modules', 'ant') ?></a>
    </section>
</main>
<?php get_footer(); ?>