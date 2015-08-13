$(document).ready(function(){

      $(".stripe-button-el").attr("id","stripe-button");
      $(".stripe-button-el").addClass("col-md-2 col-md-offset-5");

      $(".loading").delay(2000).fadeOut(500);
      $(".box_admin").delay(2500).fadeIn(500);

      $(".navbar-default .navbar-brand span").delay(1000).fadeIn(500);

      var $document = $(document),
      $element = $('.navbar-default'),
      className = 'navbar_box';
      $element_1 = $('#gotoTop'),

      $document.scroll(function() {
        $element.toggleClass(className, $document.scrollTop() >= 150);
        $element_1.fadeIn($document.scrollTop() < 0);
      });

      $('a[href^="#"]').click(function(){
        var the_id = $(this).attr("href");

        $('html, body').animate({
          scrollTop:$(the_id).offset().top
        }, 'slow');
        return false;
      });

      $("#home_switch img").click(function(){
        $(".home").fadeToggle(200);
        $(".sign_up").fadeToggle(200);
        $("body").toggleClass("Background");
      });

      $(".btn_switcher_home").click(function(){
        $("#explication_paiement").toggle(500);
        $(".col-md-3").toggle(500);
        $(".offer_only").toggle(500);
        $("#home").toggle(500);
        $(".h1_switcher").toggle(500);
        $(".h2_switcher").toggle(500);
        $(".p_switcher").toggle(500);
        $(".button_switcher").toggle(500);
        $("#inscription_form").toggleClass("sign_up");
      });

      $(".btn_switcher_sweethome").click(function(){
        $("#explication_paiement").toggle(500);
        $(".col-md-3").toggle(500);
        $(".offer_only").toggle(500);
        $("#sweethome").toggle(500);
        $(".h1_switcher").toggle(500);
        $(".h2_switcher").toggle(500);
        $(".p_switcher").toggle(500);
        $(".button_switcher").toggle(500);
        $("#inscription_form").toggleClass("sign_up");
      });

      $(".btn_switcher_sweethomeplus").click(function(){
        $("#explication_paiement").toggle(500);
        $(".col-md-3").toggle(500);
        $(".offer_only").toggle(500);
        $("#sweethomeplus").toggle(500);
        $(".h1_switcher").toggle(500);
        $(".h2_switcher").toggle(500);
        $(".p_switcher").toggle(500);
        $(".button_switcher").toggle(500);
        $("#inscription_form").toggleClass("sign_up");
      });

      $(".savoir_plus").click(function(){
        $(".hide_section").fadeToggle(500);
        $(".savoir_plus").toggle(500);
        $(".bloc_1").toggleClass("col-md-4 col-md-offset-2");
        $(".bloc_1").toggleClass("col-md-6 col-md-offset-3");
        $(".bloc_2").toggleClass("col-md-4");
        $(".bloc_2").toggleClass("col-md-6 col-md-offset-3");
      });   

      $(".bloc_title_one").click(function(){
        $(".bloc_one").toggle(500);
      });
      $(".bloc_title_two").click(function(){
        $(".bloc_two").toggle(500);
      });
      $(".bloc_title_three").click(function(){
        $(".bloc_three").toggle(500);
      });
      $(".bloc_title_four").click(function(){
        $(".bloc_four").toggle(500);
      });
      $(".bloc_title_five").click(function(){
        $(".bloc_five").toggle(500);
      });
      $(".bloc_title_six").click(function(){
        $(".bloc_six").toggle(500);
      });
      $(".bloc_title_seven").click(function(){
        $(".bloc_seven").toggle(500);
      });
      $(".bloc_title_eight").click(function(){
        $(".bloc_eight").toggle(500);
      });
      $(".bloc_title_nine").click(function(){
        $(".bloc_nine").toggle(500);
      });
      $(".bloc_title_ten").click(function(){
        $(".bloc_ten").toggle(500);
      });
      $(".bloc_title_eleven").click(function(){
        $(".bloc_eleven").toggle(500);
      });
      $(".bloc_title_twelve").click(function(){
        $(".bloc_twelve").toggle(500);
      });
      $(".bloc_title_thirteen").click(function(){
        $(".bloc_thirteen").toggle(500);
      });
      $(".bloc_title_fourteen").click(function(){
        $(".bloc_fourteen").toggle(500);
      });
      $(".bloc_title_fifteen").click(function(){
        $(".bloc_fifteen").toggle(500);
      });
});