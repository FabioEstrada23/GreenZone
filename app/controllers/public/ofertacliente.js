const API_OFERTACLIENTE = '../../app/api/public/ofertaCliente.php?action=';
const ENDPOINT_PRODUCTOOFERTA = '../../app/api/public/ofertaCliente.php?action=readProductos';

function fillTable(dataset) {
    let content = '';
    // Se recorre el conjunto de registros (dataset) fila por fila a través del objeto row.
    dataset.map(function (row) {

        // Se crean y concatenan las filas de la tabla con los datos de cada registro.
        content += `
            <tr>
                <td>${row.descuento}</td>
                <td>${row.precio_descuento}</td>
                <td>${row.id_producto}</td>
                <td>${row.precio_anterior}</td>
            </tr>
        `;
    });
    // Se agregan las filas al cuerpo de la tabla mediante su id para mostrar los registros.
    document.getElementById('tbody-rows').innerHTML = content;
}

document.addEventListener('DOMContentLoaded', function () {
    // Se llama a la función que obtiene los registros para llenar la tabla. Se encuentra en el archivo components.js
    fillSelect(ENDPOINT_PRODUCTOOFERTA, 'nombre_pro', null);
    readRows(API_OFERTACLIENTE);
});

document.getElementById('search-form').addEventListener('submit', function (event) {
    // Se evita recargar la página web después de enviar el formulario.
    event.preventDefault();
    // Se llama a la función que realiza la búsqueda. Se encuentra en el archivo components.js
    searchRows(API_OFERTACLIENTE, 'search-form');
});











