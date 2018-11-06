$(function() {
    var slide = $("#slide").slippry({
        transition: 'fade',
        useCSS: true,
        speed: 4000,
        pause: 3000,
        auto: true,
        preload: 'visible',
        autoHover: false
    });
});
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
});