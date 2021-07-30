<?php
require('../../helpers/report.php');
require('../../models/proveedores.php');

// Se instancia la clase para crear el reporte.
$pdf = new Report;
// Se inicia el reporte con el encabezado del documento.
$pdf->startReport('Productos por Proveedor');

// Se instancia el módelo Proveedor para obtener los datos.
$proveedor = new Proveedor;
// Se verifica si existen registros (proveedores) para mostrar, de lo contrario se imprime un mensaje.
if ($dataProveedores = $proveedor->readAll()) {
    // Se recorren los registros ($dataProveedores) fila por fila ($rowProveedor).
    foreach ($dataProveedores as $rowProveedor) {
        // Se establece un color de relleno para mostrar el nombre del proveedor.
        $pdf->SetFillColor(59, 134, 134);
        // Se establece la fuente para el nombre del proveedor.
        $pdf->SetFont('Times', 'B', 12);
        // Se imprime una celda con el nombre del proveedor.
        $pdf->Cell(0, 10, utf8_decode('Proveedor: '.$rowProveedor['nombre_prov']), 1, 1, 'C', 1);
        // Se establece el proveedor para obtener sus productos, de lo contrario se imprime un mensaje de error.
        if ($proveedor->setId($rowProveedor['id_proveedor'])) {
            // Se verifica si existen registros (productos) para mostrar, de lo contrario se imprime un mensaje.
            if ($dataProductos = $proveedor->readProductosProveedor()) {
                // Se establece un color de relleno para los encabezados.
                $pdf->SetFillColor(168, 219, 168);
                // Se establece la fuente para los encabezados.
                $pdf->SetFont('Times', 'B', 11);
                // Se imprimen las celdas con los encabezados.
                $pdf->Cell(140, 10, utf8_decode('Nombre'), 1, 0, 'C', 1);
                $pdf->Cell(46, 10, utf8_decode('Existencias'), 1, 1, 'C', 1);
                // Se establece la fuente para los datos de los productos.
                $pdf->SetFont('Times', '', 11);
                // Se recorren los registros ($dataProductos) fila por fila ($rowProducto).
                foreach ($dataProductos as $rowProducto) {
                    // Se imprimen las celdas con los datos de los productos.
                    $pdf->Cell(140, 10, utf8_decode($rowProducto['nombre_pro']), 1, 0);
                    $pdf->Cell(46, 10, utf8_decode($rowProducto['existencias']), 1, 1);
                }
            } else {
                $pdf->Cell(0, 10, utf8_decode('No hay productos para este proveedor'), 1, 1);
            }
        } else {
            $pdf->Cell(0, 10, utf8_decode('Proveedor incorrecto o inexistente'), 1, 1);
        }
    }
} else {
    $pdf->Cell(0, 10, utf8_decode('No hay proveedores para mostrar'), 1, 1);
}

// Se envía el documento al navegador y se llama al método Footer()
$pdf->Output();
?>