<?php
/**
 * Title: Latest News
 * Slug: clothing-apparel-shop/latest-news
 * Categories: clothing-apparel-shop, latest-news
 */
?>

<!-- wp:group {"style":{"spacing":{"margin":{"top":"0px","bottom":"0px"},"padding":{"top":"60px","right":"20px","bottom":"60px","left":"20px"}}},"layout":{"type":"constrained","contentSize":"90%"}} -->
<div class="wp-block-group" style="margin-top:0px;margin-bottom:0px;padding-top:60px;padding-right:20px;padding-bottom:60px;padding-left:20px"><!-- wp:group {"align":"wide","layout":{"type":"default"}} -->
<div class="wp-block-group alignwide"><!-- wp:group {"align":"wide","className":"section_head","layout":{"type":"default"}} -->
<div class="wp-block-group alignwide section_head"><!-- wp:group {"style":{"border":{"width":"0px","style":"none"}},"className":"offer-zone-text","layout":{"type":"constrained","contentSize":"10%"}} -->
<div class="wp-block-group offer-zone-text" style="border-style:none;border-width:0px"><!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"textTransform":"capitalize"},"color":{"gradient":"linear-gradient(135deg,rgb(155,81,224) 0%,rgb(128,53,255) 100%)"},"elements":{"link":{"color":{"text":"var:preset|color|white"}}},"spacing":{"padding":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20","left":"var:preset|spacing|20","right":"var:preset|spacing|20"}}},"textColor":"white","fontSize":"medium","fontFamily":"inter"} -->
<h3 class="wp-block-heading has-text-align-center has-white-color has-text-color has-background has-link-color has-inter-font-family has-medium-font-size" style="background:linear-gradient(135deg,rgb(155,81,224) 0%,rgb(128,53,255) 100%);padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--20);text-transform:capitalize"><?php esc_html_e('Recent News','clothing-apparel-shop'); ?></h3>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:heading {"textAlign":"center","style":{"typography":{"fontStyle":"normal","fontWeight":"800","textTransform":"capitalize"},"color":{"text":"#132c3b"}},"fontSize":"extra-large","fontFamily":"inter"} -->
<h2 class="wp-block-heading has-text-align-center has-text-color has-inter-font-family has-extra-large-font-size" style="color:#132c3b;font-style:normal;font-weight:800;text-transform:capitalize"><?php esc_html_e('Our Latest News','clothing-apparel-shop'); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"right":"0","left":"0"}}},"fontFamily":"inter"} -->
<p class="has-text-align-center has-inter-font-family" style="margin-right:0;margin-left:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><?php esc_html_e('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.','clothing-apparel-shop'); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:spacer {"height":"30px"} -->
<div style="height:30px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:query {"queryId":3,"query":{"perPage":3,"pages":"1","offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"exclude","inherit":false}} -->
<div class="wp-block-query"><!-- wp:post-template {"layout":{"type":"grid","columnCount":3}} -->
<!-- wp:group {"className":"wow swing","layout":{"type":"constrained"}} -->
<div class="wp-block-group wow swing"><!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:post-featured-image {"isLink":true,"className":"news-thumb-wrap"} /--></div>
<!-- /wp:group -->

<!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:post-title {"level":5,"isLink":true,"style":{"typography":{"fontStyle":"normal","fontWeight":"600","lineHeight":"1.2"}},"fontSize":"regular","fontFamily":"inter"} /-->

<!-- wp:group {"style":{"border":{"top":{"color":"#ab7aff","width":"1px"},"bottom":{"color":"#ab7aff","width":"1px"},"right":{},"left":{}},"spacing":{"padding":{"top":"7px","bottom":"7px"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
<div class="wp-block-group" style="border-top-color:#ab7aff;border-top-width:1px;border-bottom-color:#ab7aff;border-bottom-width:1px;padding-top:7px;padding-bottom:7px"><!-- wp:post-author {"showAvatar":false,"fontFamily":"inter"} /-->

<!-- wp:post-terms {"term":"category","fontFamily":"inter"} /--></div>
<!-- /wp:group -->

<!-- wp:post-excerpt {"moreText":"","showMoreOnNewLine":false,"fontFamily":"inter"} /--></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
<!-- /wp:post-template -->

<!-- wp:query-no-results -->
<!-- wp:paragraph {"placeholder":"Add text or blocks that will display when a query returns no results.","fontFamily":"inter"} -->
<p class="has-inter-font-family"><?php esc_html_e('There is no post found','clothing-apparel-shop'); ?></p>
<!-- /wp:paragraph -->
<!-- /wp:query-no-results --></div>
<!-- /wp:query --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->