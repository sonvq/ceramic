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
        rows    = [2, 2, 2, 4, 2, 2, 4, 2, 2];
        $(totalGridItem).each(function(){
            $element = $(this).addClass('gridItem');
//            columns = 1 + Math.floor(Math.random() * 2) % 2;
//            rows = 1 + Math.floor(Math.random() * 2) % 2;

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

        $(window).on('resize', function() {
            $gridContainer.cloudGrid('reflowContent');
        })
    });
    
});