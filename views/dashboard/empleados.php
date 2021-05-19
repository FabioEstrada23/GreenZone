<?php
//Se incluye la plantilla del encabezado para la página web
require_once('../../app/helpers/dashboard_page.php');
include("../../app/helpers/header.php");
?>

    <main>
        <section>

            <div class="container">
                <div class="row">
                    <div class="col-12 col-xs-12 col-sm-12 col-lg-6 col-xl-6 p-4 col-xxl-6">
                        <!-- Fila de proveedores -->
                        <div class="row">
                            <div class="col-12 text-center" id="FormularioEmpleado">
                                <h1>Empleados</h1>
                            </div>
            
                            <!-- Proveedores Caja de Informacion -->
                            <div class="col-12">
                                <br>

                                <form id="save-form" method="post" enctype="multipart/form-data">
                                <div class="row" id="DatosEmpleado">
                                    <div class="row  p-3">
                                        <div class="col-3 text-center">
                                            <h6>Nombre</h6>
                                        </div>
                                        <div class="col-9">
                                            <input type="text" class="form-control"
                                                aria-label="Buscar" aria-describedby="basic-addon1" id="nombres_emp"
                                                type="text" name="nombres_emp" class="validate" required>
                                        </div>
            
                                    </div>

                                    <div class="row  p-3">
                                        <div class="col-3 text-center">
                                            <h6>Apellidos</h6>
                                        </div>
                                        <div class="col-9">
                                        <input type="text" class="form-control"
                                                aria-label="Buscar" aria-describedby="basic-addon1" id="apellidos_emp"
                                                type="text" name="apellidos_emp" class="validate" required>
                                        </div>
                                    </div>

                                    <div class="row  p-3">
                                        <div class="col-3 text-center">
            
                                            <h6>Correo</h6>
                                        </div>
                                        <div class="col-9">
                                        <input type="email" class="form-control"
                                                aria-label="Buscar" aria-describedby="basic-addon1" id="correo_emp"
                                                type="email" name="correo_emp" class="validate" required>
                                        </div>
                                    </div>

                                    <div class="row  p-3">
                                        <div class="col-3 text-center">
                                            <h6>Alias Empleado</h6>
                                        </div>
                                        <div class="col-9">
                                        <input type="text" class="form-control"
                                                aria-label="Buscar" aria-describedby="basic-addon1" id="alias_emp"
                                                type="text" name="alias_emp" class="validate" required>
                                        </div>
                                    </div>

                                    <div class="row  p-3">
                                        <div class="col-3 text-center">
            
                                            <h6>Contraseña</h6>
                                        </div>
                                        <div class="col-9">
                                        <input type="password" class="form-control"
                                                aria-label="Buscar" aria-describedby="basic-addon1" id="clave_emp"
                                                type="password" name="clave_emp" class="validate" required>
                                        </div>
                                    </div>

                                    <div class="row  p-3">
                                        <div class="col-3 text-center">
            
                                            <h6>tipo empleado</h6>
                                        </div>
                                        <div class="col-9">
                                            <select class="form-select" aria-label="Default select example">
                                                <option selected></option>
                                                <option value="1">Tecnico</option>
                                                <option value="2">Supervisor</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row  p-3">
                                        <div class="col-3 text-center">
            
                                            <h6>estado emp</h6>
                                        </div>
                                        <div class="col-9">
                                            <select class="form-select" aria-label="Default select example">
                                                <option selected></option>
                                                <option value="1">Inactivo</option>
                                                <option value="2">Activo</option>
                                            </select>
                
                                        </div>
                                    </div>
                                </div>
            
                                <!-- Controladores de Proveedor -->
                                <br>
                                <div class="row text-center" id="ControladorEmpleados">
                                    <div class="col-12">
                                        <button type="button" class="btn btn-light">Agregar +</button>
                                    </div>            
                                </div>
                                </form>
                            </div>
                        </div>
            
                    </div>
            
                    <div class="col-12 col-xs-12 col-sm-12 col-lg-6 col-xl-6 p-4 col-xxl-6">
            
                        <div class="row">
                            <div class="col-12 text-center" id="RegisEmpleados">
                                <h1>Registros</h1>
                            </div>
            
                            <div class="col-12 p-4" id="#searchBarEmp">
                                <div class="DiseBuscador">
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
                                                <th scope="col">Apellidos</th>
                                                <th scope="col">Correo</th>
                                                <th scope="col">Alias</th>
                                                <th scope="col">Clave</th>
                                                <th scope="col">Tipo emp</th>
                                                <th scope="col">Estado_emp</th>
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
    
    </main>

<?php
// Se imprime la plantilla del pie enviando el nombre del controlador para la página web.
Dashboard_Page::footerTemplate('empleado.js');
?>




    