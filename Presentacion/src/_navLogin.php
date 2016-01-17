<div class="container">
  <div class="row">
    <div class="col-md-5" id="productos">
      <ul>
        <li id="index">Inicio</li>
        <li id="produc">Productos
          <ul id="desp" style="display: none;">
            <?php
            $Bean = bean::getInstance();
            $categorias = $Bean->getCategorias();
            foreach($categorias as $categoria) {
              $nom = $categoria['DESCCATEGORIA'];
              $id = $categoria['IDCATEGORIA']
              ?>
              <a href="controlador.php?id_categoria=<?php echo $id; ?>"><li ><?php echo $nom; ?></li></a>
            <?php } ?>
          </ul>
        </li>
    </ul>
  </div>
  <div class="col-md-5" id="cuenta">
    <ul>
      <li id="cuentaok">Mi cuenta
         <ul id="despcuenta" style="display: none;">
           <a href="configUsuario.php"><li >Config</li></a>
           <a href="controlador.php?accion=logout"><li >Logout</li></a>
         </ul>
      </li>
      <li><img src="..\img\carrito.png" width="30%" height="30%">Cesta</li>
  </ul>
</div>
  </div>
  </div>
</div>
