$(document).ready(function() {
    $(".merchantRegSection").hide();
    $('input:radio[name="regType"]').change(function() {
            if ($(this).val() === 'customer') {
                $(".customerRegSection").show();
                $(".merchantRegSection").hide();
            } else {
                $(".merchantRegSection").show();
                $(".customerRegSection").hide();
            }
        });
});