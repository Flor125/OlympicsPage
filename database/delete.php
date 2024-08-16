<?php
include("conexion.php");

if (!isset($_GET['orden'])) {
    die('Error: No se proporcionó el parámetro "orden".');
}

$orden = $_GET['orden'];
$pdo = abrirBase_pdo();
if (!$pdo = abrirBase_pdo()) {
    exit;
}

// Solo se elimina el registro, sin reordenar
$sql = "DELETE FROM listado WHERE orden = :orden";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':orden', $orden, PDO::PARAM_INT);

if ($stmt->execute()) {
    echo "<script type='text/javascript'>alert('Usuario Eliminado');</script>";
} else {
    echo "<script type='text/javascript'>alert('Error al eliminar el usuario');</script>"; // Mensaje de error más específico
}

header('Location: ../tables.php'); //retorna a la página Tablas
exit;


