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
                    <div class="col-12 text-center" id="infoVal">
                        <h1>Valoraciones</h1>
                    </div>

                    <!-- Proveedores Caja de Informacion -->
                    <div class="col-12">
                        <br>
                        <form id="search-form">
                            <div class="col-12 p-4" id="#searchBarProv">
                                <div class="ordenar">
                                    <input type="text" class="form-control" placeholder="Buscar por nombre de producto" aria-label="Buscar"
                                        aria-describedby="basic-addon1" id="search" type="text" name="search" required >
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

                        <input type="text" class="form-control d-none" 
                                        aria-label="Buscar" aria-describedby="basic-addon1" id="id_valoracion" type="text"
                                        name="id_valoracion" class="validate" required>
                        
                    </div>
                </div>

            </div>

                <div class="col-12 col-xs-12 col-sm-12 col-lg-6 col-xl-6 p-4 col-xxl-6">

                    <div class="row">
                        <div class="col-12 text-center" id="regVal">
                            <h1>Registros</h1>
                        </div>
                        

                        <div class="col-12 p- text-center">
                            <div class="table-responsive">
                                <table class="table table-dark table-striped" id="tablaVal">
                                    <thead>

                                        <tr>
                                            
                                            <th scope="col">Nombre del cliente</th>
                                            <th scope="col">Producto valorado</th>
                                            <th scope="col">Puntuación</th>
                                            <th scope="col">Comentario</th>
                                            <th class="actions-column">Acciones</th>
                                        </tr>

                                    </thead>

                                    <tbody id="tabla-val">

                                    </tbody>
                                </table>



                            </div>


                        </div>
                    </div>

                </div>
                <div class="modal fade" id="update-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Cambiar estado de valoración</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="post" id="update-form">
                            
                                
                                <input type="text" class="form-control d-none" id="id_valoracion2" name="id_valoracion2">
                            
                            <div class="mb-3">
                                <label for="marca" class="col-form-label">Cambiar estado:</label>
                                <select class="form-select" aria-label="Select" id="estado_val" name="estado_val">
                                <option disabled selected>Seleccione una opción</option>
                                <option value="true">Admitido</option>
                                <option value="false">Rechazar</option>
                                </select>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary">Guardar cambios</button>
                            </div>
                            </form>
                        </div>
                        
                    </div>
            </div>
            </div>
        </div>
</section>
<br>
<br>

<br>
<br>

<?php
// Se imprime la plantilla del pie enviando el nombre del controlador para la página web.
Dashboard_Page::footerTemplate('valoraciones.js');
?>