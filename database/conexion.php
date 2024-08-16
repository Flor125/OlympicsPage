<?php
date_default_timezone_set('America/Argentina/Buenos_Aires') ;
 /*
 //Internet 
 $c_database = "unvime";
 $c_conexion ="localhost";
 $c_usuario ="root" ;
 $c_password = "";
*/
 // Local
 $c_database = "olimpiadas";
 $c_conexion ="localhost";
 $c_usuario ="root" ;
 $c_password = "";

function abrirBase_pdo(): PDO
{
  global $c_database, $c_conexion, $c_usuario, $c_password;
  $dsn = "mysql:host=$c_conexion;dbname=$c_database";
  $nombre_usuario = $c_usuario;
  $password = $c_password;
  $opciones = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',PDO::ATTR_PERSISTENT => false
  ); 

  $gbd = new PDO($dsn, $nombre_usuario, $password, $opciones);
  return ($gbd);
}

if (!$pdo = abrirBase_pdo()) {
    echo "No me pude conectar";
}

?>


