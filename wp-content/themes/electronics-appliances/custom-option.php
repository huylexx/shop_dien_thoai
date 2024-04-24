<?php

    $electronics_appliances_theme_css= "";

    /*--------------------------- Scroll To Top Positions -------------------*/

    $electronics_appliances_scroll_position = get_theme_mod( 'electronics_appliances_scroll_top_position','Right');
    if($electronics_appliances_scroll_position == 'Right'){
        $electronics_appliances_theme_css .='#button{';
            $electronics_appliances_theme_css .='right: 20px;';
        $electronics_appliances_theme_css .='}';
    }else if($electronics_appliances_scroll_position == 'Left'){
        $electronics_appliances_theme_css .='#button{';
            $electronics_appliances_theme_css .='left: 20px;';
        $electronics_appliances_theme_css .='}';
    }else if($electronics_appliances_scroll_position == 'Center'){
        $electronics_appliances_theme_css .='#button{';
            $electronics_appliances_theme_css .='right: 50%;left: 50%;';
        $electronics_appliances_theme_css .='}';
    }

    /*--------------------------- Slider Image Opacity -------------------*/

    $electronics_appliances_slider_img_opacity = get_theme_mod( 'electronics_appliances_slider_opacity_color','');
    if($electronics_appliances_slider_img_opacity == '0'){
        $electronics_appliances_theme_css .='#top-slider img{';
            $electronics_appliances_theme_css .='opacity:0';
        $electronics_appliances_theme_css .='}';
        }else if($electronics_appliances_slider_img_opacity == '0.1'){
        $electronics_appliances_theme_css .='#top-slider img{';
            $electronics_appliances_theme_css .='opacity:0.1';
        $electronics_appliances_theme_css .='}';
        }else if($electronics_appliances_slider_img_opacity == '0.2'){
        $electronics_appliances_theme_css .='#top-slider img{';
            $electronics_appliances_theme_css .='opacity:0.2';
        $electronics_appliances_theme_css .='}';
        }else if($electronics_appliances_slider_img_opacity == '0.3'){
        $electronics_appliances_theme_css .='#top-slider img{';
            $electronics_appliances_theme_css .='opacity:0.3';
        $electronics_appliances_theme_css .='}';
        }else if($electronics_appliances_slider_img_opacity == '0.4'){
        $electronics_appliances_theme_css .='#top-slider img{';
            $electronics_appliances_theme_css .='opacity:0.4';
        $electronics_appliances_theme_css .='}';
        }else if($electronics_appliances_slider_img_opacity == '0.5'){
        $electronics_appliances_theme_css .='#top-slider img{';
            $electronics_appliances_theme_css .='opacity:0.5';
        $electronics_appliances_theme_css .='}';
        }else if($electronics_appliances_slider_img_opacity == '0.6'){
        $electronics_appliances_theme_css .='#top-slider img{';
            $electronics_appliances_theme_css .='opacity:0.6';
        $electronics_appliances_theme_css .='}';
        }else if($electronics_appliances_slider_img_opacity == '0.7'){
        $electronics_appliances_theme_css .='#top-slider img{';
            $electronics_appliances_theme_css .='opacity:0.7';
        $electronics_appliances_theme_css .='}';
        }else if($electronics_appliances_slider_img_opacity == '0.8'){
        $electronics_appliances_theme_css .='#top-slider img{';
            $electronics_appliances_theme_css .='opacity:0.8';
        $electronics_appliances_theme_css .='}';
        }else if($electronics_appliances_slider_img_opacity == '0.9'){
        $electronics_appliances_theme_css .='#top-slider img{';
            $electronics_appliances_theme_css .='opacity:0.9';
        $electronics_appliances_theme_css .='}';
        }

    /*---------------------------Slider Height ------------*/

    $electronics_appliances_slider_img_height = get_theme_mod('electronics_appliances_slider_img_height');
    if($electronics_appliances_slider_img_height != false){
        $electronics_appliances_theme_css .='#top-slider .owl-carousel .owl-item img{';
            $electronics_appliances_theme_css .='height: '.esc_attr($electronics_appliances_slider_img_height).';';
        $electronics_appliances_theme_css .='}';
    }

    /*---------------- Single post Settings ------------------*/

    $electronics_appliances_single_post_navigation_show_hide = get_theme_mod('electronics_appliances_single_post_navigation_show_hide',true);
    if($electronics_appliances_single_post_navigation_show_hide != true){
        $electronics_appliances_theme_css .='.nav-links{';
            $electronics_appliances_theme_css .='display: none;';
        $electronics_appliances_theme_css .='}';
    }

    /*--------------------------- Woocommerce Product Sale Positions -------------------*/

    $electronics_appliances_product_sale = get_theme_mod( 'electronics_appliances_woocommerce_product_sale','Right');
    if($electronics_appliances_product_sale == 'Right'){
        $electronics_appliances_theme_css .='.woocommerce ul.products li.product .onsale{';
            $electronics_appliances_theme_css .='left: auto; right: 15px;';
        $electronics_appliances_theme_css .='}';
    }else if($electronics_appliances_product_sale == 'Left'){
        $electronics_appliances_theme_css .='.woocommerce ul.products li.product .onsale{';
            $electronics_appliances_theme_css .='left: 15px; right: auto;';
        $electronics_appliances_theme_css .='}';
    }else if($electronics_appliances_product_sale == 'Center'){
        $electronics_appliances_theme_css .='.woocommerce ul.products li.product .onsale{';
            $electronics_appliances_theme_css .='right: 50%;left: 50%;';
        $electronics_appliances_theme_css .='}';
    }

    /*--------------------------- Woocommerce Related Products -------------------*/

    $electronics_appliances_woocommerce_related_product_show_hide = get_theme_mod('electronics_appliances_woocommerce_related_product_show_hide',true);
    if($electronics_appliances_woocommerce_related_product_show_hide != true){
        $electronics_appliances_theme_css .='.related.products{';
            $electronics_appliances_theme_css .='display: none;';
        $electronics_appliances_theme_css .='}';
    }

    /*--------------------------- Footer background image -------------------*/

    $electronics_appliances_footer_bg_image = get_theme_mod('electronics_appliances_footer_bg_image');
    if($electronics_appliances_footer_bg_image != false){
        $electronics_appliances_theme_css .='#colophon{';
            $electronics_appliances_theme_css .='background: url('.esc_attr($electronics_appliances_footer_bg_image).')!important;';
        $electronics_appliances_theme_css .='}';
    }

    /*--------------------------- Copyright Background Color -------------------*/

    $electronics_appliances_copyright_background_color = get_theme_mod('electronics_appliances_copyright_background_color');
    if($electronics_appliances_copyright_background_color != false){
        $electronics_appliances_theme_css .='.footer_info{';
            $electronics_appliances_theme_css .='background-color: '.esc_attr($electronics_appliances_copyright_background_color).' !important;';
        $electronics_appliances_theme_css .='}';
    }

    /*--------------------------- Featured Image Border Radius -------------------*/

    $electronics_appliances_post_page_image_border_radius = get_theme_mod('electronics_appliances_post_page_image_border_radius', 0);
    if($electronics_appliances_post_page_image_border_radius != false){
        $electronics_appliances_theme_css .='.article-box img{';
            $electronics_appliances_theme_css .='border-radius: '.esc_attr($electronics_appliances_post_page_image_border_radius).'px;';
        $electronics_appliances_theme_css .='}';
    }

    /*--------------------------- Site Title And Tagline Color -------------------*/

    $electronics_appliances_logo_title_color = get_theme_mod('electronics_appliances_logo_title_color');
    if($electronics_appliances_logo_title_color != false){
        $electronics_appliances_theme_css .='p.site-title a, .navbar-brand a{';
            $electronics_appliances_theme_css .='color: '.esc_attr($electronics_appliances_logo_title_color).' !important;';
        $electronics_appliances_theme_css .='}';
    }

    $electronics_appliances_logo_tagline_color = get_theme_mod('electronics_appliances_logo_tagline_color');
    if($electronics_appliances_logo_tagline_color != false){
        $electronics_appliances_theme_css .='.logo p.site-description, .navbar-brand p{';
            $electronics_appliances_theme_css .='color: '.esc_attr($electronics_appliances_logo_tagline_color).'  !important;';
        $electronics_appliances_theme_css .='}';
    }