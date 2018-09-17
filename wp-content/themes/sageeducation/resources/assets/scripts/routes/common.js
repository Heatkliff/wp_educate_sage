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
            $('.slider .slider-header').slick({
                autoplay: true,
                autoplaySpeed: window.slide_time['autoslide_time'] * 1000,
                dots: true,
                arrows: false,
            });
        });

        // $(document).ready(function () {
        //     $(".slider").each(function () {
        //         var obj = $(this);
        //         $(obj).append("<div class='nav'></div>");
        //         $(obj).find("li").each(function () {
        //             $(obj).find(".nav").append("<span rel='" + $(this).index() + "'></span>");
        //             $(this).addClass("slider" + $(this).index());
        //         });
        //         $(obj).find("span").first().addClass("on");
        //     });
        // });
        // function sliderJS(obj, sl) {
        //     var ul = $(sl).find("ul");
        //     var bl = $(sl).find("li.slider" + obj);
        //     var step = $(bl).width();
        //     $(ul).animate({marginLeft: "-" + step * obj}, 1000);
        // }
        //
        // $(document).on("click", ".slider .nav span", function () { // slider click navigate
        //     var sl = $(this).closest(".slider");
        //     $(sl).find("span").removeClass("on");
        //     $(this).addClass("on");
        //     var obj = $(this).attr("rel");
        //     sliderJS(obj, sl);
        //     return false;
        // });
        //
        //
        // $(document).ready(function autoscroll() {
        //     var checks = $(document).find('.slider .nav span');
        //     var check_now = 1;
        //
        //     setInterval(function () {
        //         checks[check_now].click();
        //
        //         if (check_now + 1 < checks.length) {
        //             check_now += 1;
        //         } else {
        //             check_now = 0;
        //         }
        //     }, window.slide_time['autoslide_time'] * 1000);
        //
        // });

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
                        $('.courses-block .courses-pre-post:last').after(data.substring(0, data.length - 1));
                        $('#true_loadmore').remove();
                    }
                },
            });
        });

        window.onload = function () {
            console.log(window.innerWidth);
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
                                $('.courses-block-mobile .courses-pre-post:last').after(data.substring(0, data.length - 1));
                                $('.courses-block-mobile .courses-pre-posts').slick({
                                    dots: true,
                                    arrows: false,
                                    autoplay: true,
                                });
                            }
                        },
                    });

                });

                promise;
            }

            if (window.output_all_courses_in_mobile['output_all'] == false || window.output_all_courses_in_mobile['output_all'] == 0) {
                $('.courses-block-mobile .courses-pre-posts').slick({
                    dots: true,
                    arrows: false,
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    infinite: true,
                });
            }


        };


        /////////////////////////////////////////////////////////////
        // slider teachers

        $(document).ready(function () {
            $('.teachers-posts-mobile').slick({
                dots: false,
                centerMode: true,
                centerPadding: '20px',
                slidesToShow: 1,
                arrows: false,
                autoplay: true,
                variableWidth: true,
            });
            work_dots_teachers();


        });

        function work_dots_teachers() {
            $('.navigation-teacher .dot-teacher:eq(0)').on("click", function () {
                $('.teachers-posts-mobile').slick('slickGoTo', parseInt($('.teachers-posts-mobile .slick-active').attr('data-slick-index')) - 2);
            })
            $('.navigation-teacher .dot-teacher:eq(1)').on("click", function () {
                $('.teachers-posts-mobile').slick('slickGoTo', parseInt($('.teachers-posts-mobile .slick-active').attr('data-slick-index')) - 1);
            })
            $('.navigation-teacher .dot-teacher:eq(3)').on("click", function () {
                $('.teachers-posts-mobile').slick('slickGoTo', parseInt($('.teachers-posts-mobile .slick-active').attr('data-slick-index')) + 1);
            })
            $('.navigation-teacher .dot-teacher:eq(4)').on("click", function () {
                $('.teachers-posts-mobile').slick('slickGoTo', parseInt($('.teachers-posts-mobile .slick-active').attr('data-slick-index')) + 2);
            })
        }

        /////////////////////////////////////////////////////////////
        // slider client comment


        $(document).ready(function () {
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
            $('.what-client-mobile').slick({
                infinite: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false,
                dots: true,
            });

        });


        //////////////////////////////////////////////////////
        // blog posts slider

        $(document).ready(function () {
            $('.blog-slider-block .blog-posts-block').itemslide();
        });


        //////////////////////////////////////////////////////////////
        // subscribe form ajax

        $('#subscribe-send').on('click', function () {
            var data = {
                action: 'subscribe_send',
                email: $('#subscribe-send-email').val(),
            };
            $.ajax({
                url: window.ajax.ajax_url,
                data: data,
                type: 'POST',
                success: function () {
                    alert('success!');
                },
                error: function () {
                    alert('error!');
                },
            });
        })


    },
};



