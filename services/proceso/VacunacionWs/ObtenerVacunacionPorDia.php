<?php

/*
 * Copyright 2016 angel.colina.
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

$dia = isset($_GET['dia']) ? $_GET['dia'] : NULL;
$parroquia = isset($_GET['parroquia']) ? ceil($_GET['parroquia']) : NULL;

if ($dia == NULL) {
    die('Es obligatorio seleccionar una fecha');
} else if ($parroquia == NULL) {
    die('Es obligatorio seleccionar una parroquia');
}

require_once '../../../pdo/QueryBuilder.php';
require_once '/../../../pdo/Des.php';

$fecha = date_create($dia)->format('Y-m-d');

$qb = new QueryBuilder("SELECT v FROM Vacunacion v JOIN v.parroquia p");
$resultado = $qb->agregarCondicion("v.fechaElaboracion", "=", new DateTime($fecha))->
        agregarCondicion("p.id", "=", $parroquia)->
        ejecutarQuery();
echo Des::toJson(Vacunacion::class, $resultado, 5);
