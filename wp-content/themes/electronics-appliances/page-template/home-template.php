<?php
/**
 * Template Name: Home Template
 */

get_header(); ?>

<main id="skip-content">
  <section id="top-slider">
    <?php if(get_theme_mod('electronics_appliances_top_slider_setting') != ''){ ?>
    <?php $electronics_appliances_slide_pages = array();
      for ( $electronics_appliances_count = 1; $electronics_appliances_count <= 3; $electronics_appliances_count++ ) {
        $electronics_appliances_mod = intval( get_theme_mod( 'electronics_appliances_top_slider_page' . $electronics_appliances_count ));
        if ( 'page-none-selected' != $electronics_appliances_mod ) {
          $electronics_appliances_slide_pages[] = $electronics_appliances_mod;
        }
      }
      if( !empty($electronics_appliances_slide_pages) ) :
        $electronics_appliances_args = array(
          'post_type' => 'page',
          'post__in' => $electronics_appliances_slide_pages,
          'orderby' => 'post__in'
        );
        $electronics_appliances_query = new WP_Query( $electronics_appliances_args );
        if ( $electronics_appliances_query->have_posts() ) :
          $electronics_appliances_i = 1;
    ?>
    <div class="owl-carousel" role="listbox">
      <?php  while ( $electronics_appliances_query->have_posts() ) : $electronics_appliances_query->the_post(); ?>
        <div class="slider-box">
          <img src="<?php the_post_thumbnail_url('full'); ?>"/>
          <div class="slider-inner-box">
            <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>              
            <div class="slider-box-btn my-4">
              <a href="<?php the_permalink(); ?>"><?php esc_html_e('Read More','electronics-appliances'); ?></a>
            </div>
          </div>
        </div>
      <?php $electronics_appliances_i++; endwhile;
      wp_reset_postdata();?>
    </div>
    <?php else : ?>
      <div class="no-postfound"></div>
    <?php endif;
    endif;?>
  </section>

<?php if(get_theme_mod('electronics_appliances_services_setting') != ''){ ?>
  <section class="services-sec text-center">
    <div class="container">
      <div class="owl-carousel services-bg" role="listbox">
        <?php
          $electronics_appliances_services_cat = get_theme_mod('electronics_appliances_services_sec_category','');
          $electronics_appliances_services_per_page = get_theme_mod('electronics_appliances_services_per_page',4);
          if($electronics_appliances_services_cat){
            $electronics_appliances_page_query5 = new WP_Query(array( 'category_name' => esc_html($electronics_appliances_services_cat,'electronics-appliances'),'post_per_page' => esc_attr( $electronics_appliances_services_per_page )));
            $i=1;
            while( $electronics_appliances_page_query5->have_posts() ) : $electronics_appliances_page_query5->the_post(); ?>
              <div class="box-category">
                <i class="<?php echo esc_attr(get_theme_mod('electronics_appliances_services_icon'.$i,'fas fa-shipping-fast')); ?>"></i>
                <h4 class="my-3"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
              </div>
            <?php $i++; endwhile;
          wp_reset_postdata();
        } ?>
      </div>
    </div>
  <?php } ?>
  </section>
  <?php } ?>

<?php if(get_theme_mod('electronics_appliances_product_setting') != ''){ ?>
  <section id="recent-product" class="py-5">
    <div class="container">
      <div class="row">
        <?php
        if ( class_exists( 'WooCommerce' ) ) {
          $electronics_appliances_args = array(
            'post_type' => 'product',
            'posts_per_page' => get_theme_mod('electronics_appliances_recent_product_number'),
            'product_cat' => get_theme_mod('electronics_appliances_recent_product_category'),
            'order' => 'ASC'
          );
          $loop = new WP_Query( $electronics_appliances_args );
          while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
            <div class="col-lg-4 col-md-6 col-sm-6">
              <div class="product-box mb-4">
                <div class="product-image">
                  <?php if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog'); else echo '<img src="'.esc_url(woocommerce_placeholder_img_src()).'" />'; ?>
                </div>
                <div class="p-3">
                  <h3 class="product-title"><a href="<?php echo esc_url(get_permalink( $loop->post->ID )); ?>"><?php the_title(); ?></a></h3>
                  <div class="row box-cart">
                    <div class="col-lg-8 col-md-8">
                      <p class="<?php echo esc_attr( apply_filters( 'woocommerce_product_price_class', 'price' ) ); ?> mb-0"><?php echo $product->get_price_html(); ?></p>
                    </div>
                    <div class="addtocart col-lg-4 col-md-4">
                      <?php if( $product->is_type( 'simple' ) ) { woocommerce_template_loop_add_to_cart(  $loop->post, $product );} ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <?php endwhile; wp_reset_query(); ?>
        <?php } ?>
      </div>
    </div>
  </section>
  <?php } ?>

  <section id="page-content">
    <div class="container">
      <div class="py-5">
        <?php
          if ( have_posts() ) :
            while ( have_posts() ) : the_post();
              the_content();
            endwhile;
          endif;
        ?>
      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>