$(document).ready(function() {
    // This will fire when document is ready:
    $(window).resize(function() {
        // This will fire each time the window is resized:
        if($(window).width() >= 680) {
            $('#rn').text("Reikningsnúmer");
        } else {
            $('#rn').text("Rn.");
        }

        if($(window).width() >= 680){
            $('#ndate').css("display", "inline");
            $('.special').css("display", "inline");
        } else {
            $('#ndate').css("display", "none");
            $('.special').css("display", "none");
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