// Constante para establecer la ruta y parámetros de comunicación con la API.
const API_PRODUCTOSCLIENTE = '../../app/api/public/productocliente.php?action=';
const ENDPOINT_ESTADOPRO = '../../app/api/dashboard/Producto.php?action=readEstados';
const ENDPOINT_CATEGORIAPRO = '../../app/api/dashboard/Producto.php?action=readCategoria';
const ENDPOINT_MARCA = '../../app/api/dashboard/Producto.php?action=readMarca';
const ENDPOINT_PROVEEDOR = '../../app/api/dashboard/Producto.php?action=readProveedor';

// Método manejador de eventos que se ejecuta cuando el documento ha cargado.
document.addEventListener('DOMContentLoaded', function () {
    //Se llama a la funcion que obtiene los registros para llenar la tabla.
    fillSelect(ENDPOINT_ESTADOPRO,'estado_pro', null);
    fillSelect(ENDPOINT_CATEGORIAPRO,'categoria', null);
    fillSelect(ENDPOINT_MARCA,'marca', null);
    fillSelect(ENDPOINT_PROVEEDOR,'nombre_prov', null);
    readRows(API_PRODUCTOSCLIENTE);
});

function fillTable(dataset) {
    let content = '';
    // Se recorre el conjunto de registros (dataset) fila por fila a través del objeto row.
    dataset.map(function (row) {

        // Se crean y concatenan las filas de la tabla con los datos de cada registro.
        content += `
            <tr>
                <td>${row.nombre_pro}</td>
                <td>${row.precio_pro}</td>
                <td>${row.oferta_pro}</td>
                <td>${row.id_proveedor}</td>
                <td>${row.id_marca}</td>
                <td>${row.id_categoria}</td>
                <td>${row.id_estado_producto}</td>
                <td>${row.existencias}</td>
                <td>${row.descripcion_pro}</td>
                <td>${row.imagen}</td>
                <td>
                    <a href="#" onclick="openUpdateDialog(${row.id_producto})" class="btn waves-effect blue tooltipped" data-tooltip="Actualizar" data-bs-toggle="modal" data-bs-target="#exampleModal" ><i class="material-icons">mode_edit</i></a>
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
    searchRows(API_PRODUCTOSCLIENTE, 'search-form');
});


function openUpdateDialog(id) {
    // Se define un objeto con los datos del registro seleccionado.
    const data = new FormData();
    data.append('id_producto', id);

    fetch(API_PRODUCTOSCLIENTE + 'readOne', {
        method: 'post',
        body: data
    }).then(function (request) {
        // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
        if (request.ok) {
            request.json().then(function (response) {
                // Se comprueba si la respuesta es satisfactoria, de lo contrario se muestra un mensaje con la excepción.
                if (response.status) {
                    // Se inicializan los campos del formulario con los datos del registro seleccionado.
                    document.getElementById('id_producto').value = response.dataset.id_producto;
                    document.getElementById('nombre_pro2').value = response.dataset.nombre_pro;
                    document.getElementById('existencias2').value = response.dataset.existencias;
                    document.getElementById('descripcion_pro2').value = response.dataset.descripcion_pro;
                    document.getElementById('precio_uni2').value = response.dataset.precio_pro;
                    document.getElementById('oferta2').value = response.dataset.oferta_pro;
                    fillSelect(ENDPOINT_ESTADOPRO, 'estado_pro2', response.dataset.id_estado_producto);
                    fillSelect(ENDPOINT_MARCA, 'categoria2', response.dataset.id_marca);
                    fillSelect(ENDPOINT_CATEGORIAPRO, 'categoria2', response.dataset.id_categoria);                    
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

