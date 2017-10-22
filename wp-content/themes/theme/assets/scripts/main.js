/* ========================================================================
 * DOM-based Routing
 * Based on http://goo.gl/EUTi53 by Paul Irish
 *
 * Only fires on body classes that match. If a body class contains a dash,
 * replace the dash with an underscore when adding it to the object below.
 *
 * .noConflict()
 * The routing is enclosed within an anonymous function so that you can
 * always reference jQuery with $, even when in .noConflict() mode.
 * ======================================================================== */

(function($) {

  // Use this variable to set up the common and page specific functions. If you
  // rename this variable, you will also need to rename the namespace below.
  var Sage = {
    // All pages
    'common': {
      init: function() {
         // JavaScript to be fired on all pages

        $('#bbi-wrapper').fadeIn('slow');

        $('[data-toggle="offcanvas"]').click(function () {
          $('.row-offcanvas').toggleClass('active');
        });

        $('.bbi-nav-primary > ul > li.menu-item-has-children').each(function() {
            $(this).addClass('dropdown');
            $(this).children('a').after('<div class="dropdown bbi-dropdown-arrow visible-xs visible-sm" data-toggle="dropdown"></div>');
            $(this).children('.sub-menu').addClass('dropdown-menu');
        });


        $(".dropdown-menu").find("input, button").each(function () {
            $(this).click(function (e) {
                e.stopPropagation();
            });
        });

        $('[data-toggle=dropdown]').each(function() {
         this.addEventListener('click', function() {}, false);
        });

        $('.bbi-tabs').tabCollapse();

        $( "#bbi-primary-content table" ).addClass('table table-bordered').wrap( "<div class='table-responsive'></div>" );

        $('iframe[src*="youtube.com"],iframe[src*="vimeo.com"]').each(function() {
          $(this).wrapAll('<div class="bbi-video-wrap"><div class="videoWrapper"></div></div>');
        });

        $('.bbi-medium-cont').each(function() {
          $(this).wrapAll('<div class="bbi-center-wrap"></div>');
        });

        $(".owl-carousel").owlCarousel({
            loop:true,
		    margin:15,
		    dots:false,
		    nav:true,
		    autoplay:4000,
		    responsiveClass:true,
		    responsive:{
		        0:{
		            items:1,
		            nav:false
		        },
		        480:{
		            items:2
		        },
		        768:{
		            items:2
		        },
		        992:{
		            items:3
		        },
		        1200:{
		            items:4

		        }
		    }
        });

        (function($) {

		/*
		*  new_map
		*
		*  This function will render a Google Map onto the selected jQuery element
		*
		*  @type	function
		*  @date	8/11/2013
		*  @since	4.3.0
		*
		*  @param	$el (jQuery element)
		*  @return	n/a
		*/

		function new_map( $el ) {

			// var
			var $markers = $el.find('.marker');


			// vars
			var args = {
				zoom		: 16,
				center		: new google.maps.LatLng(0, 0),
				mapTypeId	: google.maps.MapTypeId.ROADMAP
			};


			// create map
			var map = new google.maps.Map( $el[0], args);


			// add a markers reference
			map.markers = [];


			// add markers
			$markers.each(function(){

		    	add_marker( $(this), map );

			});


			// center map
			center_map( map );


			// return
			return map;

		}

		/*
		*  add_marker
		*
		*  This function will add a marker to the selected Google Map
		*
		*  @type	function
		*  @date	8/11/2013
		*  @since	4.3.0
		*
		*  @param	$marker (jQuery element)
		*  @param	map (Google Map object)
		*  @return	n/a
		*/

		function add_marker( $marker, map ) {

			// var
			var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );

			// create marker
			var marker = new google.maps.Marker({
				position	: latlng,
				map			: map
			});

			// add to array
			map.markers.push( marker );

			// if marker contains HTML, add it to an infoWindow
			if( $marker.html() )
			{
				// create info window
				var infowindow = new google.maps.InfoWindow({
					content		: $marker.html()
				});

				// show info window when marker is clicked
				google.maps.event.addListener(marker, 'click', function() {

					infowindow.open( map, marker );

				});
			}

		}

		/*
		*  center_map
		*
		*  This function will center the map, showing all markers attached to this map
		*
		*  @type	function
		*  @date	8/11/2013
		*  @since	4.3.0
		*
		*  @param	map (Google Map object)
		*  @return	n/a
		*/

		function center_map( map ) {

			// vars
			var bounds = new google.maps.LatLngBounds();

			// loop through all markers and create bounds
			$.each( map.markers, function( i, marker ){

				var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );

				bounds.extend( latlng );

			});

			// only 1 marker?
			if( map.markers.length === 1 )
			{
				// set center of map
			    map.setCenter( bounds.getCenter() );
			    map.setZoom( 16 );
			}
			else
			{
				// fit to bounds
				map.fitBounds( bounds );
			}

		}

		/*
		*  document ready
		*
		*  This function will render each map when the document is ready (page has loaded)
		*
		*  @type	function
		*  @date	8/11/2013
		*  @since	5.0.0
		*
		*  @param	n/a
		*  @return	n/a
		*/
		// global var
		var map = null;

		$(document).ready(function(){

			$('.acf-map').each(function(){

				// create map
				map = new_map( $(this) );
				// popup is shown and map is not visible
				google.maps.event.trigger(map, 'resize');
			});

		});

		})(jQuery);
      },
      finalize: function() {
        // JavaScript to be fired on all pages, after page specific JS is fired
      }
    },
    // Home page
    'home': {
      init: function() {
        // JavaScript to be fired on the home page

      },
      finalize: function() {
        // JavaScript to be fired on the home page, after the init JS
      }
    },
    // About us page, note the change from about-us to about_us.
    'about_us': {
      init: function() {
        // JavaScript to be fired on the about us page
      }
    }
  };

  // The routing fires all common scripts, followed by the page specific scripts.
  // Add additional events for more control over timing e.g. a finalize event
  var UTIL = {
    fire: function(func, funcname, args) {
      var fire;
      var namespace = Sage;
      funcname = (funcname === undefined) ? 'init' : funcname;
      fire = func !== '';
      fire = fire && namespace[func];
      fire = fire && typeof namespace[func][funcname] === 'function';

      if (fire) {
        namespace[func][funcname](args);
      }
    },
    loadEvents: function() {
      // Fire common init JS
      UTIL.fire('common');

      // Fire page-specific init JS, and then finalize JS
      $.each(document.body.className.replace(/-/g, '_').split(/\s+/), function(i, classnm) {
        UTIL.fire(classnm);
        UTIL.fire(classnm, 'finalize');
      });

      // Fire common finalize JS
      UTIL.fire('common', 'finalize');
    }
  };

  // Load Events
  $(document).ready(UTIL.loadEvents);

})(jQuery); // Fully reference jQuery after this point.