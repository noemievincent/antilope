<?php

// Charger les fichiers nécessaires
//require_once(__DIR__ . '/acf.php');
require_once(__DIR__ . '/CustomSearchQuery.php');
require_once(__DIR__ . '/Menus/PrimaryMenuWalker.php');
require_once(__DIR__ . '/Menus/PrimaryMenuItem.php');
require_once(__DIR__ . '/Forms/BaseFormController.php');
require_once(__DIR__ . '/Forms/ContactFormController.php');
require_once(__DIR__ . '/Forms/Sanitizers/BaseSanitizer.php');
require_once(__DIR__ . '/Forms/Sanitizers/TextSanitizer.php');
require_once(__DIR__ . '/Forms/Sanitizers/EmailSanitizer.php');
require_once(__DIR__ . '/Forms/Validators/BaseValidator.php');
require_once(__DIR__ . '/Forms/Validators/RequiredValidator.php');
require_once(__DIR__ . '/Forms/Validators/EmailValidator.php');
require_once(__DIR__ . '/Forms/Validators/AcceptedValidator.php');

// Lancer la session PHP pour pouvoir passer des variables de page en page
add_action('init', 'ant_boot_theme', 1);

function ant_boot_theme() {
	load_theme_textdomain('ant', __DIR__ . '/locales');


	if ( ! session_id()) {
		session_start();
	}
}

// Désactiver l'éditeur "Gutenberg" de Wordpress
add_filter('use_block_editor_for_post', '__return_false');

// Activer les images sur les articles
add_theme_support('post-thumbnails');

// Enregistrer un seul custom post-type pour les modules
register_post_type('module', [
	'label'         => 'Modules',
	'labels'        => [
		'name'          => 'Modules',
		'singular_name' => 'Module',
	],
	'description'   => 'Les modules disponibles',
	'public'        => true,
	'has_archive'   => true,
	'menu_position' => 5,
	'menu_icon'     => 'dashicons-block-default',
	'supports'      => ['title', 'editor', 'thumbnail'],
	'rewrite'       => ['slug' => 'modules'],
]);

// Enregistrer un seul custom post-type pour les partenaires
register_post_type('partner', [
	'label'         => 'Partners',
	'labels'        => [
		'name'          => 'Partners',
		'singular_name' => 'Partner',
	],
	'description'   => 'Les partenaires du projets',
	'public'        => true,
	'has_archive'   => true,
	'menu_position' => 5,
	'menu_icon'     => 'dashicons-groups',
	'supports'      => ['title', 'editor', 'thumbnail'],
	'rewrite'       => ['slug' => 'partners'],
]);

// Enregistrer un seul custom post-type pour les publications
register_post_type('article', [
	'label'         => 'Articles',
	'labels'        => [
		'name'          => 'Articles',
		'singular_name' => 'Article',
	],
	'description'   => 'Les publications sur le projet',
	'public'        => true,
	'has_archive'   => true,
	'menu_position' => 5,
	'menu_icon'     => 'dashicons-text-page',
	'supports'      => ['title', 'editor', 'thumbnail'],
	'rewrite'       => ['slug' => 'articles'],
]);

// Enregistrer un seul custom post-type pour les sites des partenaires
register_post_type('website', [
	'label'         => 'Websites',
	'labels'        => [
		'name'          => 'Websites',
		'singular_name' => 'Website',
	],
	'description'   => 'Les sites web des partenaires',
	'public'        => true,
	'has_archive'   => true,
	'menu_position' => 5,
	'menu_icon'     => 'dashicons-admin-site-alt3',
	'supports'      => ['title', 'editor', 'thumbnail'],
	'rewrite'       => ['slug' => 'websites'],
]);

// Enregistrer un custom post-type pour les messages de contact
register_post_type('message', [
	'label'         => 'Messages de contact',
	'labels'        => [
		'name'          => 'Messages de contact',
		'singular_name' => 'Message de contact',
	],
	'description'   => 'Les messages envoyés par le formulaire de contact',
	'public'        => false,
	'show_ui'       => true,
	'menu_position' => 15,
	'menu_icon'     => 'dashicons-buddicons-pm',
	'capabilities'  => [
		'create_posts'       => false,
		'read_post'          => true,
		'read_private_posts' => true,
		'edit_posts'         => true,
	],
	'map_meta_cap'  => true,
]);

// Enregistrer les zones de menus
register_nav_menu('primary', 'Navigation principale (haut de page)');
register_nav_menu('footer', 'Navigation de pied de page');

// Récupérer les modules via une requête Wordpress
function ant_get_modules($count = 20, $search = null)
{
	// 1. on instancie l'objet WP_Query
	$modules = new ANT_CustomSearchQuery([
		'post_type' => 'module',
		'orderby' => 'date',
		'order' => 'DESC',
		'posts_per_page' => $count,
		's' => strlen($search) ? $search : null,
	]);

	// 2. on retourne l'objet WP_Query
	return $modules;
}

// Récupérer les articles via une requête Wordpress
function ant_get_articles($count = 20, $search = null)
{
	// 1. on instancie l'objet WP_Query
	$articles = new ANT_CustomSearchQuery([
		'post_type' => 'article',
		'orderby' => 'date',
		'order' => 'DESC',
		'posts_per_page' => $count,
		's' => strlen($search) ? $search : null,
	]);

	// 2. on retourne l'objet WP_Query
	return $articles;
}

// Récupérer les sites web des partenaires via une requête Wordpress
function ant_get_websites() {
	// 1. on instancie l'objet WP_Query
	$websites = new ANT_CustomSearchQuery([
		'post_type' => 'website',
		'order'     => 'DESC',
	]);

	// 2. on retourne l'objet WP_Query
	return $websites;
}

// Récupérer les partenaires via une requête Wordpress
function ant_get_partners() {
	// 1. on instancie l'objet WP_Query
	$partner = new ANT_CustomSearchQuery([
		'post_type' => 'partner',
	]);

	// 2. on retourne l'objet WP_Query
	return $partner;
}

// Gérer l'envoi de formulaire personnalisé
add_action('admin_post_submit_contact_form', 'ant_handle_submit_contact_form');
add_action('admin_post_nopriv_submit_contact_form', 'ant_handle_submit_contact_form');

function ant_handle_submit_contact_form() {
	// Instancier le controlleur du formulaire
	$form = new ContactFormController($_POST);
}

function ant_get_contact_field_value($field) {
	if ( ! isset($_SESSION['contact_form_feedback'])) {
		return '';
	}

	return $_SESSION['contact_form_feedback']['data'][$field] ?? '';
}

function ant_get_contact_field_error($field) {
	if ( ! isset($_SESSION['contact_form_feedback'])) {
		return '';
	}

	if ( ! ($_SESSION['contact_form_feedback']['errors'][$field] ?? null)) {
		return '';
	}

	return '<p class="form__error">' . $_SESSION['contact_form_feedback']['errors'][$field] . '</p>';
}

// Générer un lien vers la première page utilisant un certain template
function ant_get_template_page(string $template) {
	// Créer une WP_Query pour les pages
	$query = new WP_Query([
		'post_type'   => 'page', // uniquement récupérer des pages
		'post_status' => 'publish', // uniquement les pages publiées
		'meta_query'  => [
			[
				'key'   => '_wp_page_template',
				'value' => $template . '.php', // Filtrer sur le template utilisé
			]
		]
	]);

	return $query->posts[0] ?? null;
}

// Fonction permettant d'inclure des "partials" dans la vue et d'y injecter des variables "locales" (uniquement disponibles dans le scope de l'inclusion).
function ant_include(string $partial, array $variables = []) {
	extract($variables);

	include(__DIR__ . '/partials/' . $partial . '.php');
}

// Fonction qui charge les assets compilés et retourne leur chemin absolu
function ant_mix($path) {
	$path = '/' . ltrim($path, '/');

	if ( ! realpath(__DIR__ . '/public' . $path)) {
		return;
	}

	if ( ! ($manifest = realpath(__DIR__ . '/public/mix-manifest.json'))) {
		return get_stylesheet_directory_uri() . '/public' . $path;
	}

	// Ouvrir le fichier mix-manifest.json
	$manifest = json_decode(file_get_contents($manifest), true);

	// Regarder si on a une clef qui correspond au fichier chargé dans $path
	if ( ! array_key_exists($path, $manifest)) {
		return get_stylesheet_directory_uri() . '/public' . $path;
	}

	// Récupérer & retourner le chemin versionné
	return get_stylesheet_directory_uri() . '/public' . $manifest[$path];
}

//Ajouter les liens de navigations transversales entre les modules
function ant_previous_post_link(string $post_type) {
	if( get_adjacent_post(false, '', true) ) {
		previous_post_link('%link', '%title');
	} else {
		$first = new WP_Query('post_type=module&posts_per_page=1&order=DESC'); $first->the_post();
		echo '<a class="singleModule__link prev secondary--btn" href="' . get_permalink() . '" rel="prev">' . get_the_title() .'</a>';
		wp_reset_query();
	};
}

function ant_next__post_link(string $post_type) {
	if( get_adjacent_post(false, '', false) ) {
		next_post_link('%link', '%title');
	} else {
		$last = new WP_Query('post_type=module&posts_per_page=1&order=ASC'); $last->the_post();
		echo '<a class="singleModule__link next secondary--btn" href="' . get_permalink() . '" rel="next">' . get_the_title() .'</a>';
		wp_reset_query();
	};
}

// Ajouter des classes CSS aux liens de navigations transversales générés par WordPress
function posts_link_next_class($format){
	$format = str_replace('href=', 'class="singleModule__link next secondary--btn" href=', $format);
	return $format;
}
add_filter('next_post_link', 'posts_link_next_class');

function posts_link_prev_class($format) {
	$format = str_replace('href=', 'class="singleModule__link prev secondary--btn" href=', $format);
	return $format;
}
add_filter('previous_post_link', 'posts_link_prev_class');