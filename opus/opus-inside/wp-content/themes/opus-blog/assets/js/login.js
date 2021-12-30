(function ($) {
    $(document).ready(function () {
      $("label, #wp-submit").hide();
      $("#loginform > p:nth-child(1)").click(function() {
        if (!($("#loginform").hasClass("wp-submit"))) {
          $("#loginform").addClass("wp-open");
          $("label, #wp-submit").show();
          $("#user_login").focus();
        }
      });
    });
})(jQuery);
