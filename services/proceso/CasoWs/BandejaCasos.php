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


include("../../../conexion/conect.php");
include ("../../../funciones/funcion.php");
include("../../../funciones/AnnotationManager.php");
include ('../../../funciones/QueryBuilder.php');
include ("../../../entidades/Proceso/Caso.php");
require ('../../../pojos/busquedaspojo.php');

$semana = isset($_GET['idSemana']) ? $_GET['idSemana'] : NULL;
$municipio = isset($_GET['idMunicipio']) ? $_GET['idMunicipio'] : NULL;
$parroquia = isset($_GET['idParroquia']) ? $_GET['idParroquia'] : NULL;
$desde = isset($_GET['desde']) ? $_GET['desde'] : NULL;
$hasta = isset($_GET['hasta']) ? $_GET['hasta'] : NULL;
$inicio = isset($_GET['inicio']) ? $_GET['inicio'] : -1;
$cantidad = isset($_GET['cantidad']) ? $_GET['cantidad'] : 10;

$qb = new QueryBuilder("SELECT c.* FROM Caso c "
        . "INNER JOIN Parroquia p on c.Parroquia_id = p.id "
        . "INNER JOIN Municipio m on p.Municipio_id = m.id "
        . "INNER JOIN Semana s on c.Semana_id = s.id");
$resultado = $qb->agregarCondicion("s.id", "=", $semana, true, true)->
        agregarCondicion("m.id", ">", $municipio, true, true)->
        agregarCondicion("p.id", ">", $parroquia, true, true)->
        agregarCondicion("c.fechaElaboracion", ">", $desde, true, true)->
        agregarCondicion("c.fechaElaboracion", "<", $hasta, true, true)->
        ejecutarQuery($cantidad, $inicio);

//$qb->agregarQuery("SELECT Count(c.id) FROM Caso c "
//        . "INNER JOIN Parroquia p on c.Parroquia_id = p.id "
//        . "INNER JOIN Municipio m on p.Municipio_id = m.id "
//        . "INNER JOIN Semana s on c.Semana_id = s.id");
//$cantidadResultados = $qb->agregarCondicion("s.id", "=", $semana, true, true)->
//        agregarCondicion("m.id", ">", $municipio, true, true)->
//        agregarCondicion("p.id", ">", $parroquia, true, true)->
//        agregarCondicion("fechaElaboracion", ">", $desde, true, true)->
//        agregarCondicion("fechaElaboracion", "<", $hasta, true, true)->
//        ejecutarQuery();

$pojo= new BusquedasPojo(count($resultado), $resultado);
echo json_encode($pojo);
