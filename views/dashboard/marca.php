<?php
//Se incluye la plantilla del encabezado para la página web
include("../../app/helpers/header.php");
?>
<!--==========================
=            html            =
===========================-->
<head>
    <!-- Codificacion de caracteres -->
    <meta charset="UTF-8">
    <!-- Espacio para agregar los LINK -->
    <!-- Iconos de Google -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- CSS Bootstrap -->
    <link rel="stylesheet" type="text/css" href="../../resources/css/bootstrap.min.css">
    <!-- Agregamos CSS Style -->
    <link rel="stylesheet" href="../../resources/css/marca_style.css">
    <!-- Vista de Compatibilidad -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Optimizacion en equipos pequeñes -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Descripcion de nuestro sitio web -->
    <meta name="description" content="Green Zone, es una tienda en linea dedicada a la venta de productos ecoamigables, con el objetivo de promover el uso de estos y combatir pasivamente la contaminacion de ciertos produtos">
    <!-- Palabras claves de nuestro sitio web -->
    <meta name="keywords" content="Ecologico, Ambiente, Reciclaje, Tienda, Productos, Tienda en linea, Productos ecoamigables">
    <!-- Autor del sitio web -->
    <meta name="author" content="Green Zone Team">
    <!-- Copyright -->
    <meta name="copyright" content="Green Zone Team 2021">
    <!-- Titulo de nuestro Sitio Web -->
    <title>Green Zone Store</title>
</head>

<section class="section">
    <div class="brand">
            <!-- Ingreso de nombre marca -->
            <label for="name-brand">Nombre de marca:</label>
            <input type="text" class="form-control" placeholder="Ingresa el nombre de la marca" aria-label="Ingresa el nombre de la marca" aria-describedby="basic-addon1">
            <div>
                <button type="button" class="button-cover-page">
                    <i class="far fa-save"></i> Guardar
                </button>
                <button type="button" class="button-cover-page">
                    <i class="far fa-edit"></i> Actualizar
                </button>
            </div>
            <br>
   <table class="table table-light table-hover">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Nombre de marca</th>
        </tr>
    </thead>
    <tbody>
        <tr>
        <th scope="row">1</th>
        <td>HealthyPC</td>
        </tr>
        <tr>
        <th scope="row">2</th>
        <td>DR Green</td>
        </tr>
        <tr>
        <th scope="row">3</th>
        <td colspan="2">DrassanVI</td>
        </tr>
    </tbody>
    </table>
    </div>
</section>

<br>


<?php
//Se incluye la plantilla del encabezado para la página web
include("../../app/helpers/footer.php");
?>

