// Constante para establecer la ruta y parámetros de comunicación con la API.
const API_CATALOGO = '../../app/api/public/catalogo.php?action=';

// Método manejador de eventos que se ejecuta cuando el documento ha cargado.
document.addEventListener('DOMContentLoaded', function () {
    // Se busca en la URL las variables (parámetros) disponibles.
    let params = new URLSearchParams(location.search);
    // Se obtienen los datos localizados por medio de las variables.
    const ID = params.get('id');
    const NAME = params.get('nombre');
    // Se llama a la función que muestra los productos de la categoría seleccionada previamente.
    readProductosCategoria(ID, NAME);
});

// Función para obtener y mostrar los productos de acuerdo a la categoría seleccionada.
function readProductosCategoria(id, categoria) {
    // Se define un objeto con los datos del registro seleccionado.
    const data = new FormData();
    data.append('id_categoria', id);

    fetch(API_CATALOGO + 'readProductosCategoria', {
        method: 'post',
        body: data
    }).then(function (request) {
        // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
        if (request.ok) {
            request.json().then(function (response) {
                // Se comprueba si la respuesta es satisfactoria, de lo contrario se muestra un mensaje con la excepción.
                if (response.status) {
                    let content = '';
                    // Se recorre el conjunto de registros devuelto por la API (dataset) fila por fila a través del objeto row.
                    response.dataset.map(function (row) {
                        // Se crean y concatenan las tarjetas con los datos de cada producto.
                        content += `
                        <div class="col-12 col-xs-12 col-sm-6 col-lg-6 col-xl-4 col-xxl-4">
                        <div class="box p-2">
                            <!-- caja de imagenes -->
                            <div class="slider-img">
                                <img src="../../resources/img/productos/${row.imagen}.jpg"
                                    alt="1">
                                <!-- overlay -->
                                <div class="overlay">
                                    <!-- comprar-btn -->
                                    <a href="detalle.php?id=${row.id_producto}" class="buy-btn">Compralo</a>
                                </div>
                            </div>
                            <!-- detalles del producto -->
                            <div class="detail-box">
                                <!-- tipo -->
                                <div class="type">
                                    <a href="">${row.nombre_pro}</a>
                                    <span>Disponible</span>
                                </div>
                                <!-- Precio -->
                                <a href="#" class="price">${row.precio_pro}</a>
                            </div>
                        </div>
                    </div>
                        `;
                    });
                    // Se asigna como título la categoría de los productos.
                    document.getElementById('title').textContent = 'Categoría: ' + categoria;
                    // Se agregan las tarjetas a la etiqueta div mediante su id para mostrar los productos.
                    document.getElementById('productos').innerHTML = content;
                } else {
                    // Se presenta un mensaje de error cuando no existen datos para mostrar.
                    document.getElementById('title').innerHTML = `<i class="material-icons small">cloud_off</i><span class="red-text">${response.exception}</span>`;
                }
            });
        } else {
            console.log(request.status + ' ' + request.statusText);
        }
    }).catch(function (error) {
        console.log(error);
    });
}