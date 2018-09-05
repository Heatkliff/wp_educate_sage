export default {
    init() {

        // JavaScript to be fired on all pages
    },
    finalize() {
        // JavaScript to be fired on all pages, after page specific JS is fired

        var openBtn = $('#btn'),
            slideMenu = $('.nav-primary div ul'),
            layer = $('#layer');
        openBtn.on("click", function () {
            if (slideMenu.is(':hidden')) {
                layer.fadeIn('fast');
                slideMenu.slideDown(300);
            } else {
                slideMenu.slideUp(300);
                layer.fadeOut('fast');
            }
        });
        layer.on("click", function () {
            $(this).fadeOut('fast');
            slideMenu.slideUp(300);
        });

        //slider

        $(document).ready(function () {
            $(".slider").each(function () {
                var obj = $(this);
                $(obj).append("<div class='nav'></div>");
                $(obj).find("li").each(function () {
                    $(obj).find(".nav").append("<span rel='" + $(this).index() + "'></span>");
                    $(this).addClass("slider" + $(this).index());
                });
                $(obj).find("span").first().addClass("on");
            });
        });
        function sliderJS(obj, sl) {
            var ul = $(sl).find("ul");
            var bl = $(sl).find("li.slider" + obj);
            var step = $(bl).width();
            $(ul).animate({marginLeft: "-" + step * obj}, 1000);
        }

        $(document).on("click", ".slider .nav span", function () { // slider click navigate
            var sl = $(this).closest(".slider");
            $(sl).find("span").removeClass("on");
            $(this).addClass("on");
            var obj = $(this).attr("rel");
            sliderJS(obj, sl);
            return false;
        });


        window.onload = function autoscroll() {
            var checks = $(document).find('.slider .nav span');
            var check_now = 1;

            setInterval(function () {
                checks[check_now].click();

                if (check_now + 1 < checks.length) {
                    check_now += 1;
                } else {
                    check_now = 0;
                }
            }, window.slide_time['autoslide_time'] * 1000);

        };

        /////////////////////////////////////////////////////////////////////////////////////////////

        // ajax load posts

        $(document).on("click", "#true_loadmore", function () {
            console.log( window.ajax.ajax_url);
            $(this).text('Loading...'); // изменяем текст кнопки, вы также можете добавить прелоадер
            var data = {
                'action': 'load_more',
            };
            $.ajax({
                url: window.ajax.ajax_url, // обработчик
                data: data, // данные
                type:'POST', // тип запроса
                success:function(data){
                    console.log(data);
                    if( data ) {
                        $('.courses-pre-post:last').after(data); // вставляем новые посты
                        $('#true_loadmore').remove();
                    }
                },
            });
        })

        window.onload = function() {
            console.log(window.innerWidth);
            if(window.innerWidth < 790) {
                $('#true_loadmore').click();
                var block_courses = $('.courses-pre-posts');
                block_courses.removeClass('courses-pre-posts');
                block_courses.addClass('courses-pre-posts-mobile')
            }
        };
    },
};
