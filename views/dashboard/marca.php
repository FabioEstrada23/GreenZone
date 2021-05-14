<?php
//Se incluye la plantilla del encabezado para la página web
include("../../app/helpers/private_header.php");
?>

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
                        <th scope="col">Número:</th>
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
                            <h5 class="modal-title" id="exampleModalLabel">Agregar marca</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="post" id="update-form">
                            <div class="mb-3">
                                <label for="marca" class="col-form-label">Nombre de marca:</label>
                                <input type="text" class="form-control" id="n-marca-up" name="n-marca-up">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                            </form>
                        </div>
                        
                    </div>
            </div> 

</main>



    <aside class="text-center text-lg-start" id="ptFooter">

        <div class="container p-4  text-center">

            <div class="row">
                <!-- Div para Informacion -->
                <div class="col-12 col-lg-6 col-md-12">
                    <h1>¿Quienes Somos?</h1>
                    <p>Green Zone, es una tienda en linea dedicada a la venta de productos ecoamigables, con el objetivo
                        de promover el uso de estos y combatir pasivamente la contaminacion de ciertos produtos</p>
                </div>
                <!-- Div para Contacto -->
                <div class="col-12 col-lg-3 col-md-6 ">
                    <div class="row">
                        <div class="col-12">
                            <h5 class="text-uppercase">Contactanos</h5>
                        </div>
                        <div class="col-4">
                            <i class="fas fa-phone fa-2x"></i>
                        </div>
                        <div class="col-4">
                            <i class="fab fa-whatsapp fa-2x"></i>
                        </div>
                        <div class="col-4">
                            <i class="fas fa-envelope fa-2x"></i>
                        </div>
                    </div>
                </div>
                <!-- Div para Redes Sociales -->
                <div class="col-12 col-lg-3 col-md-6 mb-4 mb-md-0 ">
                    <div class="row">
                        <div class="col-12">
                            <h5 class="text-uppercase">Nuestras Redes</h5>
                        </div>
                        <div class="col-6">
                            <i class="fab fa-instagram fa-2x"></i>
                        </div>
                        <div class="col-6">
                            <i class="fab fa-facebook-square fa-2x"></i>
                        </div>
                    </div>
                </div>

            </div>

        </div>

        <footer>
            <!-- Derechos Reservados -->
            <div class="text-center p-3" id="ptDerechos">
                @2021 Derechos Reservados:
                <a class="text-white" href="#">Green Zone </a>
            </div>
        </footer>

    </aside>

</div>

<!-- Agregamos SCRIPTS -->
<script src="https://kit.fontawesome.com/592eb2e9e3.js" crossorigin="anonymous"></script>
<script src="../../resources/js/bootstrap/bootstrap.min.js"></script>
<script src="../../resources/js/menu/menu.js"></script>
<script type="text/javascript" src="../../resources/js/sweetalert.min.js"></script>
<script type="text/javascript" src="../../app/helpers/components.js"></script>
<script type="text/javascript" src="../../app/controllers/dashboard/marca.js"></script>
</body>

</html>



