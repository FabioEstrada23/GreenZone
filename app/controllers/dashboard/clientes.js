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