// Constante para establecer la ruta y parámetros de comunicación con la API.
const API_CLIENTES = '../../app/api/public/clientes.php?action=';

// Método manejador de eventos que se ejecuta cuando el documento ha cargado.
document.addEventListener('DOMContentLoaded', function () {
    reCAPTCHA();
    sweetAlert(4, 'Debe autenticarse para ingresar', null);
    
});

// Función para obtener un token del reCAPTCHA y asignarlo al formulario.
function reCAPTCHA() {
    // Método para generar el token del reCAPTCHA.
    grecaptcha.ready(function () {
        // Se declara e inicializa una variable para guardar la llave pública del reCAPTCHA.
        let publicKey = '6LeBqFccAAAAAKKKyrQri1N3nktSRu1YR8TC2iNs';
        // Se obtiene un token para la página web mediante la llave pública.
        grecaptcha.execute(publicKey, { action: 'homepage' }).then(function (token) {
            // Se asigna el valor del token al campo oculto del formulario
            document.getElementById('g-recaptcha-response').value = token;
        });
    });
}


// Método manejador de eventos que se ejecuta cuando se envía el formulario de iniciar sesión.
document.getElementById('session-form').addEventListener('submit', function (event) {
    // Se evita recargar la página web después de enviar el formulario.
    event.preventDefault();

    fetch(API_CLIENTES + 'tiempocontra', {
        method: 'post',
        body: new FormData(document.getElementById('session-form'))
    }).then(function (request) {
        // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
        if (request.ok) {
            request.json().then(function (response) {
                // Se comprueba si la respuesta es satisfactoria, de lo contrario se muestra un mensaje con la excepción.
                if (response.status) {

                    fetch(API_CLIENTES + 'logIn', {
                        method: 'post',
                        body: new FormData(document.getElementById('session-form'))
                    }).then(function (request) {
                        // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
                        if (request.ok) {
                            request.json().then(function (response) {
                                // Se comprueba si la respuesta es satisfactoria, de lo contrario se muestra un mensaje con la excepción.
                                if (response.status) {
                                    sweetAlert(1, response.message, null);
                
                                    var myModal = new bootstrap.Modal(document.getElementById('confirmar-modal'));
                                    myModal.show();
                
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
                
                } else {
                    sweetAlert(4, response.exception, 'recuperacion.php');
                }
            });
            
        } else {
            console.log(request.status + ' ' + request.statusText);
        }
    }).catch(function (error) {
        console.log(error);
    });

    

});

// Método manejador de eventos que se ejecuta cuando se envía el formulario de iniciar sesión.
document.getElementById('confirmar-form').addEventListener('submit', function (event) {
    // Se evita recargar la página web después de enviar el formulario.
    event.preventDefault();

    fetch(API_CLIENTES + 'comparar', {
        method: 'post',
        body: new FormData(document.getElementById('confirmar-form'))
    }).then(function (request) {
        // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
        if (request.ok) {
            request.json().then(function (response) {
                // Se comprueba si la respuesta es satisfactoria, de lo contrario se muestra un mensaje con la excepción.
                if (response.status) {
                    sweetAlert(1, response.message, 'index.php');
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


function openCambiarContra() {



}

