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


//include("../../../conexion/conect.php");
//include ("../../../funciones/funcion.php");
//include("../../../funciones/AnnotationManager.php");
//include ('../../../funciones/QueryBuilder.php');
//include ('../../../entidades/Administracion/Municipio.php');
//include ('../../../entidades/Administracion/Parroquia.php');
//include ('../../../entidades/Proceso/Vacunacion.php');
//include ('../../../entidades/Proceso/RegistroVacunacion.php');
//include ('../../../entidades/Proceso/RegistroVacunacion_has_Animal.php');
//include ('../../../entidades/Proceso/Caso.php');
//include ('../../../entidades/Proceso/Animal_has_Caso.php');

require '../../../pdo/PDOManager.php';
$pdo = new PDOManager();
$r=$pdo->ejecutarQuery("SELECT m.* FROM Municipio m  Order by m.nombre");

echo json_encode($r);
