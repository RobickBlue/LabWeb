<?php include("bean.php") ?>
<div class="container">
  <div class="row">
    <div class="col-md-5" id="productos">
      <ul>
        <li id="index">Inicio</li>
        <li id="produc">Productos
          <ul id="desp">
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
      <li id="signup">Registrarme</li>
      <li id="login">Mi cuenta</li>
      <li id="cesta"><img src="..\img\carrito.png" width="30%" height="30%">Cesta</li>
  </ul>
    </div>
  </div>
</div>
