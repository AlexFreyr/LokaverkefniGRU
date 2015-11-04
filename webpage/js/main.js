//Button click
$('#submit').on('click', function(){
    $('#notification').empty();

    var t = check("text");
    var p = check("password");
    var s = t + p;
    if(s == 0){
        if($('#cb').is(':checked')){
            // .. continue
        }else{
            $("#notification").fadeIn().append("Þú þarft að lesa og samþykkja skilmálana áður en þú stofnar reikning");
        }
    }else{
        $("#notification").fadeIn().append("Vantar að fylla út " + s + " reiti");
    }
});

function check(type) {
    var empty = 0;
    $('input[type=' + type + ']').each(function(){
       if (this.value == "") {
           empty++;
           $("#error").show('slow');
       } 
    })
    return empty;
}
