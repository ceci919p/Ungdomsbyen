;(function( $ ){

jQuery.fn.scrollTo = function( offset ){

	jQuery( document ).on( 'click', '.scroll-to', function( e ){
		e.preventDefault();
		var target = jQuery( this ).attr( 'href' );
		if( 'undefined' != typeof target ){
			if( !offset ){
				offset = 0;
			}
			var pos = jQuery( target ).offset().top - offset;
			jQuery("html, body").animate({ scrollTop: pos }, 800);
		}
	});

	return this;
};

function scrollToTop ( param ){

	this.markup   = null,
	this.selector = null;
	this.fixed    = true;
	this.visible  = false;

	this.init = function(){

		if( this.valid() ){

			if( typeof param != 'undefined' && typeof param.fixed != 'undefined' ){
				this.fixed = param.fixed;
			}

			this.selector = ( param && param.selector ) ? param.selector : '#go-top';

			this.getMarkup();
			var that = this;

			jQuery( 'body' ).append( this.markup );

			if( this.fixed ){

				jQuery( this.selector ).hide();

				var windowHeight = jQuery( window ).height();

				jQuery( window ).scroll(function(){

					var scrollPos = jQuery( window ).scrollTop();

					if(  ( scrollPos > ( windowHeight - 100 ) ) ){

						if( false == that.visible ){
							jQuery( that.selector ).fadeIn();
							that.visible = true;
						}
						
					}else{

						if( true == that.visible ){
							jQuery( that.selector ).fadeOut();
							that.visible = false;
						}
					}
				});

				jQuery( this.selector ).scrollTo();
			}
		}
	}

	this.getMarkup = function(){

		var position = this.fixed ? 'fixed':'absolute';

		var wrapperStyle = 'style="position: '+position+'; z-index:999999; bottom: 20px; right: 20px;"';

		var buttonStyle  = 'style="cursor:pointer;display: inline-block;padding: 10px 20px;background: #f15151;color: #fff;border-radius: 2px;"';

		var markup = '<div ' + wrapperStyle + ' id="go-top"><span '+buttonStyle+'>Scroll To Top</span></div>';

		this.markup   = ( param && param.markup ) ? param.markup : markup;
	}

	this.valid = function(){

		if( param && param.markup && !param.selector ){
			alert( 'Please provide selector. eg. { markup: "<div id=\'scroll-top\'></div>", selector: "#scroll-top"}' );
			return false;
		}

		return true;
	}
};
/**
 * File skip-link-focus-fix.js.
 *
 * Helps with accessibility for keyboard only users.
 *
 * Learn more: https://git.io/vWdr2
 */
(function() {
	var isIe = /(trident|msie)/i.test( navigator.userAgent );

	if ( isIe && document.getElementById && window.addEventListener ) {
		window.addEventListener( 'hashchange', function() {
			var id = location.hash.substring( 1 ),
				element;

			if ( ! ( /^[A-z0-9_-]+$/.test( id ) ) ) {
				return;
			}

			element = document.getElementById( id );

			if ( element ) {
				if ( ! ( /^(?:a|select|input|button|textarea)$/i.test( element.tagName ) ) ) {
					element.tabIndex = -1;
				}

				element.focus();
			}
		}, false );
	}
})();

/**
* Setting up functionality for alternative menu
* @since Blogberg 1.0.0
*/
function wpMenuAccordion( selector ){

	var $ele = selector + ' .menu-item-has-children > a';
	$( $ele ).each( function(){
		var text = $( this ).text();
		text = text + '<span class="kfi kfi-arrow-carrot-down-alt2 triangle"></span>';
		$( this ).html( text );
	});

	$( document ).on( 'click', $ele + ' span.triangle', function( e ){
		e.preventDefault();
		e.stopPropagation();

		$parentLi = $( this ).parent().parent( 'li' );
		$childLi = $parentLi.find( 'li' );

		if( $parentLi.hasClass( 'open' ) ){
			/**
			* Closing all the ul inside and 
			* removing open class for all the li's
			*/
			$parentLi.removeClass( 'open' );
			$childLi.removeClass( 'open' );

			$( this ).parent( 'a' ).next().slideUp();
			$( this ).parent( 'a' ).next().find( 'ul' ).slideUp();
		}else{

			$parentLi.addClass( 'open' );
			$( this ).parent( 'a' ).next().slideDown();
		}
	});
};

/**
* Fire for fixed header
* @since Blogberg 1.0.0
*/

function primaryHeader(){
	var h,
	fixedHeader = 'fixed-nav-active',
	addClass = function(){
		if( !BLOGBERG.fixed_nav && !$( 'body' ).hasClass( fixedHeader ) ){
			$( 'body' ).addClass( fixedHeader );
		}
	},
	removeClass = function(){
		if( $( 'body' ).hasClass( fixedHeader ) ){
			$( 'body' ).removeClass( fixedHeader );
		}
	},
	setPosition = function( top ){
		$( '.site-header-wrap' ).css( {
		});
	},
	init = function(){
		h = $( '#masthead' ).outerHeight();
			setPosition( h );
	 	},
		
	onScroll = function(){
		var scroll = jQuery(document).scrollTop(),
			pos = 0,
			height = h + 12,
			width = $( window ).width();

		if( BLOGBERG.is_admin_bar_showing && width >= 782 ){
			scroll = scroll+32;
		}

 	 	if( height ){
 	 		if( height >= scroll ){
 	 			pos = height-jQuery(document).scrollTop();
 	 			removeClass();
 	 		}else if( BLOGBERG.is_admin_bar_showing && width >= 782 ){
 	 			$( '.site-header-wrap' ).css({
 	 				top : 32
 	 			});
 	 			addClass();
 	 		}else if( BLOGBERG.is_admin_bar_showing && width >= 601 && width <= 781 ){
 	 			$( '.site-header-wrap' ).css({
 	 				top : 46
 	 			});
 	 			addClass();
 	 		}
 	 		else{
 	 			$( '.site-header-wrap' ).css({
 	 				top : 0
 	 			});
 	 			addClass();
 	 		}

 		}else{

			var mh = $( '#masthead' ).outerHeight(),
				scroll = jQuery(document).scrollTop();
			if( mh >= scroll ){
				if( BLOGBERG.is_admin_bar_showing && width >= 782 ){
					pos = 32-scroll;
				}else{
					pos = -scroll;
				}
				removeClass();
			}else{
				
				if( BLOGBERG.is_admin_bar_showing && width >= 782 ){
					pos = 32;
				}else{
					pos = 0;
				}
				addClass();
			}
		}
		
		setPosition( pos );
	};
	
	$( window ).resize(function(){
		init();
		onScroll();
	});

	init();
	onScroll();
	
	$( window ).scroll( onScroll );

	jQuery( window ).load( function(){
		init();
		onScroll();
	});
}

/**
* theiaStickySidebar
* @since Blogberg 1.0.0
*/

  $('#primary, #secondary').theiaStickySidebar({
  // Settings
  	additionalMarginTop: 30
  });

/**
* Fire slider for archive page
* @link https://owlcarousel2.github.io/OwlCarousel2/docs/started-welcome.html
* @since Blogberg 1.0.0
*/

function homeSlider(){
	var item_count = parseInt(jQuery( '.block-slider .slide-item').length);
	jQuery(".home-slider").owlCarousel({
		items: 1,
		autoHeight: false,
		autoHeightClass: 'name',
		animateOut: 'fadeOut',
    	navContainer: '.block-slider .controls',
    	dotsContainer: '#slide-pager',
    	autoplay : BLOGBERG.home_slider.autoplay,
    	autoplayTimeout : parseInt( BLOGBERG.home_slider.timeout ),
    	loop : ( item_count > 1 ) ? true : false,
    	rtl: ( BLOGBERG.is_rtl == '1' ) ? true : false,
    	responsive:{
    	    768:{
    	        items: 1,
    	        nav: true,
    	    }
    	},
	});
};

/**
* Show or Hide Search field on clicking search icon
* @since Blogberg 1.0.0
*/
jQuery( document ).on( 'click', '.header-search-icon', function(e){
	e.preventDefault();
	jQuery( '.header-search-wrap' ).addClass( 'search-slide' );
});

jQuery( 'body' ).click(function(evt){    
    if(!jQuery(evt.target).is( '.header-search-wrap input, .header-search-icon' )) {
        jQuery( '.header-search-wrap' ).removeClass( 'search-slide' );
    }
});

/**
* Animate contact form fields when they are focused
* @since Blogberg 1.0.0
*/
jQuery( '.kt-contact-form-area input, .kt-contact-form-area textarea' ).on( 'focus',function(){
	var target = jQuery( this ).attr( 'id' );
	jQuery('label[for="'+target+'"]').addClass( 'move' );
});

jQuery( '.kt-contact-form-area input, .kt-contact-form-area textarea' ).on( 'blur',function(){
	var target = jQuery( this ).attr( 'id' );
	jQuery('label[for="'+target+'"]').removeClass( 'move' );
});

jQuery( document ).ready( function(){
	primaryHeader();
	homeSlider();

	// Related Posts Tab
	$('.tab-title').click(function( e ){
	  e.preventDefault();
	  $(".tab").removeClass('tab-active');
	  $(".tab-title").removeClass('active-title');
	  $(".tab[data-id='"+$(this).attr('data-id')+"']").addClass("tab-active");
	  $(this).addClass('active-title');
	});

	$( '.scroll-to' ).scrollTo();

	/**
	* Initializing scroll top js
	*/
	new scrollToTop({
		markup   : '<a href="#page" class="scroll-to '+ ( BLOGBERG.enable_scroll_top == 0 ? "d-none" : "" )+'" id="go-top"><span class="kfi kfi-arrow-up"></span></a>',
		selector : '#go-top'
	}).init();
	console.log(BLOGBERG.enable_scroll_top + '' + 'test');
	wpMenuAccordion( '#offcanvas-menu' );
	
	$( document ).on( 'click', '.offcanvas-menu-toggler, .close-offcanvas-menu button, .kt-offcanvas-overlay', function( e ){
		e.preventDefault();
		$( 'body' ).toggleClass( 'offcanvas-menu-open' );
	});
	jQuery( 'body' ).append( '<div class="kt-offcanvas-overlay"></div>' );

    /**
    * Modify default search placeholder
    */
    $( '#masthead #s' ).attr( 'placeholder', BLOGBERG.search_placeholder );
    $( '#searchform #s' ).attr( 'placeholder', BLOGBERG.search_default_placeholder );
});


jQuery( window ).resize(function(){

});

jQuery( window ).load( function(){
	/**
	* Site loader
	*/
	jQuery( '#site-loader' ).fadeOut( 500 );

	/**
	* Make sure if the masonry wrapper exists
	*/
	if( jQuery( '.masonry-wrapper' ).length > 0 ){
		$grid = jQuery( '.masonry-wrapper' ).masonry({
			itemSelector: '.grid-post',
			percentPosition: true,
		});	
	}

	/**
	* Make support for Jetpack's infinite scroll on masonry layout
	*/
	infinite_count = 0;
    $( document.body ).on( 'post-load', function () {

		infinite_count = infinite_count + 1;
		var container = '#infinite-view-' + infinite_count;
		$( container ).hide();

		$( $( container + ' .grid-post' ) ).each( function(){
			$items = $( this );
		  	$grid.append( $items ).masonry( 'appended', $items );
		});

		setTimeout( function(){
			$grid.masonry('layout');
		},500);
    });
});

})( jQuery );