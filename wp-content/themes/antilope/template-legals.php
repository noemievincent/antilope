<?php /* Template Name: Legals page template */ ?>
<?php get_header(); ?>
<?php if (have_posts()): while (have_posts()): the_post(); ?>
    <main class="layout">
        <section class="legals" aria-labelledby="legals">
            <h2 class="legals__title" id="legals" aria-level="2"><?= get_the_title(); ?></h2>
            <div class="legals__container has-2-columns">
                <section class="legals__coords" aria-labelledby="coords">
                    <h3 id="coords" aria-level="3"><?= __('Informations légales', 'prt'); ?></h3>
                    <div class="coords__container" itemscope itemtype="https://schema.org/Person">
                        <div class="contact__coord mail">
                            <div class="coord__head">
                                <h4 class="coord__title" aria-level="4"><?= __('Mail', 'prt') ?></h4>
                                <img src="<?= get_field('mail_icon'); ?>" alt="" class="coord__icon style-svg"
                                     width="15"
                                     height="15">
                            </div>
                            <p class="coord__meta" itemprop="email">
                                <a href="mailto:<?= get_field('mail'); ?>"
                                   class="coord__link"><?= get_field('mail'); ?></a>
                            </p>
                        </div>
                        <div class="contact__coord tel">
                            <div class="coord__head">
                                <h4 class="coord__title" aria-level="4"><?= __('Téléphone', 'prt') ?></h4>
                                <img src="<?= get_field('phone_icon'); ?>" alt="" class="coord__icon style-svg"
                                     width="15"
                                     height="15">
                            </div>
                            <p class="coord__meta" itemprop="telephone"><?= get_field('phone'); ?></p>
                        </div>
                        <div class="contact__coord address">
                            <div class="coord__head">
                                <h4 class="coord__title" aria-level="4"><?= __('Adresse', 'prt') ?></h4>
                                <img src="<?= get_field('address_icon'); ?>" alt="" class="coord__icon style-svg"
                                     width="15" height="15">
                            </div>
                            <div class="address" itemscope itemtype="https://schema.org/PostalAddress">
                                <p class="coord__meta" itemprop="name"><?= get_field('address_name'); ?></p>
                                <a href="https://goo.gl/maps/TF2PkphQEhrZBN1G7">
                                    <p class="coord__meta" itemprop="streetAddress"><?= get_field('address_street'); ?></p>
                                    <p class="coord__meta" itemprop="postalCode"><?= get_field('address_city'); ?></p>
                                </a>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="legals__container" aria-labelledby="terms">
                    <h3 id="terms" aria-level="3"><?= __('Clause de confidentialité', 'prt'); ?></h3>
                    <p class="legals__terms"><?= get_the_content(); ?></p>
                </section>
            </div>
        </section>
    </main>
<?php endwhile; endif; ?>
<?php get_footer(); ?>