<?php
//Se incluye la plantilla del encabezado para la página web
require_once('../../app/helpers/public_page.php');
Public_Page::headerTemplate('Tu tienda en línea de productos ecoamigables');
?>


<div class="container">
  <br>
  <div class="row">
    <!-- div Slider de imagenes de producto -->
    <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 p-3 col-xxl-6">
      <img id="imagen" class="img-fluid" src="">
    </div>
    <!-- Div para Titulo de Producto e informacion -->
    <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 p-3 col-xxl-6 ">
      <div class="row">
        <div class="col-12 text-center" id="Titulo1">
          <h1 id="nombre"> Titulo de Producto</h1>
        </div>
      </div>
      <br>
      <div class="row" id="Descripcion">
        <div class="col-4 text-center">
          <h6>Descripcion: </h6>
        </div>
        <div class="col-8">
          <h6 id="descripcion">Este producto es un producto muy bonito y amigable para nuestros ecosistemas </h6>
        </div>
        <div class="col-12 text-center">
          <h6>Precio (US$): <b id="precio"></b></h6>
        </div>
      </div>
      <br>
      <div class="row p-3" id="Titulo1">
        <form method="post" id="shopping-form">
          <div class="col-8" id="Parte2">
            <div class="row d-none">
              <input type="number" id="id_producto" name="id_producto" step="0.01" required/>
              <input type="number" id="precio_pro" name="precio_pro" step="0.01" required />
            </div>
            <div class="row">
              <div class="col-6 text-center">
                <h6>Cantidad:</h6>
              </div>
              <div class="col-6">
              <input type="number" id="cantidad" name="cantidad" min="1" class="validate" required/>
              </div>
            </div>
          </div>
          <div class="col-4 d-flex flex-row-reverse">
            <button type="submit" class="btn waves-effect waves-light blue tooltipped" data-tooltip="Agregar al carrito"><i class="material-icons">add_shopping_cart</i></button>
          </div>
        </form>

      </div>
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col-12" id="Titulo1">
      <h1>Valoraciones:</h1>
    </div>
  </div>

  <br>

</div>


<?php
// Se imprime la plantilla del pie enviando el nombre del controlador para la página web.
Public_Page::footerTemplate('detalle.js');
?>