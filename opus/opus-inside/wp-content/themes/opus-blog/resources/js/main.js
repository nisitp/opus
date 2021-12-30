(function ($) {
    var paginationLoading = false;
    window.itemCount = 0;

    var loadNext = function($elem) {
        paginationLoading = true;
        $elem.addClass('pagination__link--loading');
        $.ajax({ url: $elem.attr('href').replace(/([?&])items=\d*/, '$1items=0') }).done(function(data) {
            var $data = $("#main", $(data));
            $("#main .pagination").remove();
            $("#main").append($data.children());
            itemCount += parseInt($data.attr('data-items'));
            paginationLoading = false;
            history.replaceState({}, "", "?items=" + itemCount);
        });
    };

    $(document).ready(function () {
        itemCount += parseInt($("#main").attr('data-items'));

        $(window).scroll(function() {
            if($('.pagination__link').length > 0 && $(window).scrollTop() >= ($('.pagination__link').last().offset().top - $(window).height() - $(window).height() / 3) && !paginationLoading) {
                loadNext($('.pagination__link').last());
            }
        });

        $(document).on("click", ".pagination__link", function(e) {
            e.preventDefault();
            loadNext($(this));
        });

        if ($(".page-grid").length) {
          $(".page-grid > li").matchHeight();
        }
    });
})(jQuery);
