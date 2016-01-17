<div class="container">
  <div class="row">
    <div class="col-md-5" id="productos">
      <ul>
        <li id="index">Inicio</li>
        <li id="produc">Productos
          <ul id="desp" style="display: none;">
            <a href="controlador.php?id_categoria=1"><li >Arduino</li></a>
            <a href="controlador.php?id_categoria=2"><li >BeagleBone</li></a>
            <a href="controlador.php?id_categoria=3"><li >Raspberry Pi</li></a>
            <a href="controlador.php?id_categoria=4"><li >Sensores</li></a>
          </ul>
        </li>
    </ul>
  </div>
  <div class="col-md-5" id="cuenta">
    <ul>
      <li id="cuentaok">Mi cuenta
         <ul id="despcuenta" style="display: none;">
           <a href="controlador.php?accion=config"><li >Config</li></a>
           <a href="controlador.php?accion=logout"><li >Logout</li></a>
         </ul>
      </li>
      <li><img src="..\img\carrito.png" width="30%" height="30%">Cesta</li>
  </ul>
</div>
  </div>
  </div>
</div>
