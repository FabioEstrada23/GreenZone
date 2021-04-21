<?php
//Se incluye la plantilla del encabezado para la página web
include("../../app/helpers/header.php");
?>
<head>
    <link rel="stylesheet" type="text/css" href="../../resources/css/bitacora.css">
</head>
<section>
    <div class="container" id="bitacora">
        <div class="abs-center">
            <div class="col-12 col-xs-12 col-sm-12 col-lg-6 col-xl-6 p-4 col-xxl-6">
                <!-- Caja de bitacora-->
                <div class="row">
                    <div class="col-12 text-center" id="infoBitacora">
                        <h1>Gestión bitácora</h1>
                    </div>
                </div>
                <div class="row">
                    <!-- Tabla marca-->
                    <table class="table table-dark table-striped" id="tabla">
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">Acción realizada</th>
                                <th scope="col">Nombre del empleado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class='table-light'>
                                <th scope="row">1</th>
                                <td>Ingreso de datos en la tabla marca</td>
                                <td>Fabio Estrada</td>
                                </tr>
                                <tr class='table-light'>
                                <th scope="row">2</th>
                                <td>Actualización de datos en la tabla marca</td>
                                <td>Fabio Estrada</td>
                                </tr>
                                <tr class='table-light'>
                                <th scope="row">3</th>
                                <td>Eliminación de datos en la tabla marca</td>
                                <td>Fabio Estrada</td>
                                </tr>
                            </tbody>
                            </table>
                </div>
            </div>    
        </div>
    </div>
</section>

<br>

<?php
//Se incluye la plantilla del encabezado para la página web
include("../../app/helpers/footer.php");
?>