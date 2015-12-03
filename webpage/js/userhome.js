$(document).ready(function() {
    // This will fire when document is ready:
    $(window).resize(function() {
        // This will fire each time the window is resized:
        if($(window).width() >= 680) {
            // if larger or equal
            $('#rn').text("Reikningsnúmer");
        } else {
            $('#rn').text("Rn.");
        }
    }).resize();


    $('.rncolumn').click(function(){
        var userRN = $(this).text();
        $.ajax({
            type: "POST",
            url: "../js/jsajax/rn.php",
            data: {
                userRN: userRN
            }
        });
    });
});