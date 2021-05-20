const API_CLIENTES = '../../app/api/dashboard/clientes.php?action=';
const ENDPOINT_ESTADO = '../../app/api/dashboard/clientes.php?action=readEstados';
const ENDPOINT_CIUDAD = '../../app/api/dashboard/clientes.php?action=readCiudades';

function fillTable(dataset) {
    let content = '';
    // Se recorre el conjunto de registros (dataset) fila por fila a través del objeto row.
    dataset.map(function (row) {

        // Se crean y concatenan las filas de la tabla con los datos de cada registro.
        content += `
            <tr>
                <td>${row.cliente_user}</td>
                <td>${row.dui_cli}</td>
                <td>${row.nombres_cli}</td>
                <td>${row.apellidos_cli}</td>
                <td>${row.direccion_cli}</td>
                <td>${row.ciudad}</td>
                <td>${row.fecha_nac_cli}</td>
                <td>${row.genero}</td>
                <td>${row.estado_cli}</td>
                <td>${row.precio_anterior}</td>

                <td>
                    <a href="#" onclick="openUpdateDialog(${row.id_cliente_user})" class="btn waves-effect blue tooltipped" data-tooltip="Actualizar" data-bs-toggle="modal" data-bs-target="#exampleModal" ><i class="material-icons">mode_edit</i></a>
                    <a href="#" onclick="openDeleteDialog(${row.id_cliente_user})" class="btn waves-effect red tooltipped" data-tooltip="Eliminar"><i class="material-icons">delete</i></a>
                </td>
            </tr>
        `;
    });
    // Se agregan las filas al cuerpo de la tabla mediante su id para mostrar los registros.
    document.getElementById('tbody-rows').innerHTML = content;

}

document.addEventListener('DOMContentLoaded', function () {
    // Se llama a la función que obtiene los registros para llenar la tabla. Se encuentra en el archivo components.js
    fillSelect(ENDPOINT_ESTADO, 'estado_cli', null);
    fillSelect(ENDPOINT_CIUDAD, 'ciudad', null);
    readRows(API_CLIENTES);
});

document.getElementById('search-form').addEventListener('submit', function (event) {
    // Se evita recargar la página web después de enviar el formulario.
    event.preventDefault();
    // Se llama a la función que realiza la búsqueda. Se encuentra en el archivo components.js
    searchRows(API_CLIENTES, 'search-form');
});


function openUpdateDialog(id) {
    // Se restauran los elementos del formulario.
    document.getElementById('update-form').reset();
    // Se abre la caja de dialogo (modal) que contiene el formulario.

    // Se asigna el título para la caja de dialogo (modal).
    document.getElementById('modal-title').textContent = 'Actualizar Oferta';


    // Se define un objeto con los datos del registro seleccionado.
    const data = new FormData();
    data.append('id_cliente_user', id);

    fetch(API_CLIENTES + 'readOne', {
        method: 'post',
        body: data
    }).then(function (request) {
        // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
        if (request.ok) {
            request.json().then(function (response) {
                // Se comprueba si la respuesta es satisfactoria, de lo contrario se muestra un mensaje con la excepción.
                if (response.status) {
                    // Se inicializan los campos del formulario con los datos del registro seleccionado.
                    document.getElementById('id_cliente_user').value = response.dataset.id_cliente_user;
                    fillSelect(ENDPOINT_ESTADO, 'estado_cli', null);
                    fillSelect(ENDPOINT_CIUDAD, 'ciudad', null);
                    document.getElementById('dui_cli').value = response.dataset.dui_cli;
                    document.getElementById('nombres_cli').value = response.dataset.nombres_cli;
                    document.getElementById('apellidos_cli').value = response.dataset.apellidos_cli;
                    document.getElementById('fecha_nac_cli').value = response.dataset.fecha_nac_cli;
                    document.getElementById('codigo_pos_cli').value = response.dataset.codigo_pos_cli;
                    document.getElementById('genero').value = response.dataset.genero;
                    
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
