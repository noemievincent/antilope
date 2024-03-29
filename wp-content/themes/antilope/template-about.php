<?php /* Template Name: About page template */ ?>
<?php get_header(); ?>
<main>
    <section class="about" aria-labelledby="about">
        <h2 class="about__title" id="about" aria-level="2"><?= get_the_title(); ?></h2>
        <section class="project" aria-labelledby="project">
            <h3 class="project__title" id="project"><?= __('Le projet', 'ant'); ?></h3>
            <div class="project__container">
                <p class="project__content"><?=  get_the_content(); ?></p>
                <div class="project__gallery">
                    <figure class="project__figure">
                        <img src="<?= get_field('image_1'); ?>" alt="" class="project__img">
                    </figure>
                    <figure class="project__figure">
                        <img src="<?= get_field('image_2'); ?>" alt="" class="project__img">
                    </figure>
                </div>
            </div>
        </section>
        <section class="partner fade-in" aria-labelledby="partner">
            <h3 class="partner__title" id="partner"><?= __('Les partenaires', 'ant'); ?></h3>
            <div class="partner__cards">
                <?php if (($partners = ant_get_partners())->have_posts()):while ($partners->have_posts()): $partners->the_post(); ?>
                    <div class="partner__card box-shadow box-shadow--hover card">
                        <div class="card__container">
                            <div class="card__content">
                                <h4 class="card__title"><?= get_the_title(); ?></h4>
                                <p class="card__meta"><?= get_the_content(); ?></p>
                            </div>
                            <a href="<?=get_field('website') ?>" class="card__link btn" target="_blank"><?= __('Se rendre sur le site', 'ant'); ?></a>
                        </div>
                        <figure class="card__fig">
                            <img src="<?php the_post_thumbnail_url(); ?>" alt="" class="card__img">
                        </figure>
                    </div>
                <?php endwhile; endif; ?>
            </div>
        </section>
        <section class="contact-card fade-in" aria-labelledby="contact">
            <h3 class="contact-card__title" id="contact"><?= __('Des questions ?', 'ant'); ?></h3>
            <div class="contact-card__card box-shadow">
                <div class="contact-card__content">
                    <p class="contact-card__meta"><?= __('Pour toutes questions ou demandes au sujet du projet ou d’un module, n’hésitez pas nous contacter.', 'ant'); ?></p>
                    <a href="<?= get_the_permalink(ant_get_template_page('template-contact')); ?>"
                       class="contact-card__link btn"><?= __('Contactez-nous', 'ant') ?></a>
                </div>
                <div class="contact-card__coords coord">
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
                            <a href="<?=get_field('website') ?>" class="coord__link" target="_blank"><?= str_replace(':name', get_the_title(), __('Vers le site de l‘:name', 'ant')); ?></a>
                        </div>
				    <?php endwhile; endif; ?>
                </div>
            </div>
        </section>
    </section>
</main>
<?php get_footer(); ?>