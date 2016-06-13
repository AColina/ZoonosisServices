<?php

/**
 * Created by PhpStorm.
 * User: Xea
 * Date: 4/6/2016
 * Time: 5:04 PM
 */
use Doctrine\ORM\Query\ResultSetMapping;

require '../../../pdo/QueryBuilder.php';

$nombreMunicipio = isset($_GET['nombreMunicipio']) ? $_GET['nombreMunicipio'] : NULL;
if ($nombreMunicipio == NULL) {
    die('El parametro nombreMunicipio es requerido');
}
$year = isset($_GET['year']) ? $_GET['year'] : NULL;
if ($year == NULL) {
    die("El parametro year es requerido");
}
$semana = isset($_GET['semana']) ? $_GET['semana'] : NULL;
if ($semana == NULL) {
    die("El parametro semana es requerido");
}

$db = PDOManager::db;
$host = PDOManager::host;
$user = PDOManager::user;
$pass = PDOManager::pass;
$con = 'mysql:dbname=' . $db . ';host=' . $host;
$pdo = new PDO($con, $user, PDOManager::pass);


$st = $pdo->prepare("Select animal_has_caso.cantidadIngresado, animal.nombre "
        . "FROM municipio "
        . "INNER JOIN parroquia "
        . "ON municipio.id = parroquia.Municipio_id "
        . "INNER JOIN caso "
        . "ON parroquia.id = caso.Parroquia_id "
        . "INNER JOIN semana "
        . "ON caso.Semana_id = semana.id "
        . "INNER JOIN animal_has_caso "
        . "ON caso.id = animal_has_caso.Caso_id "
        . "INNER JOIN animal "
        . "ON animal_has_caso.Animal_id = animal.id "
        . "WHERE municipio.nombre = :nombreMunicipio AND semana.nombre = :semana AND semana.year = :year");
$st->bindParam(':nombreMunicipio', $nombreMunicipio);
$st->bindParam(':semana', $semana);
$st->bindParam(":year", $year);
//    echo $fecha1;

$resultado = $st->execute();

echo json_encode($st->fetchAll());
