// Initialize
jQuery(function ($) {
    $('.counter').each(function (e) {
        $(".timer").waypoint(function () {
            $('.timer').countTo();
        }, {offset: '85%', triggerOnce: true});
    });

    $(document).ready(function () {
        var $element;
        var children = [];
        var $gridContainer = $('.grid');
        var columns;
        var rows;

        var totalGridItem = $('.grid-invi').find('.gridSingleItem');

        var index = 0;
        columns = [1, 2, 3, 2, 2, 1, 3, 3, 2];
        rows = [2, 2, 2, 4, 2, 2, 4, 2, 2];
        $(totalGridItem).each(function () {
            $element = $(this).addClass('gridItem');
            $.data($element, 'grid-columns', columns[index]);
            $.data($element, 'grid-rows', rows[index]);
            $gridContainer.append($element);

            children.push($element);
            index++;
        });

        $gridContainer.cloudGrid({
            children: children,
            gridGutter: 15,
            gridSize: 130
        });

        $(window).on('resize', function () {
            $gridContainer.cloudGrid('reflowContent');
        });

        $('.gridItem').addClass("hidden-custom").viewportChecker({
            classToAdd: 'visible-custom animate',
            offset: 0
        });

        $('.single-product').addClass("hidden-custom").viewportChecker({
            classToAdd: 'visible-custom animate',
            offset: 0
        });

        $('.multiple-items').slick({
            autoplay: true,
            dots: true,
            infinite: true,
            speed: 1000,
            slidesToShow: 4,
            slidesToScroll: 2,
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1,
                        infinite: true,
                        dots: true
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
                // You can unslick at a given breakpoint now by adding:
                // settings: "unslick"
                // instead of a settings object
            ]
        });
    });

});