export default {
  init() {
    // JavaScript to be fired on all pages
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};

jQuery(function ($) {
  var openBtn = $('#btn'),
      slideMenu = $('.nav-primary div ul'),
      layer = $('#layer');
  openBtn.on("click", function () {
    if (slideMenu.is(':hidden')) {
      layer.fadeIn('fast');
      slideMenu.slideDown(300);
    } else {
      slideMenu.slideUp(300);
    }
  });
  layer.on("click",function(){
    $(this).fadeOut('fast');
    slideMenu.slideUp(300);
  });
});