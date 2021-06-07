<?php
//Se incluye la plantilla del encabezado para la página web
require_once('../../app/helpers/public_page.php');
include("../../app/helpers/header.php");

?>

    <div class="container">
      <div class="row">

        <div class="col-12 col-1 col-xs-12 col-sm-12 d-lg-none">
            
        </div>

        <!-- Barra de Navegacion Lateral -->
            
        <div class="row">
            <div class="col-12 text-center" id="RegisCate">
                <h1 class="center">Productos</h1>
            </div>
            
            <form id="search-form">
                <div class="col-12 p-4" id="#searchBarProv">
                    <div class="Buscador">
                        <input type="text" class="form-control" placeholder="Buscar" aria-label="Buscar"
                        aria-describedby="basic-addon1" id="search" type="text" name="search" required>
                        <!-- Boton de buscar -->
                        <button class="btn" type="submit">
                            <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" fill="Black"
                                class="bi bi-search" viewBox="0 0 16 16">
                                <path
                                d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                            </svg>
                        </button>
                    </div>
                </div>
            </form>

            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modal-title">Añadir a carretilla</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="update-form" method="post" enctype="multipart/form-data">
                                <div class="form-group d-none">
                                    <label for="formGroupExampleInput">ID:</label>
                                    <input type="text" class="form-control " placeholder="Ej: MalteHC..."
                                        aria-label="Buscar" aria-describedby="basic-addon1" id="id_producto" type="text"
                                        name="id_producto" class="validate" required>
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput">Nombres:</label>
                                    <input type="text" class="form-control" placeholder="Ej: MalteHC..."
                                        aria-label="Buscar" aria-describedby="basic-addon1" id="nombre_pro2" type="text"
                                        name="nombre_pro2" readonly class="validate" required>
                                </div>
                                <div class="form-group">
                                    <label for="estado_pro2">estado producto:</label>
                                    <select class="form-select" aria-label="Select" id="estado_pro2" name="estado_pro2" disabled>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="categoria2">Categoria producto:</label>
                                    <select class="form-select" aria-label="Select" id="categoria2" name="categoria2" disabled>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="marca2">Marca empleado:</label>
                                    <select class="form-select" aria-label="Select" id="marca2" name="marca2" disabled> 
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput2">Cantidad:</label>
                                    <input type="number" class="form-control"
                                    aria-label="Buscar" aria-describedby="basic-addon1" id="existencias2"
                                    type="number" name="existencias2" class="validate" required>
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput3">Descripcion:</label>
                                    <input type="text" class="form-control" placeholder="Ej: MalteHC..."
                                        aria-label="Buscar" aria-describedby="basic-addon1" id="descripcion_pro2" type="text" 
                                        name="descripcion_pro2" class="validate" required>
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput2">Precio unitario:</label>
                                    <input type="number" class="form-control" placeholder="0.01" aria-label="Buscar"
                                    aria-describedby="basic-addon1" step="0.01" id="precio_uni2" type="number" name="precio_uni2" readonly
                                    class="validate" required>
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput2">Oferta:</label>
                                    <input type="number" class="form-control" placeholder="0.01" aria-label="Buscar"
                                    aria-describedby="basic-addon1" step="0.01" id="oferta2" type="number" name="oferta2" readonly
                                    class="validate" required>
                                </div>            
                        </div>
                        
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" data-tooltip="" class="btn btn-primary" >Agregar a carretilla</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>


            <div class="col-12 p- text-center">
                    <div class="table-responsive">
                        <table class="table table-dark table-striped" id="tabla_pro">
                            <thead>

                                <tr>
                                    <th scope="col">Producto</th>
                                    <th scope="col">Precio</th>
                                    <th scope="col">Oferta</th>
                                    <th scope="col">Proveedor</th>
                                    <th scope="col">Marca</th>
                                    <th scope="col">Categoria</th>
                                    <th scope="col">Estado</th>
                                    <th scope="col">Existencias</th>
                                    <th scope="col">Descripción</th>
                                    <th scope="col">Imagen</th>
                                    <th class="actions-column">Acciones</th>
                                </tr>

                            </thead>

                            <tbody id="tbody-rows">
                            </tbody>

                        </table>
                    </div>
                </div>
        </div>



    </div>
</div>

<?php
// Se imprime la plantilla del pie enviando el nombre del controlador para la página web.
Public_Page::footerTemplate('productoCliente.js');
?>