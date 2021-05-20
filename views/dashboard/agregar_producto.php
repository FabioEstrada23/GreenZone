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
                                    aria-label="Nombre" aria-describedby="basic-addon1">
                            </div>

                        </div>

                        <!-- Campo Descripcion -->
                        <div class="row  p-3">
                            <div class="col-3 text-center">

                                <h6>Descripcion</h6>
                            </div>
                            <div class="col-9">
                                <input type="text" class="form-control"
                                    placeholder="Ej: Talla: XL, caraceristicas..." aria-label="Descripcion"
                                    aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <!-- campo precio -->
                        <div class="row  p-3">
                            <div class="col-3 text-center">

                                <h6>Precio</h6>
                            </div>
                            <div class="col-9">
                                <input type="text" class="form-control"
                                    placeholder="Ej: 55.50.." aria-label="Telefono"
                                    aria-describedby="basic-addon1">
                            </div>
                        </div>

                        <div class="row  p-3">
                            <div class="col-3 text-center">

                                <h6>Oferta</h6>
                            </div>
                            <div class="col-9">
                                <input type="text" class="form-control"
                                    placeholder="Ej: 0.25..." aria-label="Buscar"
                                    aria-describedby="basic-addon1">
                            </div>
                        </div>

                        <div class="row  p-3">
                            <div class="col-3 text-center">

                                <h6>Existencias</h6>
                            </div>
                            <div class="col-9">
                                <input type="number" class="form-control"
                                    placeholder="Ej: 123..." aria-label="Buscar"
                                    aria-describedby="basic-addon1">
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
                            aria-describedby="basic-addon1">
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
                        <table class="table table-dark table-striped">
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

