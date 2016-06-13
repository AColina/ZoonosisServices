<?php

/**
 * Created by PhpStorm.
 * User: Xea
 * Date: 4/6/2016
 * Time: 5:04 PM
 */


require '../../../pdo/QueryBuilder.php';

$nombreMunicipio = isset($_GET['nombreMunicipio']) ? $_GET['nombreMunicipio'] : NULL;
if ($nombreMunicipio == NULL) {
    die('El parametro nombreMunicipio es requerido');
}
$dia = isset($_GET['dia']) ? $_GET['dia'] : NULL;
if ($dia == NULL) {
    die("El parametro dia es requerido");
}

$fecha1 = date_create($dia)->format('Y-m-d');
$db = PDOManager::db;
$host = PDOManager::host;
$user = PDOManager::user;
$pass = PDOManager::pass;
$con = 'mysql:dbname=' .$db. ';host=' . $host;
$pdo = new PDO($con, $user, PDOManager::pass);

  $st =  $pdo->prepare("Select animal_has_caso.cantidadIngresado, animal.nombre "
            . "FROM municipio "
            . "INNER JOIN parroquia "
            . "ON municipio.id = parroquia.Municipio_id "
            . "INNER JOIN caso "
            . "ON parroquia.id = caso.Parroquia_id "
            . "INNER JOIN animal_has_caso "
            . "ON caso.id = animal_has_caso.Caso_id "
            . "INNER JOIN animal "
            . "ON animal_has_caso.Animal_id = animal.id " 
            . "WHERE municipio.nombre = :nombreMunicipio AND caso.fechaElaboracion = :fecha");
    $st->bindParam(':nombreMunicipio', $nombreMunicipio);
    $st->bindParam(':fecha', $fecha1);
//    echo $nombreMunicipio;
//    echo $fecha1;
//    echo $st->queryString;
    $resultado = $st->execute();
    
 echo   json_encode($st->fetchAll());
 