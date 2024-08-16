<?php
include("conexion.php");
# Procesa datos enviados desde el formulario y crea la variable correspondiente.
$nombre = $_POST['nombre'];
$genero = $_POST['genero'];
$fecha_nac = $_POST['fecha_nac'];
$edad = $_POST['edad'];
$pais = $_POST['pais'];
$deporte = $_POST['deporte'];

$pdo = abrirBase_pdo(); # llama a la función y la establece dentro de la variable.

if (!$pdo = abrirBase_pdo()) {    # en caso de que la conexión a la base de datos falle
    echo "No me pude conectar";
    exit;
}

# en esta porción, calcula la edad de una persona a partir de su fecha de nacimiento sin ingresarlo manualmente
$hoy = new DateTime(); # representa la fecha y hora actual.
$fechaNacimientoObj = new DateTime($fecha_nac); # crea otro objeto obtenido en el formulario
$edad = $hoy->diff($fechaNacimientoObj)->y;  # calcula la diferencia.

// Obtén el mayor 'orden' actual para mantener el orden de la tabla.
$stmt = $pdo->query("SELECT MAX(orden) FROM listado");
$maxOrden = $stmt->fetchColumn();

// Calcula el nuevo 'orden'
$nuevoOrden = $maxOrden + 1;

$sql = "INSERT INTO listado (orden, nombre, genero, fecha_nac, edad, pais, deporte) 
        VALUES (:orden, :nombre, :genero, :fecha_nac, :edad, :pais, :deporte)";

$stmt = $pdo->prepare($sql);

$params = [  # arreglo asociativo que mapea los marcadores de la consulta SQL con los valores declarados anteriormente.
    ':orden' => $nuevoOrden,
    ':nombre' => $nombre,
    ':genero' => $genero,
    ':fecha_nac' => $fecha_nac,
    ':edad' => $edad,
    ':pais' => $pais,
    ':deporte' => $deporte,
];

if ($stmt->execute($params)) {
    // Los datos se insertaron correctamente
    // Obtiene el último ID insertado
    $ultimoId = $pdo->lastInsertId();
    // Redirige al usuario a tablas.php
    header("Location: ../tables.php");
    exit;
} else {
    // Hubo un error al insertar los datos
    echo "Hubo un error al registrar los datos.";
}