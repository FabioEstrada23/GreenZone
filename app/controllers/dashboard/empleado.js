// Constante para establecer la ruta y parámetros de comunicación con la API.
const API_EMPLEADOS = '../../app/api/dashboard/Empleado.php?action=';
const ENDPOINT_TIPOEMPLEADO = '../../app/api/dashboard/Empleado.php?action=readTipoEmpleado';
const ENDPOINT_TIPOESTADO = '../../app/api/dashboard/Empleado.php?action=readEstadoEmpleado';

// Método manejador de eventos que se ejecuta cuando el documento ha cargado.
document.addEventListener('DOMContentLoaded', function () {
    //Se llama a la funcion que obtiene los registros para llenar la tabla.
    fillSelect(ENDPOINT_TIPOEMPLEADO,'tipo_empleado',null)
    fillSelect(ENDPOINT_TIPOESTADO,'estado_emp',null)
    readRows(API_EMPLEADOS);
});

function fillTable(dataset) {
    let content = '';
    // Se recorre el conjunto de registros (dataset) fila por fila a través del objeto row.
    dataset.map(function (row) {

        // Se crean y concatenan las filas de la tabla con los datos de cada registro.
        content += `
            <tr>
                <td>${row.nombres_emp}</td>
                <td>${row.apellidos_emp}</td>
                <td>${row.correo_emp}</td>
                <td>${row.alias_emp}</td>
                <td>${row.clave_emp}</td>
                <td>${row.id_tipo_empleado}</td>
                <td>${row.id_estado_emp}</td>
                <td>
                    <a href="#" onclick="openUpdateDialog(${row.id_proveedor})" class="btn waves-effect blue tooltipped" data-tooltip="Actualizar" data-bs-toggle="modal" data-bs-target="#exampleModal" ><i class="material-icons">mode_edit</i></a>
                    <a href="#" onclick="openDeleteDialog(${row.id_proveedor})" class="btn waves-effect red tooltipped" data-tooltip="Eliminar"><i class="material-icons">delete</i></a>
                </td>
            </tr>
        `;
    });
    // Se agregan las filas al cuerpo de la tabla mediante su id para mostrar los registros.
    document.getElementById('tbody-rows').innerHTML = content;
}

document.getElementById('search-form').addEventListener('submit', function (event) {
    // Se evita recargar la página web después de enviar el formulario.
    event.preventDefault();
    // Se llama a la función que realiza la búsqueda. Se encuentra en el archivo components.js
    searchRows(API_EMPLEADOS, 'search-form');
});

// Método manejador de eventos que se ejecuta cuando se envía el formulario de guardar.
document.getElementById('save-form').addEventListener('submit', function (event) {
    // Se evita recargar la página web después de enviar el formulario.
    event.preventDefault();
    
    saveRow(API_EMPLEADOS, 'create', 'save-form', null);

    document.getElementById('save-form').reset();
});








