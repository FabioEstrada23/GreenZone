<?php
require('../../helpers/report.php');
require('../../models/empleado.php');

// Se instancia la clase para crear el reporte.
$pdf = new Report;
// Se inicia el reporte con el encabezado del documento.
$pdf->startReport('Empleados por tipo de empleado');

// Se instancia el módelo Empleado para obtener los datos.
$empleado = new empleado;
// Se verifica si existen registros (empleados) para mostrar, de lo contrario se imprime un mensaje.
if ($dataTipoEmpleado = $empleado->readTipoEmpleado()) {
    // Se recorren los registros ($dataEmpleado) fila por fila ($rowEmpleado).
    foreach ($dataTipoEmpleado as $rowTipoEmpleado) {
        // Se establece un color de relleno para mostrar el nombre de la categoría.
        $pdf->SetFillColor(175);
        // Se establece la fuente para el nombre del empleado.
        $pdf->SetFont('Times', 'B', 12);
        // Se imprime una celda con el nombre de la categoría.
        $pdf->Cell(0, 10, utf8_decode('Tipo de Empleado: '.$rowTipoEmpleado['tipo_empleado']), 1, 1, 'C', 1);
        // Se establece el tipo para obtener sus empleados, de lo contrario se imprime un mensaje de error.
        if ($empleado->setTipoEmp($rowTipoEmpleado['id_tipo_empleado'])) {
            // Se verifica si existen registros (empleados) para mostrar, de lo contrario se imprime un mensaje.
            if ($dataEmpleado = $empleado->readEmpleadosPorTipo()) {
                // Se establece un color de relleno para los encabezados.
                $pdf->SetFillColor(225);
                // Se establece la fuente para los encabezados.
                $pdf->SetFont('Times', 'B', 11);
                // Se imprimen las celdas con los encabezados.
                $pdf->Cell(93, 10, utf8_decode('Nombres'), 1, 0, 'C', 1);
                $pdf->Cell(93, 10, utf8_decode('Apellidos'), 1, 1, 'C', 1);
                // Se establece la fuente para los datos de los productos.
                $pdf->SetFont('Times', '', 11);
                // Se recorren los registros ($dataEmpleado) fila por fila ($rowProducto).
                foreach ($dataEmpleado as $rowEmpleado) {
                    // Se imprimen las celdas con los datos de los productos.
                    $pdf->Cell(93, 10, utf8_decode($rowEmpleado['nombres_emp']), 1, 0);
                    $pdf->Cell(93, 10, $rowEmpleado['apellidos_emp'], 1, 1);
                }
            } else {
                $pdf->Cell(0, 10, utf8_decode('No hay empleados para este tipo'), 1, 1);
            }
        } else {
            $pdf->Cell(0, 10, utf8_decode('Tipo de empleado incorrecto o inexistente'), 1, 1);
        }
    }
} else {
    $pdf->Cell(0, 10, utf8_decode('No hay tipos de empleado para mostrar'), 1, 1);
}

// Se envía el documento al navegador y se llama al método Footer()
$pdf->Output();
?>