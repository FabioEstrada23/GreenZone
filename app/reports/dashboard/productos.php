<?php
require('../../helpers/report.php');
require('../../models/Categoria.php');

// Se instancia la clase para crear el reporte.
$pdf = new Report;
// Se inicia el reporte con el encabezado del documento.
$pdf->startReport('Productos por categoría');

// Se instancia el módelo Categorías para obtener los datos.
$categoria = new Categoria;
// Se verifica si existen registros (categorías) para mostrar, de lo contrario se imprime un mensaje.
if ($dataCategorias = $categoria->readAll()) {
    // Se recorren los registros ($dataCategorias) fila por fila ($rowCategoria).
    foreach ($dataCategorias as $rowCategoria) {
        // Se establece un color de relleno para mostrar el nombre de la categoría.
        $pdf->SetFillColor(59, 134, 134);
        // Se establece la fuente para el nombre de la categoría.
        $pdf->SetFont('Times', 'B', 13);
        // Se imprime una celda con el nombre de la categoría.
        $pdf->Cell(0, 10, utf8_decode('Categoría: '.$rowCategoria['categoria']), 1, 1, 'C', 1);
        // Se establece la categoría para obtener sus productos, de lo contrario se imprime un mensaje de error.
        if ($categoria->setId($rowCategoria['id_categoria'])) {
            // Se verifica si existen registros (productos) para mostrar, de lo contrario se imprime un mensaje.
            if ($dataProductos = $categoria->readProductosCategoria()) {
                // Se establece un color de relleno para los encabezados.
                $pdf->SetFillColor(168, 219, 168);
                // Se establece la fuente para los encabezados.
                $pdf->SetFont('Times', 'B', 11);
                // Se imprimen las celdas con los encabezados.
                $pdf->Cell(94, 10, utf8_decode('Nombre'), 1, 0, 'C', 1);
                $pdf->Cell(46, 10, utf8_decode('Existencias'), 1, 0, 'C', 1);
                $pdf->Cell(46, 10, utf8_decode('Precio (US$)'), 1, 1, 'C', 1);
                // Se establece la fuente para los datos de los productos.
                $pdf->SetFont('Times', '', 11);
                // Se recorren los registros ($dataProductos) fila por fila ($rowProducto).
                foreach ($dataProductos as $rowProducto) {
                    // Se imprimen las celdas con los datos de los productos.
                    $pdf->Cell(94, 10, utf8_decode($rowProducto['nombre_pro']), 1, 0);
                    $pdf->Cell(46, 10, utf8_decode($rowProducto['existencias']), 1, 0);
                    $pdf->Cell(46, 10, $rowProducto['precio_pro'], 1, 1);
                }
            } else {
                $pdf->Cell(0, 10, utf8_decode('No hay productos para esta categoría'), 1, 1);
            }
        } else {
            $pdf->Cell(0, 10, utf8_decode('Categoría incorrecta o inexistente'), 1, 1);
        }
    }
} else {
    $pdf->Cell(0, 10, utf8_decode('No hay categorías para mostrar'), 1, 1);
}

// Se envía el documento al navegador y se llama al método Footer()
$pdf->Output();
?>