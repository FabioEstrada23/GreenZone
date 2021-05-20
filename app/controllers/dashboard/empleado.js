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
                <td>${row.tipo_empleado}</td>
                <td>${row.estado_emp}</td>
                <td>
                    <a href="#" onclick="openUpdateDialog(${row.id_empleado})" class="btn waves-effect blue tooltipped" data-tooltip="Actualizar" data-bs-toggle="modal" data-bs-target="#exampleModal" ><i class="material-icons">mode_edit</i></a>
                    <a href="#" onclick="openDeleteDialog(${row.id_empleado})" class="btn waves-effect red tooltipped" data-tooltip="Eliminar"><i class="material-icons">delete</i></a>
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
});

// Método manejador de eventos que se ejecuta cuando se envía el formulario de buscar.
document.getElementById('search-form').addEventListener('submit', function (event) {
    // Se evita recargar la página web después de enviar el formulario.
    event.preventDefault();
    // Se llama a la función que realiza la búsqueda. Se encuentra en el archivo components.js
    searchRows(API_EMPLEADOS, 'search-form');
});

function openUpdateDialog(id) {
    // Se define un objeto con los datos del registro seleccionado.
    const data = new FormData();
    data.append('id_empleado', id);

    fetch(API_EMPLEADOS + 'readOne', {
        method: 'post',
        body: data
    }).then(function (request) {
        // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
        if (request.ok) {
            request.json().then(function (response) {
                // Se comprueba si la respuesta es satisfactoria, de lo contrario se muestra un mensaje con la excepción.
                if (response.status) {
                    // Se inicializan los campos del formulario con los datos del registro seleccionado.
                    document.getElementById('id_empleado').value = response.dataset.id_empleado;
                    document.getElementById('nombres_emp2').value = response.dataset.nombres_emp;
                    document.getElementById('apellidos_emp2').value = response.dataset.apellidos_emp;
                    document.getElementById('correo_emp2').value = response.dataset.correo_emp;
                    document.getElementById('alias_emp2').value = response.dataset.alias_emp;
                    fillSelect(ENDPOINT_TIPOEMPLEADO, 'tipo_empleado2', response.dataset.id_tipo_empleado);
                    fillSelect(ENDPOINT_TIPOESTADO, 'estado_emp2', response.dataset.id_estado_emp);                    
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
    
    updateRow(API_EMPLEADOS, 'update', 'update-form', 'update-modal');
});

// Función para establecer el registro a eliminar y abrir una caja de dialogo de confirmación.
function openDeleteDialog(id) {
    // Se define un objeto con los datos del registro seleccionado.
    const data = new FormData();
    data.append('id_empleado', id);
    // Se llama a la función que elimina un registro. Se encuentra en el archivo components.js
    confirmDelete(API_EMPLEADOS, data);
}










