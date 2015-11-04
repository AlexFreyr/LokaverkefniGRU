//Button click
$('#submit').on('click', function(){
    $('#notification').empty();

    if($('#nafn').text() == ""){
        $("#notification").fadeIn().append("Vantar nafn");
    }else if($('#kennitala').text() == ""){
        $("#notification").fadeIn().append("Vantar kennitölu");
    }else if($('#netfang').text() == ""){
        $("#notification").fadeIn().append("Vantar netfang");
    }else if($('#land').text() == ""){
        $("#notification").fadeIn().append("Vantar land");
    }else if($('#lykilord').text() == ""){
        $("#notification").fadeIn().append("Vantar lykilorð");
    }else if($('#cb').is(':checked')){
        // .. búið er að lesa skylmálann
    }else{
        $("#notification").fadeIn().append("Vantar nafn");
    }
});
