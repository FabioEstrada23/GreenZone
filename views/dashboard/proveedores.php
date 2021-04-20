<?php
//Se incluye la plantilla del encabezado para la página web
include("../../app/helpers/header.php");

?>


<section>

<div class="container">
    <div class="row">
        <div class="col-12 col-xs-12 col-sm-12 col-lg-6 col-xl-6 p-4 col-xxl-6">
            <!-- Fila de proveedores -->
            <div class="row">
                <div class="col-12 text-center" id="infoProveedor">
                    <h1>Proveedores</h1>
                </div>

                <!-- Proveedores Caja de Informacion -->
                <div class="col-12">
                    <br>
                    <div class="row" id="proveedorCaja">
                        <div class="row  p-3">
                            <div class="col-3 text-center">
                                <h6>Nombre</h6>
                            </div>
                            <div class="col-9">
                                <input type="text" class="form-control" placeholder="Ej: MalteHC..."
                                    aria-label="Buscar" aria-describedby="basic-addon1">
                            </div>

                        </div>

                        <div class="row  p-3">
                            <div class="col-3 text-center">

                                <h6>Direccion</h6>
                            </div>
                            <div class="col-9">
                                <input type="text" class="form-control"
                                    placeholder="Ej: Finca Don Pedro, pasaje Jocote..." aria-label="Buscar"
                                    aria-describedby="basic-addon1">
                            </div>
                        </div>

                        <div class="row  p-3">
                            <div class="col-3 text-center">

                                <h6>Correo</h6>
                            </div>
                            <div class="col-9">
                                <input type="text" class="form-control"
                                    placeholder="Ej: fulanito@gmail.com..." aria-label="Buscar"
                                    aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <div class="row  p-3">
                            <div class="col-3 text-center">

                                <h6>Telefono</h6>
                            </div>
                            <div class="col-9">
                                <input type="text" class="form-control"
                                    placeholder="Ej: Finca Don Pedro, pasaje Jocote..." aria-label="Buscar"
                                    aria-describedby="basic-addon1">
                            </div>
                        </div>

                    </div>

                    <!-- Controladores de Proveedor -->
                    <br>
                    <div class="row text-center" id="controladorProvCaja">
                        <div class="col-4">
                            <button type="button" class="btn btn-light">Agregar +</button>
                        </div>

                        <div class="col-4">
                            <button type="button" class="btn btn-light">Eliminar -</button>
                        </div>

                        <div class="col-4">
                            <button type="button" class="btn btn-light">Actualizar º</button>
                        </div>

                    </div>
                </div>
            </div>

        </div>

        <div class="col-12 col-xs-12 col-sm-12 col-lg-6 col-xl-6 p-4 col-xxl-6">

            <div class="row">
                <div class="col-12 text-center" id="regProveedor">
                    <h1>Registros</h1>
                </div>

                <div class="col-12 p-4" id="#searchBarProv">
                    <div class="ordenar">
                        <input type="text" class="form-control" placeholder="Buscar" aria-label="Buscar"
                            aria-describedby="basic-addon1">
                        <!-- Boton de buscar -->
                        <button class="btn" type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" fill="Black"
                                class="bi bi-search" viewBox="0 0 16 16">
                                <path
                                    d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                            </svg>
                        </button>
                    </div>

                </div>

                <div class="col-12 p- text-center">
                    <div class="table-responsive">
                        <table class="table table-dark table-striped">
                            <thead>

                                <tr>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Direccion</th>
                                    <th scope="col">Correo</th>
                                    <th scope="col">Telefono</th>
                                    <th scope="col"></th>
                                </tr>

                            </thead>

                            <tbody>

                                <tr class="table-light">
                                    <th scope="row">Fernando</th>
                                    <td>Mi Casita</td>
                                    <td>fernatoolsgamer@gmail.com</td>
                                    <td>6307-2771</td>
                                    <td><a href=""><i class="fas fa-edit"></i></a></td>
                                </tr>

                                <tr class="table-light">
                                    <th scope="row">Fernando</th>
                                    <td>Mi Casita</td>
                                    <td>fernatoolsgamer@gmail.com</td>
                                    <td>6307-2771</td>
                                    <td><a href=""><i class="fas fa-edit"></i></a></td>
                                </tr>

                                <tr class="table-light">
                                    <th scope="row">Fernando</th>
                                    <td>Mi Casita</td>
                                    <td>fernatoolsgamer@gmail.com</td>
                                    <td>6307-2771</td>
                                    <td><a href=""><i class="fas fa-edit"></i></a></td>
                                </tr>

                                <tr class="table-light">
                                    <th scope="row">Fernando</th>
                                    <td>Mi Casita</td>
                                    <td>fernatoolsgamer@gmail.com</td>
                                    <td>6307-2771</td>
                                    <td><a href=""><i class="fas fa-edit"></i></a></td>
                                </tr>

                                <tr class="table-light">
                                    <th scope="row">Fernando</th>
                                    <td>Mi Casita</td>
                                    <td>fernatoolsgamer@gmail.com</td>
                                    <td>6307-2771</td>
                                    <td><a href=""><i class="fas fa-edit"></i></a></td>
                                </tr>

                                <tr class="table-light">
                                    <th scope="row">Fernando</th>
                                    <td>Mi Casita</td>
                                    <td>fernatoolsgamer@gmail.com</td>
                                    <td>6307-2771</td>
                                    <td><a href=""><i class="fas fa-edit"></i></a></td>
                                </tr>

                                <tr class="table-light">
                                    <th scope="row">Fernando</th>
                                    <td>Mi Casita</td>
                                    <td>fernatoolsgamer@gmail.com</td>
                                    <td>6307-2771</td>
                                    <td><a href=""><i class="fas fa-edit"></i></a></td>
                                </tr>
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
//Se incluye la plantilla del encabezado para la página web
include("../../app/helpers/footer.php");
?>