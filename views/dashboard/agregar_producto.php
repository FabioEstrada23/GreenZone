<?php
//Se incluye la plantilla del encabezado para la página web
require_once('../../app/helpers/dashboard_page.php');
include("../../app/helpers/private_header.php");
?>
<br>
<br>
<br>
<br>

<section>

<div class="container">
    <div class="row">
        <div class="col-12 col-xs-12 col-sm-12 col-lg-6 col-xl-6 p-4 col-xxl-6">
            <!-- Fila de proveedores -->
            <div class="row">
                <div class="col-12 text-center" id="infoProducto">
                    <h1>Productos</h1>
                </div>
                
                <!-- Producto Caja de Informacion -->
                <div class="col-12">
                    <br>
                    <form id="save-form" method="post" enctype="multipart/form-data">
                    <div class="row" id="productoCaja">
                        <div class="row  p-3">
                            <div class="col-3 text-center">
                                <h6>Nombre</h6>
                            </div>
                            <div class="col-9">
                                <input type="text" class="form-control" placeholder="Ej: MalteHC..."
                                aria-label="Buscar" aria-describedby="basic-addon1" id="nombre_pro"
                                type="text" name="nombre_pro" class="validate" required>
                            </div>

                        </div>

                        <!-- Campo Descripcion -->
                        <div class="row  p-3">
                            <div class="col-3 text-center">

                                <h6>Descripcion</h6>
                            </div>
                            <div class="col-9">
                                <input type="text" class="form-control"
                                aria-label="Buscar" aria-describedby="basic-addon1" id="descripcion_pro"
                                type="text" name="descripcion_pro" class="validate" required>
                            </div>
                        </div>
                        <!-- campo precio -->
                        <div class="row  p-3">
                            <div class="col-3 text-center">

                                <h6>Precio</h6>
                            </div>
                            <div class="col-9">
                                <input type="number" class="form-control" placeholder="0.01" aria-label="Buscar"
                                    aria-describedby="basic-addon1" step="0.01" id="precio_pro" type="number" name="precio_pro"
                                    class="validate" required>
                            </div>
                        </div>

                        <div class="row  p-3">
                            <div class="col-3 text-center">

                                <h6>Oferta</h6>
                            </div>
                            <div class="col-9">
                                <input type="number" class="form-control" placeholder="0.01" aria-label="Buscar"
                                    aria-describedby="basic-addon1" step="0.01" id="oferta_pro" type="number" name="oferta_pro"
                                    class="validate" required>
                            </div>
                        </div>

                        <div class="row  p-3">
                            <div class="col-3 text-center">

                                <h6>Existencias</h6>
                            </div>
                            <div class="col-9">
                                <input type="number" class="form-control"
                                aria-label="Buscar" aria-describedby="basic-addon1" id="existencias"
                                type="number" name="existencias" class="validate" required>
                            </div>
                        </div>


                        <div class="row  p-3">
                            <div class="col-3 text-center">

                                <h6>Marca</h6>
                            </div>
                            <div class="col-9">
                                <select class="form-select" aria-label="Default select example"
                                id="marca" name="marca">
                                </select>
                                    
                            </div>
                        </div>
                        
                        <div class="row  p-3">
                            <div class="col-3 text-center">

                                <h6>Proveedor</h6>
                            </div>
                            <div class="col-9">
                                <select class="form-select" aria-label="Default select example"
                                id="nombre_prov" name="nombre_prov">
                                </select>
                            </div>
                        </div>

                        <div class="row  p-3">
                            <div class="col-3 text-center">

                                <h6>Estado</h6>
                            </div>
                            <div class="col-9">
                                <select class="form-select" aria-label="Default select example"
                                id="estado_pro" name="estado_pro">
                                </select>
                            </div>
                        </div>

                        <div class="row  p-3">
                            <div class="col-3 text-center">

                                <h6>Categoria</h6>
                            </div>
                            <div class="col-9">
                                <select class="form-select" aria-label="Default select example"
                                id="categoria" name="categoria">
                                </select>
                            </div>
                        </div>

                        <div class="file-field input-field col s12 m6">
                            <div class="btn waves-effect tooltipped" data-tooltip="Seleccione una imagen de al menos 500x500">
                            <span><i class="material-icons">image</i></span>
                            <input id="archivo_producto" type="file" name="archivo_producto" accept=".gif, .jpg, .png"/>
                        </div>
                            <div class="file-path-wrapper">
                            <input type="text" class="file-path validate" placeholder="Formatos aceptados: gif, jpg y png"/>
                            </div>
                        </div>
                    </div>

                    <!-- Controladores de Producto -->
                    <br>
                    <div class="row text-center" id="controladorProduCaja">
                        <div class="col-12">
                            <button type="submit" class="btn btn-light">Agregar +</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>


        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modal-title">Actualizar Empleados</h5>
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
                                        name="nombre_pro2" class="validate" required>
                                </div>
                                <div class="form-group">
                                    <label for="estado_pro2">estado producto:</label>
                                    <select class="form-select" aria-label="Select" id="estado_pro2" name="estado_pro2">
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="categoria2">Categoria producto:</label>
                                    <select class="form-select" aria-label="Select" id="categoria2" name="categoria2">
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="marca2">Marca empleado:</label>
                                    <select class="form-select" aria-label="Select" id="marca2" name="marca2">
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput2">Precio producto:</label>
                                    <input input type="number" class="form-control" placeholder="0.01" aria-label="Buscar"
                                    aria-describedby="basic-addon1" step="0.01" id="precio_pro2" type="number" name="precio_pro2"
                                    class="validate" required>
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput2">Oferta:</label>
                                    <input input type="number" class="form-control" placeholder="0.01" aria-label="Buscar"
                                    aria-describedby="basic-addon1" step="0.01" id="oferta_pro2" type="number" name="oferta_pro2"
                                    class="validate" required>
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput3">Descripcion:</label>
                                    <input type="text" class="form-control" placeholder="Ej: MalteHC..."
                                        aria-label="Buscar" aria-describedby="basic-addon1" id="descripcion_pro2" type="text"
                                        name="descripcion_pro2" class="validate" required>
                                </div>
                                
                                <div class="form-group">
                                    <label for="marca2">Proveedor:</label>
                                    <select class="form-select" aria-label="Select" id="nombre_prov2" name="nombre_prov2">
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput2">Precio producto:</label>
                                    <input input type="number" class="form-control"
                                    aria-label="Buscar" aria-describedby="basic-addon1" id="existencias2"
                                    type="number" name="existencias2" class="validate" required>
                                </div>
                                
                                
                        </div>
                        
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" data-tooltip="Actualizar" class="btn btn-primary" >Guardar Cambios</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>



        <div class="col-12 col-xs-12 col-sm-12 col-lg-6 col-xl-6 p-4 col-xxl-6">
            <!-- Caja de Registros -->
            <div class="row">
                <div class="col-12 text-center" id="regProducto">
                    <h1>Registros</h1>
                </div>
                <form id="search-form">
                <div class="col-12 p-4" id="#searchBarProv">
                    <div class="ordenar">
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
</div>
</section>
<br>



<?php
// Se imprime la plantilla del pie enviando el nombre del controlador para la página web.
Dashboard_Page::footerTemplate('Producto.js');
?>

