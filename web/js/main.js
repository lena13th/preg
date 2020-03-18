/**
 * Created by Rustam on 15.01.2018.
 */
$(document).on('click', '[data-toggle="lightbox"]', function(event) {
    event.preventDefault();
    $(this).ekkoLightbox({
        // showArrows: false
        width: 1366,
        wrapping: false
    });
    $('.ekko-lightbox').append('<div class="close_lightbox" tabindex="-1" data-dismiss="modal" aria-label="Close">✕</div>');
});