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
 *
 * Google CDN, Latest jQuery
 * To use the default WordPress version of jQuery, go to lib/config.php and
 * remove or comment out: add_theme_support('jquery-cdn');
 * ======================================================================== */

(function ($) {

	// Use this variable to set up the common and page specific functions. If you
	// rename this variable, you will also need to rename the namespace below.
	var Base = {
		// All pages
		common: {
			init: function () {
				// JavaScript to be fired on all pages

				if ($('.js-accordion-trigger').length) {
					$('.js-accordion-trigger').bind('click', function (e) {
						var $accordion = $(this).closest('.accordion');

						// If the accordion is closed, first, close any other open
						// accordions.
						if (!($accordion.hasClass('is-expanded'))) {
							$('.accordion.is-expanded').removeClass('is-expanded');
						}

						$accordion.toggleClass('is-expanded');

						if ($('.isotope-row .js-accordion-trigger').length) {
							var $rows = $('.isotope-row');

							updateLayout = setInterval(function () {
								$rows.isotope('layout');
							}, 10);

							window.setTimeout(function () {
								clearInterval(updateLayout);
							}, 600);
						}

						e.preventDefault();
					});
				}

				if ($('.dropdown').length) {
					$(".dropdown-button").click(function () {
						var $button, $menu;
						$button = $(this);
						$menu = $button.siblings(".dropdown-menu");
						var $dropdown = $button.closest(".dropdown");
						$dropdown.toggleClass("is-active");
						$menu.children("li").click(function () {
							$dropdown.removeClass("is-active");
							$button.text($(this).text());
						});
					});
				}

				if ($(".js-to-anchor")) {
					$(".js-to-anchor").click(function () {
						$('html, body').animate({
							scrollTop: $('[name="' + $.attr(this, 'href').substr(1) + '"]').offset().top
						}, 750);
					});
				}
				
				// HS Adds for iframe sizing
				if ($(".l-main iframe:visible, .main-area iframe:visible").length) {
  				$(".l-main iframe:visible, .main-area iframe:visible").iFrameResize();
				}

				var ajax_nav_handler = function (e) {
					e.stopPropagation();
					var data = {
						'action': 'infinite_scroll',
						'paged': $(this).data('page'),
						'post_type': $(this).data('post_type'),
						'exclude_id': $(this).data('exclude_id'),
						'tax_type_id': $(this).data('taxtypeid')
					};
					$.ajax({
						url: og_obj.ajaxurl,
						type: 'POST',
						data: data,
						success: function (html) {
							//alert(html);
							$content = $(html);
							// append new items with fade in effect.
							$content.find('.listing__item').hide()
								.appendTo('.listing--blocks')
								.fadeIn(250);
							// update nav
							$('.js-ajax-nav').empty();
							if ($content.find('.nav-next').length > 0) {
								$('.js-ajax-nav').append($content.find('.nav-next'));
								$(".js-ajax-nav .nav-next").bind('click', ajax_nav_handler);
							}
						}
					});
					e.preventDefault();
				};

				$(".js-ajax-nav .nav-next").bind('click', ajax_nav_handler);

				// Filtering scripts using the Isotope library.
				// http://isotope.metafizzy.co/
				// @NOTE: `proto.getTranslate` was changed to set the `x` value to
				// `0` in the transform property.
				//

				// Flatten object by concatting values. Used in combined filtering.
				function concatValues(obj) {
					var value = '';
					for (var prop in obj) {
						value += obj[prop];
					}
					return value;
				}

				if ($('.isotope-row').length) {
					var $rows = $('.isotope-row');

					$rows.isotope({
						itemSelector: '.accordion',
						layoutMode: 'vertical',
						transitionDuration: '0.25s',
						percentPosition: true,
						hiddenStyle: {
							opacity: 0,
							transform: 'none',
							display: 'none'
						},
						visibleStyle: {
							opacity: 1,
							transform: 'none',
							display: 'block'
						}
					});

					// store filter for each group
					var filters = {};

					$(".js-filter").click(function () {
						var $this = $(this);
						// get group key
						var $buttonGroup = $this.parents('.js-filter-group');
						var filterGroup = $buttonGroup.attr('data-filter-group');
						// set filter for group
						filters[filterGroup] = $this.attr('data-filter');
						// combine filters
						var filterValue = concatValues(filters);
						$rows.isotope({
							filter: filterValue
						});
					});
				}

				// Modal Controls
				//
				var closeModal = function () {
					$('html,body').removeClass('scroll-locked');
					$('.modal-backdrop.is-active').removeClass('is-active');
				};

				$('.js-account-modal').click(function () {
					var modalId = $(this).data('modal');
					var activeModal = $('#' + modalId);
					var modalBackdrop = activeModal.closest(".modal-backdrop");

					modalBackdrop.addClass('is-active');
					$('html,body').addClass('scroll-locked');

					$('.modal-backdrop.is-active').mousedown(function(e) {
						var clicked = $(e.target);
						if (
							clicked.is('.modal') ||
							clicked.parents().is('.modal')
						) {
							return;
					   } else {
					     closeModal();
					   }
					});
				});

				$('.js-account-modal-close').click(function () {
					closeModal();
				});

				// Allow user to close modal with escape key.
				$(document).keyup(function (e) {
					if (
						$('.modal-backdrop.is-active').length &&
						e.keyCode === 27
					) {
						$('html,body').removeClass('scroll-locked');
						$('.modal-backdrop.is-active').removeClass('is-active');
					}
				});

				if ($('.js-modal-open').length) {
					$('.js-modal-open').click(function () {
						var modalId = '#' + $(this).data('modal');

						$(modalId).fadeIn('fast', function () {
							$('html,body').addClass('scroll-locked');
							$(modalId).addClass('is-active');
						});

						$('.modal-backdrop.is-active').mousedown(function(e) {
							var clicked = $(e.target);
							if (
								clicked.is('.modal') ||
								clicked.parents().is('.modal')
							) {
								return;
						   } else {
						     closeModal();
						   }
						});
					});

					$('.js-modal-close').click(function () {
						$('.modal-backdrop.is-active').fadeOut('fast', function () {
							closeModal();
						});
					});

					$(document).keyup(function (e) {
						if (
							$('.modal-backdrop.is-active').length &&
							e.keyCode === 27
						) {
							$('.modal-backdrop.is-active').fadeOut('fast', function () {
								$('html,body').removeClass('scroll-locked');
								$('.modal-backdrop').removeClass('is-active');
							});
						}
					});
				}

				// Header Controls
				var toggleControl = "<button class='icon-chevron-down js-submenu-toggle nav__toggle button--hide' aria-label='Toggle sub-menu'></button>";
				var toggleMenus = '.nav--primary > .menu-item > .sub-menu';

				// Opens the subnavigation on clicking a parent item.
				$('.header__nav-mobile li.has-sub-menu').click(function (e) {
					e.preventDefault();
					$(this).toggleClass('has-sub-menu-open');
					$(this).find(toggleMenus).slideToggle();
				});

				// Adds nav toggles to main nav.
				$('.js-primary-nav')
					.find(toggleMenus)
					.before(toggleControl);
				// Hides sub-menus.
				$(toggleMenus).hide();

				// Opens the mobile navigation on clicking the menu icon
				$('.header__nav-mobile-toggle').click(function () {
					$(this).find('.hamburger').toggleClass('is-active');
					$('.js-primary-nav').slideToggle(function () {
						// When nav is closed, close sub-menus.
						$(toggleMenus).hide();
						$('.js-primary-nav .nav__toggle').removeClass("is-active");
						$('.js-primary-nav .menu-item-has-children').removeClass("is-active");
					});
				});

				$(window).resize(function () {
					if ($(".header__nav-mobile-toggle").is(":hidden") &&
						$(".header__contents [style]").length) {
						$(".header__contents [style]").removeAttr("style");
					}

					if ($(".header__nav-mobile-toggle").is(":hidden") &&
						$(".header__nav-mobile-toggle .hamburger.is-active").length) {
						$(".header__nav-mobile-toggle .hamburger.is-active")
							.removeClass("is-active");
					}
				});

				// Opens navigation sections.
				$(".js-submenu-toggle").click(function () {
					if ($(this).next(".sub-menu").is(":hidden") &&
						$(".menu-item.is-active").length) {
						$(".menu-item.is-active > .sub-menu").slideToggle();
						$(".menu-item.is-active").removeClass("is-active");
						$(".nav__toggle.is-active").removeClass("is-active");
					}

					$(this).next(".sub-menu").slideToggle();
					$(this).parent().toggleClass("is-active");
					$(this).toggleClass("is-active");
				});

				// Anchor link animation
				$('.js-jump').click(function () {
					$('html, body').animate({
						scrollTop: $('[name="' + $.attr(this, 'href').substr(1) + '"]').offset().top
					}, 750);
					return false;
				});

				// Select2 activation
				//
				$("select").select2({
					minimumResultsForSearch: Infinity
				});

				// FitVids initialization
				//
				if(
					$("iframe[src*='youtube']").length ||
					$("iframe[src*='vimeo']").length
				) {
					$("body").fitVids();
				}
				// End FitVids

                // Gumshoe initialization
                //
                if($("[data-gumshoe]")) {
					gumshoe.init();
				}
                // End Gumshoe


                $('.post-block .block__content').matchHeight();

				if (window.location.hash.indexOf("demo") !== -1) {
					$('.demo-modal-open:first').click();
				}

			}
		},
		// Home page
		home: {
			init: function () {
				// JavaScript to be fired on the home page
				function insightsSection() {
					var height = window.innerHeight || document.documentElement.clientHeight || document.body.clientHeight;
					var width = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
					var blocksWidthDiv = $('.insights-block-inner');

					if (width <= 1024) {
						var blocksCount = $('.insights-block').length;
						var blocksWidth = Math.ceil( $('.insights-block').outerWidth() ) + 5;
						blocksWidth = blocksWidth * blocksCount;
						blocksWidthDiv.width( blocksWidth );
					} else {
						blocksWidthDiv.css('width', '');
					}

					$('.insights-block-box').matchHeight();
				}

				setTimeout(insightsSection, 1000);

				$(window).resize(function () {
					insightsSection();
				});

				//$('.hero-featured-resources-resource .resource-title').matchHeight();

				$('.hero-featured-resources-resource').hover(function(e) {
					var thisHeight = $(this).height();
					var overlayHeight = $(this).find('.resource-overlay').height();
					var bottomHeight = thisHeight - overlayHeight;
					$(this).find('.resource-overlay-bottom').animate({height: bottomHeight + 'px'}, 400);
				}, function() {
					$(this).find('.resource-overlay-bottom').animate({height: '0'}, 400);
				});

				$('.hero-featured-resources-resources').slick({
					slidesToShow: 1,
					slidesToScroll: 1,
					infinite: true,
					arrows: false,
					dots: true,
					mobileFirst: true,
					responsive: [
						{
							breakpoint: 768,
							settings: "unslick"
						}
					]
				});

				$('.insights-block-box').matchHeight();

				var $variantSelect = $('#hero_variants_dropdown');
				$variantSelect.val(0).change();
				$variantSelect.on('change', function(e) {
					var variantId = $variantSelect.find('option:selected').val();
					var subtext = $('.variant-data[data-variant="'+variantId+'"]').attr('data-subtext');
					var ctaLink = $('.variant-data[data-variant="'+variantId+'"]').attr('data-ctalink');
					var ctaLabel = $('.variant-data[data-variant="'+variantId+'"]').attr('data-ctalabel');
					var bkgImage = $('.variant-data[data-variant="'+variantId+'"]').attr('data-background');
					$('.banner--new-home').css('background-image', 'url('+bkgImage+')');
					$('#hero-variants-subtext').fadeOut(function() {
						$(this).text(subtext);
					}).fadeIn();
					$('#hero-variants-cta').attr('href', ctaLink);
					$('#hero-variants-cta').text(ctaLabel);
				});
			}
		},

		// About us page, note the change from about-us to about.
		about: {
			init: function () {
				// JavaScript to be fired on the about us page
			}
		},

		page_template_template_microsite: {
			init: function () {
				$('.js-top').click(function(e) {
					e.preventDefault();
					$('html, body').animate({
						scrollTop: 0
					}, 750);
				});

				var sectionNavTop = $('.js-section-nav').offset().top;
			    $(window).scroll(function() {
			      var scrollVal = $(this).scrollTop();
			      if ( scrollVal >= sectionNavTop ) {
			      	$('.js-section-nav').addClass('fixed');
			      } else {
			      	$('.js-section-nav').removeClass('fixed');
			      }
			    });

				$('.microsite-resources-card').matchHeight();
				$('.microsite-events-slides').slick({
					arrows: false,
					dots: true
				});

				$('.microsite-ask-experts-right__question').click(function() {
					var qId = $(this).attr('data-question');
					$('.microsite-ask-experts-right__question').removeClass('question-active');
					$(this).addClass('question-active');
					$('.microsite-ask-experts--video').removeClass('video-active');
					$('.microsite-ask-experts--video[data-question="'+qId+'"]').addClass('video-active');
				});

				// Resource filters and ajax.
				var $typeSelect = $('#filter-type');
				var $topicSelect = $('#filter-topic');
				$('body').on('click', '#load-more-resources', function(e) {
					var currentPage = $(this).attr('data-page');
					var microsite = $('#resources-box').attr('data-microsite');
					var typeFilter = $typeSelect.val();
					var topicFilter = $topicSelect.val();
					e.preventDefault();
					var data = {
						'action': 'microsite_load_more',
						'paged': currentPage,
						'microsite': microsite,
						'type': typeFilter,
						'topic': topicFilter
					};
					$.ajax({
						url: og_obj.ajaxurl,
						type: 'POST',
						data: data,
						success: function (html) {
							$('.microsite-resources-view-more').remove();
							$content = $(html);
							$content.hide()
								.appendTo('#resources-box')
								.fadeIn(250);
							currentPage++;
							$('#load-more-resources').attr('data-page', currentPage);
						}
					});
				});

				var $typeSelect = $('#filter-type');
				var $topicSelect = $('#filter-topic');
				$('.ms-filter').on('change', function(e) {
					var currentPage = 1;
					var microsite = $('#resources-box').attr('data-microsite');
					var typeFilter = $typeSelect.val();
					var topicFilter = $topicSelect.val();
					e.preventDefault();
					var data = {
						'action': 'microsite_load_more',
						'paged': currentPage,
						'microsite': microsite,
						'type': typeFilter,
						'topic': topicFilter
					};
					$('#resources-box').empty();
					$.ajax({
						url: og_obj.ajaxurl,
						type: 'POST',
						data: data,
						success: function (html) {
							$('.microsite-resources-view-more').remove();
							$content = $(html);
							$content.hide()
								.appendTo('#resources-box')
								.fadeIn(250);
							currentPage++;
							$('#load-more-resources').attr('data-page', currentPage);
							$('#load-more-resources').attr('data-type', typeFilter);
							$('#load-more-resources').attr('data-topic', topicFilter);
						}
					});
				});
			}
		},

		page_template_template_infographic: {
			init: function () {
				//jQuery(document).ready(function($) {
				//	$(fullscreenParallax);
				//});
				$(function() {
					if ($(window).width() > 1024) {
						fullscreenParallax();
					}
				});
				$(document).on('keydown', function(e) {
					e.preventDefault();
					Waypoint.disableAll();
					var code = e.keyCode || e.which;
					var current = $('.infographic-dot.active');
					current.removeClass('active');
				    if (code == 33) {
				    	var target = current.prev('.infographic-dot').attr('data-target');
						$('html, body').animate({
							scrollTop: $('[data-position="'+target+'"]').offset().top
						}, 500, function() {
							Waypoint.enableAll();
						});
						$('.infographic-dot[data-target="'+target+'"]').toggleClass('active');
				    }
				    if (code == 34) {
						var target = current.next('.infographic-dot').attr('data-target');
						$('html, body').animate({
							scrollTop: $('[data-position="'+target+'"]').offset().top
						}, 500, function() {
							Waypoint.enableAll();
						});
						$('.infographic-dot[data-target="'+target+'"]').toggleClass('active');
				    }
				    return false;
				});
				$('.card-resource').matchHeight();
				new WOW().init();
				$(window).scroll(function() {
					var scroll = $(window).scrollTop();
					if (scroll >= 80) {
						$(".slide-header-cta").addClass("opacity");
					}
					if (scroll < 80) {
						$(".slide-header-cta").removeClass("opacity");
					}
				});
				$('.infographic-orange .infographic-intro').each(function() {
					var inview = new Waypoint.Inview({
					  element: $(this),
					  entered: function(direction) {
					    $('.infographic-dots').addClass('infographic-dots-white');
					    $('.slide-header-cta').addClass('slide-header-cta-white');
					  },
					  exited: function(direction) {
					    $('.infographic-dots').removeClass('infographic-dots-white');
					    $('.slide-header-cta').removeClass('slide-header-cta-white');
					  }
					});
				});
				$('.infographic-white .infographic-intro, .infographic-white .infographic-slide').each(function() {
					var inview = new Waypoint.Inview({
					  element: $(this),
					  entered: function(direction) {
					    $('.slide-header-cta').addClass('slide-header-cta-orange');
					  },
					  exited: function(direction) {
					    $('.slide-header-cta').removeClass('slide-header-cta-orange');
					  }
					});
				});
				$('.slide-header-cta').click(function() {
					$('html, body').animate({
						scrollTop: $( $.attr(this, 'href') ).offset().top
					}, 500);
				});
				$('.hero-flyout-toggle').click(function() {
					$('.hero-flyout').toggleClass('open');
				});
				$('.infographic-dot').click(function(e) {
					var target = $(this).attr('data-target');
					$('html, body').animate({
						scrollTop: $('[data-position="'+target+'"]').offset().top
					}, 500);
				});
				$('.infographic-dot').each(function() {
					var target = $(this).attr('data-target');
					var height = $(this).height();
					var waypoint = new Waypoint({
					  element: $('[data-position="'+target+'"]'),
					  handler: function(direction) {
					  	if (direction === 'down') {
						  	$('.infographic-dot').removeClass('active');
						    $('.infographic-dot[data-target="'+target+'"]').toggleClass('active');
					  	}
					  },
					  offset: '90%'
					});
					var waypoint = new Waypoint({
					  element: $('[data-position="'+target+'"]'),
					  handler: function(direction) {
					  	if (direction === 'up') {
						  	$('.infographic-dot').removeClass('active');
						    $('.infographic-dot[data-target="'+target+'"]').toggleClass('active');
					  	}
					  },
					  offset: function() {
					  	return -height + 100;
					  }
					});
				});
				$('.infographic-hero .infographic-arrow').click(function() {
					$('html, body').animate({
						scrollTop: $('.infographic-section:eq(0)').offset().top
					}, 500);
				});
				$('.infographic-section .infographic-arrow').click(function() {
					$('html, body').animate({
						scrollTop: $(this).closest('.infographic-section').find('.infographic-slide:first').offset().top
					}, 500);
				});
			}
		},
	};

	// The routing fires all common scripts, followed by the page specific scripts.
	// Add additional events for more control over timing e.g. a finalize event
	var UTIL = {
		fire: function (func, funcname, args) {
			var namespace = Base;
			funcname = (funcname === undefined) ? 'init' : funcname;
			if (func !== '' && namespace[func] && typeof namespace[func][funcname] === 'function') {
				namespace[func][funcname](args);
			}
		},
		loadEvents: function () {
			UTIL.fire('common');

			$.each(document.body.className.replace(/-/g, '_').split(/\s+/), function (i, classnm) {
				UTIL.fire(classnm);
			});
		}
	};

	$(document).ready(UTIL.loadEvents);

})(jQuery); // Fully reference jQuery after this point.
