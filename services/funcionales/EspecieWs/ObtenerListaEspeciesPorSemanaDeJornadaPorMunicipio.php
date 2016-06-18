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


$st = $pdo->prepare("Select registrovacunacion_has_animal.cantidad, especie.nombre "
        . "FROM municipio "
        . "INNER JOIN parroquia "
        . "ON municipio.id = parroquia.Municipio_id "
        . "INNER JOIN vacunacion "
        . "ON parroquia.id = vacunacion.Parroquia_id "
        . "INNER JOIN semana "
        . "ON vacunacion.Semana_id = semana.id "
        . "INNER JOIN registrovacunacion "
        . "ON vacunacion.id = registrovacunacion.Vacunacion_id "
        . "INNER JOIN registrovacunacion_has_animal "
        . "ON registrovacunacion.id = registrovacunacion_has_animal.Registrovacunacion_id "
        . "INNER JOIN animal "
        . "ON registrovacunacion_has_animal.Animal_id = animal.id "
        . "INNER JOIN especie "
        . "ON animal.Especie_id = especie.id "
        . "WHERE municipio.nombre = :nombreMunicipio AND semana.nombre = :semana AND semana.year = :year");
$st->bindParam(':nombreMunicipio', $nombreMunicipio);
$st->bindParam(':semana', $semana);
$st->bindParam(":year", $year);

//echo $st->queryString;
//    echo $fecha1;
$resultado = $st->execute();

echo json_encode($st->fetchAll());
