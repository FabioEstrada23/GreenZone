const API_PEDIDO = '../../app/api/dashboard/pedido.php?action=';
const ENDPOINT_ESTADO = '../../app/api/dashboard/pedido.php?action=readEstados';


function fillTable(dataset) {
    let content = '';
    // Se recorre el conjunto de registros (dataset) fila por fila a través del objeto row.
    dataset.map(function (row) {

        // Se crean y concatenan las filas de la tabla con los datos de cada registro.
        content += `
            <tr>
                <td>${row.id_pedido}</td>
                <td>${row.fecha_pedido}</td>
                <td>${row.id_estado_pedido}</td>
                <td>
                    <a href="#" onclick="openUpdateDialog(${row.id_pedido})" class="btn waves-effect blue tooltipped" data-tooltip="Actualizar" data-bs-toggle="modal" data-bs-target="#exampleModal" ><i class="material-icons">mode_edit</i></a>
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




