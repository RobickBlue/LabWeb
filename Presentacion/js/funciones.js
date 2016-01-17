$(document).ready(function(){

    $("#produc").on({
        mouseenter: function(){
            $("#desp").css("display", "block");
        },
        mouseleave: function(){
            $("#desp").css("display", "none");
        }
    });

    $("#cuentaok").on({
      mouseenter: function(){
           $("#despcuenta").css("display", "block");
      },
      mouseleave: function(){
           $("#despcuenta").css("display", "none");
      }
  });
  $("#logout").click(function(){
       location.href="controlador.php?accion='logout'";
  });

    $("#index").click(function(){
         location.href="index.php";
    });
    $("#login").click(function(){
        location.href="login.php";
  });

  $("#cesta").click(function(){
     location.href="cesta.php";
   });

  $("#signup").click(function(){
     location.href="signup.php";
   });

  $("#contacto").click(function(){
   location.href="contact.php";
  });

});

function categoria(categoria){
   location.href="controlador.php?id_categoria="+categoria;
   alert(categoria);
}
