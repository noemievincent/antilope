<?php /* Template Name: Legals page template */ ?>
<?php get_header(); ?>
<?php if (have_posts()): while (have_posts()): the_post(); ?>
    <main class="layout">
        <section class="legals" aria-labelledby="legals">
            <h2 class="legals__title" id="legals" aria-level="2"><?= get_the_title(); ?></h2>
            <div class="legals__container has_2_columns">
                <section class="legals__container" aria-labelledby="terms">
                    <h3 id="terms" aria-level="3"><?= __('Clause de confidentialité', 'ant'); ?></h3>
                    <p class="legals__terms"><?= get_the_content(); ?></p>
                </section>
                <section class="legals__coords contact__coords coords" aria-labelledby="coords">
                    <h3 class="coords__title hidden" id="coords"><?= __('Coordonnées', 'ant'); ?></h3>
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
                            <div class="coord__socials">
                                <a href="<?=get_field('first_social_link') ?>" class="coord__social">
                                    <img src="<?=get_field('first_social_logo') ?>" class="coord__svg style-svg">
                                </a>
                                <a href="<?=get_field('second_social_link') ?>" class="coord__social">
                                    <img src="<?=get_field('second_social_logo') ?>" class="coord__svg style-svg">
                                </a>
                            </div>
                        </div>
		            <?php endwhile; endif; ?>
                </section>
            </div>
        </section>
    </main>
<?php endwhile; endif; ?>
<?php get_footer(); ?>