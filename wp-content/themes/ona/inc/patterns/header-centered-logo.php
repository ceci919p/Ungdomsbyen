<?php
/**
 * Header centered logo
 */
return array(
	'title'      => __( 'Header centered logo', 'ona' ),
	'categories' => array( 'ona-headers' ),
	'blockTypes' => array( 'core/template-part/header' ),
	'content'    => '
			<!-- wp:group {"style":{"spacing":{"padding":{"right":"4%","left":"4%","top":"30px","bottom":"30px"}}},"layout":{"inherit":false}} -->
			<div class="wp-block-group" style="padding-top:30px;padding-right:4%;padding-bottom:30px;padding-left:4%"><!-- wp:columns {"verticalAlignment":"center","isStackedOnMobile":false,"style":{"spacing":{"blockGap":"0px"}},"className":"is-style-no-spacing"} -->
			<div class="wp-block-columns are-vertically-aligned-center is-not-stacked-on-mobile is-style-no-spacing"><!-- wp:column {"verticalAlignment":"center","width":"10%"} -->
			<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:10%"></div>
			<!-- /wp:column -->

			<!-- wp:column {"verticalAlignment":"center","width":"80%"} -->
			<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:80%"><!-- wp:site-title {"textAlign":"center","style":{"typography":{"textTransform":"uppercase","letterSpacing":"18px"}},"className":"ona-site-title","fontFamily":"nunito-sans"} /-->

			<!-- wp:site-tagline {"textAlign":"center","style":{"typography":{"fontSize":"12px"}}} /--></div>
			<!-- /wp:column -->

			<!-- wp:column {"verticalAlignment":"center","width":"10%"} -->
			<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:10%"></div>
			<!-- /wp:column --></div>
			<!-- /wp:columns -->

			<!-- wp:columns -->
			<div class="wp-block-columns"><!-- wp:column {"width":"100%"} -->
			<div class="wp-block-column" style="flex-basis:100%"><!-- wp:navigation {"itemsJustification":"center","overlayMenu":"mobile"} -->
			<!-- wp:navigation-link {"label":"Home","url":"ona.deothemes.com","kind":"custom","isTopLevelLink":true} /-->

			<!-- wp:navigation-submenu {"label":"News","url":"#","kind":"custom","isTopLevelItem":true} -->
			<!-- wp:navigation-link {"label":"Archive","url":"#","kind":"custom","isTopLevelLink":false} /-->

			<!-- wp:navigation-link {"label":"Single Post","url":"#","kind":"custom","isTopLevelLink":false} /-->
			<!-- /wp:navigation-submenu -->

			<!-- wp:navigation-link {"label":"About","type":"page","id":13,"url":"#","kind":"post-type","isTopLevelLink":true} /-->

			<!-- wp:navigation-link {"label":"Contact","type":"page","id":15,"url":"#","kind":"post-type","isTopLevelLink":true} /-->
			<!-- /wp:navigation --></div>
			<!-- /wp:column --></div>
			<!-- /wp:columns --></div>
			<!-- /wp:group -->',
);



