<?php
//Se incluye la plantilla del encabezado para la página web
require_once('../../app/helpers/dashboard_page.php');
// Se imprime la plantilla del encabezado enviando el título de la página web.
Dashboard_Page::headerTemplate('Gestión de marcas');
?>
<br>
<br>
<br>
<br>
<section>
    <div id="contenedor-bit">
    <div id="box" class="row">
        <div class="col-12 text-center" id="titleM">
            <h1 id="titleBt">Gestión de marca</h1>
        </div>
    </div>
    <!-- Creacion del buscador -->
    <div class="mx-auto" class="col-sm-12 col-md-12 col-lg-12 col-xl-8 offset-xl-1">
        <div class="row">
            <div class="p-4" id="searchBarMarca">
                
                    <form method="post" id="search-form">
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
                    <button type="button" class="btn" data-bs-toggle="modal" id="create"
                                data-bs-target="#save-modal">
                                <i class="material-icons">add_circle</i>
                    </button>
                    </form>
                    
                
                     
            </div> 
            <div class="modal fade" id="save-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Agregar marca</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="post" id="save-form">
                            <div class="mb-3">
                                <label for="marca" class="col-form-label">Nombre de marca:</label>
                                <input type="text" class="form-control" id="n-marca" name="n-marca">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                            </form>
                        </div>
                        
                    </div>
            </div> 
        </div>
    </div>
    <div class="col-12 p- text-center">
        <div class="table-responsive" id="tabla">
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        
                        <th scope="col">Nombre de marca:</th>
                        <th class="actions-column">Acciones:</th>
                    </tr>
                </thead>

                        <tbody id="tbody-rows">

                </tbody>
            </table>
        </div>
    </div>   
</div>
<div class="modal fade" id="update-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Actualizar marca</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="post" id="update-form">
                            
                                
                                <input type="text" class="form-control d-none" id="id_marca" name="id_marca">
                            
                            <div class="mb-3">
                                <label for="marca" class="col-form-label">Nombre de marca:</label>
                                <input type="text" class="form-control" id="n-marca-up" name="n-marca-up">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary">Guardar cambios</button>
                            </div>
                            </form>
                        </div>
                        
                    </div>
            </div> 
</section>

<script type="text/javascript" src="../../resources/js/chart.js"></script>
<?php
// Se imprime la plantilla del pie enviando el nombre del controlador para la página web.
Dashboard_Page::footerTemplate('marca.js');
?>



