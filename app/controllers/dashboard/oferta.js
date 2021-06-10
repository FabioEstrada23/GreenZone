const API_OFERTA = '../../app/api/dashboard/oferta.php?action=';
const ENDPOINT_PRODUCTO = '../../app/api/dashboard/oferta.php?action=readProductos';

function fillTable(dataset) {
    let content = '';
    // Se recorre el conjunto de registros (dataset) fila por fila a través del objeto row.
    dataset.map(function (row) {

        // Se crean y concatenan las filas de la tabla con los datos de cada registro.
        content += `
            <tr>
                <td>${row.descuento}</td>
                <td>${row.precio_descuento}</td>
                <td>${row.nombre_pro}</td>
                <td>${row.precio_anterior}</td>
                <td>
                    <a href="#" onclick="openUpdateDialog(${row.id_oferta})" class="btn waves-effect blue tooltipped" data-tooltip="Actualizar" data-bs-toggle="modal" data-bs-target="#exampleModal" ><i class="material-icons">mode_edit</i></a>
                    <a href="#" onclick="openDeleteDialog(${row.id_oferta})" class="btn waves-effect red tooltipped" data-tooltip="Eliminar"><i class="material-icons">delete</i></a>
                </td>
            </tr>
        `;
    });
    // Se agregan las filas al cuerpo de la tabla mediante su id para mostrar los registros.
    document.getElementById('tbody-rows').innerHTML = content;
}

document.addEventListener('DOMContentLoaded', function () {
    // Se llama a la función que obtiene los registros para llenar la tabla. Se encuentra en el archivo components.js
    fillSelect(ENDPOINT_PRODUCTO, 'nombre_pro', null);
    readRows(API_OFERTA);
});


document.getElementById('search-form').addEventListener('submit', function (event) {
    // Se evita recargar la página web después de enviar el formulario.
    event.preventDefault();
    // Se llama a la función que realiza la búsqueda. Se encuentra en el archivo components.js
    searchRows(API_OFERTA, 'search-form');
});




document.getElementById('nombre_pro').addEventListener('change', function (event) {
    // Se define un objeto con los datos del registro seleccionado.
    const data = new FormData();
    data.append('id_producto', document.getElementById('nombre_pro').value);

    fetch(API_OFERTA + 'readProducto', {
        method: 'post',
        body: data
    }).then(function (request) {
        // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
        if (request.ok) {
            request.json().then(function (response) {
                // Se comprueba si la respuesta es satisfactoria, de lo contrario se muestra un mensaje con la excepción.
                if (response.status) {
                    // Se inicializan los campos del formulario con los datos del registro seleccionado.
                    document.getElementById('precio_anterior').value = response.dataset.precio_pro;
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
});


document.getElementById('nombre_pro2').addEventListener('change', function (event) {
    // Se define un objeto con los datos del registro seleccionado.
    const data = new FormData();
    data.append('id_producto', document.getElementById('nombre_pro2').value);

    fetch(API_OFERTA + 'readProducto', {
        method: 'post',
        body: data
    }).then(function (request) {
        // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
        if (request.ok) {
            request.json().then(function (response) {
                // Se comprueba si la respuesta es satisfactoria, de lo contrario se muestra un mensaje con la excepción.
                if (response.status) {
                    // Se inicializan los campos del formulario con los datos del registro seleccionado.
                    document.getElementById('precio_anterior2').value = response.dataset.precio_pro;
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
});


document.getElementById('descuento').addEventListener('focusout', function (event) {
    let precioFinal, descuento, precio;
    
    descuento = document.getElementById('descuento').value;
    precio =  document.getElementById('precio_anterior').value;

    precioFinal = precio - (precio*descuento);

    document.getElementById('precio_descuento').value = precioFinal;


});

document.getElementById('descuento2').addEventListener('focusout', function (event) {
    let precioFinal, descuento, precio;
    
    descuento = document.getElementById('descuento2').value;
    precio =  document.getElementById('precio_anterior2').value;

    precioFinal = precio - (precio*descuento);

    document.getElementById('precio_descuento2').value = precioFinal;

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
    document.getElementById('modal-title').textContent = 'Actualizar Oferta';


    // Se define un objeto con los datos del registro seleccionado.
    const data = new FormData();
    data.append('id_oferta', id);

    fetch(API_OFERTA + 'readOne', {
        method: 'post',
        body: data
    }).then(function (request) {
        // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
        if (request.ok) {
            request.json().then(function (response) {
                // Se comprueba si la respuesta es satisfactoria, de lo contrario se muestra un mensaje con la excepción.
                if (response.status) {
                    // Se inicializan los campos del formulario con los datos del registro seleccionado.
                    document.getElementById('id_oferta').value = response.dataset.id_oferta;
                    fillSelect(ENDPOINT_PRODUCTO, 'nombre_pro2', response.dataset.id_producto);
                    document.getElementById('descuento2').value = response.dataset.descuento;
                    document.getElementById('precio_descuento2').value = response.dataset.precio_descuento;
                    document.getElementById('precio_anterior2').value = response.dataset.precio_anterior;
                    
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
    
    saveRow(API_OFERTA, 'create', 'save-form', null);
    document.getElementById('save-form').reset();
});

// Método manejador de eventos que se ejecuta cuando se envía el formulario de actualizar.
document.getElementById('update-form').addEventListener('submit', function (event) {
    // Se evita recargar la página web después de enviar el formulario.
    event.preventDefault();
    
    updateRow(API_OFERTA, 'update', 'update-form', 'exampleModal');
});





// Función para establecer el registro a eliminar y abrir una caja de dialogo de confirmación.
function openDeleteDialog(id) {
    // Se define un objeto con los datos del registro seleccionado.
    const data = new FormData();
    data.append('id_oferta', id);
    // Se llama a la función que elimina un registro. Se encuentra en el archivo components.js
    confirmDelete(API_OFERTA, data);
}



