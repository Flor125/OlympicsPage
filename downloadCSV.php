<?php
include ('./database/conexion.php');

$pdo = abrirBase_pdo();

try {
    $sql = "SELECT * FROM listado";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

//cabeceras para forzar la descarga
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=listado.csv');

//salida del archivo
    $output = fopen("php://output", "w");
    fputcsv($output, array_keys($results[0]));
    foreach ($results as $row) {
        fputcsv($output, $row);
    }
    fclose($output);
    exit();
} catch (PDOException $e) {
    echo "Mensaje de error".$e->getMessage();
}