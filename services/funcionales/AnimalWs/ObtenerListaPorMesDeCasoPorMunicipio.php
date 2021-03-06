<?php

/* 
 * Copyright 2016 Gustavo.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *      http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
use Doctrine\ORM\Query\ResultSetMapping;

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

$st = $pdo->prepare("Select animal_has_caso.cantidadIngresado, animal.nombre "
        . "FROM municipio "
        . "INNER JOIN parroquia "
        . "ON municipio.id = parroquia.Municipio_id "
        . "INNER JOIN caso "
        . "ON parroquia.id = caso.Parroquia_id "
        . "INNER JOIN animal_has_caso "
        . "ON caso.id = animal_has_caso.Caso_id "
        . "INNER JOIN animal "
        . "ON animal_has_caso.Animal_id = animal.id "
        . "WHERE municipio.nombre = :nombreMunicipio AND caso.fechaElaboracion "
        . "BETWEEN :fecha AND LAST_DAY( :fecha )");
$st->bindParam(':nombreMunicipio', $nombreMunicipio);
$st->bindParam(':fecha', $fecha1);

$resultado = $st->execute();
echo json_encode($st->fetchAll());
