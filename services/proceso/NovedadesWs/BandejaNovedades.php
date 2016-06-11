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


require_once '/../../../pdo/QueryBuilder.php';
require_once '../../../pojos/busquedasnovedadespojo.php';
require_once '/../../../pdo/Des.php';

$nombre = isset($_GET['nombre']) ? "LOWER('%" . $_GET['nombre'] . "%')" : NULL;
$desde = isset($_GET['desde']) ? $_GET['desde'] : NULL;
$hasta = isset($_GET['hasta']) ? $_GET['hasta'] : NULL;
$inicio = isset($_GET['inicio']) ? $_GET['inicio'] : -1;
$cantidad = isset($_GET['cantidad']) ? $_GET['cantidad'] : 10;

$qb = new QueryBuilder("SELECT n FROM Novedades n");
$resultado = $qb->agregarCondicion("LOWER(n.nombre)", "LIKE", $nombre, true, true)->
        agregarCondicion("n.fechaElaboracion", ">=", $desde, true, true)->
        agregarCondicion("n.fechaElaboracion", "<=", $hasta, true, true)->
        ejecutarQuery($cantidad, $inicio);

$qb->agregarQuery("SELECT count(n) FROM Novedades n");
$cantidadResultados = $qb->agregarCondicion("LOWER(n.nombre)", "LIKE", $nombre, true, true)->
        agregarCondicion("n.fechaElaboracion", ">=", $desde, true, true)->
        agregarCondicion("n.fechaElaboracion", "<=", $hasta, true, true)->
        ejecutarQuery();
$pojo = new BusquedasNovedadesPojo($cantidadResultados, $resultado);

echo Des::toJson(BusquedasNovedadesPojo::class, $pojo,3);
