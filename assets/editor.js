(function ($) {
    "use strict";

    var UfoGlobal = function ($scope, $) {

        // Js Start
        $('[data-background]').each(function () {
            $(this).css('background-image', 'url(' + $(this).attr('data-background') + ')');
        });
        // Js End

    };


    var UfoSlider = function ($scope, $) {

        $scope.find('.ufo-slider-section').each(function () {
            var SectionId = $(this).find('.ufo-slider-wrapper').attr('id');
            var SectionId = '#'+SectionId;
            var slideView = $(this).attr('data-ufo-slideView');
            var slideGap = $(this).attr('data-ufo-slideGap');
            var slideViewMobile = $(this).attr('data-ufo-slideViewMobile');
            var centered = $(this).attr('data-ufo-centered');
            var navEnable = $(this).attr('data-ufo-navEnable');
            var center = centered == 'true' ? true : false;
            var nav = navEnable == 'true' ? true : false;

            // Js Start
            var UfoSlider = new Swiper(SectionId, {
                slidesPerView: slideView,
                spaceBetween: slideGap,
                centeredSlides: center,
                createElements: true,
                // mousewheel: true,
                // keyboard: true,
                navigation: {
                    enabled: nav,
                    nextEl: $(this).find('.swiper-button-next')[0],
                    prevEl: $(this).find('.swiper-button-prev')[0],
                },
                breakpoints: {
                    375: {
                        slidesPerView: slideViewMobile,
                        spaceBetween: 20,
                    },
                    768: {
                        slidesPerView: slideViewMobile,
                        spaceBetween: slideGap,
                    },
                    1024: {
                        slidesPerView: slideView,
                        spaceBetween: slideGap,
                    },
                },
            });
            $(this).find('.ufo-toggle').on('click', function() {
                var container = $(this).closest('.ufo-slider-item-wrapper');
                container.toggleClass('ufo-activate-toggle');
            });
            // Js End
        });

    };
    var UfoAutoSlider = function ($scope, $) {

        $scope.find('.ufo-auto-slider-section').each(function () {
            var SectionId = $(this).find('.ufo-auto-slider-wrapper').attr('id');
            var SectionId = '#'+SectionId;
            var slideView = $(this).attr('data-ufo-slideView');
            var slideGap = $(this).attr('data-ufo-slideGap');
            var slideViewMobile = $(this).attr('data-ufo-slideViewMobile');
            var centered = $(this).attr('data-ufo-centered');
            var navEnable = $(this).attr('data-ufo-navEnable');
            var chck = slideView == 'true' ? 'auto' : slideView;
            var center = centered == 'true' ? true : false;
            var nav = navEnable == 'true' ? true : false;
            // Js Start
            var UfoAutoSlider = new Swiper(SectionId, {
                slidesPerView: chck,
                spaceBetween: slideGap,
                autoHeight: true,
                width: true,
                centeredSlides: center,
                createElements: true,
                // mousewheel: true,
                // keyboard: true,
                navigation: {
                    enabled: nav,
                    nextEl: $(this).find('.swiper-button-next')[0],
                    prevEl: $(this).find('.swiper-button-prev')[0],
                },
                on: {
                    init: function() {
                        setSliderHeight();
                    },
                    resize: function() {
                        setSliderHeight();
                    },
                    slideChange: function() {
                        setSliderHeight();
                    }
                },
                breakpoints: {
                    375: {
                        slidesPerView: slideViewMobile,
                        spaceBetween: 20,
                    },
                    768: {
                        slidesPerView: slideViewMobile,
                        spaceBetween: slideGap,
                    },
                    1024: {
                        slidesPerView: chck,
                        spaceBetween: slideGap,
                    },
                },
            });

            function setSliderHeight() {
                var maxHeight = 0;
                var maxWidth = 0;
                // Loop through each .box to find the maximum height
                $('.swiper-slide').each(function() {
                    var thisHeight = $(this).height();
                    // var thisWidth = $(this).width();
                    if (thisHeight > maxHeight) {
                        maxHeight = thisHeight;
                    }
                    // if (thisWidth > maxWidth) {
                    //     maxWidth = thisWidth;
                    // }
                });
                $('.ufo-auto-slider-item-wrapper.ufoAutoHeight').height(maxHeight);
                // $('.ufo-auto-slider-item-wrapper').width(maxWidth);
            }
            // Js End
        });

    };

    $(window).on('elementor/frontend/init', function () {
            elementorFrontend.hooks.addAction('frontend/element_ready/global', UfoGlobal);
            elementorFrontend.hooks.addAction('frontend/element_ready/ufo-slider-addons.default', UfoSlider);
            elementorFrontend.hooks.addAction('frontend/element_ready/ufo-auto-slider-addons.default', UfoAutoSlider);
    });
    console.log('addon js loaded');
})(jQuery);