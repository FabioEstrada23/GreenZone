<?php
//Se incluye la plantilla del encabezado para la página web
require_once('../../app/helpers/dashboard_page.php');
include("../../app/helpers/private_header.php");
?>

<br>
<br>
<br>
<br>
<div class="container">

    <div class="row">
    
    
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
                                        aria-label="Buscar" aria-describedby="basic-addon1" id="id_cliente_user" 
                                        name="id_cliente_user" class="validate" required>
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput">Usuario:</label>
                                    <input type="text" class="form-control" placeholder="Ej: MalteHC..."
                                        aria-label="Buscar" aria-describedby="basic-addon1" id="cliente_user" 
                                        name="cliente_user" class="validate" required>
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput2">Dui:</label>
                                    <input type="text" class="form-control"
                                        placeholder="XXXXXXXXX-X" aria-label="Buscar"
                                        aria-describedby="basic-addon1" id="dui_cli"
                                        name="dui_cli" class="validate" required>
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput3">Nombres:</label>
                                    <input type="text" class="form-control" placeholder="Fernando Jose..."
                                        aria-label="Buscar" aria-describedby="basic-addon1" id="nombres_cli" 
                                        name="nombres_cli" class="validate" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Apellidos:</label>
                                    <input type="text" class="form-control" placeholder="Aquino Valle..."
                                        aria-label="Telefono" aria-describedby="basic-addon1" id="apellidos_cli"
                                        name="apellidos_cli" class="validate" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Direccion:</label>
                                    <input type="text" class="form-control" placeholder="Ej: Av. 12 solorzano"
                                        aria-label="Telefono" aria-describedby="basic-addon1" id="direccion_cli"
                                        name="direccion_cli" class="validate" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Ciudad:</label>
                                    <select class="form-select" aria-label="Select" name="ciudad" id="ciudad"></select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Fecha Nacimiento:</label>
                                    <input type="text" class="form-control" placeholder="YYYY-MM-DD"
                                        aria-label="Telefono" aria-describedby="basic-addon1" id="fecha_nac_cli"
                                        name="fecha_nac_cli" class="validate" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Genero:</label>
                                    <input type="text" class="form-control" placeholder="Ej: F o M"
                                        aria-label="Telefono" aria-describedby="basic-addon1" id="genero"
                                        name="genero" class="validate" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Estado:</label>
                                    <select class="form-select" aria-label="Select" name="estado_cli" id="estado_cli"></select>
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





                <div class="col-12 col-xs-12 col-sm-12 col-lg-12 col-xl-12 p-12 col-xxl-12">

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
                                <table class="table table-dark table-striped" id="tabla">
                                    <thead>
                                        <tr>
                                            <th scope="col">Usuario</th>
                                            <th scope="col">DUI</th>
                                            <th scope="col">Nombres</th>
                                            <th scope="col">Apellidos</th>
                                            <th scope="col">Direccion</th>
                                            <th scope="col">Ciudad</th>
                                            <th scope="col">Fecha nacimiento</th>
                                            <th scope="col">Genero</th>
                                            <th scope="col">Estado</th>
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

<?php
// Se imprime la plantilla del pie enviando el nombre del controlador para la página web.
Dashboard_Page::footerTemplate('clientes.js');
?>

