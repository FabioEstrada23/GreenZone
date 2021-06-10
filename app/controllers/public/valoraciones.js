// Constante para establecer la ruta y parámetros de comunicación con la API.
const API_VAL = '../../app/api/public/valoraciones.php?action=';

document.addEventListener('DOMContentLoaded', function () {
    // Se busca en la URL las variables (parámetros) disponibles.
    let params = new URLSearchParams(location.search);
    
    

    document.getElementById('id_producto').value = params.get('id');

    // Se llama a la función que obtiene los registros para llenar la tabla. Se encuentra en el archivo components.js
    readRows(API_VAL);
});

// Método manejador de eventos que se ejecuta cuando se envía el formulario de iniciar sesión.
document.getElementById('comment-form').addEventListener('submit', function (event) {
    // Se evita recargar la página web después de enviar el formulario.
    event.preventDefault();

    fetch(API_VAL + 'create', {
        method: 'post',
        body: new FormData(document.getElementById('comment-form'))
    }).then(function (request) {
        // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
        if (request.ok) {
            request.json().then(function (response) {
                // Se comprueba si la respuesta es satisfactoria, de lo contrario se muestra un mensaje con la excepción.
                if (response.status) {
                    sweetAlert(1, response.message, null);
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

function fillTable(dataset) {
    let content = '';
    // Se recorre el conjunto de registros (dataset) fila por fila a través del objeto row.
    dataset.map(function (row) {

        // Se crean y concatenan las filas de la tabla con los datos de cada registro.
        content += `
            <tr>
                
                <td>${row.cliente_user}</td>
                <td>${row.puntuaciones}</td>
                <td>${row.comentario}</td>
            </tr>
        `;
    });
    // Se agregan las filas al cuerpo de la tabla mediante su id para mostrar los registros.
    document.getElementById('tabla-val').innerHTML = content;

}