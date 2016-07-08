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


$st = $pdo->prepare("Select registrovacunacion_has_animal.cantidad, parroquia.nombre as nombreparroquia,especie.nombre, vacunacion.fechaElaboracion "
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
        . "ON especie.id = animal.Especie_id "
        . "WHERE municipio.nombre = :nombreMunicipio "
        . "AND semana.year = :year");
$st->bindParam(':nombreMunicipio', $nombreMunicipio);
$st->bindParam(":year", $year);
$resultado = $st->execute();
$r =($st->fetchAll());

echo json_encode(utf8ize($r));

function utf8ize($mixed) {
if (is_array($mixed)) {
    foreach ($mixed as $key => $value) {
        $mixed[$key] = utf8ize($value);
    }
} else if (is_string ($mixed)) {
    return utf8_encode($mixed);
}
return $mixed;
}