/**
 * Created by Rustam on 08.01.2018.
 */
$(document).ready(function(){
    $('body').on('click', '.next', function(){
        var currentActiveElement = $('.document_index_active'),
            nextElement = currentActiveElement.next('.document_index_left');
        if (nextElement.length == 0) {
            nextElement = $('.document_index_left:first');
        }
        currentActiveElement.removeClass('document_index_active');
        nextElement.addClass('document_index_active');
    });
    $('body').on('click', '.prev', function(){
        var currentActiveElement = $('.document_index_active'),
            nextElement = currentActiveElement.prev('.document_index_left');
        if (nextElement.length == 0) {
            nextElement = $('.document_index_left:last');
        }
        currentActiveElement.removeClass('document_index_active');
        nextElement.addClass('document_index_active');
    });
    // $(document).keyup(function(e) {
    //     if (e.keyCode === 27) {
    //         $('.window').removeClass('show');
    //         $('.submenu').removeClass('show_submenu');
    //     }
    // });
    // $('.close_window, .overlay').click(function(){
    //     $(this).closest('.window').removeClass('show');
    // });
    // $('.submenu_expand').click(function(event){
    //     if ($(window).width() <= '768') {
    //         $(this).next('.submenu').toggleClass('show_submenu');
    //         event.stopPropagation();
    //     }
    // });
    // $('.menu li').hover(function(event){
    //     if ($(window).width() > '768') {
    //         $(this).find('.submenu').toggleClass('show_submenu');
    //     }
    // });
    // $(document).click(function() {
    //     $('.submenu').removeClass('show_submenu');
    // });
});