<?php
/**
 * Clothing Apparel Shop functions and definitions
 *
 * @package Clothing Apparel Shop
 */

if ( ! function_exists( 'clothing_apparel_shop_setup' ) ) :
function clothing_apparel_shop_setup() {
	
	if ( ! isset( $content_width ) )
		$content_width = 640; /* pixels */

	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-logo', array(
		'height'      => 240,
		'width'       => 240,
		'flex-height' => true,
	) );
	
	add_theme_support( 'custom-background', array(
		'default-color' => 'ffffff'
	) );
	
	// Add support for Block Styles.
	add_theme_support( 'wp-block-styles' );

	// Add support for full and wide align images.
	add_theme_support( 'align-wide' );
			
	// Add support for responsive embedded content.
	add_theme_support( 'responsive-embeds' );

	// Enqueue editor styles.
	add_editor_style( array( 'assets/css/editor-style.css' ) );
	
}
endif; // clothing_apparel_shop_setup
add_action( 'after_setup_theme', 'clothing_apparel_shop_setup' );

function clothing_apparel_shop_scripts() {
	wp_enqueue_style( 'clothing-apparel-shop-basic-style', get_stylesheet_uri() );

	//animation
	wp_enqueue_script( 'clothing-apparel-shop-wow-js', get_theme_file_uri( '/assets/js/wow.js' ), array( 'jquery' ), true );

	wp_enqueue_style( 'clothing-apparel-shop-animate-css', get_template_directory_uri().'/assets/css/animate.css' );
}
add_action( 'wp_enqueue_scripts', 'clothing_apparel_shop_scripts' );

// Get start function
function clothing_apparel_shop_custom_admin_notice() {
    // Check if the notice is dismissed
    if (!get_user_meta(get_current_user_id(), 'dismissed_admin_notice', true)) {
        // Check if not on the theme documentation page
        $clothing_apparel_shop_current_screen = get_current_screen();
        if ($clothing_apparel_shop_current_screen && $clothing_apparel_shop_current_screen->id !== 'appearance_page_clothing-apparel-shop-guide-page') {
            $clothing_apparel_shop_theme = wp_get_theme();
            ?>
            <div class="notice notice-info is-dismissible">
                <div class="notice-div">
                    <div>
                        <p class="theme-name"><?php echo esc_html($clothing_apparel_shop_theme->get('Name')); ?></p>
                        <p><?php _e('For information and detailed instructions, check out our theme documentation.', 'clothing-apparel-shop'); ?></p>
                    </div>
                    <a class="button-primary" href="themes.php?page=clothing-apparel-shop-guide-page"><?php _e('Theme Documentation', 'clothing-apparel-shop'); ?></a>
                </div>
            </div>
        <?php
        }
    }
}
add_action('admin_notices', 'clothing_apparel_shop_custom_admin_notice');
// Dismiss notice function
function clothing_apparel_shop_dismiss_admin_notice() {
    update_user_meta(get_current_user_id(), 'dismissed_admin_notice', true);
}
add_action('wp_ajax_clothing_apparel_shop_dismiss_admin_notice', 'clothing_apparel_shop_dismiss_admin_notice');
// Enqueue scripts and styles
function clothing_apparel_shop_enqueue_admin_script($hook) {
    // Admin JS
    wp_enqueue_script('clothing-apparel-shop-admin.js', get_theme_file_uri('/inc/dashboard/admin.js'), array('jquery'), true);
	
	wp_localize_script('clothing-apparel-shop-admin.js', 'clothing_apparel_shop_scripts_localize', array(
        'ajax_url' => esc_url(admin_url('admin-ajax.php'))
    ));
}
add_action('admin_enqueue_scripts', 'clothing_apparel_shop_enqueue_admin_script');
// Reset the dismissed notice status when the theme is switched
function clothing_apparel_shop_after_switch_theme() {
    delete_user_meta(get_current_user_id(), 'dismissed_admin_notice');
}
add_action('after_switch_theme', 'clothing_apparel_shop_after_switch_theme');
//get-start-function-end//

// Block Patterns.
require get_template_directory() . '/block-patterns.php';

require get_parent_theme_file_path( '/inc/dashboard/dashboard.php' );

require get_template_directory() .'/inc/TGM/tgm.php';