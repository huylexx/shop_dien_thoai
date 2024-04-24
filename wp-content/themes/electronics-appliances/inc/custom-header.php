<?php
/**
 * Sample implementation of the Custom Header feature
 *
 * You can add an optional custom header image to header.php like so
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package Electronics Appliances
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses electronics_appliances_header_style()
 */
function electronics_appliances_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'electronics_appliances_custom_header_args', array(
		'header-text'            => false,
		'width'                  => 1600,
		'height'                 => 250,
		'flex-height'            => true,
		'wp-head-callback'       => 'electronics_appliances_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'electronics_appliances_custom_header_setup' );

if ( ! function_exists( 'electronics_appliances_header_style' ) ) :
	/**
	 * Styles the header image and text displayed on the blog.
	 *
	 * @see electronics_appliances_custom_header_setup().
	 */
	function electronics_appliances_header_style() {
		$header_text_color = get_header_textcolor(); ?>

		<style type="text/css">
			<?php
				//Check if user has defined any header image.
				if ( get_header_image() ) :
			?>
				.main-header,.page-template-home-template .main-header {
					background: url(<?php echo esc_url( get_header_image() ); ?>) no-repeat;
					background-position: center top;
				    background-size: cover;
				}
			<?php endif; ?>
		</style>
		
		<?php
	}
endif;