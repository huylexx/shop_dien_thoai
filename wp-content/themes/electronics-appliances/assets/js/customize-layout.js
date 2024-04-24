(function( $ ) {
	wp.customize.bind( 'ready', function() {

		var optPrefix = '#customize-control-electronics_appliances_options-';
		
		// Label
		function electronics_appliances_customizer_label( id, title ) {

			// Colors

			if ( id === 'background_color' || id === 'background_image' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-electronics_appliances_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Site Identity

			if ( id === 'custom_logo' || id === 'site_icon' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-electronics_appliances_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// General Setting

			if ( id === 'electronics_appliances_preloader_hide' || id === 'electronics_appliances_sticky_header' || id === 'electronics_appliances_scroll_hide' || id === 'electronics_appliances_scroll_top_position' || id === 'electronics_appliances_woocommerce_shop_page_sidebar' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-electronics_appliances_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Woocommerce product sale Setting

			if ( id === 'electronics_appliances_woocommerce_product_sale' || id === 'electronics_appliances_woocommerce_related_product_show_hide') {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-electronics_appliances_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Slider

			if ( id === 'electronics_appliances_top_slider_setting' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-electronics_appliances_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Featured Product

			if ( id === 'electronics_appliances_product_setting' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-electronics_appliances_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Services Setting

			if ( id === 'electronics_appliances_services_setting' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-electronics_appliances_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Header Image

			if ( id === 'header_image' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-electronics_appliances_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Header

			if ( id === 'electronics_appliances_location_text' || id === 'electronics_appliances_email_text' || id === 'electronics_appliances_phone_text' || id === 'electronics_appliances_button_text' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-electronics_appliances_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Footer

			if ( id === 'electronics_appliances_footer_bg_image' || id === 'electronics_appliances_show_hide_copyright') {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-electronics_appliances_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Single Post Setting

			if ( id === 'electronics_appliances_single_post_thumb' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-electronics_appliances_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Single Post Comment Setting

			if ( id === 'electronics_appliances_single_post_comment_title' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-electronics_appliances_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Post Setting

			if ( id === 'electronics_appliances_post_page_title' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-electronics_appliances_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Page Setting

			if ( id === 'electronics_appliances_single_page_title' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-electronics_appliances_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}
			
		}

		// Colors
		electronics_appliances_customizer_label( 'background_color', 'Colors' );
		electronics_appliances_customizer_label( 'background_image', 'Background Image' );

		// Site Identity
		electronics_appliances_customizer_label( 'custom_logo', 'Logo Setup' );
		electronics_appliances_customizer_label( 'site_icon', 'Favicon' );

		// General Setting
		electronics_appliances_customizer_label( 'electronics_appliances_preloader_hide', 'Preloader' );
		electronics_appliances_customizer_label( 'electronics_appliances_sticky_header', 'Sticky Header' );
		electronics_appliances_customizer_label( 'electronics_appliances_scroll_hide', 'Scroll To Top' );
		electronics_appliances_customizer_label( 'electronics_appliances_scroll_top_position', 'Scroll to top Position' );
		electronics_appliances_customizer_label( 'electronics_appliances_woocommerce_shop_page_sidebar', 'Woocommerce Settings' );
		electronics_appliances_customizer_label( 'electronics_appliances_woocommerce_product_sale', 'Woocommerce Product Sale Positions' );
		electronics_appliances_customizer_label( 'electronics_appliances_woocommerce_related_product_show_hide', 'Woocommerce Related Products' );

		//Slider
		electronics_appliances_customizer_label( 'electronics_appliances_top_slider_setting', 'Slider' );

		//Featured Product
		electronics_appliances_customizer_label( 'electronics_appliances_product_setting', 'Product' );

		//Services Setting
		electronics_appliances_customizer_label( 'electronics_appliances_services_setting', 'Services' );

		//Header Image
		electronics_appliances_customizer_label( 'header_image', 'Header Image' );

		//Header
		electronics_appliances_customizer_label( 'electronics_appliances_location_text', 'Location' );
		electronics_appliances_customizer_label( 'electronics_appliances_email_text', 'Email' );
		electronics_appliances_customizer_label( 'electronics_appliances_phone_text', 'Phone' );
		electronics_appliances_customizer_label( 'electronics_appliances_button_text', 'Button' );

		//Footer
		electronics_appliances_customizer_label( 'electronics_appliances_footer_bg_image', 'Footer' );
		electronics_appliances_customizer_label( 'electronics_appliances_show_hide_copyright', 'Copyright' );

		//Single Post Setting
		electronics_appliances_customizer_label( 'electronics_appliances_single_post_thumb', 'Single Post Setting' );
		electronics_appliances_customizer_label( 'electronics_appliances_single_post_comment_title', 'Single Post Comment' );

		// Post Setting
		electronics_appliances_customizer_label( 'electronics_appliances_post_page_title', 'Post Setting' );

		// Page Setting
		electronics_appliances_customizer_label( 'electronics_appliances_single_page_title', 'Page Setting' );
	

	});

})( jQuery );
