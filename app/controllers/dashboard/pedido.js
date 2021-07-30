const API_PEDIDO = '../../app/api/dashboard/pedido.php?action=';
const ENDPOINT_ESTADO = '../../app/api/dashboard/pedido.php?action=readEstados';


function fillTable(dataset) {
    let content = '';
    // Se recorre el conjunto de registros (dataset) fila por fila a través del objeto row.
    dataset.map(function (row) {

        // Se crean y concatenan las filas de la tabla con los datos de cada registro.
        content += `
            <tr>
                <td>${row.cliente_user}</td>
                <td>${row.fecha_pedido}</td>
                <td>${row.fecha_entrega}</td>
                <td>${row.estado_pedido}</td>
                <td>
                    <a href="#" onclick="openUpdateDialog(${row.id_pedido})" class="btn waves-effect blue tooltipped" data-tooltip="Actualizar" data-bs-toggle="modal" data-bs-target="#exampleModal" ><i class="material-icons">mode_edit</i></a>
                    <a href="../../app/reports/dashboard/productos_categoria.php?id=${row.id_categoria}" target="_blank" class="btn waves-effect amber tooltipped" data-tooltip="Reporte de pedido"><i class="material-icons">assignment</i></a>
                </td>
            </tr>
        `;
    });
    // Se agregan las filas al cuerpo de la tabla mediante su id para mostrar los registros.
    document.getElementById('tbody-rows').innerHTML = content;

}

document.addEventListener('DOMContentLoaded', function () {
    // Se llama a la función que obtiene los registros para llenar la tabla. Se encuentra en el archivo components.js
    
    readRows(API_PEDIDO);
});

document.getElementById('search-form').addEventListener('submit', function (event) {
    // Se evita recargar la página web después de enviar el formulario.
    event.preventDefault();
    // Se llama a la función que realiza la búsqueda. Se encuentra en el archivo components.js
    searchRows(API_PEDIDO, 'search-form');
});

function openUpdateDialog(id) {


    // Se asigna el título para la caja de dialogo (modal).
    document.getElementById('modal-title').textContent = 'Actualizar Oferta';


    // Se define un objeto con los datos del registro seleccionado.
    const data = new FormData();
    data.append('id_pedido', id);

    fetch(API_PEDIDO + 'readOnePedido', {
        method: 'post',
        body: data
    }).then(function (request) {
        // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
        if (request.ok) {
            request.json().then(function (response) {

                // Se comprueba si la respuesta es satisfactoria, de lo contrario se muestra un mensaje con la excepción.
                if (response.status) {
                    // Se inicializan los campos del formulario con los datos del registro seleccionado.
                    document.getElementById('id_pedido').value = response.dataset.id_pedido;
                    document.getElementById('fecha_pedido').value = response.dataset.fecha_pedido;
                    document.getElementById('fecha_entrega').value = response.dataset.fecha_entrega;
                    document.getElementById('cliente_user').value = response.dataset.cliente_user;
                    fillSelect(ENDPOINT_ESTADO, 'estado_pedido', response.dataset.id_estado_pedido);


                    fetch(API_PEDIDO + 'readOneDetalle', {
                        method: 'post',
                        body: data
                    }).then(function (request) {
                        // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
                        if (request.ok) {
                            request.json().then(function (response) {
                                // Se comprueba si la respuesta es satisfactoria, de lo contrario se muestra un mensaje con la excepción.
                                if (response.status) {
                                    // Se inicializan los campos del formulario con los datos del registro seleccionado.
                                    document.getElementById('id_detalle_pedido').value = response.dataset.id_detalle_pedido;
                                    document.getElementById('nombre_pro').value = response.dataset.nombre_pro;
                                    document.getElementById('cantidad').value = response.dataset.cantidad;

                                    fetch(API_PEDIDO + 'readPrecioTotal', {
                                        method: 'post',
                                        body: data
                                    }).then(function (request) {
                                        // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
                                        if (request.ok) {
                                            request.json().then(function (response) {
                                                // Se comprueba si la respuesta es satisfactoria, de lo contrario se muestra un mensaje con la excepción.
                                                if (response.status) {
                                                    // Se inicializan los campos del formulario con los datos del registro seleccionado.
                                                    document.getElementById('total').value = response.dataset.total;
                                                    
                                                    
                                                } else {
                                                    sweetAlert(2, response.exception, null);
                                                }
                                            });
                                        } else {
                                            console.log(request.status + ' ' + request.statusText);
                                        }
                                    }).catch(function (error) {
                                        console.log(error);
                                    });
                                    
                                } else {
                                    sweetAlert(2, response.exception, null);
                                }
                            });
                        } else {
                            console.log(request.status + ' ' + request.statusText);
                        }
                    }).catch(function (error) {
                        console.log(error);
                    });

                    
                } else {
                    sweetAlert(2, response.exception, null);
                }
            });
        } else {
            console.log(request.status + ' ' + request.statusText);
        }
    }).catch(function (error) {
        console.log(error);
    });
}

// Método manejador de eventos que se ejecuta cuando se envía el formulario de actualizar.
document.getElementById('update-form').addEventListener('submit', function (event) {
    // Se evita recargar la página web después de enviar el formulario.
    event.preventDefault();
    
    updateRow(API_PEDIDO, 'update', 'update-form', 'exampleModal');
});

