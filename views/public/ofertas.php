<?php
//Se incluye la plantilla del encabezado para la página web
require_once('../../app/helpers/public_page.php');
include("../../app/helpers/header.php");

?>

<div class="container">
            <!-- row principal -->
            <div class="row">

                <div class="col-12 col-1 col-xs-12 col-sm-12 d-lg-none">
                    
                </div>

                <!-- Barra de Navegacion Lateral -->
                    
                <div class="row">
                    <div class="col-12 text-center" id="RegisCate">
                        <h1 class="center">Registros</h1>
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
                        <div class="table-responsive" id="tabla_Cate">
                            <table class="table table-dark table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Descuento</th>
                                        <th class="actions-column">Precio Descuento</th>
                                        <th class="actions-column">Producto</th>
                                        <th class="actions-column">Precio Anterior</th>
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
Public_Page::footerTemplate('ofertacliente.js');
?>