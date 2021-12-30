(function ($) {
	// If the section nav is present, create nav items from section anchors.

	if ($('.js-section-nav')) {
		$('.js-section-nav').removeClass("is-hidden");

		$navAnchors = $('.nav__anchor');
		$navList = $('.js-section-nav .nav__list');
		$test = $('[name="panel-1"]');
		for (i = 0; i < $navAnchors.length; i++) {
			$navLabel = $navAnchors[i].attributes['data-nav-label'].value;
			$navName = $navAnchors[i].attributes.name.value;
			$navList.append(
				'<li class="nav__item"><a href="#' +
				$navName +
				'" class="nav__link">' +
				$navLabel +
				'</a></li>'
			);
		}

		$('.expander-trigger').click(function () {
			$(this).toggleClass("expander-hidden");
		});

		$('.js-section-nav .nav__link').click(function () {
			$('.expander-trigger').toggleClass("expander-hidden");
			var $linkName = $(this).text();
			var $label = $('.js-section-nav .js-section-nav-label');

			$label.text($linkName);

			$('html, body').animate({
				scrollTop: $('[name="' + $.attr(this, 'href').substr(1) + '"]').offset().top
			}, 750);
			return false;
		});
	}
	//   END feature page section navigation scripts

	// Function to identify if we've scrolled into an element.
	function scrolledInto($el) {
		// Find the top of the element.
		var elemTop = $el.offset().top;
		// Identifies if the top of the element has been scrolled to the top
		// of the window or beyond.
		var isAtTop = elemTop <= $(window).scrollTop();
		return isAtTop;
	}
	// Function to identify if we've scrolled to the bottom of an element.
	function hasHitBottom($el) {
		// Find the bottom of the element.
		var elemBottom = $el.offset().top + $el.height();
		// Identifies if the bottom of the element has been scrolled to the top
		// of the window or beyond.
		var hitBottom = elemBottom <= $(window).scrollTop();
		return hitBottom;
	}
	// Check if we are not yet scrolled into the element or if we've scrolled
	// past it.
	function outOfBounds($el) {
		return (!scrolledInto($el) || hasHitBottom($el));
	}
	var $navFixed = $(".js-section-nav");
	var $navPlaceholder = $(".js-section-nav-spacer");
	var $navFixedHeight = $navFixed.height();

	var $theBounds = $(".js-panels");

	// Check if the secondary navigation is present.
	if ($navFixed.length) {
		window.addEventListener('scroll', function() {
			// If out of the content area, hide the secondary nav.
			if (outOfBounds($theBounds)) {
				if ($navFixed.hasClass('is-fixed')) {
					$navFixed.removeClass('is-fixed');

					$navPlaceholder.height(0);
				}
			// If scrolled into the content area and secondary nav is not fixed,
			// add the class to fix it to the top.
			} else if(scrolledInto($theBounds) && !($navFixed.hasClass('is-fixed'))) {
				$navFixed.addClass('is-fixed');

				$navPlaceholder.height($navFixedHeight);
			}
		});
	}

})(jQuery);
