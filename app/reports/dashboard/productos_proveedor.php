<?php
// Se verifica si existe el parámetro id en la url, de lo contrario se direcciona a la página web de origen.
if (isset($_GET['id'])) {
    require('../../helpers/report.php');
    require('../../models/proveedores.php');

    // Se instancia el módelo proveedoress para procesar los datos.
    $proveedor = new Proveedor;

    // Se verifica si el parámetro es un valor correcto, de lo contrario se direcciona a la página web de origen.
    if ($proveedor->setId($_GET['id'])) {
        // Se verifica si la categoría del parametro existe, de lo contrario se direcciona a la página web de origen.
        if ($rowProveedor = $proveedor->readOne()) {
            // Se instancia la clase para crear el reporte.
            $pdf = new Report;
            // Se inicia el reporte con el encabezado del documento.
            $pdf->startReport('Productos del proveedor '.$rowProveedor['nombre_prov']);
            // Se verifica si existen registros (productos) para mostrar, de lo contrario se imprime un mensaje.
            if ($dataProductos = $proveedor->readProductosProveedor()) {
                // Se establece un color de relleno para los encabezados.
                $pdf->SetFillColor(168, 219, 168);
                // Se establece la fuente para los encabezados.
                $pdf->SetFont('Times', 'B', 11);
                // Se imprimen las celdas con los encabezados.
                $pdf->Cell(96, 10, utf8_decode('Nombre'), 1, 0, 'C', 1);
                $pdf->Cell(46, 10, utf8_decode('Existencias'), 1, 0, 'C', 1);
                $pdf->Cell(46, 10, utf8_decode('Precio (US$)'), 1, 1, 'C', 1);
                // Se establece la fuente para los datos de los productos.
                $pdf->SetFont('Times', '', 11);
                // Se recorren los registros ($dataProductos) fila por fila ($rowProducto).
                foreach ($dataProductos as $rowProducto) {
                    // Se imprimen las celdas con los datos de los productos.
                    $pdf->Cell(96, 10, utf8_decode($rowProducto['nombre_pro']), 1, 0);
                    $pdf->Cell(46, 10, utf8_decode($rowProducto['existencias']), 1, 0);
                    $pdf->Cell(46, 10, $rowProducto['precio_pro'], 1, 1);
                }
            } else {
                $pdf->Cell(0, 10, utf8_decode('No hay productos para este proveedor'), 1, 1);
            }
            // Se envía el documento al navegador y se llama al método Footer()
            $pdf->Output();
        } else {
            header('location: ../../../views/dashboard/proveedores.php');
        }
    } else {
        header('location: ../../../views/dashboard/proveedores.php');
    }
} else {
    header('location: ../../../views/dashboard/proveedores.php');
}
?>