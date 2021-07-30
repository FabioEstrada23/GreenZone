<?php
// Se verifica si existe el parámetro id en la url, de lo contrario se direcciona a la página web de origen.
if (isset($_GET['id_pedido'])) {
    require('../../helpers/report_public.php');
    require('../../models/pedidocliente.php');

    // Se instancia el módelo Categorias para procesar los datos.
    $pedido = new Pedido;

    // Se verifica si el parámetro es un valor correcto, de lo contrario se direcciona a la página web de origen.
    if ($pedido->setId($_GET['id_pedido'])) {
        // Se verifica si el cliente del parametro existe, de lo contrario se direcciona a la página web de origen.
        if ($rowCliente = $pedido->readCliente()) {
            // Se instancia la clase para crear el reporte.
            $pdf = new Report;
            // Se inicia el reporte con el encabezado del documento.
            $pdf->startReport('Pedido de '.$rowCliente['nombres_cli']);
            // Se verifica si existen registros (productos) para mostrar, de lo contrario se imprime un mensaje.
            if ($dataPedido = $pedido->comprobantePago()) {
                // Se establece un color de relleno para los encabezados.
                $pdf->SetFillColor(168, 219, 168);
                // Se establece la fuente para los encabezados.
                $pdf->SetFont('Times', 'B', 11);
                // Se imprimen las celdas con los encabezados.
                $pdf->Cell(62, 10, utf8_decode('Producto'), 1, 0, 'C', 1);
                $pdf->Cell(62, 10, utf8_decode('Cantidad'), 1, 0, 'C', 1);
                $pdf->Cell(62, 10, utf8_decode('Precio (US$)'), 1, 1, 'C', 1);
                // Se establece la fuente para los datos de los productos.
                $pdf->SetFont('Times', '', 11);
                // Se recorren los registros ($dataProductos) fila por fila ($rowProducto).
                foreach ($dataPedido as $rowPedido) {
                    // Se imprimen las celdas con los datos de los productos.
                    $pdf->Cell(62, 10, utf8_decode($rowPedido['nombre_pro']), 1, 0);
                    $pdf->Cell(62, 10, utf8_decode($rowPedido['cantidad']), 1, 0);
                    $pdf->Cell(62, 10, ($rowPedido['precio_producto']), 1, 1);
                    
                }
            } else {
                $pdf->Cell(0, 10, utf8_decode('No hay empleados para este tipo'), 1, 1);
            }
            
            if ($dataPedido = $pedido->totalPago()) {
                
                $pdf->Cell(124, 10, utf8_decode('Total(US$)'), 1, 0, 'C', 1);
                $pdf->Cell(62, 10, utf8_decode($dataPedido['total']), 1, 1, 'C', 1);
            }


            // Se envía el documento al navegador y se llama al método Footer()

            $pdf->Output();
        } else {
            header('location: ../../../views/public/pedidos.php');
        }
    } else {
        header('location: ../../../views/public/pedidos.php');
    }
} else {
    header('location: ../../../views/public/pedidos.php');
}
?>