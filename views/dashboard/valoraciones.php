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
                                            <th scope="col">#</th>
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
            </div>
        </div>
</section>
<br>
<br>

<br>
<br>

<?php
// Se imprime la plantilla del pie enviando el nombre del controlador para la página web.
Dashboard_Page::footerTemplate('proveedores.js');
?>