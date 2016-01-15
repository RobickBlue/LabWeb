$(document).ready(function(){

    $("#produc").on({ //Menu desplegable
        mouseenter: function(){
            $("#desp").css("display", "block");
        },
        mouseleave: function(){
            $("#desp").css("display", "none");
        }
    });

});
