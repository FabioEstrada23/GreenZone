<?php
//Se incluye la plantilla del encabezado para la página web
require_once('../../app/helpers/dashboard_page.php');
// Se imprime la plantilla del encabezado enviando el título de la página web.
Dashboard_Page::headerTemplate('Gestión de pedidos');
?>
<br>
<br>
<br>
<br>
<section>
    <div class="container">
        <div class="row p-3">
            <div class="col-12 text-center" id="infoProveedor">
                <h1>Pedidos</h1>
            </div>
            <form id="search-form">
            <div class="col-12 p-4" id="#searchBarProv">
                <div class="ordenar">
                    <input type="text" class="form-control" placeholder="Rango Fecha 1" aria-label="Buscar"
                        aria-describedby="basic-addon1" id="search" name="search" required>
                    <input type="text" class="form-control" placeholder="Rango Fecha 2" aria-label="Buscar"
                        aria-describedby="basic-addon1" id="search2" name="search2" required>
                    <!-- Boton de buscar -->
                    <button class="btn" type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" fill="Black" class="bi bi-search"
                            viewBox="0 0 16 16">
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
                            <h5 class="modal-title" id="modal-title">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="update-form" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-6">
                                    <h6>Pedido</h6>
                                    <!-- Id Pedido -->
                                    <div class="form-group d-none">
                                        <label for="id_pedido">ID:</label>
                                        <input type="text" class="form-control " placeholder="Ej: MalteHC..."
                                            aria-label="Buscar" aria-describedby="basic-addon1" id="id_pedido" 
                                            name="id_pedido" class="validate" readonly>
                                    </div>
                                    <!-- Usuario -->
                                    <div class="form-group">
                                        <label for="id_pedido">Usuario:</label>
                                        <input type="text" class="form-control " placeholder="Ej: Seishin..."
                                            aria-label="Buscar" aria-describedby="basic-addon1" id="cliente_user" 
                                            name="cliente_user" class="validate" readonly>
                                    </div>
                                    <!-- Fecha del pedido -->
                                    <div class="form-group">
                                        <label for="id_pedido">Fecha del Pedido:</label>
                                        <input type="date" class="form-control " placeholder="Ej: Seishin..."
                                            aria-label="Buscar" aria-describedby="basic-addon1" id="fecha_pedido"
                                            name="fecha_pedido" class="validate" readonly>
                                    </div>
                                    <!-- Fecha de entrega -->
                                    <div class="form-group">
                                        <label for="id_pedido">Fecha de entrega:</label>
                                        <input type="date" class="form-control " placeholder="Ej: Seishin..."
                                            aria-label="Buscar" aria-describedby="basic-addon1" id="fecha_entrega" 
                                            name="fecha_entrega" class="validate" readonly>
                                    </div>
                                    <!-- Estado -->
                                    <div class="form-group">
                                        <label for="id_pedido">Estado:</label>
                                        <select class="form-select" aria-label="Select" id="estado_pedido" name="estado_pedido">
                                        </select>
                                        <br>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <h6>Detalle del pedido</h6>
                                     <!-- Id detalle Pedido -->
                                     <div class="form-group d-none">
                                        <label for="id_pedido">ID:</label>
                                        <input type="text" class="form-control " placeholder="Ej: MalteHC..."
                                            aria-label="Buscar" aria-describedby="basic-addon1" id="id_detalle_pedido" 
                                            name="id_detalle_pedido" class="validate" readonly>
                                    </div>
                                     <!-- Producto -->
                                     <div class="form-group">
                                        <label for="id_pedido">Producto:</label>
                                        <input type="text" class="form-control " placeholder=""
                                            aria-label="Buscar" aria-describedby="basic-addon1" id="nombre_pro" 
                                            name="nombre_pro" class="validate" readonly>
                                    </div>
                                     <!-- Usuario -->
                                     <div class="form-group">
                                        <label for="id_pedido">Cantidad:</label>
                                        <input type="number" class="form-control " placeholder=""
                                            aria-label="Buscar" aria-describedby="basic-addon1" id="cantidad" 
                                            name="cantidad" class="validate" readonly>
                                    </div>
                                    <!-- Total -->
                                    <div class="form-group">
                                        <label for="id_pedido">Total:</label>
                                        <input type="number" class="form-control " placeholder=""
                                            aria-label="Buscar" aria-describedby="basic-addon1" id="total" 
                                            name="total" class="validate" readonly>
                                    </div>

                                </div>
                            </div>

                          

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                    <button type="submit" data-tooltip="Actualizar" class="btn btn-primary">Guardar
                                        Cambios</button>
                                </div>

                    
                        </div>
                    </div>
                </div>
            </div>



            <div class="col-12 p- text-center">
                <div class="table-responsive">
                    <table class="table table-dark table-striped" id="tabla">
                        <thead>
                            <tr>
                                <th scope="col">Correo</th>
                                <th scope="col">Fecha del Pedido</th>
                                <th scope="col">Fecha de entrega</th>
                                <th scope="col">Estado</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>

                        <tbody id="tbody-rows">

                        </tbody>
                    </table>
                </div>


            </div>

            </form>
        </div>
    </div>
    <br>
<br>
<br>
<br>
<br>
</section>


<?php
// Se imprime la plantilla del pie enviando el nombre del controlador para la página web.
Dashboard_Page::footerTemplate('pedido.js');
?>