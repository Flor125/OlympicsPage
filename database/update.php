<?php
include("conexion.php");

$orden = $_POST['orden'];
$nombre = $_POST['nombre'];
$genero = $_POST['genero'];
$fecha_nac = $_POST['fecha_nac'];
$edad = $_POST['edad'];
$pais = $_POST['pais'];
$deporte = $_POST['deporte'];

$pdo = abrirBase_pdo();
if (!$pdo = abrirBase_pdo()) {
    exit;
}

$hoy = new DateTime();
$fechaNacimientoObj = new DateTime($fecha_nac);
$edad = $hoy->diff($fechaNacimientoObj)->y;

$sql = "UPDATE listado SET nombre = :nombre, genero = :genero, fecha_nac = :fecha_nac, edad = :edad, pais = :pais, deporte = :deporte 
               WHERE orden = :orden";

$stmt = $pdo->prepare($sql);
$params = [':nombre' => $nombre, ':genero' => $genero, ':fecha_nac' => $fecha_nac, ':edad' => $edad, ':pais' => $pais, ':deporte' => $deporte, ':orden' => $orden];
$stmt->execute($params);

if($stmt ->execute($params)){
    header("Location: ../tables.php"); exit;
}else{
    echo "Error al actualizar los datos";
}
?>