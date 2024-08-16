<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=3.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Tipografía -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nabla&family=Rubik+Mono+One&display=swap" rel="stylesheet">
    <!-- Tipografía - Tabla -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kode+Mono:wght@400..700&display=swap" rel="stylesheet">
    <!--- BootStrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Estilos -->
    <link href="styles/styles.css" rel="stylesheet">
    <title>Agregar Jugador</title>
</head>
<body style="font-family: 'Rubik Mono One', monospace">
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
                <li class="nav-item">
                    <a class="nav-link disabled" aria-disabled="true">Participantes</a>
                </li>
            </ul>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>
<!-- End Navbar -->
<header>
    <h1>Modificar Competidor</h1>
</header>
<div class="main">
    <aside class="left" >
    </aside>
    <main>
        <?php
        include ("./database/conexion.php");
        $orden = $_GET['orden'];

        $sql = "SELECT * FROM listado WHERE orden = :orden";
        $pdo = abrirBase_pdo();
        $statement = $pdo->prepare($sql);
        $statement->execute([':orden' => $orden]);
        $participante = $statement->fetch(PDO::FETCH_ASSOC);

        if (!$participante) {
            echo "No se encontró el jugador con el ID especificado";
            exit;
        }
        ?>
        <form action="./database/update.php" method="post">
            <input type="hidden" name="orden" value="<?php echo $participante['orden']; ?>">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre Completo</label><span style="color: red !important; display: inline; float: none;">*</span>
                <input type="text" name="nombre" class="form-control" id="nombre" pattern="[a-zA-Z\s]+" value="<?php echo $participante['nombre']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="genero" class="form-label">Genero</label><span style="color: red !important; display: inline; float: none;">*</span>
                <select id="genero" name="genero" class="form-select" >
                    <option value="Masculino" <?php if($participante['genero'] == 'Masculino') echo 'selected;' ?> >Masculino</option>
                    <option value="Femenino" <?php if($participante['genero'] == 'Femenimo') echo 'selected;' ?>>Femenino</option>
                    <option value="No Binario" <?php if($participante['genero'] == 'No Binario') echo 'selected;' ?>>No Binario</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="fecha_nac" class="form-label">Fecha de Nacimiento</label><span style="color: red !important; display: inline; float: none;">*</span>
                <input type="date" name="fecha_nac" class="form-control" id="fecha_nac" min="1990-01-01" max="2005-12-31" value="<?php echo $participante['fecha_nac']; ?>" required >
            </div>
            <div class="mb-3">
                <label for="pais">País</label><span style="color: red !important; display: inline; float: none;">*</span>
                <select id="pais" name="pais" class="form-control">
                    <option value="Afghanistan" <?php if($participante['pais'] == 'Afghanistan') echo 'selected;' ?> >Afghanistan</option>
                    <option value="Åland Islands" <?php if($participante['pais'] == 'Åland Islands') echo 'selected;' ?>>Åland Islands</option>
                    <option value="Albania" <?php if($participante['pais'] == 'Albania') echo 'selected;' ?>>Albania</option>
                    <option value="Algeria" <?php if($participante['pais'] == 'Algeria') echo 'selected;' ?>>Algeria</option>
                    <option value="American Samoa" <?php if($participante['pais'] == 'American Samoa') echo 'selected;' ?>>American Samoa</option>
                    <option value="Andorra" <?php if($participante['pais'] == 'Andorra') echo 'selected;' ?>>Andorra</option>
                    <option value="Angola" <?php if($participante['pais'] == 'Angola') echo 'selected;' ?>>Angola</option>
                    <option value="Anguilla" <?php if($participante['pais'] == 'Anguilla') echo 'selected;' ?>>Anguilla</option>
                    <option value="Antarctica" <?php if($participante['pais'] == 'Antarctica') echo 'selected;' ?>>Antarctica</option>
                    <option value="Antigua and Barbuda" <?php if($participante['pais'] == 'Antigua and Barbuda') echo 'selected;' ?>>Antigua and Barbuda</option>
                    <option value="Argentina" <?php if($participante['pais'] == 'Argentina') echo 'selected;' ?>>Argentina</option>
                    <option value="Armenia" <?php if($participante['pais'] == 'Armenia') echo 'selected;' ?>>Armenia</option>
                    <option value="Aruba" <?php if($participante['pais'] == 'Aruba') echo 'selected;' ?>>Aruba</option>
                    <option value="Australia"<?php if($participante['pais'] == 'Australia') echo 'selected;' ?>>Australia</option>
                    <option value="Austria"<?php if($participante['pais'] == 'Austria') echo 'selected;' ?>>Austria</option>
                    <option value="Azerbaijan"<?php if($participante['pais'] == 'Azerbaijan') echo 'selected;' ?>>Azerbaijan</option>
                    <option value="Bahamas"<?php if($participante['pais'] == 'Bahamas') echo 'selected;' ?>>Bahamas</option>
                    <option value="Bahrain"<?php if($participante['pais'] == 'Bahrain') echo 'selected;' ?>>Bahrain</option>
                    <option value="Bangladesh"<?php if($participante['pais'] == 'Bangladesh') echo 'selected;' ?>>Bangladesh</option>
                    <option value="Barbados"<?php if($participante['pais'] == 'Barbados') echo 'selected;' ?>>Barbados</option>
                    <option value="Belarus"<?php if($participante['pais'] == 'Belarus') echo 'selected;' ?>>Belarus</option>
                    <option value="Belgium"<?php if($participante['pais'] == 'Belgium') echo 'selected;' ?>>Belgium</option>
                    <option value="Belize"<?php if($participante['pais'] == 'Belize') echo 'selected;' ?>>Belize</option>
                    <option value="Benin"<?php if($participante['pais'] == 'Benin') echo 'selected;' ?>>Benin</option>
                    <option value="Bermuda"<?php if($participante['pais'] == 'Bermuda') echo 'selected;' ?>>Bermuda</option>
                    <option value="Bhutan"<?php if($participante['pais'] == 'Bhutan') echo 'selected;' ?>>Bhutan</option>
                    <option value="Bolivia"<?php if($participante['pais'] == 'Bolivia') echo 'selected;' ?>>Bolivia</option>
                    <option value="Bosnia and Herzegovina"<?php if($participante['pais'] == 'Bosnia and Herzegovina') echo 'selected;' ?>>Bosnia and Herzegovina</option>
                    <option value="Botswana"<?php if($participante['pais'] == 'Botswana') echo 'selected;' ?>>Botswana</option>
                    <option value="Bouvet Island"<?php if($participante['pais'] == 'Bouvet Island') echo 'selected;' ?>>Bouvet Island</option>
                    <option value="Brazil"<?php if($participante['pais'] == 'Brazil') echo 'selected;' ?>>Brazil</option>
                    <option value="British Indian Ocean Territory"<?php if($participante['pais'] == 'British Indian Ocean Territory') echo 'selected;' ?>>British Indian Ocean Territory</option>
                    <option value="Brunei Darussalam"<?php if($participante['pais'] == 'Brunei Darussalam') echo 'selected;' ?>>Brunei Darussalam</option>
                    <option value="Bulgaria"<?php if($participante['pais'] == 'Bulgaria') echo 'selected;' ?>>Bulgaria</option>
                    <option value="Burkina Faso"<?php if($participante['pais'] == 'Burkina Faso') echo 'selected;' ?>>Burkina Faso</option>
                    <option value="Burundi"<?php if($participante['pais'] == 'Burundi') echo 'selected;' ?>>Burundi</option>
                    <option value="Cambodia"<?php if($participante['pais'] == 'Cambodia') echo 'selected;' ?>>Cambodia</option>
                    <option value="Cameroon"<?php if($participante['pais'] == 'Cameroon') echo 'selected;' ?>>Cameroon</option>
                    <option value="Canada"<?php if($participante['pais'] == 'Canada') echo 'selected;' ?>>Canada</option>
                    <option value="Cape Verde"<?php if($participante['pais'] == 'Cape Verde') echo 'selected;' ?>>Cape Verde</option>
                    <option value="Cayman Islands"<?php if($participante['pais'] == 'Cayman Islands') echo 'selected;' ?>>Cayman Islands</option>
                    <option value="Central African Republic"<?php if($participante['pais'] == 'Central African Republic') echo 'selected;' ?>>Central African Republic</option>
                    <option value="Chad"<?php if($participante['pais'] == 'Chad') echo 'selected;' ?>>Chad</option>
                    <option value="Chile"<?php if($participante['pais'] == 'Chile') echo 'selected;' ?>>Chile</option>
                    <option value="China"<?php if($participante['pais'] == 'China') echo 'selected;' ?>>China</option>
                    <option value="Christmas Island"<?php if($participante['pais'] == 'Christmas Island') echo 'selected;' ?>>Christmas Island</option>
                    <option value="Cocos (Keeling) Islands"<?php if($participante['pais'] == 'Cocos (Keeling) Islands') echo 'selected;' ?>>Cocos (Keeling) Islands</option>
                    <option value="Colombia"<?php if($participante['pais'] == 'Colombia') echo 'selected;' ?>>Colombia</option>
                    <option value="Comoros"<?php if($participante['pais'] == 'Comoros') echo 'selected;' ?>>Comoros</option>
                    <option value="Congo"<?php if($participante['pais'] == 'Congo') echo 'selected;' ?>>Congo</option>
                    <option value="Congo, The Democratic Republic of The"<?php if($participante['pais'] == 'Congo, The Democratic Republic of The') echo 'selected;' ?>>Congo, The Democratic Republic of The</option>
                    <option value="Cook Islands"<?php if($participante['pais'] == 'Cook Islands') echo 'selected;' ?>>Cook Islands</option>
                    <option value="Costa Rica"<?php if($participante['pais'] == 'Costa Rica') echo 'selected;' ?>>Costa Rica</option>
                    <option value="Cote D'ivoire"<?php if($participante['pais'] == 'Cote Divoire') echo 'selected;' ?>>Cote D'ivoire</option>
                    <option value="Croatia"<?php if($participante['pais'] == 'Croatia') echo 'selected;' ?>>Croatia</option>
                    <option value="Cuba"<?php if($participante['pais'] == 'Cuba') echo 'selected;' ?>>Cuba</option>
                    <option value="Cyprus"<?php if($participante['pais'] == 'Cyprus') echo 'selected;' ?>>Cyprus</option>
                    <option value="Czech Republic" <?php if($participante['pais'] == 'Czech Republic') echo 'selected;' ?>>Czech Republic</option>
                    <option value="Denmark"<?php if($participante['pais'] == 'Denmark') echo 'selected;' ?>>Denmark</option>
                    <option value="Djibouti"<?php if($participante['pais'] == 'Djibouti') echo 'selected;' ?>>Djibouti</option>
                    <option value="Dominica"<?php if($participante['pais'] == 'Dominica') echo 'selected;' ?>>Dominica</option>
                    <option value="Dominican Republic"<?php if($participante['pais'] == 'Dominican Republic') echo 'selected;' ?>>Dominican Republic</option>
                    <option value="Ecuador"<?php if($participante['pais'] == 'Ecuador') echo 'selected;' ?>>Ecuador</option>
                    <option value="Egypt"<?php if($participante['pais'] == 'Egypt') echo 'selected;' ?>>Egypt</option>
                    <option value="El Salvador"<?php if($participante['pais'] == 'El Salvador') echo 'selected;' ?>>El Salvador</option>
                    <option value="Equatorial Guinea"<?php if($participante['pais'] == 'Equatorial Guinea') echo 'selected;' ?>>Equatorial Guinea</option>
                    <option value="Eritrea"<?php if($participante['pais'] == 'Eritrea') echo 'selected;' ?>>Eritrea</option>
                    <option value="Estonia"<?php if($participante['pais'] == 'Estonia') echo 'selected;' ?>>Estonia</option>
                    <option value="Ethiopia"<?php if($participante['pais'] == 'Ethiopia') echo 'selected;' ?>>Ethiopia</option>
                    <option value="Falkland Islands (Malvinas)"<?php if($participante['pais'] == 'Falkland Islands (Malvinas)') echo 'selected;' ?>>Falkland Islands (Malvinas)</option>
                    <option value="Faroe Islands"<?php if($participante['pais'] == 'Faroe Islands') echo 'selected;' ?>>Faroe Islands</option>
                    <option value="Fiji"<?php if($participante['pais'] == 'Fiji') echo 'selected;' ?>>Fiji</option>
                    <option value="Finland"<?php if($participante['pais'] == 'Finland') echo 'selected;' ?>>Finland</option>
                    <option value="France"<?php if($participante['pais'] == 'France') echo 'selected;' ?>>France</option>
                    <option value="French Guiana"<?php if($participante['pais'] == 'French Guiana') echo 'selected;' ?>>French Guiana</option>
                    <option value="French Polynesia"<?php if($participante['pais'] == 'French Polynesia') echo 'selected;' ?>>French Polynesia</option>
                    <option value="French Southern Territories"<?php if($participante['pais'] == 'French Southern Territories') echo 'selected;' ?>>French Southern Territories</option>
                    <option value="Gabon"<?php if($participante['pais'] == 'Gabon') echo 'selected;' ?>>Gabon</option>
                    <option value="Gambia"<?php if($participante['pais'] == 'Gambia') echo 'selected;' ?>>Gambia</option>
                    <option value="Georgia"<?php if($participante['pais'] == 'Georgia') echo 'selected;' ?>>Georgia</option>
                    <option value="Germany"<?php if($participante['pais'] == 'Germany') echo 'selected;' ?>>Germany</option>
                    <option value="Ghana"<?php if($participante['pais'] == 'Ghana') echo 'selected;' ?>>Ghana</option>
                    <option value="Gibraltar"<?php if($participante['pais'] == 'Gibraltar') echo 'selected;' ?>>Gibraltar</option>
                    <option value="Greece"<?php if($participante['pais'] == 'Greece') echo 'selected;' ?>>Greece</option>
                    <option value="Greenland"<?php if($participante['pais'] == 'Greenland') echo 'selected;' ?>>Greenland</option>
                    <option value="Grenada"<?php if($participante['pais'] == 'Grenada') echo 'selected;' ?>>Grenada</option>
                    <option value="Guadeloupe"<?php if($participante['pais'] == 'Guadeloupe') echo 'selected;' ?>>Guadeloupe</option>
                    <option value="Guam"<?php if($participante['pais'] == 'Guam') echo 'selected;' ?>>Guam</option>
                    <option value="Guatemala"<?php if($participante['pais'] == 'Guatemala') echo 'selected;' ?>>Guatemala</option>
                    <option value="Guernsey"<?php if($participante['pais'] == 'Guernsey') echo 'selected;' ?>>Guernsey</option>
                    <option value="Guinea"<?php if($participante['pais'] == 'Guinea') echo 'selected;' ?>>Guinea</option>
                    <option value="Guinea-bissau"<?php if($participante['pais'] == 'Guinea-bissau') echo 'selected;' ?>>Guinea-bissau</option>
                    <option value="Guyana"<?php if($participante['pais'] == 'Guyana') echo 'selected;' ?>>Guyana</option>
                    <option value="Haiti"<?php if($participante['pais'] == 'Haiti') echo 'selected;' ?>>Haiti</option>
                    <option value="Heard Island and Mcdonald Islands"<?php if($participante['pais'] == 'Heard Island and Mcdonald Islands') echo 'selected;' ?>>Heard Island and Mcdonald Islands</option>
                    <option value="Holy See (Vatican City State)"<?php if($participante['pais'] == 'Holy See (Vatican City State)') echo 'selected;' ?>>Holy See (Vatican City State)</option>
                    <option value="Honduras"<?php if($participante['pais'] == 'Honduras') echo 'selected;' ?>>Honduras</option>
                    <option value="Hong Kong"<?php if($participante['pais'] == 'Hong Kong') echo 'selected;' ?>>Hong Kong</option>
                    <option value="Hungary"<?php if($participante['pais'] == 'Hungary') echo 'selected;' ?>>Hungary</option>
                    <option value="Iceland"<?php if($participante['pais'] == 'Iceland') echo 'selected;' ?>>Iceland</option>
                    <option value="India"<?php if($participante['pais'] == 'India') echo 'selected;' ?>>India</option>
                    <option value="Indonesia"<?php if($participante['pais'] == 'Indonesia') echo 'selected;' ?>>Indonesia</option>
                    <option value="Iran, Islamic Republic of"<?php if($participante['pais'] == 'Iran, Islamic Republic of') echo 'selected;' ?>>Iran, Islamic Republic of</option>
                    <option value="Iraq"<?php if($participante['pais'] == 'Iraq') echo 'selected;' ?>>Iraq</option>
                    <option value="Ireland"<?php if($participante['pais'] == 'Ireland') echo 'selected;' ?>>Ireland</option>
                    <option value="Isle of Man"<?php if($participante['pais'] == 'Isle of Man') echo 'selected;' ?>>Isle of Man</option>
                    <option value="Israel"<?php if($participante['pais'] == 'Israel') echo 'selected;' ?>>Israel</option>
                    <option value="Italy"<?php if($participante['pais'] == 'Italy') echo 'selected;' ?>>Italy</option>
                    <option value="Jamaica"<?php if($participante['pais'] == 'Jamaica') echo 'selected;' ?>>Jamaica</option>
                    <option value="Japan"<?php if($participante['pais'] == 'Japan') echo 'selected;' ?>>Japan</option>
                    <option value="Jersey"<?php if($participante['pais'] == 'Jersey') echo 'selected;' ?>>Jersey</option>
                    <option value="Jordan"<?php if($participante['pais'] == 'Jordan') echo 'selected;' ?>>Jordan</option>
                    <option value="Kazakhstan"<?php if($participante['pais'] == 'Kazakhstan') echo 'selected;' ?>>Kazakhstan</option>
                    <option value="Kenya"<?php if($participante['pais'] == 'Kenya') echo 'selected;' ?>>Kenya</option>
                    <option value="Kiribati"<?php if($participante['pais'] == 'Kiribati') echo 'selected;' ?>>Kiribati</option>
                    <option value="Korea, Democratic People's Republic of"<?php if($participante['pais'] == 'Korea, Democratic People´s Republic of') echo 'selected;' ?>>Korea, Democratic People's Republic of</option>
                    <option value="Korea, Republic of"<?php if($participante['pais'] == 'Korea, Republic of') echo 'selected;' ?>>Korea, Republic of</option>
                    <option value="Kuwait"<?php if($participante['pais'] == 'Kuwait') echo 'selected;' ?>>Kuwait</option>
                    <option value="Kyrgyzstan"<?php if($participante['pais'] == 'Kyrgyzstan') echo 'selected;' ?>>Kyrgyzstan</option>
                    <option value="Lao People's Democratic Republic"<?php if($participante['pais'] == 'Lao People´s Democratic Republic') echo 'selected;' ?>>Lao People's Democratic Republic</option>
                    <option value="Latvia"<?php if($participante['pais'] == 'Latvia') echo 'selected;' ?>>Latvia</option>
                    <option value="Lebanon"<?php if($participante['pais'] == 'Lebanon') echo 'selected;' ?>>Lebanon</option>
                    <option value="Lesotho"<?php if($participante['pais'] == 'Lesotho') echo 'selected;' ?>>Lesotho</option>
                    <option value="Liberia"<?php if($participante['pais'] == 'Liberia') echo 'selected;' ?>>Liberia</option>
                    <option value="Libyan Arab Jamahiriya"<?php if($participante['pais'] == 'Libyan Arab Jamahiriya') echo 'selected;' ?>>Libyan Arab Jamahiriya</option>
                    <option value="Liechtenstein"<?php if($participante['pais'] == 'Liechtenstein') echo 'selected;' ?>>Liechtenstein</option>
                    <option value="Lithuania"<?php if($participante['pais'] == 'Lithuania') echo 'selected;' ?>>Lithuania</option>
                    <option value="Luxembourg"<?php if($participante['pais'] == 'Luxembourg') echo 'selected;' ?>>Luxembourg</option>
                    <option value="Macao"<?php if($participante['pais'] == 'Macao') echo 'selected;' ?>>Macao</option>
                    <option value="Macedonia, The Former Yugoslav Republic of"<?php if($participante['pais'] == 'Macedonia, The Former Yugoslav Republic of') echo 'selected;' ?>>Macedonia, The Former Yugoslav Republic of</option>
                    <option value="Madagascar"<?php if($participante['pais'] == 'Madagascar') echo 'selected;' ?>>Madagascar</option>
                    <option value="Malawi"<?php if($participante['pais'] == 'Malawi') echo 'selected;' ?>>Malawi</option>
                    <option value="Malaysia"<?php if($participante['pais'] == 'Malaysia') echo 'selected;' ?>>Malaysia</option>
                    <option value="Maldives"<?php if($participante['pais'] == 'Maldives') echo 'selected;' ?>>Maldives</option>
                    <option value="Mali"<?php if($participante['pais'] == 'Mali') echo 'selected;' ?>>Mali</option>
                    <option value="Malta"<?php if($participante['pais'] == 'Malta') echo 'selected;' ?>>Malta</option>
                    <option value="Marshall Islands"<?php if($participante['pais'] == 'Marshall Islands') echo 'selected;' ?>>Marshall Islands</option>
                    <option value="Martinique"<?php if($participante['pais'] == 'Martinique') echo 'selected;' ?>>Martinique</option>
                    <option value="Mauritania"<?php if($participante['pais'] == 'Mauritania') echo 'selected;' ?>>Mauritania</option>
                    <option value="Mauritius"<?php if($participante['pais'] == 'Mauritius') echo 'selected;' ?>>Mauritius</option>
                    <option value="Mayotte"<?php if($participante['pais'] == 'Mayotte') echo 'selected;' ?>>Mayotte</option>
                    <option value="Mexico"<?php if($participante['pais'] == 'Mexico') echo 'selected;' ?>>Mexico</option>
                    <option value="Micronesia, Federated States of"<?php if($participante['pais'] == 'Micronesia, Federated States of') echo 'selected;' ?>>Micronesia, Federated States of</option>
                    <option value="Moldova, Republic of"<?php if($participante['pais'] == 'Moldova, Republic of') echo 'selected;' ?>>Moldova, Republic of</option>
                    <option value="Monaco"<?php if($participante['pais'] == 'Monaco') echo 'selected;' ?>>Monaco</option>
                    <option value="Mongolia"<?php if($participante['pais'] == 'Mongolia') echo 'selected;' ?>>Mongolia</option>
                    <option value="Montenegro"<?php if($participante['pais'] == 'Montenegro') echo 'selected;' ?>>Montenegro</option>
                    <option value="Montserrat"<?php if($participante['pais'] == 'Montserrat') echo 'selected;' ?>>Montserrat</option>
                    <option value="Morocco"<?php if($participante['pais'] == 'Morocco') echo 'selected;' ?>>Morocco</option>
                    <option value="Mozambique"<?php if($participante['pais'] == 'Mozambique') echo 'selected;' ?>>Mozambique</option>
                    <option value="Myanmar"<?php if($participante['pais'] == 'Myanmar') echo 'selected;' ?>>Myanmar</option>
                    <option value="Namibia"<?php if($participante['pais'] == 'Namibia') echo 'selected;' ?>>Namibia</option>
                    <option value="Nauru"<?php if($participante['pais'] == 'Nauru') echo 'selected;' ?>>Nauru</option>
                    <option value="Nepal"<?php if($participante['pais'] == 'Nepal') echo 'selected;' ?>>Nepal</option>
                    <option value="Netherlands"<?php if($participante['pais'] == 'Netherlands') echo 'selected;' ?>>Netherlands</option>
                    <option value="Netherlands Antilles"<?php if($participante['pais'] == 'Netherlands Antilles') echo 'selected;' ?>>Netherlands Antilles</option>
                    <option value="New Caledonia"<?php if($participante['pais'] == 'New Caledonia') echo 'selected;' ?>>New Caledonia</option>
                    <option value="New Zealand"<?php if($participante['pais'] == 'New Zealand') echo 'selected;' ?>>New Zealand</option>
                    <option value="Nicaragua"<?php if($participante['pais'] == 'Nicaragua') echo 'selected;' ?>>Nicaragua</option>
                    <option value="Niger"<?php if($participante['pais'] == 'Niger') echo 'selected;' ?>>Niger</option>
                    <option value="Nigeria"<?php if($participante['pais'] == 'Nigeria') echo 'selected;' ?>>Nigeria</option>
                    <option value="Niue"<?php if($participante['pais'] == 'Niue') echo 'selected;' ?>>Niue</option>
                    <option value="Norfolk Island"<?php if($participante['pais'] == 'Norfolk Island') echo 'selected;' ?>>Norfolk Island</option>
                    <option value="Northern Mariana Islands"<?php if($participante['pais'] == 'Northern Mariana Islands') echo 'selected;' ?>>Northern Mariana Islands</option>
                    <option value="Norway"<?php if($participante['pais'] == 'Norway') echo 'selected;' ?>>Norway</option>
                    <option value="Oman"<?php if($participante['pais'] == 'Oman') echo 'selected;' ?>>Oman</option>
                    <option value="Pakistan"<?php if($participante['pais'] == 'Pakistan') echo 'selected;' ?>>Pakistan</option>
                    <option value="Palau"<?php if($participante['pais'] == 'Palau') echo 'selected;' ?>>Palau</option>
                    <option value="Palestinian Territory, Occupied"<?php if($participante['pais'] == 'Palestinian Territory, Occupied') echo 'selected;' ?>>Palestinian Territory, Occupied</option>
                    <option value="Panama"<?php if($participante['pais'] == 'Panama') echo 'selected;' ?>>Panama</option>
                    <option value="Papua New Guinea"<?php if($participante['pais'] == 'Papua New Guinea') echo 'selected;' ?>>Papua New Guinea</option>
                    <option value="Paraguay"<?php if($participante['pais'] == 'Paraguay') echo 'selected;' ?>>Paraguay</option>
                    <option value="Peru"<?php if($participante['pais'] == 'Peru') echo 'selected;' ?>>Peru</option>
                    <option value="Philippines"<?php if($participante['pais'] == 'Philippines') echo 'selected;' ?>>Philippines</option>
                    <option value="Pitcairn"<?php if($participante['pais'] == 'Pitcairn') echo 'selected;' ?>>Pitcairn</option>
                    <option value="Poland"<?php if($participante['pais'] == 'Poland') echo 'selected;' ?>>Poland</option>
                    <option value="Portugal"<?php if($participante['pais'] == 'Portugal') echo 'selected;' ?>>Portugal</option>
                    <option value="Puerto Rico"<?php if($participante['pais'] == 'Puerto Rico') echo 'selected;' ?>>Puerto Rico</option>
                    <option value="Qatar"<?php if($participante['pais'] == 'Qatar') echo 'selected;' ?>>Qatar</option>
                    <option value="Reunion"<?php if($participante['pais'] == 'Reunion') echo 'selected;' ?>>Reunion</option>
                    <option value="Romania"<?php if($participante['pais'] == 'Romania') echo 'selected;' ?>>Romania</option>
                    <option value="Russian Federation"<?php if($participante['pais'] == 'Russian Federation') echo 'selected;' ?>>Russian Federation</option>
                    <option value="Rwanda"<?php if($participante['pais'] == 'Rwanda') echo 'selected;' ?>>Rwanda</option>
                    <option value="Saint Helena"<?php if($participante['pais'] == 'Saint Helena') echo 'selected;' ?>>Saint Helena</option>
                    <option value="Saint Kitts and Nevis"<?php if($participante['pais'] == 'Saint Kitts and Nevis') echo 'selected;' ?>>Saint Kitts and Nevis</option>
                    <option value="Saint Lucia"<?php if($participante['pais'] == 'Saint Lucia') echo 'selected;' ?>>Saint Lucia</option>
                    <option value="Saint Pierre and Miquelon"<?php if($participante['pais'] == 'Saint Pierre and Miquelon') echo 'selected;' ?>>Saint Pierre and Miquelon</option>
                    <option value="Saint Vincent and The Grenadines"<?php if($participante['pais'] == 'Saint Vincent and The Grenadines') echo 'selected;' ?>>Saint Vincent and The Grenadines</option>
                    <option value="Samoa"<?php if($participante['pais'] == 'Samoa') echo 'selected;' ?>>Samoa</option>
                    <option value="San Marino"<?php if($participante['pais'] == 'San Marino') echo 'selected;' ?>>San Marino</option>
                    <option value="Sao Tome and Principe"<?php if($participante['pais'] == 'Sao Tome and Principe') echo 'selected;' ?>>Sao Tome and Principe</option>
                    <option value="Saudi Arabia"<?php if($participante['pais'] == 'Saudi Arabia') echo 'selected;' ?>>Saudi Arabia</option>
                    <option value="Senegal"<?php if($participante['pais'] == 'Senegal') echo 'selected;' ?>>Senegal</option>
                    <option value="Serbia"<?php if($participante['pais'] == 'Serbia') echo 'selected;' ?>>Serbia</option>
                    <option value="Seychelles"<?php if($participante['pais'] == 'Seychelles') echo 'selected;' ?>>Seychelles</option>
                    <option value="Sierra Leone"<?php if($participante['pais'] == 'Sierra Leone') echo 'selected;' ?>>Sierra Leone</option>
                    <option value="Singapore"<?php if($participante['pais'] == 'Singapore') echo 'selected;' ?>>Singapore</option>
                    <option value="Slovakia"<?php if($participante['pais'] == 'Slovakia') echo 'selected;' ?>>Slovakia</option>
                    <option value="Slovenia"<?php if($participante['pais'] == 'Slovenia') echo 'selected;' ?>>Slovenia</option>
                    <option value="Solomon Islands"<?php if($participante['pais'] == 'Solomon Islands') echo 'selected;' ?>>Solomon Islands</option>
                    <option value="Somalia"<?php if($participante['pais'] == 'Somalia') echo 'selected;' ?>>Somalia</option>
                    <option value="South Africa"<?php if($participante['pais'] == 'South Africa') echo 'selected;' ?>>South Africa</option>
                    <option value="South Georgia and The South Sandwich Islands"<?php if($participante['pais'] == 'South Georgia and The South Sandwich Islands') echo 'selected;' ?>>South Georgia and The South Sandwich Islands</option>
                    <option value="Spain"<?php if($participante['pais'] == 'Spain') echo 'selected;' ?>>Spain</option>
                    <option value="Sri Lanka"<?php if($participante['pais'] == 'Sri Lanka') echo 'selected;' ?>>Sri Lanka</option>
                    <option value="Sudan"<?php if($participante['pais'] == 'Sudan') echo 'selected;' ?>>Sudan</option>
                    <option value="Suriname"<?php if($participante['pais'] == 'Suriname') echo 'selected;' ?>>Suriname</option>
                    <option value="Svalbard and Jan Mayen"<?php if($participante['pais'] == 'Svalbard and Jan Mayen') echo 'selected;' ?>>Svalbard and Jan Mayen</option>
                    <option value="Swaziland"<?php if($participante['pais'] == 'Swaziland') echo 'selected;' ?>>Swaziland</option>
                    <option value="Sweden"<?php if($participante['pais'] == 'Sweden') echo 'selected;' ?>>Sweden</option>
                    <option value="Switzerland"<?php if($participante['pais'] == 'Switzerland') echo 'selected;' ?>>Switzerland</option>
                    <option value="Syrian Arab Republic"<?php if($participante['pais'] == 'Syrian Arab Republic') echo 'selected;' ?>>Syrian Arab Republic</option>
                    <option value="Taiwan"<?php if($participante['pais'] == 'Taiwan') echo 'selected;' ?>>Taiwan</option>
                    <option value="Tajikistan"<?php if($participante['pais'] == 'Tajikistan') echo 'selected;' ?>>Tajikistan</option>
                    <option value="Tanzania, United Republic of"<?php if($participante['pais'] == 'Tanzania, United Republic of') echo 'selected;' ?>>Tanzania, United Republic of</option>
                    <option value="Thailand"<?php if($participante['pais'] == 'Thailand') echo 'selected;' ?>>Thailand</option>
                    <option value="Timor-leste"<?php if($participante['pais'] == 'Timor-leste') echo 'selected;' ?>>Timor-leste</option>
                    <option value="Togo"<?php if($participante['pais'] == 'Togo') echo 'selected;' ?>>Togo</option>
                    <option value="Tokelau"<?php if($participante['pais'] == 'Tokelau') echo 'selected;' ?>>Tokelau</option>
                    <option value="Tonga"<?php if($participante['pais'] == 'Tonga') echo 'selected;' ?>>Tonga</option>
                    <option value="Trinidad and Tobago"<?php if($participante['pais'] == 'Trinidad and Tobago') echo 'selected;' ?>>Trinidad and Tobago</option>
                    <option value="Tunisia"<?php if($participante['pais'] == 'Tunisia') echo 'selected;' ?>>Tunisia</option>
                    <option value="Turkey"<?php if($participante['pais'] == 'Turkey') echo 'selected;' ?>>Turkey</option>
                    <option value="Turkmenistan"<?php if($participante['pais'] == 'Turkmenistan') echo 'selected;' ?>>Turkmenistan</option>
                    <option value="Turks and Caicos Islands"<?php if($participante['pais'] == 'Turks and Caicos Islands') echo 'selected;' ?>>Turks and Caicos Islands</option>
                    <option value="Tuvalu"<?php if($participante['pais'] == 'Tuvalu') echo 'selected;' ?>>Tuvalu</option>
                    <option value="Uganda"<?php if($participante['pais'] == 'Uganda') echo 'selected;' ?>>Uganda</option>
                    <option value="Ukraine"<?php if($participante['pais'] == 'Ukraine') echo 'selected;' ?>>Ukraine</option>
                    <option value="United Arab Emirates"<?php if($participante['pais'] == 'United Arab Emirates') echo 'selected;' ?>>United Arab Emirates</option>
                    <option value="United Kingdom"<?php if($participante['pais'] == 'United Kingdom') echo 'selected;' ?>>United Kingdom</option>
                    <option value="United States"<?php if($participante['pais'] == 'United States') echo 'selected;' ?>>United States</option>
                    <option value="United States Minor Outlying Islands"<?php if($participante['pais'] == 'United States Minor Outlying Islands') echo 'selected;' ?>>United States Minor Outlying Islands</option>
                    <option value="Uruguay"<?php if($participante['pais'] == 'Uruguay') echo 'selected;' ?>>Uruguay</option>
                    <option value="Uzbekistan"<?php if($participante['pais'] == 'Uzbekistan') echo 'selected;' ?>>Uzbekistan</option>
                    <option value="Vanuatu"<?php if($participante['pais'] == 'Vanuatu') echo 'selected;' ?>>Vanuatu</option>
                    <option value="Venezuela"<?php if($participante['pais'] == 'Venezuela') echo 'selected;' ?>>Venezuela</option>
                    <option value="Viet Nam"<?php if($participante['pais'] == 'Viet Nam') echo 'selected;' ?>>Viet Nam</option>
                    <option value="Virgin Islands, British"<?php if($participante['pais'] == 'Virgin Islands, British') echo 'selected;' ?>>Virgin Islands, British</option>
                    <option value="Virgin Islands, U.S."<?php if($participante['pais'] == 'Virgin Islands, U.S.') echo 'selected;' ?>>Virgin Islands, U.S.</option>
                    <option value="Wallis and Futuna"<?php if($participante['pais'] == 'Wallis and Futuna') echo 'selected;' ?>>Wallis and Futuna</option>
                    <option value="Western Sahara"<?php if($participante['pais'] == 'Western Sahara') echo 'selected;' ?>>Western Sahara</option>
                    <option value="Yemen"<?php if($participante['pais'] == 'Yemen') echo 'selected;' ?>>Yemen</option>
                    <option value="Zambia"<?php if($participante['pais'] == 'Zambia') echo 'selected;' ?>>Zambia</option>
                    <option value="Zimbabwe"<?php if($participante['pais'] == 'Zimbabwe') echo 'selected;' ?>>Zimbabwe</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="deporte" class="form-label">Deporte</label><span style="color: red !important; display: inline; float: none;">*</span>
                <select id="deporte" name="deporte" class="form-control">
                    <option value="Gimnasia Artística" <?php if($participante['deporte'] == 'Gimnasia Artística') echo 'selected;' ?> >Gimnasia Artística</option>
                    <option value="Gimnasia En Trampolín" <?php if($participante['deporte'] == 'Gimnasia En Trampolín') echo 'selected;' ?> >Gimnasia En Trampolín</option>
                    <option value="Triatlón" <?php if($participante['deporte'] == 'Triatlón') echo 'selected;' ?>>Triatlón</option>
                </select>
            </div>
            <button type="submit" value="Modificar" style="background-color: #A6BCDB; color: white; border-color: white">Enviar</button>
        </form>

    </main>
    <aside class="right">
    </aside>
</div>
</body>
</html>
