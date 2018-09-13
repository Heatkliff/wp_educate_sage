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

        window.onload = function () {
            console.log(window.innerWidth);
            if (window.innerWidth < 490) {
                if (window.output_all_courses_in_mobile['output_all'] == true) {
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
                                    slider_courses();
                                }
                            },
                        });

                    });

                    promise;
                }

                if (window.output_all_courses_in_mobile['output_all'] == false || window.output_all_courses_in_mobile['output_all'] == 0) {
                    slider_courses();
                }
            }


        };

        /////////////////////////////////////////////////////////

        // Slider courses

        function slider_courses() {
            var block_courses = $('.courses-block');
            block_courses.removeClass('courses-block');
            block_courses.addClass('courses-block-mobile');
            var slides = $(".courses-block-mobile .courses-pre-posts").children(".courses-pre-post");
            if ($(window).width() < 480) {
                $.each($(".courses-pre-post"), function () {
                    this.setAttribute("style", "width: " + ($(window).width() / 100) * 90 + "px");
                })
            }
            var width = $(".courses-block-mobile .courses-pre-posts .courses-pre-post").width() + 20;
            var i = slides.length;
            var slides_position = Math.floor(i / 2) * width;
            var offset = i * width;
            var now_slide;

            $(".courses-block-mobile .courses-pre-posts").css('width', offset);
            $(".courses-block-mobile .courses-pre-posts").css("transform", "translate3d(-" + slides_position + "px, 0px, 0px)");

            for (var j = 0; j < slides.length; j++) {
                if (j == Math.floor(slides.length / 2)) {
                    $(".courses-block-mobile .navigation").append("<div class='dot active'></div>");
                }
                else {
                    $(".courses-block-mobile .navigation").append("<div class='dot'></div>");
                }
            }
            var element, offset_dot;
            $('.courses-block-mobile .navigation .dot').click(function () {
                $(".courses-block-mobile .navigation .active").removeClass("active");
                $(this).addClass("active");
                element = $(this).index();
                offset_dot = element * width;
                slides_position = offset_dot;
                $(".courses-block-mobile .courses-pre-posts").css("transform", "translate3d(-" + offset_dot + "px, 0px, 0px)");
            });

            $(".courses-block-mobile .courses-pre-posts").on("swipeleft", function () {
                if (slides_position < offset - width) {
                    slides_position += width;
                    $(".courses-block-mobile .courses-pre-posts").css("transform", "translate3d(-" + slides_position + "px, 0px, 0px)");
                    $(".courses-block-mobile .navigation .active").removeClass("active");
                    now_slide = slides.length - (offset - slides_position) / width;

                    $(".courses-block-mobile .navigation .dot:eq(" + now_slide + ")").addClass("active");
                }
            });

            $(".courses-block-mobile .courses-pre-posts").on("swiperight", function () {
                if (slides_position > 0) {
                    slides_position -= width;
                    $(".courses-block-mobile .courses-pre-posts").css("transform", "translate3d(-" + slides_position + "px, 0px, 0px)");
                    $(".courses-block-mobile .navigation .active").removeClass("active");
                    now_slide = slides.length - (offset - slides_position) / width;

                    $(".courses-block-mobile .navigation .dot:eq(" + now_slide + ")").addClass("active");
                }
            });
        }

        /////////////////////////////////////////////////////////////
        // slider teachers

        $(document).ready(function () {
            if (window.innerWidth < 480) {

                $('.teachers-posts').slick({
                    dots: false,
                    centerMode: true,
                    centerPadding: '20px',
                    slidesToShow: 1,
                    arrows: false,
                    autoplay: true,
                    variableWidth: true,
                })
                work_dots_teachers();

            }
        });

        function work_dots_teachers() {
            $('.navigation-teacher .dot-teacher:eq(0)').on("click", function () {
                $('.teachers-posts').slick('slickGoTo', parseInt($('.teachers-posts .slick-active').attr('data-slick-index')) - 2);
                console.log($('.teachers-posts .slick-active').attr('data-slick-index') - 2);
            })
            $('.navigation-teacher .dot-teacher:eq(1)').on("click", function () {
                $('.teachers-posts').slick('slickGoTo', parseInt($('.teachers-posts .slick-active').attr('data-slick-index')) - 1);
                console.log($('.teachers-posts .slick-active').attr('data-slick-index') - 1);
            })
            $('.navigation-teacher .dot-teacher:eq(3)').on("click", function () {
                $('.teachers-posts').slick('slickGoTo', parseInt($('.teachers-posts .slick-active').attr('data-slick-index')) + 1);
                console.log(parseInt($('.teachers-posts .slick-active').attr('data-slick-index')) + 1);
            })
            $('.navigation-teacher .dot-teacher:eq(4)').on("click", function () {
                $('.teachers-posts').slick('slickGoTo', parseInt($('.teachers-posts .slick-active').attr('data-slick-index')) + 2);
                console.log(parseInt($('.teachers-posts .slick-active').attr('data-slick-index')) + 2);
            })
        }

        /////////////////////////////////////////////////////////////
        // slider client comment



        $(document).ready(function () {
            if (window.innerWidth > 800) {
                $('.what-client-slider-content').slick({
                    nextArrow: '<i class="client-comment-arrow-right"></i>',
                    prevArrow: '<i class="client-comment-arrow-left"></i>',
                    dots: false,
                    infinite: true,
                    speed: 300,
                    slidesToShow: 1,
                    adaptiveHeight: true,
                });

                $(".photos-comment-slider .photo-client:eq(" + $(".what-client-slider-content .slick-active").attr("data-slick-index") + ")").addClass("active-darkness");

                $('.what-client-slider-content').on("afterChange", function () {
                    $('.active-darkness').removeClass('active-darkness');
                    $(".photos-comment-slider .photo-client:eq(" + $(".what-client-slider-content .slick-active").attr("data-slick-index") + ")").addClass("active-darkness");
                })
            }else {
                $('.what-client-mobile').slick({
                    infinite: true,
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    arrows: false,
                    dots: true,
                });
            }
        });


        //////////////////////////////////////////////////////
        // blog posts slider

        $(document).ready(function () {
            $('.blog-posts-block').slick({
                dots: false,
                arrows: false,
                infinite: true,
                speed: 300,
                slidesToShow: 1,
                centerMode: true,
                variableWidth: true,
            });
        });




    },
};



