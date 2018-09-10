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


        $(document).ready(function autoscroll() {
            var checks = $(document).find('.slider .nav span');
            var check_now = 1;

            setInterval(function () {
                console.log('Test');
                checks[check_now].click();

                if (check_now + 1 < checks.length) {
                    check_now += 1;
                } else {
                    check_now = 0;
                }
            }, window.slide_time['autoslide_time'] * 1000);

        });

        /////////////////////////////////////////////////////////////////////////////////////////////

        // ajax load posts

        $(document).on("click", "#true_loadmore", function () {
            console.log(window.ajax.ajax_url);
            $(this).text('Loading...');
            var data = {
                'action': 'load_more',
            };
            $.ajax({
                url: window.ajax.ajax_url,
                data: data,
                type: 'POST',
                success: function (data) {
                    if (data) {
                        $('.courses-pre-post:last').after(data);
                        $('#true_loadmore').remove();
                    }
                },
            });
        });

        let promise = new Promise(() => {
            var data = {
                'action': 'load_more',
            };
            $.ajax({
                url: window.ajax.ajax_url,
                data: data,
                type: 'POST',
                success: function (data) {
                    if (data) {
                        $('.courses-pre-post:last').after(data);
                        $('#true_loadmore').remove();
                    }
                },
            });

        });
        $(document).on('pageinit', function () {
            $(".courses-block-mobile .courses-pre-posts").swiperight(function () {
            });
        });
        window.onload = function () {
            console.log(window.innerWidth);
            if (window.innerWidth < 790) {
                promise
                    .then(
                        slider_courses()
                    );
            }


        };

        // Slider courses

        function slider_courses() {
            var block_courses = $('.courses-block');
            block_courses.removeClass('courses-block');
            block_courses.addClass('courses-block-mobile');
            var slides = $(".courses-block-mobile .courses-pre-posts").children(".courses-pre-post");
            var width = $(".courses-block-mobile .courses-pre-posts .courses-pre-post").width() + 20;
            console.log(slides.length);
            var i = slides.length;
            var slides_position = (i / 2) * width;
            var offset = i * width;
            if ($(window).width() < '480'){
                $.each($(".courses-pre-post"), function () {
                    this.setAttribute("style", "width: " + ($(window).width()/100)*90 + "px");
                })
            }

            $(".courses-block-mobile .courses-pre-posts").css('width', offset);
            $(".courses-block-mobile .courses-pre-posts").css("transform", "translate3d(-" + slides_position + "px, 0px, 0px)");


            $(".courses-block-mobile .courses-pre-posts").on("swipeleft", function () {
                if (slides_position<offset-width) {
                    slides_position += width;
                    $(".courses-block-mobile .courses-pre-posts").css("transform", "translate3d(-" + slides_position + "px, 0px, 0px)");
                }
            });

            $(".courses-block-mobile .courses-pre-posts").on("swiperight", function () {
                if (slides_position>0) {
                    slides_position -= width;
                    $(".courses-block-mobile .courses-pre-posts").css("transform", "translate3d(-" + slides_position + "px, 0px, 0px)");
                }
            });

            $(".courses-block-mobile .courses-pre-posts").on("swipeup",function () {
                return true;
            })

            $(".courses-block-mobile .courses-pre-posts").on("swipedown",function () {
                return true;
            })
            //        width_slider_block
        }
    },
};



