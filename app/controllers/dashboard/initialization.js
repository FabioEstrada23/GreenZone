/*
*   Este controlador es de uso general en las páginas web del sitio privado. Se importa en la plantilla del pie del documento.
*   Sirve para inicializar los componentes del framework que son comunes en las páginas web.
*/

// Método manejador de eventos que se ejecuta cuando el documento ha cargado.
document.addEventListener('DOMContentLoaded', function () {
    // Se inicializa el componente Tooltip asignado a botones y enlaces para que funcionen las sugerencias textuales.
    M.Tooltip.init(document.querySelectorAll('.tooltipped'));
    // Se inicializa el componente Modal para que funcionen las cajas de dialogo.
    M.Modal.init(document.querySelectorAll('.modal'));
});