<?php
// Se verifica si existe el parámetro id en la url, de lo contrario se direcciona a la página web de origen.
if (isset($_GET['id_tipo_empleado'])) {
    require('../../helpers/report.php');
    require('../../models/empleado.php');

    // Se instancia el módelo Categorias para procesar los datos.
    $empleado = new empleado;

    // Se verifica si el parámetro es un valor correcto, de lo contrario se direcciona a la página web de origen.
    if ($empleado->setTipoEmp($_GET['id_tipo_empleado'])) {
        // Se verifica si el tipo de empleado del parametro existe, de lo contrario se direcciona a la página web de origen.
        if ($rowTipoEmpleado = $empleado->readOneTipo()) {
            // Se instancia la clase para crear el reporte.
            $pdf = new Report;
            // Se inicia el reporte con el encabezado del documento.
            $pdf->startReport('Empleados del tipo '.$rowTipoEmpleado['tipo_empleado']);
            // Se verifica si existen registros (productos) para mostrar, de lo contrario se imprime un mensaje.
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
                // Se recorren los registros ($dataProductos) fila por fila ($rowProducto).
                foreach ($dataEmpleado as $rowEmpleado) {
                    // Se imprimen las celdas con los datos de los productos.
                    $pdf->Cell(93, 10, utf8_decode($rowEmpleado['nombres_emp']), 1, 0);
                    $pdf->Cell(93, 10, $rowEmpleado['apellidos_emp'], 1, 1);
                }
            } else {
                $pdf->Cell(0, 10, utf8_decode('No hay empleados para este tipo'), 1, 1);
            }
            // Se envía el documento al navegador y se llama al método Footer()
            $pdf->Output();
        } else {
            header('location: ../../views/dashboard/empleados.php');
        }
    } else {
        header('location: ../../views/dashboard/empleados.php');
    }
} else {
    header('location: ../../views/dashboard/empleados.php');
}
?>