<?php /* Template Name: Contact page template */ ?>
<?php get_header(); ?>
<main>
    <section class="contact" aria-labelledby="contact">
        <h2 class="contact__title" id="contact"><?= get_the_title(); ?></h2>
        <div class="has_2_columns">
            <section class="contact__form form" aria-labelledby="form">
                <h3 class="form__title hidden" id="form"><?= __('Formulaire de contact', 'ant'); ?></h3>
                <?php if (!isset($_SESSION['contact_form_feedback']) || !$_SESSION['contact_form_feedback']['success']) : ?>
                    <form action="<?= substr(get_home_url(), 0, -2); ?>wp-admin/admin-post.php" method="POST"
                          class="form">
                        <?php if (isset($_SESSION['contact_form_feedback'])) : ?>
                            <p class="form__error form__title"><?= __('Oups ! Il y a des erreurs dans le formulaire', 'ant') ?></p>
                        <?php endif; ?>
                        <div class="flex">
                            <div class="form__field">
                                <label for="lastname" class="form__label"><?= __('Votre nom', 'ant') ?></label>
                                <?= isset($_SESSION['contact_form_feedback']['errors']['lastname']) ? '<p class="form__error">' . $_SESSION['contact_form_feedback']['errors']['lastname'] . '</p>' : '' ?>
                                <input type="text" size="5" name="lastname" id="lastname" placeholder="Drew"
                                       class="form__input">
                            </div>
                            <div class="form__field">
                                <label for="firstname" class="form__label"><?= __('Votre prénom', 'ant') ?></label>
                                <?= isset($_SESSION['contact_form_feedback']['errors']['firstname']) ? '<p class="form__error">' . $_SESSION['contact_form_feedback']['errors']['firstname'] . '</p>' : '' ?>
                                <input type="text" size="5" name="firstname" id="firstname" placeholder="Sally"
                                       class="form__input">
                            </div>
                        </div>
                        <div class="form__field">
                            <label for="email" class="form__label"><?= __('Votre adresse e-mail', 'ant') ?></label>
                            <?= isset($_SESSION['contact_form_feedback']['errors']['email']) ? '<p class="form__error">' . $_SESSION['contact_form_feedback']['errors']['email'] . '</p>' : '' ?>
                            <input type="email" name="email" id="email" placeholder="drew-sally@example.com"
                                   class="form__input">
                        </div>
                        <div class="form__field">
                            <label for="who" class="form__label"><?= __('Vous êtes', 'ant') ?></label>
                            <?= isset($_SESSION['contact_form_feedback']['errors']['who']) ? '<p class="form__error">' . $_SESSION['contact_form_feedback']['errors']['who'] . '</p>' : '' ?>
                            <select name="who" id="who" class="form__select">
                                <option value="student"><?= __('un étudiant', 'ant') ?></option>
                                <option value="city"><?= __('une ville', 'ant') ?></option>
                                <option value="scientist"><?= __('un scientifique', 'ant') ?></option>
                                <option value="professor"><?= __('un professeur', 'ant') ?></option>
                                <option value="other"><?= __('autre', 'ant') ?></option>
                            </select>
                        </div>
                        <div class="form__field">
                            <label for="message" class="form__label"><?= __('Votre message', 'ant') ?></label>
                            <?= isset($_SESSION['contact_form_feedback']['errors']['message']) ? '<p class="form__error">' . $_SESSION['contact_form_feedback']['errors']['message'] . '</p>' : '' ?>
                            <textarea name="message" id="message" cols="30" rows="12" class="form__textarea"
                                      placeholder="<?= __('Bonjour,...', 'ant') ?>"></textarea>
                        </div>
                        <div class="form__field">
                            <?= isset($_SESSION['contact_form_feedback']['errors']['rules']) ? '<p class="form__error">' . $_SESSION['contact_form_feedback']['errors']['rules'] . '</p>' : '' ?>
                            <label for="rules" class="form__checkbox">
                                <input type="checkbox" name="rules" id="rules" value="1"/>
                                <span class="form__checklabel"><?= str_replace(':conditions', '<a href="' . get_the_permalink(ant_get_template_page('template-legals')) . '">' . __('conditions générales d’utilisations', 'ant') . '</a>', __('J’accepte les :conditions', 'ant')) ?></span>
                            </label>
                        </div>
                        <div class="form__actions">
                            <?php wp_nonce_field('nonce_submit_contact'); ?>
                            <input type="hidden" name="action" value="submit_contact_form"/>
                            <button class="form__button btn" type="submit"><?= __('Envoyer', 'ant') ?></button>
                        </div>
                    </form>
                <?php else : ?>
                    <p id="contact"
                       class="form__success"><?= __('Merci ! Votre message a bien été envoyé.', 'ant') ?></p>
                    <?php unset($_SESSION['contact_form_feedback']);endif; ?>
            </section>
            <section class="contact__coords coords" aria-labelledby="coords">
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
                                <img src="<?=get_field('first_social_logo') ?>" class="coord__svg style-svg" alt="">
                            </a>
                            <a href="<?=get_field('second_social_link') ?>" class="coord__social">
                                <img src="<?=get_field('second_social_logo') ?>" class="coord__svg style-svg" alt="">
                            </a>
                        </div>
                    </div>
                <?php endwhile; endif; ?>
            </section>
        </div>
    </section>
</main>
<?php unset($_SESSION['contact_form_feedback']) ?>
<?php get_footer(); ?>