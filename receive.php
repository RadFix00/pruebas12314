<?php
// Verificar si se han enviado datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $nombre = $_POST["name"];
    $telefono = $_POST["telefono"];
    $producto = $_POST["escogerProducto"];
    $cantidad = $_POST["Cantidades"];
    $precio = $_POST["Precio"];
    
    // Crear un nuevo objeto PHPExcel
    require_once 'PHPExcel/PHPExcel.php';
    $objPHPExcel = new PHPExcel();
    
    // Establecer propiedades del documento
    $objPHPExcel->getProperties()->setCreator("Nombre del Creador")
                                 ->setLastModifiedBy("Nombre del Creador")
                                 ->setTitle("Pedidos")
                                 ->setSubject("Pedidos")
                                 ->setDescription("Archivo de pedidos")
                                 ->setKeywords("excel phpexcel exportar")
                                 ->setCategory("Categoría");
    
    // Agregar los datos al documento
    $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('A1', 'Nombre del cliente y apellidos')
                ->setCellValue('B1', 'Número de teléfono')
                ->setCellValue('C1', 'Producto')
                ->setCellValue('D1', 'Cantidad')
                ->setCellValue('E1', 'Precio');
    
    $objPHPExcel->getActiveSheet()->setCellValue('A2', $nombre);
    $objPHPExcel->getActiveSheet()->setCellValue('B2', $telefono);
    $objPHPExcel->getActiveSheet()->setCellValue('C2', $producto);
    $objPHPExcel->getActiveSheet()->setCellValue('D2', $cantidad);
    $objPHPExcel->getActiveSheet()->setCellValue('E2', $precio);
    
    // Establecer el formato de archivo Excel
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="pedido.xlsx"');
    header('Cache-Control: max-age=0');
    
    // Guardar el archivo Excel en formato xlsx (Office Open XML)
    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
    $objWriter->save('php://output');
    
    exit();
} else {
    // Si no se han enviado datos del formulario, redireccionar al formulario
    header("Location: pedido.html");
    exit();
}
?>