require('./bootstrap');

window.AOS = require('AOS');
AOS.init();


$(function () {
    $('.quantityUpdateInput', this).change(function (e) {
        e.preventDefault();
        $(this).siblings('.quantityUpdateSubmit').show();
    });

    $('#flash-message').delay(1700).fadeOut();

    $('form').submit(function() {
        $(this).find(":submit").prop('disabled',true);
      });
});
