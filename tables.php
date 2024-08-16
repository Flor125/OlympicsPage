<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Tipografía -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nabla&family=Rubik+Mono+One&display=swap" rel="stylesheet">
    <!-- Tipografía - Tabla -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kode+Mono:wght@400..700&display=swap" rel="stylesheet">
    <!--- BootStrap --->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Estilos -->
    <link href="styles/styles.css" rel="stylesheet">
    <title>Tablas de Participantes</title>
</head>
<body style="font-family: 'Rubik Mono One', monospace">
<!-- Codigo en PHP -->
<?php
    include ('./database/conexion.php');

    $pdo = abrirBase_pdo();

    $sql = "SELECT * FROM listado";
    $statement = $pdo->prepare($sql);
    $statement->execute();
    $resultados = $statement->fetchAll(PDO::FETCH_ASSOC);





?>
<!-- Codigo en PHP -->

<!-- Start Navbar -->
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <a class="navbar-brand" href="index.php"> <img src="img/logo.gif" width="100" alt="logo"> </a>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="tables.php">Tablas</a>
                </li>
            </ul>
            <form class="d-flex" role="search">
                <a class="btn btn-outline-success" href="downloadCSV.php">Descargar CSV</a>
            </form>
        </div>
    </div>
</nav>
<!-- End Navbar -->

<!-- Titulo -->
    <header>
        <h1>Listado de participantes</h1>
    </header>
    <div class="main">
        <aside class="left">
        </aside>
        <main>
            <!-- Begin - Subida de archivo.csv -->
            <h2>Subir CSV</h2>
            <form action="subirCSV.php" method="post" enctype="multipart/form-data">
                <input type="file" name="file_csv" accept=".csv">
                <button type="submit">Subir CSV</button>
            </form>
            <!-- End - Subida de archivo.csv -->

            <h2>Participantes</h2>
            <div class="container">
            <table id="tablaJugadores" style="margin: 0 auto;">
                <thead>
                <tr>
                    <th id="orden">Orden</th>
                    <th id="nombre">Nombre</th>
                    <th>Género</th>
                    <th>Fecha Nacimiento</th>
                    <th>Edad</th>
                    <th>País</th>
                    <th>Deporte</th>
                    <th colspan="3">Acciones</th>
                </tr>
                </thead>
                <!-- Begin - Inserción de datos en la tabla desde la base de datos -->
                <tbody>
                <?php
                foreach ($resultados as $fila) {
                    echo "<tr>";
                    echo "<td>" . $fila['orden'] . "</td>";
                    echo "<td>" . $fila['nombre'] . "</td>";
                    echo "<td>" . $fila['genero'] . "</td>";
                    echo "<td>" . $fila['fecha_nac'] . "</td>";
                    echo "<td>" . $fila['edad'] . "</td>";
                    echo "<td>" . $fila['pais'] . "</td>";
                    echo "<td>" . $fila['deporte'] . "</td>";
                    echo '<td><a href="./players.php" class="button-3" role="button">Agregar</a></td>';
                    echo '<td><a href="./upgrade.php?orden=' . $fila['orden'] . '" class="button-5" role="button">Modificar</a></td>';
                    echo '<td><a href="./delete.php?orden=' . $fila['orden'] . '" class="button-4" role="button" onclick="event.preventDefault(); confirmarEliminar(\'' . $fila['nombre'] . '\', ' . $fila['orden'] . ')">Eliminar</a></td>';
                    echo "</tr>";
                }
                ?>
                </tbody>
                <!-- End - Inserción de datos en la tabla desde la base de datos -->
            </table>
            </div>
        </main>
        <aside class="right">
        </aside>
    </div>
    <footer>

    </footer>



    <script src="js/tables.js"></script>
</body>
</html>

<!-- Codigo JS -->
<script>
    function confirmarEliminar(nombre, orden){
        const r = confirm("¿Estas seguro de eliminar a " + nombre + "?");
        if(r === true){
            window.location.href = "./database/delete.php?orden=" + orden;
        }else{
        }
    }
</script>
<!-- Codigo JS -->

