// Constante para establecer la ruta y parámetros de comunicación con la API.
const API_PRODUCTOS = '../../app/api/dashboard/Producto.php?action=';
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
    readRows(API_PRODUCTOS);
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
                    <a href="#" onclick="openUpdateDialog(${row.id_proveedor})" class="btn waves-effect blue tooltipped" data-tooltip="Actualizar" data-bs-toggle="modal" data-bs-target="#exampleModal" ><i class="material-icons">mode_edit</i></a>
                    <a href="#" onclick="openDeleteDialog(${row.id_producto})" class="btn waves-effect red tooltipped" data-tooltip="Eliminar"><i class="material-icons">delete</i></a>
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
    searchRows(API_PRODUCTOS, 'search-form');
});

// Método manejador de eventos que se ejecuta cuando se envía el formulario de guardar.
document.getElementById('save-form').addEventListener('submit', function (event) {
    // Se evita recargar la página web después de enviar el formulario.
    event.preventDefault();
    // Se establece el campo de archivo como obligatorio.
    document.getElementById('archivo_producto').required = true;
    
    saveRow(API_PRODUCTOS, 'create', 'save-form', null);

});

// Función para establecer el registro a eliminar y abrir una caja de dialogo de confirmación.
function openDeleteDialog(id) {
    // Se define un objeto con los datos del registro seleccionado.
    const data = new FormData();
    data.append('id_producto', id);
    // Se llama a la función que elimina un registro. Se encuentra en el archivo components.js
    confirmDelete(API_PRODUCTOS, data);
}








