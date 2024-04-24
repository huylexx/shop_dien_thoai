<?php
/**
 * Displays top navigation
 *
 * @package Electronics Appliances
 */
$electronics_appliances_sticky_header = get_theme_mod('electronics_appliances_sticky_header');
    $data_sticky = "false";
    if ($electronics_appliances_sticky_header) {
        $data_sticky = "true";
 }
?>

<div class="header-navigation" data-sticky="<?php echo esc_attr($data_sticky); ?>">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-8 col-3 align-self-center">
                <div class="navigation_header py-2">
                    <div class="toggle-nav mobile-menu">
                            <button onclick="electronics_appliances_openNav()"><i class="fas fa-th"></i></button>
                    </div>
                    <div id="mySidenav" class="nav sidenav">
                        <nav id="site-navigation" class="main-navigation navbar navbar-expand-xl" aria-label="<?php esc_attr_e( 'Top Menu', 'electronics-appliances' ); ?>">
                            <?php {
                                wp_nav_menu(
                                    array(
                                        'theme_location' => 'primary',
                                        'menu_class'     => 'menu', 
                                        'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                                        'fallback_cb' => 'wp_page_menu',
                                    )
                                );
                            } ?>
                        </nav>
                        <a href="javascript:void(0)" class="closebtn mobile-menu" onclick="electronics_appliances_closeNav()"><i class="fas fa-times"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-2 align-self-center">
                <div class="cart_no text-center">
                    <?php if(class_exists('woocommerce')){ ?>
                        <?php global $woocommerce; ?>
                        <a class="cart-customlocation" href="<?php echo esc_url(wc_get_cart_url()); ?>" title="<?php esc_attr_e( 'shopping cart','electronics-appliances' ); ?>"><i class="fas fa-shopping-basket"></i><span class="cart-value"><?php echo sprintf ( esc_html( '%d', '%d', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?></span></a>
                    <?php }?>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-7 align-self-center text-center text-md-right">
                <div class="slider-box-btn">
                    <?php if(get_theme_mod('electronics_appliances_button_text') != '' || get_theme_mod('electronics_appliances_button_link') != '' ){ ?>
                        <a href="<?php echo esc_url(get_theme_mod('electronics_appliances_button_link','')); ?>" class="mb-0"><?php echo esc_html(get_theme_mod('electronics_appliances_button_text','')); ?></a>
                    <?php }?>
                </div>
            </div>
        </div>
    </div>
</div>