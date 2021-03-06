<?php

/**
 * Created by PhpStorm.
 * User: Xea
 * Date: 4/6/2016
 * Time: 5:04 PM
 */
use Doctrine\ORM\Query\ResultSetMapping;

require '../../../pdo/QueryBuilder.php';

$nombreParroquia = isset($_GET['nombreParroquia']) ? $_GET['nombreParroquia'] : NULL;
if ($nombreParroquia == NULL) {
    die('El parametro nombreParroquia es requerido');
}
$year = isset($_GET['year']) ? $_GET['year'] : NULL;
if ($year == NULL) {
    die("El parametro year es requerido");
}

$db = PDOManager::db;
$host = PDOManager::host;
$user = PDOManager::user;
$pass = PDOManager::pass;
$con = 'mysql:dbname=' .$db. ';host=' . $host;
$pdo = new PDO($con, $user, PDOManager::pass);


$st = $pdo->prepare("Select registrovacunacion_has_animal.cantidad, animal.nombre "
        . "FROM parroquia "
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
        . "WHERE parroquia.nombre = :nombreParroquia AND semana.year = :year");
$st->bindParam(':nombreParroquia', $nombreParroquia);
$st->bindParam(":year", $year);

//    echo $fecha1;
$resultado = $st->execute();

echo json_encode($st->fetchAll());
