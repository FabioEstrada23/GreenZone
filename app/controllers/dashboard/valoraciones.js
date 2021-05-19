// Constante para establecer la ruta y parámetros de comunicación con la API.
const API_VAL = '../../app/api/dashboard/valoraciones.php?action=';

document.addEventListener('DOMContentLoaded', function () {
    // Se llama a la función que obtiene los registros para llenar la tabla. Se encuentra en el archivo components.js
    readRows(API_VAL);
});

function fillTable(dataset) {
    let content = '';
    // Se recorre el conjunto de registros (dataset) fila por fila a través del objeto row.
    dataset.map(function (row) {

        // Se crean y concatenan las filas de la tabla con los datos de cada registro.
        content += `
            <tr>
                
                <td>${row.cliente_user}</td>
                <td>${row.nombre_pro}</td>
                <td>${row.puntuaciones}</td>
                <td>${row.comentario}</td>
                <td>
                    
                    <a href="#" onclick="openDeleteDialog(${row.id_valoracion})" class="btn waves-effect red tooltipped" data-tooltip="Eliminar"><i class="material-icons">delete</i></a>
                </td>
            </tr>
        `;
    });
    // Se agregan las filas al cuerpo de la tabla mediante su id para mostrar los registros.
    document.getElementById('tabla-val').innerHTML = content;

}

document.getElementById('search-form').addEventListener('submit', function (event) {
    // Se evita recargar la página web después de enviar el formulario.
    event.preventDefault();
    // Se llama a la función que realiza la búsqueda. Se encuentra en el archivo components.js
    searchRows(API_VAL, 'search-form');
});

// Función para establecer el registro a eliminar y abrir una caja de dialogo de confirmación.
function openDeleteDialog(id) {
    // Se define un objeto con los datos del registro seleccionado.
    const data = new FormData();
    data.append('id_valoracion', id);

    // Se llama a la función que elimina un registro. Se encuentra en el archivo components.js
    confirmDelete(API_VAL, data);
}
