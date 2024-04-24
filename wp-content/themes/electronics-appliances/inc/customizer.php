<?php
/**
 * Electronics Appliances Theme Customizer
 *
 * @link: https://developer.wordpress.org/themes/customize-api/customizer-objects/
 *
 * @package Electronics Appliances
 */


if ( ! defined( 'ELECTRONICS_APPLIANCES_URL' ) ) {
    define( 'ELECTRONICS_APPLIANCES_URL', esc_url( 'https://www.themagnifico.net/themes/home-appliances-wordpress-theme/', 'electronics-appliances') );
}
if ( ! defined( 'ELECTRONICS_APPLIANCES_TEXT' ) ) {
    define( 'ELECTRONICS_APPLIANCES_TEXT', __( 'Electronics Appliances Pro','electronics-appliances' ));
}

use WPTRT\Customize\Section\Electronics_Appliances_Button;

add_action( 'customize_register', function( $manager ) {

    $manager->register_section_type( Electronics_Appliances_Button::class );

    $manager->add_section(
        new Electronics_Appliances_Button( $manager, 'electronics_appliances_pro', [
            'title'       => esc_html( ELECTRONICS_APPLIANCES_TEXT , 'electronics-appliances' ),
            'priority'    => 0,
            'button_text' => __( 'GET PREMIUM', 'electronics-appliances' ),
            'button_url'  => esc_url( ELECTRONICS_APPLIANCES_URL )
        ] )
    );

} );

if ( ! defined( 'ELECTRONICS_APPLIANCES_BUY_TEXT' ) ) {
    define( 'ELECTRONICS_APPLIANCES_BUY_TEXT', __( 'Buy Electronics Appliances Pro','electronics-appliances' ));
}

// Load the JS and CSS.
add_action( 'customize_controls_enqueue_scripts', function() {

    $version = wp_get_theme()->get( 'Version' );

    wp_enqueue_script(
        'electronics-appliances-customize-section-button',
        get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/js/customize-controls.js' ),
        [ 'customize-controls' ],
        $version,
        true
    );

    wp_enqueue_style(
        'electronics-appliances-customize-section-button',
        get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/css/customize-controls.css' ),
        [ 'customize-controls' ],
        $version
    );

} );

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function electronics_appliances_customize_register($wp_customize){


     // Pro Version
    class Electronics_Appliances_Customize_Pro_Version extends WP_Customize_Control {
        public $type = 'pro_options';

        public function render_content() {
            echo '<span>For More <strong>'. esc_html( $this->label ) .'</strong>?</span>';
            echo '<a href="'. esc_url($this->description) .'" target="_blank">';
                echo '<span class="dashicons dashicons-info"></span>';
                echo '<strong> '. esc_html( ELECTRONICS_APPLIANCES_BUY_TEXT,'electronics-appliances' ) .'<strong></a>';
            echo '</a>';
        }
    }

    // Custom Controls
    function Electronics_Appliances_sanitize_custom_control( $input ) {
        return $input;
    }


    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport = 'postMessage';

    //Logo
    $wp_customize->add_setting('electronics_appliances_logo_max_height',array(
        'default'   => '24',
        'sanitize_callback' => 'electronics_appliances_sanitize_number_absint'
    ));
    $wp_customize->add_control('electronics_appliances_logo_max_height',array(
        'label' => esc_html__('Logo Width','electronics-appliances'),
        'section'   => 'title_tagline',
        'type'      => 'number'
    ));

    $wp_customize->add_setting('electronics_appliances_logo_title_text', array(
        'default' => true,
        'sanitize_callback' => 'electronics_appliances_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'electronics_appliances_logo_title_text',array(
        'label'          => __( 'Enable Disable Title', 'electronics-appliances' ),
        'section'        => 'title_tagline',
        'settings'       => 'electronics_appliances_logo_title_text',
        'type'           => 'checkbox',
    )));

     $wp_customize->add_setting('electronics_appliances_theme_description', array(
        'default' => false,
        'sanitize_callback' => 'electronics_appliances_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'electronics_appliances_theme_description',array(
        'label'          => __( 'Enable Disable Tagline', 'electronics-appliances' ),
        'section'        => 'title_tagline',
        'settings'       => 'electronics_appliances_theme_description',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('electronics_appliances_logo_title_color', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'electronics_appliances_logo_title_color', array(
        'label'    => __('Site Title Color', 'electronics-appliances'),
        'section'  => 'title_tagline'
    )));

    $wp_customize->add_setting('electronics_appliances_logo_tagline_color', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'electronics_appliances_logo_tagline_color', array(
        'label'    => __('Site Tagline Color', 'electronics-appliances'),
        'section'  => 'title_tagline'
    )));

    // Pro Version
    $wp_customize->add_setting( 'pro_version_theme_logo', array(
        'sanitize_callback' => 'Electronics_Appliances_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Electronics_Appliances_Customize_Pro_Version ( $wp_customize,'pro_version_theme_logo', array(
        'section'     => 'title_tagline',
        'type'        => 'title_tagline',
        'label'       => esc_html__( 'Customizer Options', 'electronics-appliances' ),
        'description' => esc_url( ELECTRONICS_APPLIANCES_URL ),
        'priority'    => 100
    )));

    //General Setting
    $wp_customize->add_section('electronics_appliances_general_setting',array(
        'title' => esc_html__('General Setting','electronics-appliances'),
        'priority'   => 20,
    ));

    $wp_customize->add_setting('electronics_appliances_preloader_hide', array(
        'default' => false,
        'sanitize_callback' => 'electronics_appliances_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'electronics_appliances_preloader_hide',array(
        'label'          => __( 'Show Theme Preloader', 'electronics-appliances' ),
        'section'        => 'electronics_appliances_general_setting',
        'settings'       => 'electronics_appliances_preloader_hide',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting( 'electronics_appliances_preloader_bg_color', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'electronics_appliances_preloader_bg_color', array(
        'label' => esc_html__('Preloader Background Color','electronics-appliances'),
        'section' => 'electronics_appliances_general_setting',
        'settings' => 'electronics_appliances_preloader_bg_color'
    )));

    $wp_customize->add_setting( 'electronics_appliances_preloader_dot_1_color', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'electronics_appliances_preloader_dot_1_color', array(
        'label' => esc_html__('Preloader First Dot Color','electronics-appliances'),
        'section' => 'electronics_appliances_general_setting',
        'settings' => 'electronics_appliances_preloader_dot_1_color'
    )));

    $wp_customize->add_setting( 'electronics_appliances_preloader_dot_2_color', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'electronics_appliances_preloader_dot_2_color', array(
        'label' => esc_html__('Preloader Second Dot Color','electronics-appliances'),
        'section' => 'electronics_appliances_general_setting',
        'settings' => 'electronics_appliances_preloader_dot_2_color'
    )));

    $wp_customize->add_setting('electronics_appliances_sticky_header', array(
        'default' => false,
        'sanitize_callback' => 'electronics_appliances_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'electronics_appliances_sticky_header',array(
        'label'          => __( 'Show Sticky Header', 'electronics-appliances' ),
        'section'        => 'electronics_appliances_general_setting',
        'settings'       => 'electronics_appliances_sticky_header',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('electronics_appliances_scroll_hide', array(
        'default' => false,
        'sanitize_callback' => 'electronics_appliances_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'electronics_appliances_scroll_hide',array(
        'label'          => __( 'Show Theme Scroll To Top', 'electronics-appliances' ),
        'section'        => 'electronics_appliances_general_setting',
        'settings'       => 'electronics_appliances_scroll_hide',
        'type'           => 'checkbox',
    )));

     $wp_customize->add_setting('electronics_appliances_scroll_top_position',array(
        'default' => 'Right',
        'sanitize_callback' => 'electronics_appliances_sanitize_choices'
    ));
    $wp_customize->add_control('electronics_appliances_scroll_top_position',array(
        'type' => 'radio',
        'section' => 'electronics_appliances_general_setting',
        'choices' => array(
            'Right' => __('Right','electronics-appliances'),
            'Left' => __('Left','electronics-appliances'),
            'Center' => __('Center','electronics-appliances')
        ),
    ) );

    //Woocommerce shop page Sidebar
    $wp_customize->add_setting('electronics_appliances_woocommerce_shop_page_sidebar', array(
        'default' => true,
        'sanitize_callback' => 'electronics_appliances_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'electronics_appliances_woocommerce_shop_page_sidebar',array(
        'label'          => __( 'Hide Shop Page Sidebar', 'electronics-appliances' ),
        'section'        => 'electronics_appliances_general_setting',
        'settings'       => 'electronics_appliances_woocommerce_shop_page_sidebar',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('electronics_appliances_shop_page_sidebar_layout',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'electronics_appliances_sanitize_choices'
    ));
    $wp_customize->add_control('electronics_appliances_shop_page_sidebar_layout',array(
        'type' => 'select',
        'label' => __('Woocommerce Shop Page Sidebar','electronics-appliances'),
        'section' => 'electronics_appliances_general_setting',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','electronics-appliances'),
            'Right Sidebar' => __('Right Sidebar','electronics-appliances'),
        ),
    ) );

    //Woocommerce Single Product page Sidebar
    $wp_customize->add_setting('electronics_appliances_woocommerce_single_product_page_sidebar', array(
        'default' => true,
        'sanitize_callback' => 'electronics_appliances_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'electronics_appliances_woocommerce_single_product_page_sidebar',array(
        'label'          => __( 'Hide Single Product Page Sidebar', 'electronics-appliances' ),
        'section'        => 'electronics_appliances_general_setting',
        'settings'       => 'electronics_appliances_woocommerce_single_product_page_sidebar',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('electronics_appliances_single_product_sidebar_layout',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'electronics_appliances_sanitize_choices'
    ));
    $wp_customize->add_control('electronics_appliances_single_product_sidebar_layout',array(
        'type' => 'select',
        'label' => __('Woocommerce Single Product Page Sidebar','electronics-appliances'),
        'section' => 'electronics_appliances_general_setting',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','electronics-appliances'),
            'Right Sidebar' => __('Right Sidebar','electronics-appliances'),
        ),
    ) );

    $wp_customize->add_setting('electronics_appliances_woocommerce_product_sale',array(
        'default' => 'Left',
        'sanitize_callback' => 'electronics_appliances_sanitize_choices'
    ));
    $wp_customize->add_control('electronics_appliances_woocommerce_product_sale',array(
        'type' => 'radio',
        'section' => 'electronics_appliances_general_setting',
        'choices' => array(
            'Right' => __('Right','electronics-appliances'),
            'Left' => __('Left','electronics-appliances'),
            'Center' => __('Center','electronics-appliances')
        ),
    ) );

    // Related Product
    $wp_customize->add_setting('electronics_appliances_woocommerce_related_product_show_hide', array(
        'default' => true,
        'sanitize_callback' => 'electronics_appliances_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'electronics_appliances_woocommerce_related_product_show_hide',array(
        'label'          => __( 'Show / Hide Related product', 'electronics-appliances' ),
        'section'        => 'electronics_appliances_general_setting',
        'settings'       => 'electronics_appliances_woocommerce_related_product_show_hide',
        'type'           => 'checkbox',
    )));

    // Pro Version
    $wp_customize->add_setting( 'pro_version_general_settings', array(
        'sanitize_callback' => 'Electronics_Appliances_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Electronics_Appliances_Customize_Pro_Version ( $wp_customize,'pro_version_general_settings', array(
        'section'     => 'electronics_appliances_general_setting',
        'type'        => 'title_tagline',
        'label'       => esc_html__( 'Customizer Options', 'electronics-appliances' ),
        'description' => esc_url( ELECTRONICS_APPLIANCES_URL ),
        'priority'    => 100
    )));

    //Header
    $wp_customize->add_section('electronics_appliances_header',array(
        'title' => esc_html__('Header Option','electronics-appliances')
    ));

    $wp_customize->add_setting('electronics_appliances_location_text',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('electronics_appliances_location_text',array(
        'label' => esc_html__('Location Text','electronics-appliances'),
        'section' => 'electronics_appliances_header',
        'setting' => 'electronics_appliances_location_text',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('electronics_appliances_location',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('electronics_appliances_location',array(
        'label' => esc_html__('Our Location','electronics-appliances'),
        'section' => 'electronics_appliances_header',
        'setting' => 'electronics_appliances_location',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('electronics_appliances_email_text',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('electronics_appliances_email_text',array(
        'label' => esc_html__('Email Text','electronics-appliances'),
        'section' => 'electronics_appliances_header',
        'setting' => 'electronics_appliances_email_text',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('electronics_appliances_email',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_email'
    ));
    $wp_customize->add_control('electronics_appliances_email',array(
        'label' => esc_html__('Email Address','electronics-appliances'),
        'section' => 'electronics_appliances_header',
        'setting' => 'electronics_appliances_email',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('electronics_appliances_phone_text',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('electronics_appliances_phone_text',array(
        'label' => esc_html__('Phone Text','electronics-appliances'),
        'section' => 'electronics_appliances_header',
        'setting' => 'electronics_appliances_phone_text',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('electronics_appliances_phone_number',array(
        'default' => '',
        'sanitize_callback' => 'electronics_appliances_sanitize_phone_number'
    ));
    $wp_customize->add_control('electronics_appliances_phone_number',array(
        'label' => esc_html__('Phone Number','electronics-appliances'),
        'section' => 'electronics_appliances_header',
        'setting' => 'electronics_appliances_phone_number',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('electronics_appliances_button_text',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('electronics_appliances_button_text',array(
        'label' => esc_html__('Button Text','electronics-appliances'),
        'section' => 'electronics_appliances_header',
        'setting' => 'electronics_appliances_button_text',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('electronics_appliances_button_link',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('electronics_appliances_button_link',array(
        'label' => esc_html__('Button Url','electronics-appliances'),
        'section' => 'electronics_appliances_header',
        'setting' => 'electronics_appliances_button_link',
        'type'  => 'text'
    ));

    // Pro Version
    $wp_customize->add_setting( 'pro_version_theme_header_setting', array(
        'sanitize_callback' => 'Electronics_Appliances_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Electronics_Appliances_Customize_Pro_Version ( $wp_customize,'pro_version_theme_header_setting', array(
        'section'     => 'electronics_appliances_header',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'electronics-appliances' ),
        'description' => esc_url( ELECTRONICS_APPLIANCES_URL ),
        'priority'    => 100
    )));

    // Slider
    $wp_customize->add_section('electronics_appliances_top_slider',array(
        'title' => esc_html__('Slider Option','electronics-appliances')
    ));

    $wp_customize->add_setting('electronics_appliances_top_slider_setting', array(
        'default' => 0,
        'sanitize_callback' => 'electronics_appliances_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'electronics_appliances_top_slider_setting',array(
        'label'          => __( 'Enable Disable Slider', 'electronics-appliances' ),
        'section'        => 'electronics_appliances_top_slider',
        'settings'       => 'electronics_appliances_top_slider_setting',
        'type'           => 'checkbox',
    )));

    for ( $count = 1; $count <= 3; $count++ ) {
        $wp_customize->add_setting( 'electronics_appliances_top_slider_page' . $count, array(
            'default'           => '',
            'sanitize_callback' => 'electronics_appliances_sanitize_dropdown_pages'
        ) );
        $wp_customize->add_control( 'electronics_appliances_top_slider_page' . $count, array(
            'label'    => __( 'Select Slide Page', 'electronics-appliances' ),
            'section'  => 'electronics_appliances_top_slider',
            'type'     => 'dropdown-pages'
        ) );
    }

     //Slider Image Opacity
    $wp_customize->add_setting('electronics_appliances_slider_opacity_color',array(
      'default' => '',
      'sanitize_callback' => 'electronics_appliances_sanitize_choices'
    ));

    $wp_customize->add_control( 'electronics_appliances_slider_opacity_color', array(
    'label'       => esc_html__( 'Slider Image Opacity','electronics-appliances' ),
    'section'     => 'electronics_appliances_top_slider',
    'type'        => 'select',
    'choices' => array(
      '0' =>  esc_attr('0','electronics-appliances'),
      '0.1' =>  esc_attr('0.1','electronics-appliances'),
      '0.2' =>  esc_attr('0.2','electronics-appliances'),
      '0.3' =>  esc_attr('0.3','electronics-appliances'),
      '0.4' =>  esc_attr('0.4','electronics-appliances'),
      '0.5' =>  esc_attr('0.5','electronics-appliances'),
      '0.6' =>  esc_attr('0.6','electronics-appliances'),
      '0.7' =>  esc_attr('0.7','electronics-appliances'),
      '0.8' =>  esc_attr('0.8','electronics-appliances'),
      '0.9' =>  esc_attr('0.9','electronics-appliances')
    ),
    ));

    //Slider height
    $wp_customize->add_setting('electronics_appliances_slider_img_height',array(
        'default'=> '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('electronics_appliances_slider_img_height',array(
        'label' => __('Slider Height','electronics-appliances'),
        'description'   => __('Add the slider height in px(eg. 500px).','electronics-appliances'),
        'input_attrs' => array(
            'placeholder' => __( '500px', 'electronics-appliances' ),
        ),
        'section'=> 'electronics_appliances_top_slider',
        'type'=> 'text'
    ));

    // Pro Version
    $wp_customize->add_setting( 'pro_version_theme_slider_setting', array(
        'sanitize_callback' => 'Electronics_Appliances_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Electronics_Appliances_Customize_Pro_Version ( $wp_customize,'pro_version_theme_slider_setting', array(
        'section'     => 'electronics_appliances_top_slider',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'electronics-appliances' ),
        'description' => esc_url( ELECTRONICS_APPLIANCES_URL ),
        'priority'    => 100
    )));

    // Our Services
    $wp_customize->add_section('electronics_appliances_services_section',array(
        'title' => esc_html__('Our Services','electronics-appliances'),
        'description' => esc_html__('Here you have to select category which will display perticular services in the home page.','electronics-appliances')
    ));

    $wp_customize->add_setting('electronics_appliances_services_setting', array(
        'default' => 0,
        'sanitize_callback' => 'electronics_appliances_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'electronics_appliances_services_setting',array(
        'label'          => __( 'Enable Disable Service', 'electronics-appliances' ),
        'section'        => 'electronics_appliances_services_section',
        'settings'       => 'electronics_appliances_services_setting',
        'type'           => 'checkbox',
    )));

    $categories = get_categories();
    $cat_post = array();
    $cat_post[]= 'select';
    $i = 0;
    foreach($categories as $category){
        if($i==0){
            $default = $category->slug;
            $i++;
        }
        $cat_post[$category->slug] = $category->name;
    }

    $wp_customize->add_setting('electronics_appliances_services_sec_category',array(
        'default'   => 'select',
        'sanitize_callback' => 'electronics_appliances_sanitize_select',
    ));
    $wp_customize->add_control('electronics_appliances_services_sec_category',array(
        'type'    => 'select',
        'choices' => $cat_post,
        'label' => __('Select Category to display services','electronics-appliances'),
        'section' => 'electronics_appliances_services_section',
    ));

    $wp_customize->add_setting('electronics_appliances_services_per_page',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('electronics_appliances_services_per_page',array(
        'label' => esc_html__('No Of Icons','electronics-appliances'),
        'section' => 'electronics_appliances_services_section',
        'setting' => 'electronics_appliances_services_per_page',
        'type'  => 'text'
    ));

    $icon = get_theme_mod('electronics_appliances_services_per_page','');
    for ($i=1; $i <= $icon; $i++) {
        $wp_customize->add_setting('electronics_appliances_services_icon'.$i,array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field'
        ));
        $wp_customize->add_control('electronics_appliances_services_icon'.$i,array(
            'label' => esc_html__('Icon ','electronics-appliances').$i,
            'section' => 'electronics_appliances_services_section',
            'setting' => 'electronics_appliances_services_icon'.$i,
            'type'  => 'text'
        ));
    }

     // Pro Version
    $wp_customize->add_setting( 'pro_version_theme_service_setting', array(
        'sanitize_callback' => 'Electronics_Appliances_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Electronics_Appliances_Customize_Pro_Version ( $wp_customize,'pro_version_theme_service_setting', array(
        'section'     => 'electronics_appliances_services_section',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'electronics-appliances' ),
        'description' => esc_url( ELECTRONICS_APPLIANCES_URL ),
        'priority'    => 100
    )));

    // Recent Product
    $wp_customize->add_section('electronics_appliances_recent_product',array(
        'title' => esc_html__('Recent Product Option','electronics-appliances')
    ));

    $wp_customize->add_setting('electronics_appliances_product_setting', array(
        'default' => 0,
        'sanitize_callback' => 'electronics_appliances_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'electronics_appliances_product_setting',array(
        'label'          => __( 'Enable Disable Recent Product', 'electronics-appliances' ),
        'section'        => 'electronics_appliances_recent_product',
        'settings'       => 'electronics_appliances_product_setting',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('electronics_appliances_recent_product_number',array(
        'default' => '',
        'sanitize_callback' => 'absint'
    ));
    $wp_customize->add_control('electronics_appliances_recent_product_number',array(
        'label' => esc_html__('No of Product','electronics-appliances'),
        'section' => 'electronics_appliances_recent_product',
        'setting' => 'electronics_appliances_recent_product_number',
        'type'  => 'number'
    ));

    $electronics_appliances_args = array(
        'type'                     => 'product',
        'child_of'                 => 0,
        'parent'                   => '',
        'orderby'                  => 'term_group',
        'order'                    => 'ASC',
        'hide_empty'               => false,
        'hierarchical'             => 1,
        'number'                   => '',
        'taxonomy'                 => 'product_cat',
        'pad_counts'               => false
    );
    $categories = get_categories( $electronics_appliances_args );
    $cats = array();
    $i = 0;
    foreach($categories as $category){
        if($i==0){
            $default = $category->slug;
            $i++;
        }
        $cats[$category->slug] = $category->name;
    }
    $wp_customize->add_setting('electronics_appliances_recent_product_category',array(
        'sanitize_callback' => 'electronics_appliances_sanitize_select',
    ));
    $wp_customize->add_control('electronics_appliances_recent_product_category',array(
        'type'    => 'select',
        'choices' => $cats,
        'label' => __('Select Product Category','electronics-appliances'),
        'section' => 'electronics_appliances_recent_product',
    ));

    // Pro Version
    $wp_customize->add_setting( 'pro_version_theme_product_setting', array(
        'sanitize_callback' => 'Electronics_Appliances_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Electronics_Appliances_Customize_Pro_Version ( $wp_customize,'pro_version_theme_product_setting', array(
        'section'     => 'electronics_appliances_recent_product',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'electronics-appliances' ),
        'description' => esc_url( ELECTRONICS_APPLIANCES_URL ),
        'priority'    => 100
    )));
    
    // Footer
    $wp_customize->add_section('electronics_appliances_site_footer_section', array(
        'title' => esc_html__('Footer', 'electronics-appliances'),
    ));

    $wp_customize->add_setting('electronics_appliances_footer_bg_image',array(
        'default'   => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'electronics_appliances_footer_bg_image',array(
        'label' => __('Footer Background Image','electronics-appliances'),
        'section' => 'electronics_appliances_site_footer_section',
        'priority' => 1,
    )));

    $wp_customize->add_setting('electronics_appliances_footer_text_setting', array(
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('electronics_appliances_footer_text_setting', array(
        'label' => __('Replace the footer text', 'electronics-appliances'),
        'section' => 'electronics_appliances_site_footer_section',
        'priority' => 1,
        'type' => 'text',
    ));

    $wp_customize->add_setting('electronics_appliances_show_hide_copyright',array(
        'default' => true,
        'sanitize_callback' => 'electronics_appliances_sanitize_checkbox'
    ));
    $wp_customize->add_control('electronics_appliances_show_hide_copyright',array(
        'type' => 'checkbox',
        'label' => __('Show / Hide Copyright','electronics-appliances'),
        'section' => 'electronics_appliances_site_footer_section',
    ));

    $wp_customize->add_setting('electronics_appliances_copyright_background_color', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'electronics_appliances_copyright_background_color', array(
        'label'    => __('Copyright Background Color', 'electronics-appliances'),
        'section'  => 'electronics_appliances_site_footer_section',
    )));

    // Pro Version
    $wp_customize->add_setting( 'pro_version_theme_footer_setting', array(
        'sanitize_callback' => 'Electronics_Appliances_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Electronics_Appliances_Customize_Pro_Version ( $wp_customize,'pro_version_theme_footer_setting', array(
        'section'     => 'electronics_appliances_site_footer_section',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'electronics-appliances' ),
        'description' => esc_url( ELECTRONICS_APPLIANCES_URL ),
        'priority'    => 100
    )));

    // Post Settings
     $wp_customize->add_section('electronics_appliances_post_settings',array(
        'title' => esc_html__('Post Settings','electronics-appliances'),
        'priority'   =>40,
    ));

     $wp_customize->add_setting('electronics_appliances_post_page_title',array(
        'sanitize_callback' => 'electronics_appliances_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('electronics_appliances_post_page_title',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Post Page Title', 'electronics-appliances'),
        'section'     => 'electronics_appliances_post_settings',
        'description' => esc_html__('Check this box to enable title on post page.', 'electronics-appliances'),
    ));

    $wp_customize->add_setting('electronics_appliances_post_page_meta',array(
        'sanitize_callback' => 'electronics_appliances_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('electronics_appliances_post_page_meta',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Post Page Meta', 'electronics-appliances'),
        'section'     => 'electronics_appliances_post_settings',
        'description' => esc_html__('Check this box to enable meta on post page.', 'electronics-appliances'),
    ));

    $wp_customize->add_setting('electronics_appliances_post_page_thumb',array(
        'sanitize_callback' => 'electronics_appliances_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('electronics_appliances_post_page_thumb',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Post Page Thumbnail', 'electronics-appliances'),
        'section'     => 'electronics_appliances_post_settings',
        'description' => esc_html__('Check this box to enable thumbnail on post page.', 'electronics-appliances'),
    ));

    $wp_customize->add_setting( 'electronics_appliances_post_page_image_border_radius', array(
        'default'              => '0',
        'transport'            => 'refresh',
        'sanitize_callback'    => 'electronics_appliances_sanitize_number_range'
    ) );
    $wp_customize->add_control( 'electronics_appliances_post_page_image_border_radius', array(
        'label'       => esc_html__( 'Post Page Image Border Radius','electronics-appliances' ),
        'section'     => 'electronics_appliances_post_settings',
        'type'        => 'range',
        'input_attrs' => array(
            'step'             => 1,
            'min'              => 1,
            'max'              => 50,
        ),
    ) );

    $wp_customize->add_setting('electronics_appliances_post_page_btn',array(
        'sanitize_callback' => 'electronics_appliances_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('electronics_appliances_post_page_btn',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Post Page Button', 'electronics-appliances'),
        'section'     => 'electronics_appliances_post_settings',
        'description' => esc_html__('Check this box to enable button on post page.', 'electronics-appliances'),
    ));

    $wp_customize->add_setting('electronics_appliances_single_post_thumb',array(
        'sanitize_callback' => 'electronics_appliances_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('electronics_appliances_single_post_thumb',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Single Post Thumbnail', 'electronics-appliances'),
        'section'     => 'electronics_appliances_post_settings',
        'description' => esc_html__('Check this box to enable post thumbnail on single post.', 'electronics-appliances'),
    ));

    $wp_customize->add_setting('electronics_appliances_single_post_meta',array(
        'sanitize_callback' => 'electronics_appliances_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('electronics_appliances_single_post_meta',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Single Post Meta', 'electronics-appliances'),
        'section'     => 'electronics_appliances_post_settings',
        'description' => esc_html__('Check this box to enable single post meta such as post date, author, category, comment etc.', 'electronics-appliances'),
    ));

    $wp_customize->add_setting('electronics_appliances_single_post_title',array(
            'sanitize_callback' => 'electronics_appliances_sanitize_checkbox',
            'default'           => 1,
    ));
    $wp_customize->add_control('electronics_appliances_single_post_title',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Single Post Title', 'electronics-appliances'),
        'section'     => 'electronics_appliances_post_settings',
        'description' => esc_html__('Check this box to enable title on single post.', 'electronics-appliances'),
    ));

    $wp_customize->add_setting('electronics_appliances_single_post_tags',array(
            'sanitize_callback' => 'electronics_appliances_sanitize_checkbox',
            'default'           => 1,
    ));
    $wp_customize->add_control('electronics_appliances_single_post_tags',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Single Post Tags', 'electronics-appliances'),
        'section'     => 'electronics_appliances_post_settings',
        'description' => esc_html__('Check this box to enable tags on single post.', 'electronics-appliances'),
    ));

    $wp_customize->add_setting('electronics_appliances_single_post_navigation_show_hide',array(
        'default' => true,
        'sanitize_callback' => 'electronics_appliances_sanitize_checkbox'
    ));
    $wp_customize->add_control('electronics_appliances_single_post_navigation_show_hide',array(
        'type' => 'checkbox',
        'label' => __('Show / Hide Post Navigation','electronics-appliances'),
        'section' => 'electronics_appliances_post_settings',
    ));

    $wp_customize->add_setting('electronics_appliances_single_post_comment_title',array(
        'default'=> 'Leave a Reply',
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control('electronics_appliances_single_post_comment_title',array(
        'label' => __('Add Comment Title','electronics-appliances'),
        'input_attrs' => array(
        'placeholder' => __( 'Leave a Reply', 'electronics-appliances' ),
        ),
        'section'=> 'electronics_appliances_post_settings',
        'type'=> 'text'
    ));

    $wp_customize->add_setting('electronics_appliances_single_post_comment_btn_text',array(
        'default'=> 'Post Comment',
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control('electronics_appliances_single_post_comment_btn_text',array(
        'label' => __('Add Comment Button Text','electronics-appliances'),
        'input_attrs' => array(
            'placeholder' => __( 'Post Comment', 'electronics-appliances' ),
        ),
        'section'=> 'electronics_appliances_post_settings',
        'type'=> 'text'
    ));

    // Pro Version
    $wp_customize->add_setting( 'pro_version_post_setting', array(
        'sanitize_callback' => 'Electronics_Appliances_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Electronics_Appliances_Customize_Pro_Version ( $wp_customize,'pro_version_post_setting', array(
        'section'     => 'electronics_appliances_post_settings',
        'type'        => 'title_tagline',
        'label'       => esc_html__( 'Customizer Options', 'electronics-appliances' ),
        'description' => esc_url( ELECTRONICS_APPLIANCES_URL ),
        'priority'    => 100
    )));

    // Page Settings
    $wp_customize->add_section('electronics_appliances_page_settings',array(
        'title' => esc_html__('Page Settings','electronics-appliances'),
        'priority'   =>50,
    ));

    $wp_customize->add_setting('electronics_appliances_single_page_title',array(
            'sanitize_callback' => 'electronics_appliances_sanitize_checkbox',
            'default'           => 1,
    ));
    $wp_customize->add_control('electronics_appliances_single_page_title',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Single Page Title', 'electronics-appliances'),
        'section'     => 'electronics_appliances_page_settings',
        'description' => esc_html__('Check this box to enable title on single page.', 'electronics-appliances'),
    ));

    $wp_customize->add_setting('electronics_appliances_single_page_thumb',array(
        'sanitize_callback' => 'electronics_appliances_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('electronics_appliances_single_page_thumb',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Single Page Thumbnail', 'electronics-appliances'),
        'section'     => 'electronics_appliances_page_settings',
        'description' => esc_html__('Check this box to enable page thumbnail on single page.', 'electronics-appliances'),
    ));

    // Pro Version
    $wp_customize->add_setting( 'pro_version_single_page_setting', array(
        'sanitize_callback' => 'Electronics_Appliances_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Electronics_Appliances_Customize_Pro_Version ( $wp_customize,'pro_version_single_page_setting', array(
        'section'     => 'electronics_appliances_page_settings',
        'type'        => 'title_tagline',
        'label'       => esc_html__( 'Customizer Options', 'electronics-appliances' ),
        'description' => esc_url( ELECTRONICS_APPLIANCES_URL ),
        'priority'    => 100
    )));
}
add_action('customize_register', 'electronics_appliances_customize_register');

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function electronics_appliances_customize_partial_blogname(){
    bloginfo('name');
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function electronics_appliances_customize_partial_blogdescription(){
    bloginfo('description');
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function electronics_appliances_customize_preview_js(){
    wp_enqueue_script('electronics-appliances-customizer', esc_url(get_template_directory_uri()) . '/assets/js/customizer.js', array('customize-preview'), '20151215', true);
}
add_action('customize_preview_init', 'electronics_appliances_customize_preview_js');

/*
** Load dynamic logic for the customizer controls area.
*/
function electronics_appliances_panels_js() {
    wp_enqueue_style( 'electronics-appliances-customizer-layout-css', get_theme_file_uri( '/assets/css/customizer-layout.css' ) );
    wp_enqueue_script( 'electronics-appliances-customize-layout', get_theme_file_uri( '/assets/js/customize-layout.js' ), array(), '1.2', true );
}
add_action( 'customize_controls_enqueue_scripts', 'electronics_appliances_panels_js' );