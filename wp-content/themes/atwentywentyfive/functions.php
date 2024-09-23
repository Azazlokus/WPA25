<?php

require_once get_template_directory() . '/vendor/autoload.php';

function a25_scripts() {
    wp_enqueue_style('a25-style', get_template_directory_uri() . '/assets/css/style.css');

    if (is_admin()) {
        wp_enqueue_script('a25-admin-product-management', get_template_directory_uri() . '/assets/js/admin/product_management.js', array('jquery'), null, true);
        wp_enqueue_script('a25-admin-search-and-statistics', get_template_directory_uri() . '/assets/js/admin/search_and_statistics.js', array('jquery'), null, true);
        wp_enqueue_script('a25-index-index', get_template_directory_uri() . '/assets/js/index/index.js', array('jquery'), null, true);
    }
}

add_action('wp_enqueue_scripts', 'a25_scripts'); // Исправлено на правильное имя функции

function a25_services_init() {
    $settingsRepo = new App\Infrastructure\Repositories\SettingsRepository();
    $currencyExchanger = new App\Infrastructure\CurrencyExchanger();
}

add_action('after_setup_theme', 'a25_services_init'); // Возможно, вы хотели использовать эту функцию

function a25_setup() {
    // Ваш код для инициализации темы, если он требуется
    add_theme_support('post-thumbnails'); // Пример добавления поддержки функций темы
    add_theme_support('title-tag'); // Позволяет WordPress управлять тегом <title>
}

add_action('after_setup_theme', 'a25_setup');

function a25_register_post_type() {
    register_post_type('custom_type', array(
        'public' => true,
        'label' => 'Custom Types',
        'supports' => array('title', 'editor', 'thumbnail')
    ));
}

add_action('init', 'a25_register_post_type');
