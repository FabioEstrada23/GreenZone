<?php
//Se incluye la plantilla del encabezado para la página web
require_once('../../app/helpers/dashboard_page.php');
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

                        <form id="save-form" method="post" enctype="multipart/form-data">
                            <div class="row" id="proveedorCaja">
                                <div class="row  p-3">
                                    <div class="col-3 text-center">
                                        <h6>Nombre</h6>
                                    </div>
                                    <div class="col-9">
                                        <input type="text" class="form-control" placeholder="Ej: MalteHC..."
                                            aria-label="Buscar" aria-describedby="basic-addon1" id="nombre_prov"
                                            type="text" name="nombre_prov" class="validate" required>
                                    </div>

                                </div>

                                <div class="row  p-3">
                                    <div class="col-3 text-center">

                                        <h6>Direccion</h6>
                                    </div>
                                    <div class="col-9">
                                        <input type="text" class="form-control"
                                            placeholder="Ej: Finca Don Pedro, pasaje Jocote..." aria-label="Buscar"
                                            aria-describedby="basic-addon1" id="direccion_prov" type="text"
                                            name="direccion_prov" class="validate" required>
                                    </div>
                                </div>

                                <div class="row  p-3">
                                    <div class="col-3 text-center">

                                        <h6>Correo</h6>
                                    </div>
                                    <div class="col-9">
                                        <input type="text" class="form-control" placeholder="Ej: fulanito@gmail.com..."
                                            aria-label="Buscar" aria-describedby="basic-addon1" id="correo_prov"
                                            type="text" name="correo_prov" class="validate" required>
                                    </div>
                                </div>
                                <div class="row  p-3">
                                    <div class="col-3 text-center">

                                        <h6>Telefono</h6>
                                    </div>
                                    <div class="col-9">
                                        <input type="text" class="form-control"
                                            placeholder="Ej: Finca Don Pedro, pasaje Jocote..." aria-label="Buscar"
                                            aria-describedby="basic-addon1" id="telefono_prov" type="text"
                                            name="telefono_prov" class="validate" required>
                                    </div>
                                </div>

                            </div>


                            <!-- Controladores de Proveedor -->
                            <br>
                            <div class="row text-center" id="controladorProvCaja">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-light" id="btaProveedores"
                                        data-tooltip="Crear">Agregar +</button>
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
                                    <label for="formGroupExampleInput">ID:</label>
                                    <input type="text" class="form-control " placeholder="Ej: MalteHC..."
                                        aria-label="Buscar" aria-describedby="basic-addon1" id="id_proveedor" type="text"
                                        name="id_proveedor" class="validate" required>
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput">Nombre:</label>
                                    <input type="text" class="form-control" placeholder="Ej: MalteHC..."
                                        aria-label="Buscar" aria-describedby="basic-addon1" id="nombre_prov2" type="text"
                                        name="nombre_prov" class="validate" required>
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput2">Direccion:</label>
                                    <input type="text" class="form-control"
                                        placeholder="Ej: Finca Don Pedro, pasaje Jocote..." aria-label="Buscar"
                                        aria-describedby="basic-addon1" id="direccion_prov2" type="text"
                                        name="direccion_prov" class="validate" required>
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput3">Correo:</label>
                                    <input type="text" class="form-control" placeholder="Ej: fulanito@gmail.com..."
                                        aria-label="Buscar" aria-describedby="basic-addon1" id="correo_prov2" type="text"
                                        name="correo_prov" class="validate" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Telefono:</label>
                                    <input type="text" class="form-control" placeholder="Ej: XXXX-XXXX"
                                        aria-label="Telefono" aria-describedby="basic-addon1" id="telefono_prov2"
                                        type="text" name="telefono_prov" class="validate" required>
                                </div>

                        </div>
                        


                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" data-tooltip="Actualizar" class="btn btn-primary" >Guardar Cambios</button>
                        </div>
                    </form>
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
                                    <input type="text" class="form-control" placeholder="Buscar" aria-label="Buscar"
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

                        <div class="col-12 p- text-center">
                            <div class="table-responsive">
                                <table class="table table-dark table-striped">
                                    <thead>

                                        <tr>
                                            <th scope="col">Nombre</th>
                                            <th scope="col">Direccion</th>
                                            <th scope="col">Correo</th>
                                            <th scope="col">Telefono</th>
                                            <th class="actions-column">Acciones</th>
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
<br>

<?php
// Se imprime la plantilla del pie enviando el nombre del controlador para la página web.
Dashboard_Page::footerTemplate('proveedores.js');
?>