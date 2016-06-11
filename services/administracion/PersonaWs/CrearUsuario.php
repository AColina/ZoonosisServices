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

date_default_timezone_set("America/Caracas");

require_once '/../../../pdo/Des.php';

$json = file_get_contents('php://input');

$pdo = new PDOManager();
$em = $pdo->inicializarEntityManager();
$em->clear();
$usuario = Usuario::fromJson($json);

$em->beginTransaction();

if ($usuario->getPersona()->getId() != NULL) {
    $persona = $em->find(Persona::class, $usuario->getPersona()->getId());
    $usuario->setPersona($persona);
    $usuario = crearUsuario($usuario, $em);
} else {

    $persona = new \Persona();
    $persona->setNombre($usuario->getPersona()->nombre);
    $persona->setApellido($usuario->getPersona()->apellido);
    $persona->setCedula($usuario->getPersona()->cedula);
    $usuario->setPersona($persona);
    $usuario = crearUsuario($usuario, $em);
}
$em->flush();
$em->commit();
$em->close();
echo Des::toJson(Usuario::class, $usuario);

function crearUsuario(Usuario $usuario, \Doctrine\ORM\EntityManager $em) {

    $us = new \Usuario();
    $persona = $usuario->getPersona();
    $permiso = $em->find(Permiso::class, $usuario->getPermiso()->getId());

    $us->setContrasena($usuario->getContrasena());
    $fecha = date_create($usuario->getFechaNacimiento())->format('Y-m-d');
    $us->setFechaNacimiento(new DateTime($fecha));
    $us->setNombre($usuario->getNombre());

    $us->setPersona($persona);
    $persona->setUsuario($us);

    $permiso->getUsuarios()->add($us);
    $us->setPermiso($permiso);
    
    if ($persona->getId() == NULL) {
        $em->persist($persona);
        $em->flush();
    }

    $em->flush();
    return $us;
}
