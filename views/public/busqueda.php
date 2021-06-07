<?php
//Se incluye la plantilla del encabezado para la página web
include("../../app/helpers/header.php");

?>

<div class="container" id="ContainerBusqueda">
            <!-- row principal -->
            <div class="row">

                <div class="col-12 col-1 col-xs-12 col-sm-12 d-lg-none">
                    
                </div>

                <!-- Barra de Navegacion Lateral -->
                <div class="col-xs-12 col-sm-12 col-lg-4 col-xl-4 col-xxl-4 d-none d-lg-block " id="CajaFiltro">

                    <div class="row">
                        <div class="col-12 text-center">
                            <h1>Filtrar</h1>
                        </div>
                        <form id="search-form">
                        <div class="col-12 p-4" id="#searchBarProv">
                            <h5>Filtro precio<h5>
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
                        <div class="col-12">
                            <h5>Marca</h5>
                            <select class="form-select" aria-label="Default select example">
                                <option selected></option>
                                <option value="1">LockStadia</option>
                                <option value="2">CreamSteam</option>
                                <option value="3">CleanWorld</option>
                                <option value="4">Natural Person</option>
                            </select>

                        </div>
                        <div class="col-12">
                            <br>
                            <h5>Estado</h5>
                            <select class="form-select" aria-label="Default select example">
                                <option selected></option>
                                <option value="1">En oferta</option>
                                <option value="2">Pre-ordenar</option>
                            </select>

                        </div>
                    </div>
                </div>

                <div class="col-12 col-xs-12 col-sm-12 col-lg-8 col-xl-8 col-xxl-8">
                    <div class="row p-4">
                    <div class="table-responsive">
                        <table class="table table-dark table-striped" id="tabla_pro">
                            <thead>

                                <tr>
                                    <th scope="col">Producto</th>
                                    <th scope="col">Precio</th>
                                    <th scope="col">Marca</th>
                                    <th scope="col">Categoria</th>
                                    <th scope="col">Estado</th>
                                    <th scope="col">Existencias</th>
                                    <th scope="col">Descripción</th>
                                    <th scope="col">Imagen</th>
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
//Se incluye la plantilla del encabezado para la página web
include("../../app/helpers/footer.php");
?>