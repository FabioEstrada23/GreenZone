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
                        <div class="col-12">
                            <h5>Precio</h5>
                            <input type="range" class="form-range" id="customRange1">
                        </div>
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
                        <!-- Texto de arriba -->
                        <div class="col-12">
                            <h2>Resultados de Busqueda...</h2>
                        </div>

                        <div class="col-12">
                            
                        </div>
                    </div>
                </div>


            </div>
        </div>




<?php
//Se incluye la plantilla del encabezado para la página web
include("../../app/helpers/footer.php");
?>