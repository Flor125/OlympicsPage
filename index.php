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
    <!--- BootStrap --->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Estilos -->
    <link href="styles/stylesindex.css" rel="stylesheet">
    <title>¡Bienvenidos a las Olimpiadas Villamercedinas!</title>
</head>
<body style="font-family: 'Rubik Mono One', monospace">

<?php
 include ('./database/conexion.php');
?>

<!-- Start Navbar -->
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <a class="navbar-brand" href="index.php"> <img src="img/logo.gif" width="100px" alt="img"> </a>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="tables.php">Tablas</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- End Navbar -->
<div class="main">
    <aside class="left">
    </aside>
<main>
    <template id="template"></template>
            <div class="content-main-art">
            <img class="art" src="img/artisticgym.png" alt="artistic">
            <div class="content-text-art">
                <h2> GIMNASIA ARTISTICA </h2>
                <p> El trampolín moderno fue inventado en 1934 por George Nissen, un gimnasta estadounidense,
                    tras observar a acróbatas de trapecio que hacían piruetas al rebotar en redes de seguridad;
                    fue entonces cuando él construyó el primer prototipo para poder recrear sus acrobacias. <br>
                    El trampolín, que en un principio se utilizó para entrenar a astronautas y atletas que se
                    preparaban para otras disciplinas acrobáticas, pronto se hizo inmensamente popular como deporte
                    por derecho propio. Los primeros campeonatos mundiales de gimnasia en trampolín se organizaron
                    en Londres 1964 y este deporte se incorporó a la Federación Internacional de Gimnasia 34 años
                    más tarde, en 1998.</p>
            </div>
        </div>
    <div class="content-main-art">
        <img class="art" src="img/triatlon.png" alt="artistic">
        <div class="content-text-art">
            <h2> TRIATLÓN </h2>
            <p> La popularidad de este deporte creció a lo largo de la década de 1980 y, en 1989, se fundó la Unión Internacional de Triatlón (ITU) en Aviñón (Francia), que también fue la sede de los primeros campeonatos del mundo, celebrados durante ese mismo año.</p>
        </div>
    </div>
    <div class="content-main-art">
        <img class="art" src="img/trampoline.png" alt="artistic">
        <div class="content-text-art">
            <h2> GIMNASIA EN TRAMPOLÍN </h2>
            <p>El trampolín moderno fue inventado en 1934 por George Nissen, un gimnasta estadounidense, tras observar a acróbatas de trapecio que hacían piruetas al rebotar en redes de seguridad; fue entonces cuando él construyó el primer prototipo para poder recrear sus acrobacias. El trampolín, que en un principio se utilizó para entrenar a astronautas y atletas que se preparaban para otras disciplinas acrobáticas, pronto se hizo inmensamente popular como deporte por derecho propio. Los primeros campeonatos mundiales de gimnasia en trampolín se organizaron en Londres 1964 y este deporte se incorporó a la Federación Internacional de Gimnasia 34 años más tarde, en 1998.</p>
        </div>
    </div>
</main>
<aside class="right">
</aside>
</div>
</body>
</html>