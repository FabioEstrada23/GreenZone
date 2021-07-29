const API_PROVEEDOR = '../../app/api/dashboard/proveedores.php?action=';
const ENDPOINT_PROVEEDORES = '../../app/api/dashboard/proveedores.php?action=readAll';

function fillTable(dataset) {
    let content = '';
    // Se recorre el conjunto de registros (dataset) fila por fila a través del objeto row.
    dataset.map(function (row) {

        // Se crean y concatenan las filas de la tabla con los datos de cada registro.
        content += `
            <tr>
                <td>${row.nombre_prov}</td>
                <td>${row.direccion_prov}</td>
                <td>${row.correo_prov}</td>
                <td>${row.telefono_prov}</td>
                <td>
                    <a href="#" onclick="openUpdateDialog(${row.id_proveedor})" class="btn waves-effect blue tooltipped" data-tooltip="Actualizar" data-bs-toggle="modal" data-bs-target="#exampleModal" ><i class="material-icons">mode_edit</i></a>
                    <a href="#" onclick="openDeleteDialog(${row.id_proveedor})" class="btn waves-effect red tooltipped" data-tooltip="Eliminar"><i class="material-icons">delete</i></a>
                    <a href="../../app/reports/dashboard/productos_proveedor.php?id=${row.id_proveedor}" target="_blank" class="btn waves-effect amber tooltipped" data-tooltip="Reporte de productos"><i class="material-icons">assignment</i></a>
                </td>
            </tr>
        `;
    });
    // Se agregan las filas al cuerpo de la tabla mediante su id para mostrar los registros.
    document.getElementById('tbody-rows').innerHTML = content;

}

document.addEventListener('DOMContentLoaded', function () {
    // Se llama a la función que obtiene los registros para llenar la tabla. Se encuentra en el archivo components.js
    readRows(API_PROVEEDOR);
});



document.getElementById('search-form').addEventListener('submit', function (event) {
    // Se evita recargar la página web después de enviar el formulario.
    event.preventDefault();
    // Se llama a la función que realiza la búsqueda. Se encuentra en el archivo components.js
    searchRows(API_PROVEEDOR, 'search-form');
});

function openCreateDialog() {
    // Se restauran los elementos del formulario.
    document.getElementById('save-form').reset();
    
    // Se llama a la función que llena el select del formulario. Se encuentra en el archivo components.js
    
}

function openUpdateDialog(id) {
    // Se restauran los elementos del formulario.
    document.getElementById('save-form').reset();
    // Se abre la caja de dialogo (modal) que contiene el formulario.

    // Se asigna el título para la caja de dialogo (modal).
    document.getElementById('modal-title').textContent = 'Actualizar Proveedor';


    // Se define un objeto con los datos del registro seleccionado.
    const data = new FormData();
    data.append('id_proveedor', id);

    fetch(API_PROVEEDOR + 'readOne', {
        method: 'post',
        body: data
    }).then(function (request) {
        // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
        if (request.ok) {
            request.json().then(function (response) {
                // Se comprueba si la respuesta es satisfactoria, de lo contrario se muestra un mensaje con la excepción.
                if (response.status) {
                    // Se inicializan los campos del formulario con los datos del registro seleccionado.
                    document.getElementById('id_proveedor').value = response.dataset.id_proveedor;
                    document.getElementById('nombre_prov2').value = response.dataset.nombre_prov;
                    document.getElementById('direccion_prov2').value = response.dataset.direccion_prov;
                    document.getElementById('correo_prov2').value = response.dataset.correo_prov;
                    document.getElementById('telefono_prov2').value = response.dataset.telefono_prov;
                    
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

// Método manejador de eventos que se ejecuta cuando se envía el formulario de guardar.
document.getElementById('save-form').addEventListener('submit', function (event) {
    // Se evita recargar la página web después de enviar el formulario.
    event.preventDefault();
    
    saveRow(API_PROVEEDOR, 'create', 'save-form', null);
    document.getElementById('save-form').reset();
});


// Método manejador de eventos que se ejecuta cuando se envía el formulario de actualizar.
document.getElementById('update-form').addEventListener('submit', function (event) {
    // Se evita recargar la página web después de enviar el formulario.
    event.preventDefault();
    
    updateRow(API_PROVEEDOR, 'update', 'update-form', 'exampleModal');
});





// Función para establecer el registro a eliminar y abrir una caja de dialogo de confirmación.
function openDeleteDialog(id) {
    // Se define un objeto con los datos del registro seleccionado.
    const data = new FormData();
    data.append('id_proveedor', id);
    // Se llama a la función que elimina un registro. Se encuentra en el archivo components.js
    confirmDelete(API_PROVEEDOR, data);
}