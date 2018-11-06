$(function() {
    var slide = $("#slide").slippry({
        transition: 'fade',
        useCSS: true,
        speed: 500,
        pause: 3000,
        auto: true,
        preload: 'visible',
        autoHover: false
    });
});
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
});
$('#myTabs a').click(function (e) {
  e.preventDefault()
  $(this).tab('show')
})