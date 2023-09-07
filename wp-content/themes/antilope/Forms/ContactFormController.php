<?php

class ContactFormController extends BaseFormController
{
    protected function getNonceKey(): string
    {
        return 'nonce_submit_contact';
    }

    protected function getSanitizableAttributes(): array
    {
        return [
            'firstname' => TextSanitizer::class,
            'lastname' => TextSanitizer::class,
            'email' => EmailSanitizer::class,
            'message' => TextSanitizer::class,
            'rules' => TextSanitizer::class,
        ];
    }

    protected function getValidatableAttributes(): array
    {
        return [
            'firstname' => [RequiredValidator::class],
            'lastname' => [RequiredValidator::class],
            'email' => [RequiredValidator::class, EmailValidator::class],
            'message' => [RequiredValidator::class],
            'rules' => [AcceptedValidator::class],
        ];
    }

    protected function redirectWithErrors($errors)
    {
        // Traitement erreur
        // C'est pas OK, on place les erreurs de validation dans la session
        $_SESSION['contact_form_feedback'] = [
            'success' => false,
            'data' => $this->data,
            'errors' => $errors,
        ];

        // On redirige l'utilisateur vers le formulaire pour y afficher le feedback d'erreurs.
        return wp_safe_redirect(($this->data['_wp_http_referer'] ?? '') . '#contact', 302);
    }

    protected function handle()
    {
        // Traitement
        $id = wp_insert_post([
            'post_title' => 'Message de ' . $this->data['firstname'] . ' ' . $this->data['lastname'],
            'post_type' => 'message',
            'post_content' => $this->data['message'],
            'post_status' => 'publish'
        ]);

        // Envoyer l'email à l'admin
        wp_mail(get_bloginfo('admin_email'), 'Nouveau message de ' . $this->data['firstname'] . ' ' . $this->data['lastname'] . ' ('. $this->data['email'] .')', $this->data['message']);
    }

    protected function redirectWithSuccess()
    {
        // Ajouter le feedback positif à la session
        $_SESSION['contact_form_feedback'] = [
            'success' => true,
        ];

        return wp_safe_redirect($this->data['_wp_http_referer'] . '#contact', 302);
    }
}