<?php
include('./database/conexion.php');

try {
    $pdo = abrirBase_pdo();

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file_csv'])) {
        $archivo = $_FILES['file_csv'];
        $nombreOriginal = $archivo['name'];
        $nombreTemporal = $archivo['tmp_name'];

        // Verificar si es un CSV (opcional)
        $extension = pathinfo($nombreOriginal, PATHINFO_EXTENSION);
        if ($extension !== 'csv') {
            die('Solo se permiten archivos CSV.');
        }

        // Mover el archivo a una ubicación temporal para procesarlo
        $rutaTemporal = 'upload/' . $nombreOriginal;
        move_uploaded_file($nombreTemporal, $rutaTemporal);

        // Procesar el CSV e insertar datos en la base de datos
        $archivoCSV = fopen($rutaTemporal, 'r');
        while (($datos = fgetcsv($archivoCSV)) !== FALSE) {
            // Verificar si la primera fila son encabezados
            if (!isset($encabezados)) {
                $encabezados = $datos;
                continue; // Saltar a la siguiente fila
            }

            $orden = (int) $datos[0]; // Convertir a entero
            $nombre = $pdo->quote(substr($datos[1], 0, 50)); // Limitar a 50 caracteres y escapar
            $genero = $pdo->quote(substr($datos[2], 0, 50)); // Limitar a 50 caracteres y escapar
            $fecha_nac = date('Y-m-d', strtotime($datos[3])); // Convertir a formato de fecha
            $edad = (int) $datos[4]; // Convertir a entero
            $pais = $pdo->quote($datos[5]); // Escapar
            $deporte = $pdo->quote(substr($datos[6], 0, 50)); // Limitar a 50 caracteres y escapar

            // Consulta SQL de inserción
            $sql = "INSERT INTO listado (orden, nombre, genero, fecha_nac, edad, pais, deporte) 
            VALUES ($orden, $nombre, $genero, '$fecha_nac', $edad, $pais, $deporte)";

            // Ejecutar la consulta
            $pdo->exec($sql);
        }
        fclose($archivoCSV);

        // Eliminar el archivo temporal
        unlink($rutaTemporal);

        echo "<script>
            alert('Archivo subido y datos insertados exitosamente.');
            window.location.href = 'tables.php'; // Redirigir después de la alerta
          </script>";

    } else {
        header("Location: /tables.php");
        exit;
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
