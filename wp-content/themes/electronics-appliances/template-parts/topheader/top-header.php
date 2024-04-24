<?php
/**
 * Displays main header
 *
 * @package Electronics Appliances
 */
?>

<div class="main-header">
    <div class="container">
        <div class="row">
            <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 align-self-center text-center text-md-center text-xl-left mb-md-3">
                <div class="navbar-brand">
                    <?php if ( has_custom_logo() ) : ?>
                        <div class="site-logo"><?php the_custom_logo(); ?></div>
                    <?php endif; ?>
                    <?php $electronics_appliances_blog_info = get_bloginfo( 'name' ); ?>
                        <?php if ( ! empty( $electronics_appliances_blog_info ) ) : ?>
                            <?php if ( is_front_page() && is_home() ) : ?>
                              <?php if( get_theme_mod('electronics_appliances_logo_title_text',true) != ''){ ?>
                                <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                              <?php } ?>
                            <?php else : ?>
                              <?php if( get_theme_mod('electronics_appliances_logo_title_text',true) != ''){ ?>
                                <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                              <?php } ?>
                            <?php endif; ?>
                        <?php endif; ?>
                        <?php
                            $electronics_appliances_description = get_bloginfo( 'description', 'display' );
                            if ( $electronics_appliances_description || is_customize_preview() ) :
                        ?>
                        <?php if( get_theme_mod('electronics_appliances_theme_description',false) != ''){ ?>
                        <p class="site-description"><?php echo esc_html($electronics_appliances_description); ?></p>
                      <?php } ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12 align-self-center header-info-box text-center text-md-left mb-md-3">
                <div class="row">
                    <div class="col-lg-5 col-md-4 col-sm-4 align-self-center">
                        <?php if(get_theme_mod('electronics_appliances_location') != '' || get_theme_mod('electronics_appliances_location_text') != '' ){ ?>
                            <div class="row">
                                <div class="col-lg-3 col-md-2 col-sm-2 align-self-center">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <div class="col-lg-9 col-md-10 col-sm-10 align-self-center">
                                    <p class="mb-0"><?php echo esc_html(get_theme_mod('electronics_appliances_location_text','')); ?></p>
                                    <p class="mb-0"><?php echo esc_html(get_theme_mod('electronics_appliances_location','')); ?></p>
                                </div>
                            </div>
                        <?php }?>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 align-self-center">
                        <?php if(get_theme_mod('electronics_appliances_email') != '' || get_theme_mod('electronics_appliances_email_text') != '' ){ ?>
                            <div class="row">
                                <div class="col-lg-3 col-md-2 col-sm-2 align-self-center">
                                    <i class="fas fa-envelope-open-text"></i>
                                </div>
                                <div class="col-lg-9 col-md-10 col-sm-10 align-self-center">
                                    <p class="mb-0"><?php echo esc_html(get_theme_mod('electronics_appliances_email_text','')); ?></p>
                                    <a href="mailto:<?php echo esc_html(get_theme_mod('electronics_appliances_email','')); ?>"><p class="mb-0"><?php echo esc_html(get_theme_mod('electronics_appliances_email','')); ?></p></a>
                                </div>
                            </div>
                        <?php }?>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-4 align-self-center">
                        <?php if(get_theme_mod('electronics_appliances_phone_number') != '' || get_theme_mod('electronics_appliances_phone_text') != '' ){ ?>
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-3 align-self-center">
                                    <i class="fas fa-phone"></i>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-9 align-self-center">
                                    <p class="mb-0"><?php echo esc_html(get_theme_mod('electronics_appliances_phone_text','')); ?></p>
                                    <a href="tel:<?php echo esc_html(get_theme_mod('electronics_appliances_phone_number','')); ?>"><p class="mb-0"><?php echo esc_html(get_theme_mod('electronics_appliances_phone_number','')); ?></p></a>
                                </div>
                            </div>
                        <?php }?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>