<?php

/**
 * First, let's set the maximum content width based on the theme's
 * design and stylesheet.
 * This will limit the width of all uploaded images and embeds.
 */
if (!isset($content_width)) {
    $content_width = 1000; /* pixels */
}

if (!function_exists('domegen_setup')):
    /**
     * Sets up theme defaults and registers support for various WordPress  
     * features.
     *
     * It is important to set up these functions before the init hook so
     * that none of these features are lost.
     *
     *  @since domegen 1.0
     */

    if (!current_user_can('manage_options')) {
        show_admin_bar(false);
    }

    function domegen_setup()
    {

        /**
         * Enable support for post thumbnails and featured images.
         */
        add_theme_support('post-thumbnails');


        /**
         * Add support for title tags
         */
        add_theme_support('title-tag');

        function add_theme_scripts()
        {
            /**
             * Main Stylesheet
             */
            wp_enqueue_style('style', get_template_directory_uri() . '/style.css');
            wp_enqueue_style('woocommerce-style', get_template_directory_uri() . '/woocommerce.css');


            /**
             * Main Script
             */
            wp_enqueue_script('script', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), 1.1, true);
            wp_enqueue_script('preloader-script', get_template_directory_uri() . '/assets/js/preloader.js', array('jquery'), 1.1, true);
            /* wp_enqueue_script('comment-script', get_template_directory_uri() . '/assets/js/comment.js', array('jquery'), 1.1, true); */

            /**
             * Fonts
             */
            wp_enqueue_style('Norican', 'https://fonts.googleapis.com/css2?family=Norican&display=swap');
            wp_enqueue_style('Birthstone-Bounce', 'https://fonts.googleapis.com/css2?family=Birthstone+Bounce:wght@500&display=swap');

            /**
             * Google Material Symbols
             */
            wp_enqueue_style('google-icons', 'https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200', array(), 1, 'all');
        }
        add_action(
            'wp_enqueue_scripts',
            'add_theme_scripts'
        );

        /**
         * Add support for two custom navigation menus.
         */
        register_nav_menus(
            array(
                'primary' => __('Primary Menu', 'domegen'),
                'secondary' => __('Secondary Menu', 'domegen'),
                'footerNavOne' => __('footer Navigation One', 'domegen'),
                'footerNavTwo' => __('footer Navigation Two', 'domegen'),
                'footerNavThree' => __('footer Navigation Three', 'domegen'),
            )
        );
    }

endif;
add_action('after_setup_theme', 'domegen_setup');

/** 
 * Add theme support for Woocommerce.
 * */
add_theme_support(
    'woocommerce',
    array(
        'thumbnail_image_width' => 265,
        'single_image_width' => 600,

        'product_grid' => array(
            'default_rows' => 3,
            'min_rows' => 2,
            'max_rows' => 8,
            'default_columns' => 4,
            'min_columns' => 2,
            'max_columns' => 5,
        ),
    )
);

add_theme_support('wc-product-gallery-zoom');
add_theme_support('wc-product-gallery-lightbox');
add_theme_support('wc-product-gallery-slider');

// Redirect on Item Addition to Cart
add_action('add_to_cart_redirect', 'cipher_add_to_cart_redirect');

function cipher_add_to_cart_redirect($url = false)
{

    // If another plugin beats us to the punch, let them have their way with the URL
    if (!empty($url)) {
        return $url;
    }

    // Redirect back to the original page, without the 'add-to-cart' parameter.
    // We add the `get_bloginfo` part so it saves a redirect on https:// sites.
    return get_bloginfo('wpurl') . add_query_arg(array(), remove_query_arg('add-to-cart'));
}

//  Display Star Rating on Product Card
add_action('woocommerce_after_shop_loop_item_title', 'get_star_rating');
function get_star_rating()
{
    global $woocommerce, $product;
    $average = $product->get_average_rating();

    echo '<div class="star-rating"><span style="width:' . (($average / 5) * 100) . '%"><strong itemprop="ratingValue" class="rating">' . $average . '</strong> ' . __('out of 5', 'woocommerce') . '</span></div>';
}

//Remove Page title from shop page.
function wc_hide_page_title()
{
    if (!is_shop()) // is_shop is the conditional tag
        return true;
}
add_filter('woocommerce_show_page_title', 'wc_hide_page_title');

//Remove Sidebar from all Woocommerce Pages
add_action('woocommerce_before_main_content', 'remove_sidebar');
function remove_sidebar()
{
    if (is_shop() || is_product()) {
        remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
    }
}

// Display an 'Out of Stock' label on archive pages
add_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_stock', 10);
function woocommerce_template_loop_stock()
{
    global $product;
    if (!$product->is_in_stock())
        echo '<p class="stock out-of-stock">Out of Stock</p>';
}

/** Disable All WooCommerce styles */
add_filter('woocommerce_enqueue_styles', '__return_false');

/**
 * Disable WooCommerce block styles (front-end).
 */
function domegen_disable_woocommerce_block_styles()
{
    wp_dequeue_style('wc-blocks-style');
    wp_dequeue_style('wc-block-editor');
    //wp_dequeue_style('wp-block-library');
}
add_action('wp_enqueue_scripts', 'domegen_disable_woocommerce_block_styles');

/**
 * Disable WooCommerce block styles (back-end).
 */
function domegen_disable_woocommerce_block_editor_styles()
{
    wp_deregister_style('wc-block-editor');
    wp_deregister_style('wc-blocks-style');
}
add_action('enqueue_block_assets', 'domegen_disable_woocommerce_block_editor_styles', 1, 1);




/**
 * Add Domegen Slug above single products title
 */
add_action('woocommerce_single_product_summary', 'add_custom_text_before_product_title', 4);

function add_custom_text_before_product_title()
{
    echo '<p class="domegen-slug">Domégen Creative Co.</p>';
}

/**
 * Single Product Summary Arrangement
 */

function single_product_arrangement()
{
    remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
    add_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 20);
}
add_action('woocommerce_single_product_summary', 'single_product_arrangement');