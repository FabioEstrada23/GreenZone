<?php
//Se incluye la plantilla del encabezado para la página web
require_once('../../app/helpers/dashboard_page.php');
include("../../app/helpers/private_header.php");

?>

<section>
    <br>
    <br>
    <br>
    <br>
    <br>

    <div class="container">
        <div class="row">
            <div class="col-12 col-xs-12 col-sm-12 col-lg-6 col-xl-6 p-4 col-xxl-6">
                <!-- Fila de proveedores -->
                <div class="row">
                    <div class="col-12 text-center" id="infoProveedor">
                        <h1>Ofertas</h1>
                    </div>

                    <!-- Proveedores Caja de Informacion -->
                    <div class="col-12">
                        <br>
                        <form id="save-form" method="post" enctype="multipart/form-data">
                            <div class="row" id="proveedorCaja">

                                <div class="row  p-3">
                                    <div class="col-3 text-center">

                                        <h6>Producto</h6>
                                    </div>
                                    <div class="col-9">
                                        <select class="form-select" aria-label="Select" id="nombre_pro"
                                            name="nombre_pro">
                                        </select>
                                    </div>
                                </div>
                                <div class="row  p-3">
                                    <div class="col-3 text-center">
                                        <h6>Descuento</h6>
                                    </div>
                                    <div class="col-9">
                                        <input type="number" class="form-control" placeholder="0.01" aria-label="Buscar"
                                            aria-describedby="basic-addon1" id="descuento" name="descuento"
                                            class="validate" step="0.01" required>
                                    </div>
                                </div>

                                <div class="row  p-3">
                                    <div class="col-3 text-center">
                                        <h6>Precio Descuento</h6>
                                    </div>
                                    <div class="col-9">
                                        <input type="number" class="form-control" placeholder="" aria-label="Buscar"
                                            aria-describedby="basic-addon1" id="precio_descuento"
                                            name="precio_descuento" class="validate" step="0.01" required>
                                    </div>
                                </div>

                                <div class="row  p-3">
                                    <div class="col-3 text-center">
                                        <h6>Precio Anterior</h6>
                                    </div>
                                    <div class="col-9">
                                        <input type="number" class="form-control" placeholder="" aria-label="Buscar"
                                            aria-describedby="basic-addon1" id="precio_anterior" step="0.01" name="precio_anterior"
                                            class="validate" readonly>
                                    </div>
                                </div>
                            </div>

                            <!-- Controladores de Proveedor -->
                            <br>
                            <div class="row text-center" id="controladorProvCaja">
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
                            <h5 class="modal-title" id="modal-title">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="update-form" method="post" enctype="multipart/form-data">
                                
                                <div class="form-group d-none">
                                    <label for="id_oferta">ID:</label>
                                    <input type="text" class="form-control " placeholder="Ej: MalteHC..."
                                        aria-label="Buscar" aria-describedby="basic-addon1" id="id_oferta" type="text"
                                        name="id_oferta" class="validate" required>
                                </div>

                                <div class="form-group">
                                    <label for="nombre_pro2">Producto:</label>
                                    <select class="form-select" aria-label="Select" id="nombre_pro2" name="nombre_pro2">
                                    </select>
                                </div>
     
                                <div class="form-group">
                                    <label for="nombre_pro2">Descuento:</label>
                                    <input type="number" class="form-control" placeholder="0.01" aria-label="Buscar"
                                        aria-describedby="basic-addon1" step="0.01" id="descuento2" type="number" name="descuento2"
                                        class="validate" required>
                                </div>

                                <div class="form-group">
                                    <label for="precio_descuento2">Precio Descuento</label>
                                    <input type="number" class="form-control" placeholder="" aria-label="Buscar"
                                        aria-describedby="basic-addon1" step="0.01" id="precio_descuento2" 
                                        name="precio_descuento2" class="validate" required>
                                </div>

                                <div class="form-group">
                                    <label for="precio_anterior2">Precio Anterior:</label>
                                    <input type="number" class="form-control" placeholder="" aria-label="Buscar"
                                        aria-describedby="basic-addon1" step="0.01" id="precio_anterior2"
                                        name="precio_anterior2" class="validate" required>
                                </div>

                                
                          

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                    <button type="submit" data-tooltip="Actualizar" class="btn btn-primary">Guardar
                                        Cambios</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
            

            <div class="col-12 col-xs-12 col-sm-12 col-lg-6 col-xl-6 p-4 col-xxl-6">

                <div class="row">
                    <div class="col-12 text-center" id="regProveedor">
                        <h1>Registros</h1>
                    </div>
                    <form id="search-form">
                        <div class="col-12 p-4" id="#searchBarProv">
                            <div class="ordenar">
                                <input type="number" class="form-control" placeholder="Rango 1" aria-label="Buscar"
                                    aria-describedby="basic-addon1" id="search" name="search" required>
                                <input type="number" class="form-control" placeholder="Rango 2" aria-label="Buscar"
                                    aria-describedby="basic-addon1" id="search2" name="search2" required>
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
                            <table class="table table-dark table-striped" id="tabla">
                                <thead>
                                    <tr>
                                        <th scope="col">Descuento</th>
                                        <th scope="col">Precio Descuento</th>
                                        <th scope="col">Producto</th>
                                        <th scope="col">Precio anterior</th>
                                        <th scope="col"></th>
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



<?php
// Se imprime la plantilla del pie enviando el nombre del controlador para la página web.
Dashboard_Page::footerTemplate('oferta.js');
?>