var once = false;
//Button click
$('#cb').on('click', function(){
    $('#notification').empty();

    var t = check("text");
    var p = check("password");
    var s = t + p;
    if(s == 0){
        if(checkKennitala($('#kennitala').val()) == true){
            if(checkLykilord($('#lykilord').val()) == true){
                if($('#cb').is(':checked')){
                    $('#submit').prop('disabled', false); //Opnar takkann
                    once = true;
                }else{
                    $("#notification").fadeIn().append("Þú þarft að lesa og samþykkja skilmálana áður en þú stofnar reikning");
                    $('#submit').prop('disabled', true);
                }
            }else{
                $('#submit').prop('disabled', true);
                $('#notification').append("Lykilorðið þarf að hafa amk 1 tölustaf, 1 stóran staf, 1 lítinn staf og 6 stafir langt");
                $('#cb').prop('checked', false);
            }
        }else{
            $("#notification").append("Röng kennitala");
        }
    }else{
        $('#submit').prop('disabled', true);
        if (s == 1){
            $("#notification").append("Vantar að fylla út " + s + " reit");    
        }else{
            $("#notification").append("Vantar að fylla út " + s + " reiti");
        }
    }
});

$('#lykilord, #land, #netfang, #kennitala, #nafn').on('keydown', function(){
    var t = check("text");
    var p = check("password");
    var s = t + p;
    if(once == true && s == 0){
        $('#cb').click();
        $('#cb').prop('checked', false);
        once = false;
    }
});

//Gáir hvort það sé ekki örugglega texti í textboxunum.
function check(type) {
    var empty = 0;
    $('input[type=' + type + ']').each(function(){
        if (this.value == "" && $(this).attr("id") != "login-nafn" && $(this).attr("id") != "login-lykilord") {
            empty++;
            $("#error").show('slow');
        } 
    })
    return empty;
}

function checkLykilord(lykilord){
    //Gáir hvort það sé amk. 1 tala, 1 stór stafur, 1 lítill stafur og amk 6 stafir
    var re = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}/;
    return re.test(lykilord);
}
function checkKennitala(kennitala){
    //Gáir hvort það séu 10 tölustafir í kennitölu
    var re = /(?=.*\d).{10}/;
    return re.test(kennitala);
}

$(document).ready(function() {
     $('#submit').prop('disabled', true);
 });

/*
Alexander Freyr
*/