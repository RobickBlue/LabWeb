$(document).ready(function(){

    $("#produc").on({ //Menu desplegable
        mouseenter: function(){
            $("#desp").css("display", "block");
        },
        mouseleave: function(){
            $("#desp").css("display", "none");
        }
    });


    $("#index").click(function(){
         location.href="index.php";
    });
    $("#login").click(function(){
        location.href="login.php";
  });
  $("#signup").click(function(){
     location.href="signup.php";
});
});

function categoria(categoria){
   location.href="controlador.php?id_categoria="+categoria;
   alert(categoria);
}
