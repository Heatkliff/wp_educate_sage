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

  $(document).ready(function() {
    $(".slider").each(function () { // обрабатываем каждый слайдер
      var obj = $(this);
      $(obj).append("<div class='nav'></div>");
      $(obj).find("li").each(function () {
        $(obj).find(".nav").append("<span rel='"+$(this).index()+"'></span>"); // добавляем блок навигации
        $(this).addClass("slider"+$(this).index());
      });
      $(obj).find("span").first().addClass("on"); // делаем активным первый элемент меню
    });
  });
  function sliderJS (obj, sl) { // slider function
    var ul = $(sl).find("ul"); // находим блок
    var bl = $(sl).find("li.slider"+obj); // находим любой из элементов блока
    var step = $(bl).width(); // ширина объекта
    $(ul).animate({marginLeft: "-"+step*obj}, 1000); // 500 это скорость перемотки
  }
  $(document).on("click", ".slider .nav span", function() { // slider click navigate
    var sl = $(this).closest(".slider"); // находим, в каком блоке был клик
    $(sl).find("span").removeClass("on"); // убираем активный элемент
    $(this).addClass("on"); // делаем активным текущий
    var obj = $(this).attr("rel"); // узнаем его номер
    sliderJS(obj, sl); // слайдим
    return false;
  });


  window.onload = function autoscroll() {
    var checks = $(document).find('.slider .nav span');
    var check_now = 1;

    setInterval(function() {
      console.log('Checks = ' + checks.length + ". Check now - " + check_now);
      checks[check_now].click();

      if (check_now+1 < checks.length){
        check_now += 1;
      }else {
        check_now = 0;
      }
    }, 5000);

  };
  
});

