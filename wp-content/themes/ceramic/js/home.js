// Initialize
jQuery(function($) {
    $("#sidebar-th-su").hover(function(){

    })
    

    $(".home-sb-item").click(function(){
        $('.selected').removeClass('selected');
        $(this).addClass('selected');
    })
});