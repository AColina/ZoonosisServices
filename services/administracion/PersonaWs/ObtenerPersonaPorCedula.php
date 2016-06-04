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
include ('../../../entidades/Administracion/Persona.php');
include ('../../../entidades/Administracion/Cliente.php');
include ('../../../entidades/Administracion/Usuario.php');


$cedula = isset($_GET['cedula']) ? $_GET['cedula'] : NULL;
if ($cedula == NULL) {
    die('El parametro cedula es requerido');
}
$qb = new QueryBuilder("SELECT * FROM Persona");
$query = $qb->agregarCondicion("cedula", "=", $cedula, false, true)
        ->ejecutarQuery();

echo json_encode($query);
